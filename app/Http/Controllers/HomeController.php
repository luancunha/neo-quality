<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_inter = DB::table('internacaos')->where('status', 1)->count();
        $count_alta = DB::table('internacaos')->where('status', 2)->count();
        $count_obito = DB::table('internacaos')->where('status', 3)->count();

        return view('home', ['count_inter' => $count_inter, 'count_alta' => $count_alta, 'count_obito' => $count_obito]);
    }
}
