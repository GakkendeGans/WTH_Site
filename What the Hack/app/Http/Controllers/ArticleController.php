<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Viewtype;
use App\Models\Page;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $pages = Article::join('pages', 'articles.page_id', '=', 'pages.id')
        ->select('articles.*', 'pages.name as pagename')
        ->get();
        return view('index', [
            'data' => $pages,
            'cols' => ['title', 'pagename'],
            'desc' => ['Title', 'Page'],
            'route' => 'article'
        ]);
    }

    public function home(Request $request) {
        $uri = 'home';
        $page = Page::where('name',$uri)->first();
        if (is_null($page)) {
            $article = null;
            $blade = 'plain';
        } else {
            $cat = Viewtype::where('id',$page->viewtype_id)->first();
            $blade = $cat->blade;
            $article = Article::all()->where('page_id', $page->id);
        }
        return view($blade, [
            'title' => $uri,
            'articles' => $article,
        ]);
    }

    public function show(Request $request) {
        // $uri = explode('/',$request->path());
        $uri = $request->path();
        $page = Page::where('name',$uri)->first();
        $cat = Viewtype::where('id',$page->viewtype_id)->first();
        $article = Article::all()->where('page_id', $page->id);
        return view($cat->blade, [
            'title' => $uri[1],
            'articles' => $article,
        ]);
    }

    public function create() {
        return view('create', [
            'cols' => ['header_image', 'title', 'body', 'page_id'],
            'desc' => ['Header image', 'Title', 'Body', 'Page'],
            'input_types' => ['text', 'text', 'text', 'select'],
            'select_options' => Page::all(),
            'route' => 'article'
        ]);
    }

    public function edit($id) {
        $article = Article::where('id', $id)->first();
        return view('create', [
            'data' => $article,
            'cols' => ['header_image', 'title', 'body', 'page_id'],
            'desc' => ['Header image', 'Title', 'Body', 'Page'],
            'input_types' => ['text', 'text', 'text', 'select'],
            'select_options' => Page::all(),
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
            'page_id' => ['required', 'integer']
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
        $article = Article::where('id', $id)->first();
        $article->delete();
        return redirect('/article');
    }
}
