<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrewRequest;
use App\Models\Crew;
use App\Models\Document;
use Illuminate\Http\Request;

class CrewsController extends Controller
{
    public function index()
    {
        $crews = Crew::with(['document'])->get();

        return response()->json([
            'success' => true,
            'data' => $crews
        ], 200);
    }

    public function store(CrewRequest $request)
    {
        try {
            Crew::create($request->validated());

            return response()->json([
                'success' => true,
                'data' => 'Crew has been created.'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating a crew'
            ], 400);
        }
    }

    public function show($id)
    {
        $crew = Crew::with(['document'])->where('id', $id)->first();

        if (! $crew) {
            return response()->json([
                'success' => false,
                'message' => 'Crew not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $crew
        ], 200);
    }

    public function update(CrewRequest $request, Crew $crew)
    {
        $crew->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => 'Crew has been updated.'
        ], 200);
    }

    public function destroy($id)
    {
        $crew = Crew::find($id);

        if (! $crew) {
            return response()->json([
                'success' => false,
                'message' => 'Crew not found'
            ], 404);
        }

        Document::where('crew_id', $id)->delete();
        $crew->delete();

        return response()->json([
            'success' => true,
            'data' => 'Crew has been deleted.'
        ], 200);
    }
}
