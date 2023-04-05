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

}
