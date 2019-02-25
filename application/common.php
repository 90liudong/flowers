<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// SECRET 379761515a7cab284a54e343b3349ac7
// APPID wx0d41504827be2738
function mp($arr){
		echo "<pre>";
		print_r($arr);
		exit;
	}
function getCode(){
	$redirect_uri = 'http://pxxy.90web.cn/gp/public/index.php/login/login/getOpenid';
	$redirect_uri = urlencode($redirect_uri);
	$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1bd483ef35c568ff&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
	header("location:".$url);
	exit;
}
function getAccessToken($code){
	$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx1bd483ef35c568ff&secret=c0cc3ecc6cd3c095b685084c3dfee39b&code='.$code.'&grant_type=authorization_code';
    $data = file_get_contents($url);
    $data = json_decode($data,true);
    return $data;
}
function getUserData($access_token,$openid){
	$url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN ';
	$data = file_get_contents($url);
	return $data;
}