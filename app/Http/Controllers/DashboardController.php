<?php
/**
 * Created by PhpStorm.
 * User: navin
 * Date: 8/28/2017
 * Time: 11:33 AM
 */

namespace App\Http\Controllers;

use App\Expense;
use View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $expenses = Expense::groupBy('purchased_by')->sum('amount')->get();
        echo "<pre>";
        print_r($expenses);
        exit;
        $data = array("expense" => $expenses);
        return View::make('home')->with('data', $data);
    }
}