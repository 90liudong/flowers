<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller{

    public function index($headimgurl="__STATIC__/images/guang_4.png",$nickname="哈哈哈hahahaha")
    {
    	header('Content-type:text/html;charset=utf-8');
    	if (session("?headimgurl")) {
    		// mp(111);
    		$headimgurl = "__STATIC__/head/".session("headimgurl");
    	}
    	$this->assign("headimgurl",$headimgurl);
    	if (session("?nickname")) {
    		$nickname = session("nickname");
    		
    	}
    	// $nickname =  mb_substr($nickname,0,5,"UTF-8"); 
    	$this->assign("nickname",$nickname);
        if (session("?opid")) {
            $this->assign("sign",1);
        }else{
            $this->assign("sign",0);
        }
        return $this->fetch();
    }
    function setOpid(){
        // echo "123";
        if(session("?openid")){
            $openid =  session("openid");
            session("opid",$openid);
        }

    }
     function addClick($data){
        // echo $data;
        $result = db("kind_click")->where(["id"=>1])->find();
        // echo "<pre>";
        // print_r($result);
        $num = $result[$data]+1;
        // echo $num;
        db("kind_click")->where(["id"=>1])->update([$data=>$num]);
    }
    function addWork($work){
        $result = db("work")->where(["id"=>$work])->find();
        $num = $result["num"]+1;
        $result = db("work")->where(["id"=>$work])->update(["num"=>$num]);
        echo "职位上传了";
    }
    function addOption($six,$seven){
        $result = db("option6case")->where(["opname"=>$six])->find();
        $num = $result["num"]+1;
        $result = db("option6case")->where(["opname"=>$six])->update(["num"=>$num]);

        $result1 = db("option7case")->where(["opname"=>$seven])->find();
        $num1 = $result1["num"]+1;
        $result = db("option7case")->where(["opname"=>$seven])->update(["num"=>$num1]);       
        echo "选项上传了";
    }
    function data(){
        $kind = db("kind_click")->find();
        $work = db("work")->select();
        $six = db("option6case")->select();
        $seven = db("option7case")->select();
        $this->assign("kind",$kind);
        $this->assign("work",$work);
        $this->assign("six",$six);
        $this->assign("seven",$seven);

        return  $this->fetch();
    }
}
