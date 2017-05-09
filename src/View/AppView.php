<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadHelper('Html');
        $this->loadHelper('Form');
        $this->loadHelper('Flash');
        $this->loadHelper('Url');
    }
    /**
     * 日付型のまま引数に渡す。
     * →YYYY/MM/DD(W)の形式で返す。
     */
    public function datew($date){
        if($date === null || $date === '') {
            return '';
        }

    	//日本語の曜日配列
    	$weekjp = array(
    			'日', //0
    			'月', //1
    			'火', //2
    			'水', //3
    			'木', //4
    			'金', //5
    			'土'  //6
    	);

    	//日付を指定
    	$year = $date->format('Y');
    	$month = $date->format('m');;
    	$day = $date->format('d');;

    	//指定日のタイムスタンプを取得
    	$timestamp = mktime(0, 0, 0, $month, $day, $year);

    	//指定日の曜日番号（日:0  月:1  火:2  水:3  木:4  金:5  土:6）を取得
    	$weekno = date('w', $timestamp);

    	//指定日の日本語曜日を出力
    	return $year.'/'.$month.'/'.$day.'('.$weekjp[$weekno].')';
    }



}
