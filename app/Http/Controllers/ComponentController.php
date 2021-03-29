<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Component;
use App\Http\Constants;

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
        return view('components.create', ['types' => Constants::COMPONENT_TYPES]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();

        Validator::make($request->all(), [
            'type' => 'required',
            'name' => 'required|unique:components',
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required',
        ])->validate();

        Component::create($data);

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
        return view('components.edit', [
            'component' => $component,
            'types' => Constants::COMPONENT_TYPES
        ]);
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

        Validator::make($request->all(), [
            'type' => 'required',
            'name' => [
                'required',
                Rule::unique('components')->ignore($component->id)
            ],
            'brand' => 'required',
            'model' => 'required',
            'price' => 'required'
        ])->validate();

        $data = $request->input();
        $component->type = $data['type'];
        $component->name = $data['name'];
        $component->brand = $data['brand'];
        $component->model = $data['model'];
        $component->price = $data['price'];
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
