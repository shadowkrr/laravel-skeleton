<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', []);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/admin/site');
    }

    /**
     * top
     * @return \Illuminate\Http\Response
     */
    public function top(Request $request)
    {
        Log::channel('info')->info('Start site()');
        Log::channel('info')->info('End site()');
        return view('Admin/top');
    }
}
