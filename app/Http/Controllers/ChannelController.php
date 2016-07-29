<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curl\curl as Curl;
use Auth;
use App\User as User;
use App\Channel as Channel;
use App\Http\Requests;
use Session;
use Debugbar;

class ChannelController extends Controller
{

	public function getAdd() {

		$client = new \Google_Client();
		$client->setClientId(env('GOOGLE_CLIENT_ID'));
		$client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
		$client->setScopes('https://www.googleapis.com/auth/youtube.force-ssl');
		//$client->setAccessType("offline");

		$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '/channel/add', FILTER_SANITIZE_URL);
		$client->setRedirectUri($redirect);

		$youtube = new \Google_Service_YouTube($client);

		if (isset($_GET['code'])) {
			if (strval(Session::get('state')) !== strval($_GET['state'])) {
				die('The session state did not match.');
			}

			$client->authenticate($_GET['code']);
			Session::put('google_api_token',$client->getAccessToken());

			if (Session::get('google_api_token') !== null) {
				$client->setAccessToken(Session::get('google_api_token'));
			}
		}

		if ($client->getAccessToken()) {

			$output = Curl::exec("https://www.googleapis.com/youtube/v3/channels?part=snippet%2CbrandingSettings%2CinvideoPromotion%2Cstatus&mine=true&key=".env('YOUTUBE_API_KEY')."&access_token=".Session::get('google_api_token.access_token'));

			Session::put('google_api_token', $client->getAccessToken());

			$is_exists_with_auth = Channel::is_exists_with_auth(Auth::user(), $output->items[0]->id);

			if(isset($output->items[0])) {
				$info = array();
				$info['snippet'] = $output->items[0]->snippet;
				$info['status'] = $output->items[0]->status;
				$info['branding_settings'] = $output->items[0]->brandingSettings;

				$info = json_encode($info);

				Session::put('current_auth', $output->items[0]->id);

				if($is_exists_with_auth) {

					// update
					Channel::where('user_id', Auth::user()->id)->where('youtube_channel_id', $output->items[0]->id)->update([
						"name"	=>	$output->items[0]->snippet->title,
						"info"	=>	$info
					]);

				} else {

					// insert
					Channel::create([
						"user_id"				=>	Auth::user()->id,
						"youtube_channel_id"	=>	$output->items[0]->id,
						"name"					=>	$output->items[0]->snippet->title,
						"info"					=>	$info
					]);

				}

				return redirect()->route('channel.getManage')->with([
					'flash_message'	=>	array(
						array("type"=>'alert-success', 'Your channel successfully added.')
					)
				]);
			}

		} else {
			// If the user hasn't authorized the app, initiate the OAuth flow
			$state = mt_rand();
			$client->setState($state);
			Session::put('state',$state);

			$authUrl = $client->createAuthUrl();
		}

		return view('channel.add')->with([
			'auth_url' => isset($authUrl) ? $authUrl : 'javascript:void(0);',
		]);
	}

	public function getManage() {

		$channels = Auth::user()->channels;

		$channels = Channel::format($channels);

		return view('channel.manage')->with([
			'channels'	=>	$channels
		]);
	}
}
