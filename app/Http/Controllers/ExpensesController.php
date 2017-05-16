<?php

namespace App\Http\Controllers;

use App\Expense;
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
        //
		$expenses = DB::table('expenses')
            ->leftJoin('users', 'users.id', '=', 'expenses.purchased_by')
            ->get();
			
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
		$desc = $request->input('description');
		$amt = $request->input('amount');
		$purchased_at = $request->input('purchased_at');
		$purchased_by = $request->input('purchased_by');
		
		$exp = new Expense;
		$exp->description = $request->input('description');
		$exp->amount = $request->input('amount');
		$exp->purchased_at = $request->input('purchased_at');
		$exp->purchased_by = $request->input('purchased_by');
		$exp->save();
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
}
