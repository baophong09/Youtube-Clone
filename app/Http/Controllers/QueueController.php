<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QueueController extends Controller
{
    public function getList()
    {
    	return view('queue.manage');
    }

    public function getEdit($id)
    {
    	dd('get edit ' . $id);
    }
}
