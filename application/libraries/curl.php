<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class curl {
	public function exec($url, $post = NULL) {
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		if($post){
			curl_setopt($curl_handle, CURLOPT_POSTFIELDS, 
				$post
			);
		}

		$buffer = curl_exec($curl_handle);
		curl_close($curl_handle);

		$result = json_decode($buffer);

		return $result;
	}
}
