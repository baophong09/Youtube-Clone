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
			foreach($arr as $item) {
				parse_str($item,$vdata);
				return array("check"=>true, "url" => $vdata['url']);
			}
		} else {
			parse_str($data,$output);
			return array("check"=>false, "reason"=>$output['reason']);
		}

		return true;
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