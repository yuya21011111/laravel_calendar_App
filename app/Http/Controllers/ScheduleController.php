<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

// ScheduleControllerはLaravelによって提供される基本のControllerクラスを拡張しています。
class ScheduleController extends Controller
{
    // indexメソッドは、スケジュールビューを表示するためのものです。
    public function index() {
        // resources/views/front/schedule.blade.phpにあるビューを返します。
        return  view('front.schedule');
    }

    public function schedule(){
        $schedules = Schedule::all();
        $events = [];
        foreach($schedules as $schedule) {
            $events[] = [
                'id' => $schedule->id,
                'title' => $schedule->title,
                'description' => $schedule->description,
                'start' => $schedule->start_date, // start_time
                'end' => Carbon::parse($schedule->end_date)->addDay()->format('Y-m-d'), // end_time
            ];
        }
        // dd($events);
        return view('front.index',compact('events'));
    }

    // storeメソッドは、新しいスケジュール項目の保存を処理する責任を持ちます。
    public function store(Request $request) {
        // Scheduleモデルの新しいインスタンスを作成します。
        $obj = new Schedule();

        // スケジュールのuser_id属性を現在認証されているユーザーのIDに設定します。
        $obj->user_id = auth()->id();

        // スケジュールのtitle属性をリクエストで提供されたタイトルに設定します。
        $obj->title = $request->title;

        // スケジュールのdescription属性をリクエストで提供された説明に設定します。
        $obj->description = $request->description;

        // スケジュールのstart_date属性をリクエストで提供された開始日に設定します。
        $obj->start_date = $request->start_date;

        // スケジュールのend_date属性をリクエストで提供された終了日に設定します。
        $obj->end_date = $request->end_date;

        // データベースに新しく作成されたスケジュールオブジェクトを保存します。
        $obj->save();

        // ユーザーを'schedule'ルートにリダイレクトし、登録が完了したことを示す成功メッセージを付加します。
        return redirect()
        ->route('schedule')
        ->with('messsage', '登録しました。'); // 「登録しました。」は「Registration completed.」の意味です。
    }
}
