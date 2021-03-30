<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Computer;
use App\Models\Component;
use App\Http\Constants;
use App\Models\Motherboard;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Auth::user()->computers;
        return view('computers.index', ['computers' => $computers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motherboards = Motherboard::all();
        return view('computers.create', [
            'motherboards' => $motherboards
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
        $data = $request->input();

        Validator::make($request->all(), [
            'name' => 'required',
            'motherboard_id' => 'nullable|integer',
        ], [
            'motherboard_id.integer' => 'The motherboard field is required.'
        ])->validate();

        $data['user_id'] = Auth::user()->id;
        $computer = Computer::create($data);
        $computer->save();

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
        $computer = Computer::find($id);

        return view('computers.info', ['computer' => $computer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $computer = Computer::find($id);

        return view('computers.edit', ['computer' => $computer]);
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
        $data = $request->input();

        Validator::make($request->all(), [
            'name' => 'required'
        ])->validate();

        $computer = Computer::find($id);
        $computer->name = $data['name'];
        $computer->save();

        return redirect()->route('computers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $computer = Computer::find($id);
        $computer->delete();

        return redirect()->route('computers.index');
    }

    /**
     * Toggle computer is_public.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        $computer = Computer::find($id);
        $computer->is_public = !$computer->is_public;
        $computer->save();

        return redirect()->route('computers.index');
    }

    /**
     * Get all public computers.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function public()
    {
        $computers = Computer::where('is_public', true)->get();
        return view('computers.public', ['computers' => $computers]);
    }
}
