<?php
namespace app\controllers;
use Yii;
use QC;
use yii\web\Controller;
class QqController extends Controller
{
    public function actionPhpinfo(){
        echo phpinfo();
    }
    public function actionQq()
    {
        return $this->render("qq");
    }
    public function actionQq_login()
    {
    	include "Connect2.1/API/qqConnectAPI.php";
    	$qq = new QC();
    	$qq->qq_login();
    }
    public function actionShow()
    {
        return $this->render("show");
    }
    public function actionTemp(){
        $city = "上海";
        $url = file_get_contents("http://api.k780.com:88/?app=weather.future&weaid=$city&&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
        $data = json_decode($url,true);
//        var_dump($data);die();
        $temp = $data['result'];
        $temp_high = "";
        $temp_low = "";
        foreach ($temp as $k => $v){
            $temp_high.=$v['temp_high'].',';
        }
        foreach ($temp as $k => $v){
            $temp_low.=$v['temp_low'].',';
        }
        return $this->render("temp",['temp_high'=>$temp_high,'temp_low'=>$temp_low]);
    }
    public function actionMap(){
        $city = "上海";
        $url = file_get_contents("http://api.map.baidu.com/geocoding/v3/?address=北京市海淀区上地十街10号&output=json&ak=v6oUmEY0tL90zxL0A8TyvON0I3lsuEIl");
        $data = json_decode($url,true);
//        var_dump($data);die();
        $lng = $data['result']['location']['lng'];
        $lat = $data['result']['location']['lat'];
        return $this->render("map",['lng'=>$lng,'lat'=>$lat]);
    }

}
