<?php

namespace App\Http\Controllers;

use App\EventLoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventLokerController extends Controller
{
    public function index(Request $request)
    {
        $items = EventLoker::paginate(4);
        return view('pages.event-loker', ['items' => $items]);
    }
}
