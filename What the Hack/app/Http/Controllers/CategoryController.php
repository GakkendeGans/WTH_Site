<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('index', [
            'data' => Category::all(),
            'cols' => ['name'],
            'desc' => ['blade'],
            'route' => 'cat'
        ]);
    }

    public function show() {
        dd('show');
    }

    public function create() {
        return view('create', [
            'cols' => ['name', 'blade'],
            'desc' => ['Name', 'Blade'],
            'input_types' => ['text', 'text'],
            'route' => 'cat'
        ]);
    }

    public function edit($id) {
        $menu = Category::where('id', $id)->first();
        return view('create', [
            'data' => $menu,
            'cols' => ['name', 'blade'],
            'desc' => ['Name', 'Blade'],
            'input_types' => ['text', 'text'],
            'route' => 'cat'
        ]);
    }

    public function store() {
        $request = request();

        if (isset($request->id)) { // edit
            $validatedRequest = $request->validate([
                'blade' => ['required', 'string', 'max:255']
            ]);
            $model = Category::where('id', $request->id)->first();
            $model->update($validatedRequest);
            return redirect('/cat');
        } else { // create
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:categories'],
                'blade' => ['required', 'string', 'max:255']
            ]);
            Category::create($validatedRequest);
            return redirect('/cat');
        }
    }

    public function destroy($id) {
        $model = Category::where('id', $id)->first();
        $model->delete();
        return redirect('/cat');
    }
}
