<?php

namespace App\Http\Controllers;

use View;
use App\Expense;
use App\GeneralExpenses;
use App\PaidRent;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
		$exp_from_date = PaidRent::latest()->first();
		$exp_from_date = !empty($exp_from_date) ? $exp_from_date : Carbon::now()->addMonths(-1);
		
        $expenses = Expense::with('user')->selectRaw('SUM(amount) AS spent, purchased_by')->groupBy(['purchased_by'])->whereBetween('purchased_at', [$exp_from_date, Carbon::now()])->get();

        $cdate = date('Y-m-01');
        $general = GeneralExpenses::where("expense_month", "=", $cdate)->get();

        $data = array("expense" => $expenses, "general" => $general);

        return view('home')->with('data', $data);
    }
	
	public function payRent(Request $request){
		if (!empty($request->input())) {
			$PaidRent = new PaidRent;
			foreach ($request->input() as $column => $value) {
				if ($column == "_token") {
					continue;
				}
				$PaidRent->$column = $value;
			}
			$PaidRent->paid_by = Auth::id();
			$PaidRent->paid_at = Carbon::now();
			$PaidRent->save();
            return redirect()->route('home')->with('success', 'Rent paid successful');
		} else{
			return redirect()->route('home')->with('warning', 'Rent should have some amount.');
		}
	}
}
