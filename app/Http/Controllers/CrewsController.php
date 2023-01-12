<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Document;
use Illuminate\Http\Request;

class CrewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $crews = Crew::all();

        return view('crews.index', compact('crews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('crews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Crew::create($request->all());
            return redirect()->route('crews')->with('info', 'Crew has been created.');
        } catch (\Exception $e) {
            return redirect()->route('crews.create')->with('info', 'All fields are required.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crew = Crew::find($id);
        return view('crews.show', compact('crew'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crew = Crew::find($id);

        if (!$crew) {
            return redirect()->back()->with('info', 'Crew does not exist.');
        }

        return view('crews.edit', compact('crew'));
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
        $crew = Crew::find($id);

        if (!$crew) {
            return redirect()->back();
        }

        $crew->update($request->all());

        return redirect()->route('crews.view', [$crew->id])->with('info', 'Crew has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        dd('Destroying');

//        dd($id);
        Document::where('crew_id', $id)->delete();
        Crew::find($id)->delete();

        return redirect()->back()->with('info', 'Crew has been deleted.');
    }
}
