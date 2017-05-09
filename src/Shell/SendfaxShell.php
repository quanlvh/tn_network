<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

class SendfaxShell extends Shell
{
	public function main()
	{
    	$this->fax = false;
    	$this->log("Main start", 'info');

    	$this->Get_Fax_Transmission_required();
    	if ($this->fax == false) {
        	$ArRes = $this->Request_Information();

        	$this->_res = $this->Company_Information($ArRes);

        	$this->makePDF($ArRes);
    	}
    	$this->log("Main end", 'info');
	}

	/**
 	 * FAX送信要取得
 	 */
	public function Get_Fax_Transmission_required()
	{
    	$this->log('Get_Fax_Transmission_start', 'info');
    	$faxSend = TableRegistry::get('fax_send_requests');
    	$query = $faxSend->find()->order(['request_date'=>'ASC']);
    	$result = $query->where(['is_sended'=>'0'])->select(['request_no'])->toArray();
    	if(count($result)){
        	$this->log('send request','info');
        	$this->_result = $result;
    	} else {
        	$this->log('no send request','info');
        	$this->log('Get_Fax_Tansmission_End','info');
        	$this->fax = true;
        	return;
    	}

    	Log::debug($result);
    	$this->out('FAX1');
    	$this->log('Get_Fax_Transmission_End','info');
	}

	/**
 	 * 依頼情報取得
 	 */
	public function Request_Information()
	{
    	$this->_Stay = "";
    	$this->_Addr = "";

    	$this->log('Get Request Information start', 'info');
    	$requests = TableRegistry::get('requests');
    	if(count($this->_result)) {
        	foreach($this->_result as $val) {
            	$this->log("start = ".$val['request_no'],'info');
            	$res = $requests->find()->where(['request_no'=>$val['request_no']])->first();
            	if($res['request_no']){
                	$tmpData[] = $res['request_no'].",".$res['contractor_company_code'].",".$res['contractor_branch_code']
                	.",".$res['stay_from_date'].",".$res['stay_to_date'].",".$res['lodging_place_addr'];
            	} else {
                	$text1 = "対象の依頼番号に該当するデータが存在しません";
                	$this->log(mb_convert_encoding($text1, "UTF8"),'error');
            	}
            	if(!$res['contractor_company_code']){
                	$text2 = "対象の依頼番号の受託会社コードが取得できません";
                	$this->log(mb_convert_encoding($text2, "UTF8"),'error');
            	}
            	if(!$res['contractor_branch_code']){
                	$text3 = "対象の依頼番号の受託支社コードが取得できません";
                	$this->log(mb_convert_encoding($text3, "UTF8"));
            	}
            	$from_date = new Date($res['stay_from_date']);
            	$to_date = new Date($res['stay_to_date']);
            	//$this->_Stay[$res['request_no']] = $res['stay_from_date']."～".$res['stay_to_date'];
            	$this->_Stay[$res['request_no']] = $from_date->format('Y-m-d')."～".$to_date->format('Y-m-d');
            	$this->_Addr[$res['request_no']] = $res['lodging_place_addr'];
            	$this->log("end = ".$res['request_no'],'info');
        	}
    	}

    	$this->out('FAX2');
    	$this->log('Get Request Information end','info');
    	return $tmpData;
	}

	/**
 	 * 会社情報取得
 	 */
	public function Company_Information($array)
	{
    	$this->log('Get Company Information start', 'info');
    	$company = TableRegistry::get('mst_companies');

    	foreach ($array as $key => $val){
        	$arRequest[$key] = explode(",", $val);
    	}

    	// find
    	foreach($arRequest as $value) {
        	$query = $company->find()->hydrate(false)
            	                ->join([
                                    'table' => 'mst_branch_offices',
                                    'alias' => 'branch',
                                    'type' => 'LEFT',
                                    'conditions' => 'branch.company_code = mst_companies.company_code',
                            ])->where(['mst_companies.company_code'=>$value['1']])->select([
                                    'company_name' => 'mst_companies.company_name',
                                    'branch_fax' => 'branch.branch_fax'
                            ])->first();
	        if(empty($query['company_name'])){
            	$text4 = "会社：受託会社コード、事業所：受託支社コードに該当するデータが存在しません";
            	$this->log(mb_convert_encoding($text4, "SJIS"),"error");
        	}
        	if(empty($query['branch_fax'])){
            	$text5 = "送信先FAX番号が取得できません";
            	$this->log(mb_convert_encoding($text5, "SJIS"),"error");
        	}

        	$this->log("request_no = ".$value['0'],'info');
    	}

    	$this->out('FAX3');
    	$this->log('Get Company Infomation end', 'info');
    	return $query;
	}

	/**
 	 * PDFベースHTML
 	 */
	public function makeHTML($requestNo)
	{
    	$this->log('makeHTML start', 'info');

    	$tmpDir = realpath(WWW_ROOT . "/fax_templete/");
    	$this->log($tmpDir,'info');
    	$html = $tmpDir."/fax_template.html";

    	$html = file_get_contents($html);

    	date_default_timezone_set('Asia/Tokyo');
    	$day = date('Y年m月d日');

    	$html = str_replace('##_SEND_##', '1', $html);
    	$html = str_replace('##SEND_DATE##', $day, $html);

    	$html = str_replace('##BRANCH_ADDR##', $this->_res['company_name'], $html);
    	$html = str_replace('##BRANCH_FAX##', $this->_res['branch_fax'], $html);

    	$html = str_replace('##REQUEST_NO##', $requestNo, $html);
    	$html = str_replace('##STAY_DATE##', $this->_Stay[$requestNo], $html);
    	$html = str_replace('##STAY_ADDR##', $this->_Addr[$requestNo], $html);

    	$file = $tmpDir."/to_pdf.html";
    	unlink($file);
    	file_put_contents($file, $html);

    	$this->log('makeHTML end','info');
	}

	/**
 	 * PDF作成
 	 */
	public function makePDF($array)
	{
  		date_default_timezone_set('Asia/Tokyo');

		foreach ($array as $key => $val) {
			$arRequest[$key] = explode(",", $val);
    	}
    	foreach ($arRequest as $value) {
    		$dir = realpath(WWW_ROOT . "/pdf_img/");
        	$tmpDir = realpath(WWW_ROOT . "/fax_templete/");
        	$fileName = $value[0]."".date("YmdHis").".pdf";

        	$this->makeHTML($value[0]);

        	$html = $tmpDir."/to_pdf.html";

			$this->log("make pdf work start",'info');
			// for linux
	    	//exec("/usr/local/bin/wkhtmltox/bin/wkhtmltopdf ". $html." ". $dir."/".$fileName);
	    	// for dos
	    	exec("C:\ProgramFiles\wkhtmltopdf\bin\wkhtmltopdf " .$html." ".$dir."/".$fileName);
			$this->log("make pdf work end",'info');
    	}
	}

	/**
	 * Insert Data for Oracle
	 */
	public function Insert_Oracle()
	{


	}
}
