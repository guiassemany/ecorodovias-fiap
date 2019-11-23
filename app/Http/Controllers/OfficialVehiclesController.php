<?php

namespace App\Http\Controllers;

use App\Occurrence;
use App\OfficialVehicle;
use Illuminate\Http\Request;

class OfficialVehiclesController extends Controller
{
    public function search()
    {
        return view('officialVehicles.search');
    }

    public function index(Request $request)
    {
        $officialVehicles = OfficialVehicle::query();

        if($request->input('VIACODIGO')) {
            $officialVehicles->where('VIACODIGO', 'LIKE', '%'.$request->input('VIACODIGO').'%');
        }

        if($request->input('VIADESCRIC')) {
            $officialVehicles->where('VIADESCRIC', 'LIKE', '%'.$request->input('VIADESCRIC').'%');
        }

        $officialVehicles = $officialVehicles->paginate(15);

        return view('officialVehicles.index')->with('officialVehicles', $officialVehicles);
    }

    public function details($occurrence_id)
    {
        $occurrence = Occurrence::with(['vehicles', 'officialVehiclesAllocations', 'officialVehiclesAllocations.officialVehicle'])->findOrFail($occurrence_id);
        dd($occurrence->vehicles, $occurrence->officialVehiclesAllocations);
    }
}
