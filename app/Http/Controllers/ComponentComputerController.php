<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;
use App\Models\Component;
use App\Models\ComponentComputer;

class ComponentComputerController extends Controller
{

    /**
     * Get all the components that the computer
     * doesn't currently have
     */
    function getAvailableComponents($computer)
    {
        $componentIdsToExcept = array_map(function ($component) {
            return $component->id;
        }, $computer->components->all());
        return Component::all()->except($componentIdsToExcept);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $computer = Computer::find($id);
        $components = $computer->components;
        $availableComponents = $this->getAvailableComponents($computer);
        return view('computer.components.index', [
            'computer' => $computer,
            'components' => $components,
            'availableComponents' => $availableComponents
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
        $availableComponents = $this->getAvailableComponents($computer);
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
    public function update(Request $request, $computerId, $componentId)
    {
        $arr = $request->input();
        $componentComputer = ComponentComputer::where('computer_id', $computerId)
            ->where('component_id', $componentId)->first();
        $componentComputer->component_id = (int)$arr['component'];
        $componentComputer->save();

        return redirect()->route('computers.index');
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
