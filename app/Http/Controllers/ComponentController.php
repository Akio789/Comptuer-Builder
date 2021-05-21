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
        return view('components.index');
    }

    public function list(Request $request)
    {
        $type = $request->query()['type'];
        $components = Component::where('type', $type)->get();

        $targetView = 'components.' . $type . '.index';
        return view($targetView, ['components' => $components]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->query()['type'];
        $sockets = Constants::SOCKETS[$type];

        $data = ['sockets' => $sockets];

        $targetView = 'components.' . $type . '.create';

        return view($targetView, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->query()['type'];
        $data = $request->input();
        $data['type'] = $type;

        Validator::make($request->all(), [
            'type' => 'required',
            'socket' => 'required',
            'name' => 'required|unique:components',
            'brand' => 'required',
            'price' => 'required',
        ])->validate();

        Component::create($data);

        return redirect()->route('components.list', ['type' => $type]);
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
    public function edit(Request $request, $id)
    {
        $type = $request->query()['type'];
        $sockets = Constants::SOCKETS[$type];

        $component = Component::find($id);

        $targetView = 'components.' . $type . '.edit';
        return view($targetView, [
            'component' => $component,
            'sockets' => $sockets
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
        $type = $request->query()['type'];
        $component = Component::find($id);

        Validator::make($request->all(), [
            'socket' => 'required',
            'name' => [
                'required',
                Rule::unique('components')->ignore($component->id)
            ],
            'brand' => 'required',
            'price' => 'required'
        ])->validate();

        $data = $request->input();
        $component->update($data);

        return redirect()->route('components.list', ['type' => $type]);
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
        return redirect()->route('components.list', ['type' => $component->type]);
    }

    public function chooseType()
    {
        return view('components.chooseType');
    }
}
