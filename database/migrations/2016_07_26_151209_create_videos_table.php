<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('youtube_video_id')->nullable();
			$table->string('user_id');
			$table->string('youtube_channel_id');
			$table->string('source_youtube_channel_id')->nullable();
			$table->string('title');
			$table->text('description');
			$table->integer('setCategoryId');
			$table->text('tags');
			$table->string('status');
			$table->text('info')->nullable();
			$table->integer('uploaded')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
}
