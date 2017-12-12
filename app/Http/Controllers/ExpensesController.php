<?php

namespace App\Http\Controllers;

use App\Expense;
use App\GeneralExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use View;

class ExpensesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::with('user')->orderBy('purchased_at', 'DESC')->get();
        return View::make('expenses.expenses')->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		// Get the currently authenticated user...
		$user = Auth::user();

        // Get the currently authenticated user's ID...
		$id = Auth::id();

        // return view('expenses.purchase'); -- no parameter passed to view.
		$data = array(
			'id' => $id,
			'name' => $user->name,
			'email' => $user->email
		);
		return View::make('expenses.purchase')->with('data', $data);  // -- $data is passed along with view to view file.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$this->validate($request, [
			'description' => 'required',
            'amount' => 'required',
            'bills' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
		]);

        $user = Auth::user();
        $user_name = preg_replace('/ /', '_', $user->name);
        $file_name = $user_name . '_' . time() . '.' . $request->bills->getClientOriginalExtension();
        $request->bills->move(public_path('bills'), $file_name);

        $exp = new Expense;
		$exp->description = $request->input('description');
		$exp->amount = $request->input('amount');
        $exp->purchased_at = $request->input('purchased_at_submit');
		$exp->purchased_by = $request->input('purchased_by');
        $exp->bills = $file_name;
		$exp->save();

        return back()
            ->with('success', 'Purchase has been saved successfully.')
            ->with('image', $file_name);
        //return redirect()->route('expense.index')->with('success', 'Entry created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function general(Request $request)
    {
        $cdate = date('Y-m-01');
        $expenses = GeneralExpenses::where("expense_month", "=", $cdate)->get(); //->toSql();
//        dd($expenses); exit;
        if (!empty($request->input())) {
            foreach ($request->input() as $column => $value) {
                if ($column == "_token") {
                    continue;
                }
                // Get general expense for current month
                $existing = GeneralExpenses::where("expense_month", "=", $cdate)->where('description', '=', $column)->get();
                $count = $existing->count();
                if ($count) {
                    $value = !empty($value) ? $value : 0;
                    // If already exists for current month update the values
                    $GeneralExpenses = GeneralExpenses::where('description', '=', $column)->where('expense_month', '=', $cdate)->update(['amount' => $value]);
                } else {
                    // If not exists for current month insert the values
                    foreach ($request->input() as $column => $value) {
                        if ($column == "_token") {
                            continue;
                        }
                        $value = !empty($value) ? $value : 0;
                        $GeneralExpenses = new GeneralExpenses;
                        $GeneralExpenses->description = $column;
                        $GeneralExpenses->amount = $value;
                        $GeneralExpenses->expense_month = date('Y-m-01');
                        $GeneralExpenses->save();
                    }
                }
            }

            return redirect()->route('general')->with('success', 'Entry successfull');
        }

        return View::make('expenses.general')->with('expenses', $expenses);
    }

    public function updateExpense(Request $request)
    {
        $update_data = $request->input();
        $exp = Expense::where('id', '=', $update_data['pk'])->update([$update_data['name'] => $update_data['value']]);
        print_r(json_encode(array('status' => 'success')));
    }

    public function notification(Request $request)
    {
        return View::make('notification');
    }
}
