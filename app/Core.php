<?php
namespace App;

/**
* 
*/

class Core
{
	
	function __autoload()
	{

	}
	public function convert_alias($str='')
	{
		$str = trim($str);
		$str = mb_strtolower($str);
		
		$char = array(
			'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd' => 'đ',
			'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i' => 'í|ì|ỉ|ĩ|ị',
			'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ữ|ự|ử'
			);
		foreach ($char as $key => $value) {
			// echo $value;
			$str = preg_replace('/'.$value.'/i', $key, $str);
		}
		$str = preg_replace('/[^a-zA-Z0-9\s\-]+/', '', $str);
		$str = preg_replace('/\s+/', '-', $str);
		$str = preg_replace('/\-+/', '-', $str);
		return $str;
	}

	public function rand_str($len = NULL, $scope = NULL)
	{
		if (is_null($scope) || empty($scope)) {
			$scope = "abcdefghijklmnopqrstuvwxyz0123456789=-_";
		}else{
			$scope = $scope;
		}

		if (is_null($len) || empty($len)) {
			$len = 20;
		}else{
			$len = $len;
		}

		$rstr = '';
		for ($i=0; $i < $len; $i++) { 
			$rstr .= $scope[rand(0, strlen($scope)-1)];
		}

		return $rstr;
	}
}