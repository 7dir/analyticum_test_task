<?php

namespace App\Http\Controllers;

use App\Comm;
use Illuminate\Http\Request;

class CommController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comms = Comm::all();
        $comms_root = $comms->where('parent_id',0);

        return view('comm.index')
            ->with('comms', $comms)
            ->with('comms_root', $comms_root);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comm = new Comm;
        $comm->name      = $request->name;
        $comm->text      = $request->text;
        $comm->parent_id = $request->parent_id;
        $comm->save();

        if ($request->j) {
            return response()->json($comm, 200, ['Content-Type' => 'application/json; charset=UTF-8']);
        } else {
            return redirect('comms');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comm  $comm
     * @return \Illuminate\Http\Response
     */
    public function show(Comm $comm)
    {
        return view('comm.show')
            ->with('comm', $comm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comm  $comm
     * @return \Illuminate\Http\Response
     */
    public function edit(Comm $comm)
    {
        return view('comm.edit')
            ->with('comm', $comm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comm  $comm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comm $comm)
    {
        $comm->name      = $request->name;
        $comm->text      = $request->text;
        $comm->parent_id = $request->parent_id;
        $comm->save();

        return redirect('comms');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comm  $comm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comm $comm)
    {
        $comm->delete();
        return redirect('comms');
    }
}
