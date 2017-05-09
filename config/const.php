<?php
//ユーザ定義定数
//呼び出し方:    echo FOOBAR;
//ステータス
define("STATUS_START",0);				//開始
define("STATUS_IMPOSSIBLE",8);			//旅行対応不可・旅行依頼否認
define("STATUS_IMPOSSIBLE_CHECK",9);	//旅行対応不可・旅行依頼否認確認済み
define("STATUS_INPUT",10);				//作成中
define("STATUS_ANSWER_WAITING",20);		//旅行依頼回答待ち
define("STATUS_ACCEPT_WAITING_SEND_MACHINE",30);	//機器送付受付待ち
define("STATUS_WAITING_SEND_MACHINE",40);			//貸出機器送付待ち
define("STATUS_WAITING_RECEIVE_MACHINE",50);		//貸出機器受領待ち
define("STATUS_WAITING_INSTALL_MACHINE",60);		//機器設置待ち
define("STATUS_WAITING_PICKUP_MACHINE",70);			//機器回収待ち
define("STATUS_WAITING_SEND_PICKUP_MACHINE",80);	//回収機器送付待ち
define("STATUS_WAITING_RECEIVE_PICKUP_MACHINE",90);	//回収機器受領待ち
define("STATUS_WAITING_CONFIRM_TRAVEL_END",100);	//旅行対応完了確認中
define("STATUS_WAITING_TRAVEL_END",110);			//旅行対応完了
define("STATUS_CANCEL_TRAVEL",900);					//キャンセル済み
define("STATUS_COMPLETE_CANCEL_TRAVEL",901);		//キャンセル完了

//ユーザロール
define("ROLE_EXECUTIVE_HEAD_OFFICE",1);		//事務局本部
define("ROLE_MTSC",2);						//MTSC
define("ROLE_EXECUTIVE_BRANCH_OFFICE",3);	//事務局支社
define("ROLE_STORE",4);						//販売店

//設置機器タイプ
define("MACHINE_TYPE_CONCENTRATOR",1);		//酸素濃縮機
define("MACHINE_TYPE_LIQUEFACTION",2);		//液化酸素
define("MACHINE_TYPE_BOMB",3);				//ボンベ
define("MACHINE_TYPE_CONCENTRATOR_BOMB",4);	//酸素濃縮機+ボンベ
define("MACHINE_TYPE_LIQUEFACTION_BOMB",5);	//液化酸素+ボンベ

//未選択
define("UNSELECTED",0);

//一覧画面タイプ
define("LIST_TYPE_ANSWER_WAITING",1);	//未回答
define("LIST_TYPE_ONGOING",2);			//対応中受注
define("LIST_TYPE_REQUESTING",3);		//依頼中旅行
define("LIST_TYPE_RENTAL_MACHINE",4);	//機器貸出依頼
define("LIST_TYPE_RETAINED",5);			//滞留データ
define("LIST_TYPE_IMPOSSIBLE",6);		//対応不可

//履歴画面タイプ
define("HISTORY_TYPE_TRUSTEE",1);	//受託
define("HISTORY_TYPE_REQUEST",2);	//依頼

//金額明細コード
define("AMOUNT_BASIC","10");			//基本料金
define("AMOUNT_EMERGENCY_1_3","11");	//緊急対応（1～3日前）
define("AMOUNT_EMERGENCY_4_10","12");	//緊急対応（4～10日前）
define("AMOUNT_BOMB","13");				//ボンベ4本以上
define("AMOUNT_COMMISSION_MEMBER","20");	//事務手数料（会員）
define("AMOUNT_COMMISSION_NONMEMBER","21");	//事務手数料（非会員）
define("AMOUNT_ADD_BOMB_OXYGEN","31");		//追加配送料金（ボンベ酸素代）
define("AMOUNT_ADD_BOMB_DELIVERY","32");	//追加配送料金（ボンベ配送代）
define("AMOUNT_ADD_LOX_OXYGEN","33");		//追加配送料金（液体酸素酸素代）
define("AMOUNT_ADD_LOX_DELIVERY","34");		//追加配送料金（液体酸素配送代）
define("AMOUNT_RENTAL_MTSC","41");			//機器レンタル手数料（MTSC）
define("AMOUNT_RENTAL_REQUEST","42");		//機器レンタル手数料（依頼会社）
define("AMOUNT_RENTAL_MTSC_0","43");		//機器レンタル手数料（MTSC:無償）

//大陽日酸の期
define("PERIOD", 13);

//会員フラグ
define("NONMEMBER", 0);		//非会員
define("MEMBER", 1);		//会員
define("TNSC", 2);			//大陽日酸

//済・未済
define("UNFINISHED", 0);	//未済
define("FINISHED", 1);		//済

//該当・非該当
define("UNFIT", 0);	//非該当
define("FIT", 1);	//該当

//消費税率
define("TAX_RATE", 0.08);	//該当

//金額種別コード
define("UNIT_PRICE_TYPE_BASIC", "1");		//基本料金等
define("UNIT_PRICE_TYPE_COMMISSION", "2");	//事務局手数料
define("UNIT_PRICE_TYPE_ADD_3", "3");		//追加手配
define("UNIT_PRICE_TYPE_ADD_4", "4");		//追加手配
define("UNIT_PRICE_TYPE_RENTAL", "5");		//機器手配

//コードタイプ
define("CODE_MEMBER", "01");			//会員区分
define("CODE_MACHINE_TYPE", "02");		//機器タイプ

// 削除申請
define("APPROVAL_PENDING", "1"); //処理待ち
define("IS_DELETE", "1");		 //削除フラグ

//マニュアル区分
define("FILE_TYPE_MANUAL_USER_SIMPLE", "1");     //利用者マニュアル(簡易版)
define("FILE_TYPE_MANUAL_USER_DETAIL", "2");     //利用者マニュアル(詳細版)
define("FILE_TYPE_MANUAL_ADMIN_SIMPLE", "3");     //事務局マニュアル(簡易版)
define("FILE_TYPE_MANUAL_ADMIN_DETAIL", "4");     //事務局マニュアル(詳細版)
define("FILE_TYPE_NOTICE", "5");
define("FILE_TYPE_BOARD_OF_DIRECTORS", "6");
define("FILE_TYPE_REQUEST_DOCUMENT", "7");

$config['file_types'] = [
    FILE_TYPE_MANUAL_USER_SIMPLE=>'利用者マニュアル(簡易版)',
    FILE_TYPE_MANUAL_USER_DETAIL=>'利用者マニュアル(詳細版)',
    FILE_TYPE_MANUAL_ADMIN_SIMPLE=>'事務局マニュアル(簡易版)',
    FILE_TYPE_MANUAL_ADMIN_DETAIL=>'事務局マニュアル(詳細版)',
    FILE_TYPE_NOTICE=>'お知らせ',
    FILE_TYPE_BOARD_OF_DIRECTORS=>'理事会資料',
    FILE_TYPE_REQUEST_DOCUMENT=>'依頼申し込み関連資料'
];

//受入可否確認
$config['is_acceptable'] = [
    '0'=>'未確認',
    '1'=>'確認済み',
];


//事前設置・後日回収
$config['is_before_setting'] = [
    '0'=>'不可',
    '1'=>'可',
    '2'=>'可(フロント預かり)',
];

//設置機器タイプ
$config['is_machine_type'] = [
		'0'=>'選択してください',
		'1'=>'酸素濃縮器',
		'2'=>'液体酸素',
		'3'=>'ボンベ',
		'4'=>'酸素濃縮器＋ボンベ',
		'5'=>'液体酸素＋ボンベ',
];

//機器貸し出し無しの場合のステータスフロー
$config['status_flow'] = [
    STATUS_ANSWER_WAITING,  			//旅行依頼回答待ち
    STATUS_WAITING_INSTALL_MACHINE, 	//機器設置待ち
    STATUS_WAITING_PICKUP_MACHINE,  	//機器回収待ち
    STATUS_WAITING_CONFIRM_TRAVEL_END,  //旅行対応完了確認中
    STATUS_WAITING_TRAVEL_END, 			//旅行対応完了
];

//機器貸し出しありの場合のステータスフロー
$config['status_flow_borrow'] = [
    STATUS_ANSWER_WAITING,              		//旅行依頼回答待ち
    STATUS_ACCEPT_WAITING_SEND_MACHINE, 		//機器送付受付待ち
    STATUS_WAITING_SEND_MACHINE,                //貸出機器送付待ち
    STATUS_WAITING_RECEIVE_MACHINE,             //貸出機器受領待ち
    STATUS_WAITING_INSTALL_MACHINE,             //機器設置待ち
    STATUS_WAITING_PICKUP_MACHINE,              //機器回収待ち
    STATUS_WAITING_SEND_PICKUP_MACHINE,         //回収機器送付待ち
    STATUS_WAITING_RECEIVE_PICKUP_MACHINE,      //回収機器受領待ち
    STATUS_WAITING_CONFIRM_TRAVEL_END,          //旅行対応完了確認中
    STATUS_WAITING_TRAVEL_END              		//旅行対応完了
];

// Paid登録表示用
$config['paid'] = [
		'0' => '未',
		'1' => '済'
];

// 会員区分表示用
$config['member_flg'] = [
		'0' => '非会員',
		'1' => '会員',
		'2' => '大陽日酸'
];


// 所属事業所
$config['affiliation'] = [
		'1' => '東日本事業所',
		'2' => '西日本事業所'
];
// メイン担当
$config['handle'] = [
		'1' => 'メイン担当',
		'0' => ''
];

//濃縮器容量
$config['oxygenEnricherType'] = [
		'1'=>'3Lタイプ',
		'2'=>'5Lタイプ',
		'3'=>'7Lタイプ',
];

//加湿有り無し
$config['humidifier'] = [
		'0'=>'加湿なし',
		'1'=>'加湿あり',
];


//子機機種
$config['childDeviceType'] = [
		'1'=>'ヘリオスH300',
		'2'=>'ほたる',
		'0'=>'特定機種なし',
];

//ボンベ充填圧力
$config['fillingPressure'] = [
		'1'=>'14.7MPa',
		'2'=>'19.6MPa',
];

//ボンベ容量
$config['bombCapacity'] = [
		'1'=>'1L',
		'2'=>'2L',
		'3'=>'3L',
];

//追加配送
define("ADD_BOMB_OXYGEN", 31);	//ボンベ酸素代
define("ADD_BOMB_DELIVERY", 32);	//ボンベ配送代
define("ADD_LIQUID_OXYGEN", 33);	//液酸酸素代
define("ADD_LIQUID_DELIVERY", 34);	//液酸配送代
define("ADD_EMERGENCY", 41);	//緊急対応費
define("ADD_FAR", 42);	//遠方対応費

//追加配送内容
$config['addDelivery'] = [
    ADD_BOMB_OXYGEN=>'ボンベ',
    ADD_BOMB_DELIVERY=>'',
    ADD_LIQUID_OXYGEN=>'液体酸素',
    ADD_LIQUID_DELIVERY=>'',
    ADD_EMERGENCY=>'緊急対応',
    ADD_FAR=>'遠方対応',
];

// 機器マスタ
$config['machine_type'] = [
		'1' => '酸素濃縮器',
		'2' => '液体酸素親器',
		'3' => '液体酸素子器',
		'4' => '液体酸素附属品',
		'5' => 'バルブ'
];

// 機器マスタ２
$config['loana'] = [
		'1' => '○',
		'0' => '×'
];

// 機器マスタ画像URL
define("UPLOAD_IMG_DIR", WWW_ROOT . "upload_img/");

//配列
//呼び出し方:    $fuga = Configure::read("fuga");
$config['fuga'] = array("a","b","c");

//連想配列
//呼び出し方:    $hoge = Configure::read("hoge");
$config['hoge'] = array(
  "A"=>"あ",
  "B"=>"い",
  "C"=>"う",
);