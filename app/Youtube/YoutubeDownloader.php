<?php

namespace App\Youtube;

/**
 * 	Class to get the download link from youtube video
 *
 * 	@author Github: baophong09 / Email: dinhphong.developer@gmail.com
*/

class YoutubeDownloader
{
	public $list_download = [];

	private $video_url = "http://www.youtube.com/watch?v=";

	private $decipherer_url;

	private function file_content($id) {
		if(filter_var($id, FILTER_VALIDATE_URL)) {
			$id = YoutubeDownloader::id_from_url($id);
		}

		// pre-get signature
		return json_decode(file_get_contents($this->video_url. $id . "&spf=prefetch"));
	}

	public function get($id)
	{
		$data = $this->file_content($id);

		// get decipherer url
		$regex = "/s\.ytimg\.com\/yts\/jsbin\/player\-(.*?)\.js/i";
		preg_match($regex,$data[1]->head,$result);

		if (isset($result[0])) {
			$this->decipherer_url = $result[0];
		}

		//result[2]['data']['swfcfg']['args']['url_encoded_fmt_stream_map']

		//still dont work
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

		} else {
			parse_str($data,$output);
			return array("check"=>false, "reason"=>$output['reason']);
		}

		return true;
	}

	public static function keepvid($url) {
		$content = file_get_contents("http://keepvid.com/?url=".$url);

		//dd($content);

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

			return array("check"=>true, "url"=>$ret, "id" => self::id_from_url($url));
		}
	}

	public static function id_from_url($url) {
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