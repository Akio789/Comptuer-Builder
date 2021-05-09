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

        $currentComponentsAdded = ComponentMotherboard::where('motherboard_id', $motherboard->id)
            ->whereNotNull('socket')
            ->pluck('component_type')
            ->toArray();

        $remainingComponentsToAdd = [];
        foreach (Constants::COMPONENT_TYPES as $key => $val) {
            if (!in_array($val, $currentComponentsAdded)) {
                array_push($remainingComponentsToAdd, $val);
            }
        }

        return view('motherboard.components.create', [
            'motherboard' => $motherboard,
            'components' => $remainingComponentsToAdd
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
        $motherboard_id = $request->query()['motherboard'];
        Validator::make($request->all(), [
            'component_type' => 'required'
        ])->validate();

        $data = $request->input();
        $data['motherboard_id'] = $motherboard_id;
        $compMotherboard = ComponentMotherboard::create($data);
        $sockets = Constants::SOCKETS[strtolower($data['component_type'])];

        // CPU special case
        if ($data['component_type'] == 'CPU') {
            $motherboardSocket = Motherboard::find($motherboard_id)['socket'];
            $sockets = [$motherboardSocket];
        }

        return view('motherboard.components.create-step2', [
            'type' => $data['component_type'],
            'sockets' => $sockets,
            'id' => $compMotherboard->id
        ]);
    }

    public function storeStep2(Request $request)
    {
        $compMotherboardId = $request->query()['id'];

        $data = $request->input();
        $compMotherboard = ComponentMotherboard::find($compMotherboardId);
        $compMotherboard->socket = $data['socket'];
        $compMotherboard->quantity = $data['quantity'];
        $compMotherboard->save();

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
