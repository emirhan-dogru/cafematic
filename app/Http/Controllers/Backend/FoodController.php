<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foods;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    public function index()
    {
        $data['foods'] = Foods::all()->sortBy('table_must');
        return view('backend.foods.index', compact('data'));
    }

    public function create()
    {
        return view('backend.foods.create');
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric|gt:0'
        ]);

        $slug = Str::slug($request->title);
        $validSlug = Foods::where('food_slug', $slug)->first();
        if (!$validSlug) {

            $table = Foods::insert([
                'food_name' => $request->title,
                'food_slug' => $slug,
                'food_price' => $request->price
            ]);

            if ($table) {
                return redirect(route('foods.Index'))->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız');
        } else {
            return back()->with('error', 'Bu veri daha önce kaydedilmiş');
        }
    }

    public function edit($slug)
    {
        $food = Foods::where('food_slug', $slug)->first();
        return view('backend.foods.edit', compact('food'));
    }

    public function update(Request $request, $slug)
    {
        $validData = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric|gt:0'
        ]);

        $newslug = Str::slug($request->title);
        $validSlug = Foods::where('food_slug', $newslug)->first();
        if (!$validSlug) {

            $food = Foods::where('food_slug', $slug)->update([
                'food_name' => $request->title,
                'food_slug' => $newslug,
                'food_price' => $request->price
            ]);

            if ($food) {
                return redirect(route('foods.Index'))->with('success', 'İşlem Başarılı');
            }
            return back()->with('error', 'İşlem Başarısız');
        } else {
            return back()->with('error', 'Bu veri daha önce kaydedilmiş');
        }
    }

    public function delete($slug) {
        $delete = Foods::where('food_slug' , $slug)->delete();

        if ($delete) {
            return redirect(route('foods.Index'))->with('success', 'İşlem Başarılı');
        } else {
            return back()->with('error' , 'İşlem Başarısız');
        }
    }
}
