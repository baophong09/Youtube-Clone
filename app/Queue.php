<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $tables = 'queues';

	protected $fillable = ['channel_id', 'user_id', 'running', 'info', 'pause', 'done'];

	public function videos() {
		return $this->hasMany('App\Video');
	}
}
