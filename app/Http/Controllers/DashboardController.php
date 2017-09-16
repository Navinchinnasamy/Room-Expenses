<?php
/**
 * Created by PhpStorm.
 * User: navin
 * Date: 8/28/2017
 * Time: 11:33 AM
 */

namespace App\Http\Controllers;

use App\Expense;
use App\GeneralExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}