<?php

namespace App\Youtube;

class YoutubeDownloader
{
	public static function get($id)
	{
		$ret = array();

		if(filter_var($id, FILTER_VALIDATE_URL)) {
			$id = self::youtube_id_from_url($id);
		}

		$data = file_get_contents("https://www.youtube.com/get_video_info?video_id=".$id);

		parse_str($data);

		if(isset($url_encoded_fmt_stream_map)) {
			$arr = explode(',',$url_encoded_fmt_stream_map);
			$array = array();
			foreach($arr as $item) {
				parse_str($item,$vdata);
				$array[] = $vdata;
				//return array("check"=>true, "url" => $vdata['url'], "id"=>$id);
			}

			dd($array);
		} else {
			parse_str($data,$output);
			return array("check"=>false, "reason"=>$output['reason']);
		}

		return true;
	}

	public static function keepvid($url) {
		$content = file_get_contents("http://keepvid.com/?url=".$url);

		preg_match('/<div class="d-info"><ul>(.*?)<\/ul><\/div>/',$content,$match);

		preg_match_all('/<li>(.*?)<\/li>/',$match[1],$matches);

		if($matches[1][1]) {
			preg_match('/<b>(.*?)<\/b>/', $matches[1][1], $b);

			$result = $matches[1];

			if($b[1] === '720p') {
				preg_match('/<a href="(.*?)"/', $result[1], $ret);
			} else {
				preg_match('/<a href="(.*?)"/', $result[0], $ret);
			}

			return array("check"=>true, "url"=>$ret, "id" => self::youtube_id_from_url($url));
		}
	}

	public static function youtube_id_from_url($url) {
	    $pattern =
	        '%^# Match any youtube URL
	        (?:https?://)?  # Optional scheme. Either http or https
	        (?:www\.)?      # Optional www subdomain
	        (?:             # Group host alternatives
	          youtu\.be/    # Either youtu.be,
	        | youtube\.com  # or youtube.com
	          (?:           # Group path alternatives
	            /embed/     # Either /embed/
	          | /v/         # or /v/
	          | /watch\?v=  # or /watch\?v=
	          )             # End path alternatives.
	        )               # End host alternatives.
	        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
	        $%x'
	        ;
	    $result = preg_match($pattern, $url, $matches);
	    if ($result) {
	        return $matches[1];
	    }
	    return false;
	}
}