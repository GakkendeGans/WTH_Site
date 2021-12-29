<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Viewtype;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        $uri = str_replace("%20", " ", $uri);
        $page = Page::where('name',$uri)->first();
        $cat = Viewtype::where('id',$page->viewtype_id)->first();
        $article = Article::all()->where('page_id', $page->id);
        return view($cat->blade, [
            'title' => $uri[1],
            'articles' => $article,
        ]);
    }

    public function create() {
        $files = Storage::disk('publicimages')->allFiles('uploads');
        return view('create', [
            'cols' => ['header_image', 'existing_image', 'title', 'body', 'page_id'],
            'desc' => ['Upload new header image', 'Choose existing header image', 'Title', 'Body', 'Page'],
            'input_types' => ['file', 'fileselect', 'text', 'html', 'select'],
            'file_options' => [$files, ''],
            'select_options' => Page::all(),
            'route' => 'article'
        ]);
    }

    public function edit($id) {
        $article = Article::where('id', $id)->first();
        $files = Storage::disk('publicimages')->allFiles('uploads');
        foreach($files as $key => $file) {
            $files[$key] = substr($file,8);
        }
        return view('create', [
            'data' => $article,
            'cols' => ['header_image', 'existing_image', 'title', 'body', 'page_id'],
            'desc' => ['Upload new header image', 'Choose existing header image', 'Title', 'Body', 'Page'],
            'input_types' => ['file', 'fileselect', 'text', 'html', 'select'],
            'file_options' => [$files,$article->header_image],
            'select_options' => Page::all(),
            'route' => 'article'
        ]);
    }

    public function store(Request $request) {
        // $request = request();
        $fileName='';
        if ($request->file()) {
            $validatedRequest = $request->validate([
                'header_image' => ['required', 'file', 'image']
            ]);
            $file = $request->file('header_image');
            $fileName = $file->getClientOriginalName();
            if (!file_exists(public_path().'/images/uploads/'.$fileName)) {
                $request->file('header_image')->storePubliclyAs('uploads', $fileName,'publicimages');
            }
        }

        $validatedRequest = $request->validate([
            // 'header_image' => ['file', 'image'],
            // 'header_image' => ['active_url', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'max:640000'],
            'page_id' => ['required', 'integer']
        ]);


        if ($fileName) {
            $validatedRequest['header_image'] = $fileName;
        } elseif ($request->existing_image) {
            if ($request->existing_image=='-')
                $validatedRequest['header_image'] = '';
            else
                $validatedRequest['header_image'] = $request->existing_image;
        }

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
