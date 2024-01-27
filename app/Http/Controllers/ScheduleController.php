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
    public function index()
    {
        // resources/views/front/schedule.blade.phpにあるビューを返します。
        return  view('front.schedule');
    }

    public function schedule()
    {
        $schedules = Schedule::all();
        $events = [];


        foreach ($schedules as $schedule) {

            // 元の時間文字列
            $time_start = $schedule->start_time;
            $time_end = $schedule->end_time;

            // コロンで分割
            $parts = explode(':', $time_start);
            $parts_end = explode(':', $time_end);

            // それぞれの部分を０埋めする
            $hours = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
            $minutes = str_pad($parts[1], 2, '0', STR_PAD_LEFT);
            $hours_end = str_pad($parts_end[0], 2, '0', STR_PAD_LEFT);
            $minutes_end = str_pad($parts_end[1], 2, '0', STR_PAD_LEFT);

            // ０埋めされた時間を出力
            $newStartTime = ' ' .$hours . ':' . $minutes . ':00';
            $newEndTime = ' ' . $hours_end . ':' . $minutes_end . ':00';
            // dd($newStartTime,$newEndTime);

            $events[] = [
                'id' => $schedule->id,
                'title' => $schedule->title,
                'description' => $schedule->description,
                'start' => $schedule->start_date . $newStartTime, // start_time
                'end' => Carbon::parse($schedule->end_date)->addDay()->format('Y-m-d') . $newEndTime, // end_time
                'backgroundColor' => 'green',
                'textColor' => 'yellow',
                'borderColor' => 'black',
            ];
        }
        // dd($events);
        return view('front.index', compact('events'));
    }

    // storeメソッドは、新しいスケジュール項目の保存を処理する責任を持ちます。
    public function store(Request $request)
    {
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

        // スケジュールのstart_time属性をリクエストで提供された開始時間に設定します。
        $obj->start_time = $request->start_time;

        // スケジュールのend_date属性をリクエストで提供された終了日に設定します。
        $obj->end_date = $request->end_date;

        // スケジュールのend_time属性をリクエストで提供された終了時間に設定します。
        $obj->end_time = $request->end_time;

        // データベースに新しく作成されたスケジュールオブジェクトを保存します。
        $obj->save();

        // ユーザーを'schedule'ルートにリダイレクトし、登録が完了したことを示す成功メッセージを付加します。
        return redirect()
            ->route('schedule')
            ->with('messsage', '登録しました。'); // 「登録しました。」は「Registration completed.」の意味です。
    }
}
