<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;
use App\Models\Component;
use App\Models\ComponentComputer;
use App\Models\Motherboard;
use App\Http\Constants;
use App\Models\ComponentMotherboard;
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

        // Get the count of the each component type of the computer
        $currentComponents = $computer->components;
        $currentComponentsCount = [];
        foreach ($currentComponents as $c) {
            $currentComponentsCount[$c->type] = array_key_exists($c->type, $currentComponentsCount)
                ? $currentComponentsCount[$c->type] + 1
                : 1;
        }

        // How many slots are left per type of component
        $slots = ComponentMotherboard::where('motherboard_id', $motherboard->id)->get();
        $remainingSlots = [];
        $mappedComponentSocket = []; // Helper to show component's socket in UI
        foreach ($slots as $slot) {
            $remainingSlots[$slot->component_type] = $slot->quantity;
            $mappedComponentSocket[$slot->component_type] = $slot->socket;
            if (array_key_exists(strtolower($slot->component_type), $currentComponentsCount)) {
                $remainingSlots[$slot->component_type] -= $currentComponentsCount[strtolower($slot->component_type)];
            }
        }

        // The components that are allowed to be added depending on matching sockets and how many slots are left
        $remainingSlotsTypes = array_filter($remainingSlots, function ($val, $key) {
            return $val > 0;
        }, ARRAY_FILTER_USE_BOTH);
        $fittingComponents = [];
        foreach ($slots as $slot) {
            $availableComponentsOfType = Component::where('type', $slot->component_type)
                ->where('socket', $slot->socket)
                ->get();
            foreach ($availableComponentsOfType as $c) {
                array_push($fittingComponents, $c);
            }
        }

        // Make all upper case just for convenience
        foreach ($remainingSlotsTypes as $key => $value) {
            if (strtoupper($key) != $key) {
                $remainingSlotsTypes[strtoupper($key)] = $value;
                unset($remainingSlotsTypes[$key]);
            }
        }

        $availableComponents = [];
        foreach ($fittingComponents as $component) {
            if (array_key_exists(strtoupper($component->type), $remainingSlotsTypes)) {
                array_push($availableComponents, $component);
            }
        }
        return view('computer.components.create', [
            'computer' => $computer,
            'motherboard' => $motherboard,
            'availableComponents' => $availableComponents,
            'remainingSlots' => $remainingSlots,
            'mappedComponentSocket' => $mappedComponentSocket
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
