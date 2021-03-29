<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\ComponentMotherboard;
use App\Models\Motherboard;
use App\Models\Component;

class ComponentMotherboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $motherboard = Motherboard::find($id);
        $components = Component::all();

        return view('motherboard.components.create', [
            'motherboard' => $motherboard,
            'components' => $components
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        Validator::make($request->all(), [
            'component' => 'required',
            'quantity' => 'required',
        ])->validate();

        $data = $request->input();
        $data['motherboard_id'] = $id;
        $data['component_id'] = (int)$data['component'];

        ComponentMotherboard::create($data);

        return redirect()->route('motherboards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($motherboardId, $componentId)
    {
        $componentMotherboard = ComponentMotherboard::where('motherboard_id', $motherboardId)
            ->where('component_id', $componentId);

        $componentMotherboard->delete();

        return redirect()->route('motherboards.index', ['motherboard' => $motherboardId]);
    }
}
