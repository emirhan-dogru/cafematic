<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function index()
    {
        $data['income_day'] = DB::table('Incomes')->whereDate('created_at' , date('Y-m-d'))->orderBy('id' , 'DESC')->get();
        $data['income_day_price'] = DB::table('Incomes')->whereDate('created_at' , date('Y-m-d'))->sum('price');

        $data['income_month'] = DB::table('Incomes')->whereYear('created_at' , date('Y'))->whereMonth('created_at' , date('m'))->orderBy('id' , 'DESC')->get();
        $data['income_month_price'] = DB::table('Incomes')->whereYear('created_at' , date('Y'))->whereMonth('created_at' , date('m'))->sum('price');

        $data['income_year'] = DB::table('Incomes')->whereYear('created_at' , date('Y'))->orderBy('id' , 'DESC')->get();
        $data['income_year_price'] = DB::table('Incomes')->whereYear('created_at' , date('Y'))->sum('price');

        $data['income_all'] = DB::table('Incomes')->orderBy('id' , 'DESC')->get();
        $data['income_all_price'] = DB::table('Incomes')->sum('price');

        return view('backend.incomes.index')->with('data' , $data);
    }
}
