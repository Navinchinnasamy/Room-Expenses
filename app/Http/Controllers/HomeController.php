<?php

namespace App\Http\Controllers;

use App\Expense;
use View;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::with('user')->selectRaw('SUM(amount) AS spent, purchased_by')->groupBy(['purchased_by'])->whereBetween('purchased_at', [date('Y-01-01'), date('Y-m-d')])->get();
        $data = array("expense" => $expenses);
        return view('home')->with('data', $data);
    }
}
