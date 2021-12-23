<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tables;
use Illuminate\Support\Str;

class TableController extends Controller
{
    public function index() {
        $data['tables'] = Tables::all()->sortBy('table_must');
        return view('backend.tables.index', compact('data'));
    }

    public function create() {
        return view('backend.tables.create');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'title' => 'required'
        ]);

        $slug = Str::slug($request->title);
        $validSlug = Tables::where('table_slug', $slug)->first();
        if (!$validSlug) {
            $table = Tables::insert([
                'table_name' => $request->title,
                'table_slug' => $slug,
                'table_status' => '0'
            ]);

            if ($table) {
                return redirect(route('tables.Index'))->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız');
        } else {
            return back()->with('error', 'Bu veri daha önce kaydedilmiş');
        }
    }

    public function edit($slug) {
        $table = Tables::where('table_slug', $slug)->first();
        return view('backend.tables.edit', ['slug' => $slug], compact('table'));
    }

    public function update(Request $request , $slug) {
        $validateData = $request->validate([
            'title' => 'required'
        ]);

        $newslug = Str::slug($request->title);
        $validSlug = Tables::where('table_slug', $newslug)->first();
        if (!$validSlug) {

            $table = Tables::where('table_slug' , $slug)->update([
                'table_name' => $request->title,
                'table_slug' => $newslug
            ]);

            if ($table) {
                return redirect(route('tables.Index'))->with('success', 'İşlem Başarılı');
            } else {
                return back()->with('error' , 'İşlem Başarısız');
            }
        } else {
            return back()->with('error', 'Bu veri daha önce kaydedilmiş');
        }
    }

    public function delete($slug) {
        $delete = Tables::where('table_slug' , $slug)->delete();

        if ($delete) {
            return redirect(route('tables.Index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error' , 'İşlem Başarısız');
        }
    }
}
