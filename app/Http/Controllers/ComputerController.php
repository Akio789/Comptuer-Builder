<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Computer;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::all();
        return view('computers.index', ['computers' => $computers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->input();
        $computer = new Computer();
        // TODO: take user_id from session
        $computer->user_id = 1;
        $computer->name = $arr['name'];
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
        $arr = $request->input();
        $computer = Computer::find($id);
        $computer->name = $arr['name'];
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
}
