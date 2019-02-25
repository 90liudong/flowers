<?php
namespace app\login\model;
use think\Model;

class Community extends Model{
	
	function getCom($addr){
		$result =  db("community")->field("id,name")->where(["addr"=>["like","%$addr%"]])->select();
		return $result;
	}
	function getAllCom(){
		$result =  db("community")->field("id,name")->select();
		return $result;
	}
	function findCom($cond){
		$result = db("community")->where($cond)->select();
		return $result;
	}
	function addgroup($gid,$cid){
		$result = db('community')->where(['id'=>$cid])->update(['gid'=>$gid]);
		return $result;
	}
}