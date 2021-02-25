<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Component;
use Illuminate\Support\Composer;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::all();

        return view('components.index', ['components' => $components]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $component = new Component();
        $component->name = $arr['name'];
        $component->brand = $arr['brand'];
        $component->model = $arr['model'];
        $component->price = $arr['price'];
        $component->save();

        return redirect()->route('components.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $component = Component::find($id);

        return view('components.info', ['component' => $component]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = Component::find($id);
        return view('components.edit', ['component' => $component]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $component = Component::find($id);
        $arr = $request->input();
        $component->name = $arr['name'];
        $component->brand = $arr['brand'];
        $component->model = $arr['model'];
        $component->price = $arr['price'];
        $component->save();

        return redirect()->route('components.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $component = Component::find($id);
        $component->delete();
        return redirect()->route('components.index');
    }
}
