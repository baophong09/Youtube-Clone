<?php

namespace App\Curl;

class Curl
{

	public static function exec($url) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);

		curl_close($ch);

		return json_decode($output);
	}

}