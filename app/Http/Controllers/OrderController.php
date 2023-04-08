<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Orders::all();
        return view("Dashboard.Admin.Orders.index")->with("data", $data);
    }

    public function detail($id)
    {
        $orders = new Orders();
        $order = $orders->getOrderDetailForPdf($id)->toArray();
        Pdf::setOptions(['defaultFont' => 'arial',
            'isHtml5ParserEnabled' => true,
            'charset' => 'utf-8',
        ]);
        view()->share('order', $order);
        $pdf = PDF::loadView('Dashboard.Admin.Orders.detail', $order);
        return $pdf->download($order['order_id'] . '.pdf');
    }
}
