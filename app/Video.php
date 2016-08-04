<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $tables = 'videos';

	protected $fillable = ['youtube_video_id', 'user_id', 'youtube_channel_id', 'source_channel_id', 'title', 'description', 'setCategoryId', 'tags', 'status', 'info', 'uploaded', 'link_download', 'queue_id'];

	public function queue() {
		return $this->belongsTo('App\Queue');
	}
}
