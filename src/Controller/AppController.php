<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Log\Log;
use Cake\I18n\Time;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
    	parent::initialize();
    	$this->loadComponent('Flash');
    	$this->loadComponent('RequestHandler');
    	$this->loadComponent('Auth', [
    		'authenticate' => [
    			'Form' => [
    				'fields' => [
    					'username' => 'user_id',
    					'password' => 'password'
    				],
    					'scope' => [
    							'Users.is_deleted'=> 0,
    					]
    			]
    	],
    	'loginRedirect' => [
    			'controller' => 'mypage',
    			'action' => 'index'
    	],
    	'logoutRedirect' => [
    			'controller' => 'Users',
    			'action' => 'login',
    	],
    	'authError' => 'ログインできませんでした。ログインしてください。',
    	]);

        //ログインユーザ情報をセット
        if(!empty($this->request->session()->read('Auth')['User'])) {
            $user = $this->request->session()->read('Auth')['User'];
            $this->set('user', $user);

            //会社情報取得
            $Mst_companies = \Cake\ORM\TableRegistry::get('mst_companies')->find()->enableHydration(false)
                                        ->where(['company_code' => $user['company_code']])->first();
            $this->request->session()->write('login_company', $Mst_companies);
            //支店情報取得
            $Mst_branch_offices = \Cake\ORM\TableRegistry::get('mst_branch_offices')->find()->enableHydration(false)
                                        ->where(['company_code' => $user['company_code']])
                                        ->where(['branch_code' => $user['branch_code']])
                                                                    ->first();
            $this->request->session()->write('login_branch_office', $Mst_branch_offices);


            $this->set('mst_companies', $Mst_companies);
            $this->set('mst_branch_offices', $Mst_branch_offices);

        }
    }

    public function beforeFilter(Event $event)
    {
    	$this->Auth->allow(['index', 'view', 'display', 'remember']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
     * 金額計算
     *
     *・金額明細ごと（金額マスタのレコードごと）に計算
     *・フラグで合算するかどうかを判定
     *・金額明細データを作成して返す
     *・追加の明細データは引数で渡す
     *・引数のデータは返さないで合算値のみ計算して返す
     */
    public function calc($request, $add_amount_details = null, $amount_free_details = null){
    	Log::debug($request);
    	//金額情報取得
    	$Mst_unit_prices = \Cake\ORM\TableRegistry::get('mst_unit_prices')
    					->find()->enableHydration(false)->all();
    	//ユーザ情報取得
    	$user = $this->request->session()->read('Auth')['User'];
    	$company = $this->request->session()->read('login_company');

    	//金額マスタ情報取得
    	$result['request_charge']=null;
    	$result['contractor_payment']=null;
    	$result['contractor_charge']=null;
    	$result['executive_commission']=null;
    	$result['amount_details']=null;

    	$offer_date = new Time($request['offer_date']);
    	$stay_from_date = new Time($request['stay_from_date']);
    	$diff_d = $offer_date->diff($stay_from_date)->d;
    	foreach ($Mst_unit_prices as $unitPrice){
    		$quantity=1;
     		switch ($unitPrice['unit_price_detail_code']){
    			case AMOUNT_BASIC:
    				$amount = $unitPrice['unit_price'];
    				$result['basic']=$amount;
    				break;
    			case AMOUNT_EMERGENCY_1_3:
    				//申し込み日が旅行日より1～3日前の場合→3日以内
	   				if($diff_d<=3){
    					$amount = $unitPrice['unit_price'];
	   				}
    				break;
    			case AMOUNT_EMERGENCY_4_10:
    		    	//申し込み日が旅行日より1～3日前の場合→3日以内
	   				if($diff_d>=4 and $diff_d<=10){
    					$amount = $unitPrice['unit_price'];
	   				}
    				break;
    			case AMOUNT_BOMB:
					$result['bomb_number'] = $request['bomb_number']-3;//ボンベ4本以上
					if($result['bomb_number']>0){
						$amount = $result['bomb_number']*$unitPrice['unit_price'];
						$result['bomb_charge'] = $amount;
						$quantity = $result['bomb_number'];
					}
					break;
    			case AMOUNT_COMMISSION_MEMBER:
    				//事務局手数料:会員の場合
    				if ($company['member_flg']==MEMBER){
    					$amount = $unitPrice['unit_price'];
    				}
    				break;
    			case AMOUNT_COMMISSION_NONMEMBER:
    		    	//事務局手数料:非会員の場合
    				if ($company['member_flg']==NONMEMBER){
    					$amount = $unitPrice['unit_price'];
    				}
    				break;
    			case AMOUNT_RENTAL_MTSC://TODO
    				$result['rental_mtsc']['price'] = $amount['unit_price'];
    				break;
    			case AMOUNT_RENTAL_REQUEST://TODO
    				$result['rental_request']['price'] = $amount['unit_price'];
    				break;
    			case AMOUNT_RENTAL_MTSC_0://TODO
    				$result['rental_mtsc']['price'] = $amount['unit_price'];
    				break;
    			default:
    		}
    		if($amount>0){
	    		//依頼会社請求金額
	    		if($unitPrice['is_request_charge']==FIT){
	    			$result['request_charge']+=$amount;
	    		}
	    		//受託会社支払金額
	    		if($unitPrice['is_contractor_payment']==FIT){
	    			$result['contractor_payment']+=$amount;
	    		}
	    		//受託会社請求金額
	    		if($unitPrice['is_contractor_charge']==FIT){
	    			$result['contractor_charge']+=$amount;
	    		}
	    		//事務局手数料
	    		if($unitPrice['is_commission']==FIT){
	    			$result['executive_commission']+=$amount;
	    		}
	    		//金額明細データ作成
	    		$result['amount_details'][]=array(
	    				'unit_price_type_code'=>$unitPrice['unit_price_type_code'],
	    				'unit_price_detail_code'=>$unitPrice['unit_price_detail_code'],
	    				'unit_price_detail_name'=>$unitPrice['unit_price_detail_name'],
	    				'unit_price'=>$unitPrice['unit_price'],
	    				'quantity'=>$quantity,
	    				'amount'=>$amount,
	    				'is_request_charge'=>$unitPrice['is_request_charge'],
	    				'is_contractor_payment'=>$unitPrice['is_contractor_payment'],
	    				'is_contractor_charge'=>$unitPrice['is_contractor_charge'],
	    				'is_commission'=>$unitPrice['is_commission']
	    		);
    		}
    		$amount=0;//リセット
    	}
    	Log::debug($result['amount_details']);
    	//追加手配
    	if(!is_null($add_amount_details)){
	       	foreach ($add_amount_details as $amountDetail){
	    		if ($amountDetail['unit_price_type_code']==UNIT_PRICE_TYPE_ADD){
    				$amount = $amountDetail['amount'];
	    		}
	    		if($amount>0){
		    		//依頼会社請求金額
		    		if($amountDetail['is_request_charge']==FIT){
		    			$result['request_charge']+=$amount;
		    		}
		    		//受託会社支払金額
		    		if($amountDetail['is_contractor_payment']==FIT){
		    			$result['contractor_payment']+=$amount;
		    		}
		    		//受託会社請求金額
		    		if($amountDetail['is_contractor_charge']==FIT){
		    			$result['contractor_charge']+=$amount;
		    		}
		    		//事務局手数料
		    		if($amountDetail['is_commission']==FIT){
		    			$result['executive_commission']+=$amount;
		    		}
	    		}
	    		//金額が0円以上の明細は配列にセット
	    		$amount=0;//リセット
	       	}
    	}
       	//追加手配(フリー)
    	if(!is_null($amount_free_details)){
	       	foreach ($amount_free_details as $amountDetail){
				$amount = $amountDetail['amount'];
	       		if($amount>0){
	       			//依頼会社請求金額
	       			if($amountDetail['is_request_charge']==FIT){
	       				$result['request_charge']+=$amount;
	       			}
	       			//受託会社支払金額
	       			if($amountDetail['is_contractor_payment']==FIT){
	       				$result['contractor_payment']+=$amount;
	       			}
	       			//受託会社請求金額
	       			if($amountDetail['is_contractor_charge']==FIT){
	       				$result['contractor_charge']+=$amount;
	       			}
	       			//事務局手数料
	       			if($amountDetail['is_commission']==FIT){
	       				$result['executive_commission']+=$amount;
	       			}
	       		}
	       		//金額が0円以上の明細は配列にセット
	       		$amount=0;//リセット
	       	}
    	}

    	//依頼会社請求消費税
    	$result['request_charge_tax'] = ceil($result['request_charge']*TAX_RATE);
    	//受託会社支払消費税
    	$result['contractor_payment_tax'] = ceil($result['contractor_payment']*TAX_RATE);
    	//受託会社請求消費税
    	$result['contractor_charge_tax'] = ceil($result['contractor_charge']*TAX_RATE);
    	//事務局手数料消費税
   		$result['executive_commission_tax'] = ceil($result['executive_commission']*TAX_RATE);

   		Log::debug($result);
   		return $result;
    }
}
