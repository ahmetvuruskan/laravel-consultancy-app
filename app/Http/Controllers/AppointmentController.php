<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AvailableTimes;
use App\Models\Appointment;




class AppointmentController extends Controller
{
    public function getAvailableTimes(Request $request)
    {
        $timeList = [];
        $availabletimes = new AvailableTimes();
        $appointment = new Appointment();
        $days = ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'];
        if ($datas = $request->only(['date', 'specialist_id', 'duration'])) {
            $date = Carbon::parse($datas['date'])->format("Y-m-d");
            $specialist_id = $datas['specialist_id'];
            $duration = $datas['duration'];
            $day = date("w", strtotime($date));
            $freetimes = $availabletimes->getTimebyUserAndDay($specialist_id, $days[$day]); // Müsait zamanlar çekildi
            $extisingTimes = $appointment->getAppointment($specialist_id, $date); // Randevular çekildi
            $extisingTimes = $extisingTimes->toArray();
            $today = Carbon::now()->format("Y-m-d");
            if ($date == $today){
                $freetimes[0]->time_start = Carbon::now()->format("H:i");
                $explode = explode(":", $freetimes[0]->time_start);
                if ($explode[1] > 0 && $explode[1] < 30) {
                    $freetimes[0]->time_start = $explode[0] . ":30";
                } else if ($explode[1] > 30) {
                    $freetimes[0]->time_start = ($explode[0] + 1) . ":00";
                }
            }else if ($date < $today){
                return response()->json(['error' => 'Tarih seçiminizi kontrol ediniz.'], 400);
            }
            $timeStart = Carbon::parse($freetimes[0]->time_start);
            $timeEnd = Carbon::parse($freetimes[0]->time_end);
            while ($timeStart->lessThan($timeEnd)) {
                $timeList[] = $timeStart->addMinute($duration)->format("H:i");
            }
            foreach ($extisingTimes as $value) {
                $start = Carbon::parse($value['start_time'])->format("H");
                $end = Carbon::parse($value['end_time'])->format("H");
                foreach ($timeList as $key => $time) {
                    $explode = explode(":", $time);
                    if ($explode[0] == $start || $explode[0] == $end || $explode[0] == "12") {
                        unset($timeList[$key]);
                    }
                }
            }
            $timeList = implode(",", $timeList);
            $timeList = explode(",", $timeList);
            return response()->json(['times' => $timeList], 200);


        } else {
            return response()->json(['error' => 'Invalid Request'], 400);
        }
    }
    public function createAppointment(Request $request){
        $extising = Appointment::where('id',$request->order_id)->get()->count();
        if (!$extising){
            Appointment::insert([
                'id' => $request->order_id,
                'user_id' => $request->buyer_id,
                'specialist_id' => $request->specialist_id,
                'product_id' => $request->product_id,
                'start_time' => $request->time,
                'end_time' => Carbon::parse($request->time)->addMinute($request->duration)->format("H:i"),
                'start_date' => $request->date,
                'end_date' => $request->date,
                'created_at' => Carbon::now(),
            ]);
            return response(['message' => 'Randevu oluşturuldu.'], 200);
        }else{
            return response(['message' =>  'Bu sipariş için randevu oluşturamazsınız.'], 400);
        }
    }
    public function updateAvailableTimes(Request $request)
    {
        $exists = AvailableTimes::where('user_id', $request->user_id)->get()->count();
        if ($exists > 0) {
            $days = $request->days;
            $start = $request->startTimes;
            $end = $request->endTimes;
            for ($i = 0; $i < count($start); $i++) {
                AvailableTimes::where('user_id', $request->user_id)->where('day', $days[$i])->update([
                    'time_start' => $start[$i],
                    'time_end' => $end[$i],
                ]);
            }
        }else{
            $days = $request->days;
            $start = $request->startTimes;
            $end = $request->endTimes;
            for ($i = 0; $i < count($start); $i++) {
                AvailableTimes::insert([
                    'user_id' => $request->user_id,
                    'day' => $days[$i],
                    'time_start' => $start[$i],
                    'time_end' => $end[$i],
                ]);
            }
        }
    }

}

