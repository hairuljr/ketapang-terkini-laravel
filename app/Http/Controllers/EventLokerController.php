<?php

namespace App\Http\Controllers;

use App\EventLoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventLokerController extends Controller
{
    public function index(Request $request)
    {
        $event = EventLoker::where('jenis', 'EVENT')->get();
        $loker = EventLoker::where('jenis', 'LOKER')->get();
        $items = EventLoker::paginate(4);
        return view('pages.event-loker', [
            'items' => $items,
            'event' => $event,
            'loker' => $loker
        ]);
    }
}
