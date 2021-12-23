<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sessions;
use App\Models\Tables;
use App\Models\Foods;
use App\Models\SessionLists;
use App\Models\Incomes;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    public function index()
    {
        $data['sessions'] = DB::table('tables')->join('sessions', 'sessions.table_id', '=', 'tables.id')->get()->sortBy('table_must');
        return view('backend.default.index', compact('data'));
    }

    public function create()
    {
        $data['tables'] = Tables::all()->where('table_status', 0)->sortBy('table_must');
        return view('backend.default.create', compact('data'));
    }

    public function store(Request $request)
    {
        $slug = $request->title;
        $data = Tables::where('table_slug', $slug)->first();
        if ($data) {
            $table = Tables::where('table_slug', $slug)->update([
                'table_status' => '1'
            ]);

            $session = Sessions::insert([
                'table_id' => $data['id'],
                'session_id' => Str::random(30)
            ]);

            if ($table && $session) {
                $data['foods'] = Foods::all()->sortBy('food_must');
                $data['sessions'] = DB::table('tables')->join('sessions', 'sessions.table_id', '=', 'tables.id')->where('table_slug', $slug)->get()->sortBy('table_must');
                $data['sessionLists'] = DB::table('sessions')
                    ->join('session_lists', 'session_lists.session_id', '=', 'sessions.session_id')
                    ->join('foods', 'foods.id', '=', 'session_lists.food_id')->get();
                //return view('backend.default.edit', compact('data'))->with('success', 'İşlem Başarılı');
                return redirect(route('sessions.Edit' , ['slug' => $data->table_slug]))->with(['success'=> 'İşlem Başarılı' , 'data' , $data]);
            }
            return back()->with('error', 'İşlem Başarısız');
        } else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }

    public function edit($slug)
    {
        $data['foods'] = Foods::all()->sortBy('food_must');
        $data['sessions'] = DB::table('tables')->join('sessions', 'sessions.table_id', '=', 'tables.id')->where('table_slug', $slug)->get()->sortBy('table_must');
        $data['sessionLists'] = DB::table('sessions')
            ->join('session_lists', 'session_lists.session_id', '=', 'sessions.session_id')
            ->join('foods', 'foods.id', '=', 'session_lists.food_id')->get();
        return view('backend.default.edit', compact('data'));
    }

    public function AddProduct(Request $request, $id, $product_id)
    {
        $validate = $request->validate([
            'total' => 'required|numeric|gt:0'
        ]);


        $isProduct = SessionLists::where('session_id', $id)->where('food_id', $product_id)->first();

        if ($isProduct) {
            $sessionList = SessionLists::where('session_id', $id)->where('food_id', $product_id)->update([
                'food_total' => $isProduct->food_total += $request->total
            ]);
        } else {
            $sessionList = SessionLists::insert([
                'session_id' => $id,
                'food_id' => $product_id,
                'food_total' => $request->total
            ]);
        }

        $session_price = Sessions::where('session_id', $id)->value('price');
        $product_price = Foods::where('id', $product_id)->value('food_price');
        $session = Sessions::where('session_id', $id)->update([
            'price' => $session_price += $product_price * $request->total
        ]);



        if ($sessionList && $session) {
            return back()->with('success', 'Ürün Başarıyla Eklendi');
        }
        return back()->with('error', 'İşlem Başarısız');
    }

    public function delete($id) {
        $session = Sessions::all()->where('session_id' , $id)->first();
        if ($session) {
            $income = Incomes::insert([
                'created_at' => date('Y-m-d H:i:s'),
                'session_id' => $id,
                'price' => $session->price
            ]);

            $delete_SessionTable = Sessions::where('session_id' , $id)->delete();
            $delete_SessionListTable = SessionLists::where('session_id' , $id)->delete();

            $updateTable = Tables::where('id' , $session->table_id)->update([
                'table_status' => '0'
            ]);

            if ($income && $delete_SessionTable && $delete_SessionListTable && $updateTable) {
                return back()->with('success' , 'İşlem Başarılı');
            }
            else {
                return back()->with('error' , 'İşlem Başarısız');
            }
        }
        else {
            return back()->with('error', 'İşlem Başarısız');
        }
    }
}
