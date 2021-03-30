<?php

namespace App\Http\Controllers;

use App\Http\Constants;
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
    public function create(Request $request)
    {
        $motherboard = Motherboard::find($request->motherboard);

        return view('motherboard.components.create', [
            'motherboard' => $motherboard,
            'components' => Constants::COMPONENT_TYPES
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'component_type' => 'required',
            'quantity' => 'required',
        ])->validate();

        $data = $request->input();

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
    public function destroy($id)
    {
        $componentMotherboard = ComponentMotherboard::find($id);

        $componentMotherboard->delete();

        return redirect()->route('motherboards.index');
    }
}
