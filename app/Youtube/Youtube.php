<?php

namespace App\Youtube;

class Youtube
{
	public static function download($url) {
		$contents = file_get_contents($url);

		$videos = array('MP4' => array(), 'FLV' => array(), '3GP' => array(), 'WEBM' => array());

		preg_match_all('/"url_encoded_fmt_stream_map"\s*:\s*"[^"](.*?)"\s*,/i', $contents, $stream_map);

		$map = "{".preg_replace("/\s*,$/", '',$stream_map[0][0])."}";

		$json = json_decode($map);

		$url_encoded = $json->url_encoded_fmt_stream_map;

		$data = explode(',',$url_encoded);

		foreach($data as &$v) {
			$v = str_replace('\u0026', '&', $v);
			$v = explode('&', $v);

			foreach($v as &$c) {
				$c = str_replace('url=','',$c);
				$c = urldecode($c)."&signature=";
			}
		}

		return $data;
	}
}