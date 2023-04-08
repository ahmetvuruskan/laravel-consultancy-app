<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Support\Facades\Crypt;
use App\Models\Appointment;
class CalendarController extends Controller
{

    public function index(){
        $appointment = new Appointment();
        $data['appointments'] = $appointment->getMyAppointments();
        return view("Dashboard.Psychologist.calendar")->with("data",$data);
    }
    public function interviews(){
        $products = new Products();
        $data['products'] = $products->getProdcuts(Auth::user()->id);
        return view("Dashboard.Psychologist.Interview.index")->with("data",$data);
    }
    public function userInterviews(){
        $orders = new Orders();
        $data['interviews'] = $orders->getMyOrders(Auth::user()->id);
        return view("Dashboard.Users.myInterviews")->with("data",$data);
    }
    public function createInterview($id){
        $order = new Orders();
        $data['order'] = $order->getSingleOrder(Crypt::decrypt($id));
        return view("Dashboard.Users.createAppointment")->with("data",$data);
    }
}
