<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Viewtype;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index() {
        $pages = Page::join('viewtypes', 'pages.viewtype_id', '=', 'viewtypes.id')
            ->select('pages.*', 'viewtypes.name as vtname', 'viewtypes.blade')
            ->get();
        return view('index', [
            'data' => $pages,
            'cols' => ['name', 'vtname', 'blade'],
            'desc' => ['Name', 'Viewtype', 'Blade'],
            'route' => 'page'
        ]);
    }

    public function show() {
        $route = request()->route()->uri;
        $name = ucfirst($route);
        $page = Page::where('name', $name)->first();
        $blade = Viewtype::where('id', $page->viewtype_id)->first()->blade;
        $data = Article::where('page_id', $page->id)->get();
        return view("$blade", [
            'page' => $page,
            'data' => $data
        ]);
    }

    public function create() {
        return view('create', [
            'cols' => ['name', 'viewtype_id'],
            'desc' => ['Name', 'Viewtype'],
            'input_types' => ['text', 'select'],
            'select_options' => Viewtype::all(),
            'route' => 'page'
        ]);
    }

    public function edit($id) {
        $page = Page::where('id', $id)->first();
        return view('create', [
            'data' => $page,
            'cols' => ['name', 'viewtype_id'],
            'desc' => ['Name', 'Viewtype'],
            'input_types' => ['text', 'select'],
            'select_options' => Viewtype::all(),
            'route' => 'page'
        ]);
    }

    public function store() {
        $request = request();
        if (isset($request->id)) { // edit
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'viewtype_id' => ['required', 'integer']
            ]);
            $page = Page::where('id', $request->id)->first();
            $page->update($validatedRequest);
            return redirect('/page');
        } else { // create
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:pages,name'],
                'viewtype_id' => ['required', 'integer']
            ]);
            Page::create($validatedRequest);
            return redirect('/page');
        }
    }

    public function destroy($id) {
        $page = Page::where('id', $id)->first();
        $page->delete();
        return redirect('/page');
    }
}
