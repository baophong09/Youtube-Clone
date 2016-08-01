<?php
namespace App\Youtube;
/**
 * 	This class allows you to get the download links from any youtube video
 * 
 * 	@author Zarkiel
 */
class YoutubeDownloader{
	
	/**
	 * The video map for the results
	 * 
	 * @var array
	 */ 
	private $videoMap = array(
		"13" => array("3GP", "Low Quality - 176x144"),
		"17" => array("3GP", "Medium Quality - 176x144"),
		"36" => array("3GP", "High Quality - 320x240"),
		"5" => array("FLV", "Low Quality - 400x226"),
		"6" => array("FLV", "Medium Quality - 640x360"),
		"34" => array("FLV", "Medium Quality - 640x360"),
		"35" => array("FLV", "High Quality - 854x480"),
		"43" => array("WEBM", "Low Quality - 640x360"),
		"44" => array("WEBM", "Medium Quality - 854x480"),
		"45" => array("WEBM", "High Quality - 1280x720"),
		"18" => array("MP4", "Medium Quality - 480x360"),
		"22" => array("MP4", "High Quality - 1280x720"),
		"37" => array("MP4", "High Quality - 1920x1080"),
		"38" => array("MP4", "High Quality - 4096x230")
	);
	
	/**
	 * The page that will be used for requests
	 * 
	 * @var string
	 */ 
	private $videoPageUrl = 'http://www.youtube.com/watch?v=';
	
	/**
	 * Returns the video page content
	 * 
	 * @param string  The video id
	 * @return string The video page content 
	 */
	protected function getPageContent($url){
		$page = $url;
		$content = file_get_contents($page);
		return $content;
	}
	
	/**
	 * Return the download links
	 * 
	 * @param string The video id
	 * @return array The download links
	 */ 
	function getDownloadLinks($url){
		$content = $this->getPageContent($url);

		$videos = array('MP4' => array(), 'FLV' => array(), '3GP' => array(), 'WEBM' => array());

		if(preg_match('/"url_encoded_fmt_stream_map": "(.*)"/i', $content, $r)){
			$data = $r[1];
			$data = explode(',', $data);

			foreach($data As $cdata){
				$cdata = str_replace('\u0026', '&', $cdata);
				$cdata = explode('&', $cdata);

				foreach($cdata As $xdata){
					if(preg_match('/^sig/', $xdata)){
						$sig = substr($xdata, 4);
					}

					if(preg_match('/^url/', $xdata)){
						$url = substr($xdata, 4);
					}

					if(preg_match('/^itag/', $xdata)){
						$type = substr($xdata, 5);
					}
				}
				$url = urldecode($url).'&signature='.$sig;
				$videos[$this->videoMap[$type][0]][$this->videoMap[$type][1]] = $url;
			}
		}
		
		return $videos;
	}
}