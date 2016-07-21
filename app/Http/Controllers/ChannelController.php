<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User as User;
use App\Http\Requests;
use Session;
use Debugbar;

class ChannelController extends Controller
{
	private $client;

	public function __construct() {

		$this->client = new \Google_Client();
		$this->client->setClientId(env('GOOGLE_CLIENT_ID'));
    	$this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    	$this->client->setScopes('https://www.googleapis.com/auth/youtube.force-ssl');
    	//$this->client->setAccessType("offline");

    	if(Session::get('save_google_api_token.code') !== null) {
			$this->client->authenticate(Session::get('save_google_api_token.code'));
			Debugbar::info('at authenticate code');
		}

		if(Session::get('save_google_api_token') !== null) {
			$this->client->setAccessToken(Session::get('save_google_api_token'));
		}

		parent::__construct();
	}

    public function getAdd() {
    	$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '/channel/add', FILTER_SANITIZE_URL);
		$this->client->setRedirectUri($redirect);

		$youtube = new \Google_Service_YouTube($this->client);

		if(Session::get('save_google_api_token') !== null) {
			//dd(Session::all());
		}

		if (isset($_GET['code'])) {
			if (strval(Session::get('state')) !== strval($_GET['state'])) {
				die('The session state did not match.');
		    }

		    $this->client->authenticate($_GET['code']);
			Session::put('google_api_token',$this->client->getAccessToken());

			if (Session::get('google_api_token') !== null) {
			    $this->client->setAccessToken(Session::get('google_api_token'));
			}
		}

		if ($this->client->getAccessToken()) {
			Session::put('save_google_api_token', Session::get('google_api_token'));
			if(isset($_GET['code'])) {
				Session::put('save_google_api_token.code', $_GET['code']);
			}

			// create curl resource
			$ch = curl_init();

			// set url
			curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2CbrandingSettings%2CinvideoPromotion&mine=true&key=".env('YOUTUBE_API_KEY')."&access_token=".Session::get('google_api_token.access_token'));



			//return the transfer as a string
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// $output contains the output string
			$output = curl_exec($ch);

			// close curl resource to free up system resources
			curl_close($ch);

			Session::put('google_api_token', $this->client->getAccessToken());

			dd($output);
			/*$channelsResponse = $youtube->channels->listChannels('contentDetails', array(
	            'mine' => 'true',
	        ));

	        dd($channelsResponse);*/

		} else {
			// If the user hasn't authorized the app, initiate the OAuth flow
			  $state = mt_rand();
			  $this->client->setState($state);
			  Session::put('state',$state);

			  $authUrl = $this->client->createAuthUrl();
		}

		return view('channel.add')->with([
			'auth_url' => isset($authUrl) ? $authUrl : 'javascript:void(0);',
		]);
    }

    public function postAdd(Request $request) {
    	dd($request);
    }
}
