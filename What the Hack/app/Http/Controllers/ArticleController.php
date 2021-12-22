<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

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

    public function home(Request $request) {
        $uri = 'main';
        $menu = Menu::where('name',$uri)->first();
        $cat = Category::where('id',$menu->category_id)->first();
        $article = Article::all()->where('menu_id', $menu->id);
        return view($cat->blade, [
            'title' => $uri[1],
            'articles' => $article,
        ]);
    }

    public function show(Request $request) {
        $uri = explode('/',$request->path());
        $menu = Menu::where('name',$uri[1])->first();
        $cat = Category::where('id',$menu->category_id)->first();
        $article = Article::all()->where('menu_id', $menu->id);
        return view($cat->blade, [
            'title' => $uri[1],
            'articles' => $article,
        ]);
    }

    public function create() {
        return view('create', [
            'cols' => ['header_image', 'title', 'body', 'menu_id'],
            'desc' => ['Header image', 'Title', 'Body', 'Menu'],
            'input_types' => ['text', 'text', 'text', 'select'],
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
            'input_types' => ['text', 'text', 'text', 'select'],
            'select_options' => Menu::all(),
            'route' => 'article'
        ]);
    }

    public function store() {
        $request = request();
        $validatedRequest = $request->validate([
            //'header_image' => ['file', 'image'],
            'header_image' => ['active_url', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required'],
            'menu_id' => ['required', 'integer']
        ]);
        if (isset($request->id)) { // edit
            $article = Article::where('id', $request->id)->first();
            $article->update($validatedRequest);
            return redirect('/article');
        } else { // create
            Article::create($validatedRequest);
            return redirect('/article');
        }
    }

    public function destroy($id) {
        $menu = Article::where('id', $id)->first();
        $menu->delete();
        return redirect('/article');
    }
}
