<?php
namespace app\login\model;
use think\Model;

class User extends Model
{
	function getuser($uid){
		$result = db('user')->where(['id'=>$uid])->find();
		return $result; 
	}
	function findOpenid($openid){
		$result =  db('user')->where(['openid'=>$openid])->find();
		
		return $result; 
	}
	function addOne($openid,$nickname,$male,$head){
		db("user")->insert(["openid"=>$openid,"nickname"=>$nickname,"male"=>$male,"head"=>$head,"time"=>time()]);
		 $result = db('user')->getLastInsID();
		 return $result;
	}
	function bind($phone,$addr,$cid,$uid,$password){
		db("user")->where(["id"=>$uid])->update(["tel"=>$phone,"addr"=>$addr,"cid"=>$cid,"password"=>$password]);
		return 1;
	}
	function findTel($phone){
		$result = db("user")->where(["tel"=>$phone])->select();
		return $result;
	}
	function addOnePerson($phone,$password,$nickname){
		db("user")->insert(["tel"=>$phone,"time"=>time(),"password"=>$password,"nickname"=>$nickname]);
		$result = db('user')->getLastInsID();
		return $result;
	}
	function wxaddOnePerson($phone,$password,$openid,$nickname,$head){
		db("user")->insert(["tel"=>$phone,"time"=>time(),"password"=>$password,"openid"=>$openid,"nickname"=>$nickname,"head"=>$head]);
		$result = db('user')->getLastInsID();
		return $result;
	}
}