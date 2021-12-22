<?php

namespace App\Http\Controllers;

use App\Models\Viewtype;
use Illuminate\Http\Request;

class ViewtypeController extends Controller
{
    public function index() {
        return view('index', [
            'data' => Viewtype::all(),
            'cols' => ['name', 'blade'],
            'desc' => ['Name', 'Blade'],
            'route' => 'viewtype'
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
            'route' => 'viewtype'
        ]);
    }

    public function edit($id) {
        $model = Viewtype::where('id', $id)->first();
        return view('create', [
            'data' => $model,
            'cols' => ['name', 'blade'],
            'desc' => ['Name', 'Blade'],
            'input_types' => ['text', 'text'],
            'route' => 'viewtype'
        ]);
    }

    public function store() {
        $request = request();

        if (isset($request->id)) { // edit
            $validatedRequest = $request->validate([
                'blade' => ['required', 'string', 'max:255']
            ]);
            $model = Viewtype::where('id', $request->id)->first();
            $model->update($validatedRequest);
            return redirect('/viewtype');
        } else { // create
            $validatedRequest = $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:viewtypes'],
                'blade' => ['required', 'string', 'max:255']
            ]);
            Viewtype::create($validatedRequest);
            return redirect('/viewtype');
        }
    }

    public function destroy($id) {
        $model = Viewtype::where('id', $id)->first();
        $model->delete();
        return redirect('/viewtype');
    }
}
