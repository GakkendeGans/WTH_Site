<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;

class ArticleController extends Controller
{
    public function index() {
        return view('index', [
            'data' => Article::all(),
            'cols' => ['title'],
            'desc' => ['Title'],
            'route' => 'article'
        ]);
    }

    public function show() {
        dd('show');
    }

    public function create() {
        return view('create', [
            'cols' => ['header_image', 'title', 'body', 'menu_id'],
            'desc' => ['Header image', 'Title', 'Body', 'Menu'],
            'input_types' => ['file', 'text', 'text', 'select'],
            'select_options' => Menu::all(),
            'route' => 'article'
        ]);
    }

    public function edit($id) {
        $article = Article::where('id', $id)->first();
        return view('create', [
            'data' => $article,
            'cols' => ['header_image', 'title', 'body', 'menu_id'],
            'desc' => ['Header image', 'Title', 'Body', 'Menu'],
            'input_types' => ['file', 'text', 'text', 'select'],
            'select_options' => Menu::all(),
            'route' => 'article'
        ]);
    }

    public function store() {
        $request = request();
        $validatedRequest = $request->validate([
            'header_image' => ['file', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'menu_id' => ['required', 'integer']
        ]);
        if (isset($request->id)) { // edit
            $article = Article::where('id', $request->id)->first();
            $article->update($validatedRequest);
            return redirect('/article/index');
        } else { // create
            Article::create($validatedRequest);
            return redirect('/article/index');
        }
    }

    public function destroy($id) {
        $menu = Article::where('id', $id)->first();
        $menu->delete();
        return redirect('/article/index');
    }
}
