<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index() {
        return  view('front.schedule');
    }

    public function store(Request $request) {

        $obj = new Schedule();

        $obj->user_id = auth()->id();
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()
        ->route('schedule')
        ->with('messsage', '登録しました。');
    }
}
