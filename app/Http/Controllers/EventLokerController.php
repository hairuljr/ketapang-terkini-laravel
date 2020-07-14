<?php

namespace App\Http\Controllers;

use App\EventLoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventLokerController extends Controller
{
    public function index(Request $request)
    {
        $event = EventLoker::where('jenis', 'EVENT')->paginate(4);
        $loker = EventLoker::where('jenis', 'LOKER')->paginate(4);
        $items = EventLoker::paginate(4);
        return view('pages.event-loker', [
            'items' => $items,
            'event' => $event,
            'loker' => $loker
        ]);
    }

    public function detail_event(Request $request)
    {
        $items = EventLoker::where('jenis', 'EVENT')->firstOrFail();
        $jenis = 'Event';
        return view('pages.event-loker-detail', [
            'items' => $items,
            'jenis' => $jenis
        ]);
    }

    public function detail_loker(Request $request)
    {
        $items = EventLoker::where('jenis', 'LOKER')->firstOrFail();
        $jenis = 'Loker';
        return view('pages.event-loker-detail', [
            'items' => $items,
            'jenis' => $jenis
        ]);
    }
}
