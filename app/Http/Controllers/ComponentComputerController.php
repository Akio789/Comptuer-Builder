<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;
use App\Models\Component;
use App\Models\ComponentComputer;

class ComponentComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $computer = Computer::find($id);
        $components = $computer->components;
        return view('computer.components.index', [
            'computer' => $computer,
            'components' => $components
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $computer = Computer::find($id);
        $componentIdsToExcept = array_map(function ($component) {
            return $component->id;
        }, $computer->components->all());
        $availableComponents = Component::all()->except($componentIdsToExcept);
        return view('computer.components.create', [
            'computer' => $computer,
            'availableComponents' => $availableComponents
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
        $arr = $request->input();
        $componentComputer = new ComponentComputer();
        $componentComputer->component_id = $arr['component'];
        $componentComputer->computer_id = $id;
        $componentComputer->save();

        return redirect()->route('computers.index');
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
    public function destroy($computerId, $componentId)
    {
        $componentComputer = ComponentComputer::where('computer_id', $computerId)
            ->where('component_id', $componentId);
        $componentComputer->delete();
        return redirect()->route('computers.index', ['computer' => $computerId]);
    }
}
