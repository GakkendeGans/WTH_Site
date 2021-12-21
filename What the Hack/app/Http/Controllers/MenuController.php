<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index() {
        return view('index', [
            'data' => Menu::all(),
            'cols' => ['name'],
            'desc' => ['Name'],
            'route' => 'menu'
        ]);
    }

    public function show() {
        $route = request()->route()->uri;
        $name = ucfirst($route);
        $menu = Menu::where('name', $name)->first();
        $blade = Category::where('id', $menu->category_id)->first()->blade;
        $data = Article::where('menu_id', $menu->id)->get();
        return view("$blade", [
            'menu' => $menu,
            'data' => $data
        ]);
    }

    public function create() {
        return view('create', [
            'cols' => ['name', 'category_id'],
            'desc' => ['Name', 'Category'],
            'input_types' => ['text', 'select'],
            'select_options' => Category::all(),
            'route' => 'menu'
        ]);
    }

    public function edit($id) {
        $menu = Menu::where('id', $id)->first();
        return view('create', [
            'data' => $menu,
            'cols' => ['name', 'category_id'],
            'desc' => ['Name', 'Category'],
            'input_types' => ['text', 'select'],
            'select_options' => Category::all(),
            'route' => 'menu'
        ]);
    }

    public function store() {
        $request = request();
        $validatedRequest = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:menus,name'],
            'category_id' => ['required', 'integer']
        ]);
        if (isset($request->id)) { // edit
            $menu = Menu::where('id', $request->id)->first();
            $menu->update($validatedRequest);
            return redirect('/menu');
        } else { // create
            Menu::create($validatedRequest);
            return redirect('/menu');
        }
    }

    public function destroy($id) {
        $menu = Menu::where('id', $id)->first();
        $menu->delete();
        return redirect('/menu');
    }
}
