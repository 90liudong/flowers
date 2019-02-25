<?php
 namespace app\login\controller;
 use think\Controller;
 class Login extends Controller{

 	function getCode(){
 		// echo 1;exit;
		getCode();

 	}
 	function index(){
		getCode();	
 	}
 	function getOpenid(){
 		$time1 = time();
 		// mp(111);
 		//获取用户openid
 		$code = $_GET['code'];
 		// mp($code);
 		$data = getAccessToken($code);
 		// mp($data);
 		$openid =  $data['openid'];
 		// mp($openid);
 		session("openid",$openid);
        
 		$userdata = getUserData($data['access_token'],$data['openid']);
 		$userdata = json_decode($userdata,true);
 	
 		// mp($userdata);
 		$url = $userdata['headimgurl'];
 		$save_dir = ROOT_PATH . 'public' . DS . 'static'. DS .'head';
 		$filename = time()."a";
 		$this->getImage($url,$save_dir,$filename,1);
		// $time2 =time()-$time1;
 		// mp($time2);
 		// $userdata['nickname'] = substr($userdata['nickname'],0,20);
 		session("nickname",$userdata['nickname']);

 		return $this->redirect("index/index/index");
 	}
 	
 	function getImage($url,$save_dir='',$filename='',$type=0){ 
    if(trim($url)==''){ 
        return array('file_name'=>'','save_path'=>'','error'=>1); 
    } 
    if(trim($save_dir)==''){ 
        $save_dir='./'; 
    } 
    if(trim($filename)==''){//保存文件名 
        $ext=strrchr($url,'.'); 
        if($ext!='.gif'&&$ext!='.jpg'){ 
            return array('file_name'=>'','save_path'=>'','error'=>3); 
        } 
        $filename=time().$ext; 
    } 
    if(0!==strrpos($save_dir,'/')){ 
        $save_dir.='/'; 
    } 
    //创建保存目录 
    if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){ 
        return array('file_name'=>'','save_path'=>'','error'=>5); 
    } 
    //获取远程文件所采用的方法  
    if($type){ 
        $ch=curl_init(); 
        $timeout=5; 
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
        $img=curl_exec($ch); 
        curl_close($ch); 
    }else{ 
        ob_start();  
        readfile($url); 
        $img=ob_get_contents();  
        ob_end_clean();  
    } 
    //$size=strlen($img); 
    //文件大小  
    $fp2=@fopen($save_dir.$filename,'a'); 
    fwrite($fp2,$img); 
    fclose($fp2); 
    unset($img,$url); 
    session("headimgurl",$filename);
    return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0); 
} 

	function code(){
		require_once ROOT_PATH.'Extend/Vendor/phpqrcode/phpqrcode.php';
            vendor("phpqrcode.phpqrcode");
            $data = 'http://pxxy.90web.cn/gp/public/index.php/login/login/index';
            $level = 'L';
            $size = 4;
            $QRcode = new \QRcode();
            $fileName = ROOT_PATH . 'public' . DS . 'static'. DS . 'head'. DS .'123as'.'.png';
            $QRcode->png($data,$fileName,'L',4,2);

	}
 	
 	function test2(){		
 		return $this->fetch();
 	}
 }