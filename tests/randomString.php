<?php
	if (!function_exists('randomString')){
		function randomString($length=8){
			$output="";
			$chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			for ($i=0; $i<$length; $i++){
				$output.=substr($chars, mt_rand(0, strlen($chars)), 1);
			}
			return $output;
		}
	}