<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Queue as Queue;

class QueueController extends Controller
{
    public function getList()
    {
        $queues = Queue::paginate(1);

    	return view('queue.manage')->with([
            'queues' => $queues
        ]);
    }

    public function getEdit($id)
    {
    	dd('get edit ' . $id);
    }
}
