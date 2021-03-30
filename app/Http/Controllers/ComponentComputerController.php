<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;
use App\Models\Component;
use App\Models\ComponentComputer;
use App\Models\Motherboard;
use App\Http\Constants;
use Illuminate\Support\Facades\Validator;

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
        $motherboard = $computer->motherboard;
        $availableComponents = Component::where('socket', $motherboard->socket)->get();

        $currentComponents = $computer->components;
        $currentComponentsCount = [];
        foreach ($currentComponents as $c) {
            $currentComponentsCount[$c->type] = array_key_exists($c->type, $currentComponentsCount)
                ? $currentComponentsCount[$c->type] + 1
                : 1;
        }

        $allowedComponentsFromMotherboard = $motherboard->components;
        $availableComponentsCount = [];
        foreach ($allowedComponentsFromMotherboard as $c) {
            $availableComponentsCount[$c->type] = $c->pivot->quantity;
            if (array_key_exists($c->type, $currentComponentsCount)) {
                $availableComponentsCount[$c->type] -= $currentComponentsCount[$c->type];
            }
        }

        return view('computer.components.create', [
            'computer' => $computer,
            'motherboard' => $motherboard,
            'availableComponents' => $availableComponents,
            'availableComponentsCount' => $availableComponentsCount
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
        ])->validate();

        $data = $request->input();
        $data['computer_id'] = $id;
        $data['component_id'] = (int)$data['component'];

        ComponentComputer::create($data);

        return redirect()->route('computers.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $computerId, $currentComponentId)
    {
        Validator::make($request->all(), [
            'component' => 'required',
        ])->validate();

        $data = $request->input();

        $componentComputer = ComponentComputer::where('computer_id', $computerId)
            ->where('component_id', $currentComponentId)->first();

        $componentComputer->component_id = (int)$data['component'];
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
            ->where('component_id', $componentId)->first();

        $componentComputer->delete();

        return redirect()->route('computers.index', ['computer' => $computerId]);
    }
}
