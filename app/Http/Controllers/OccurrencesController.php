<?php

namespace App\Http\Controllers;

use App\Occurrence;
use Illuminate\Http\Request;

class OccurrencesController extends Controller
{
    public function search()
    {
        return view('occurrences.search');
    }

    public function index(Request $request)
    {
        $occurrences = Occurrence::query();

        if($request->input('OCOCODIGO')) {
            $occurrences->where('OCOCODIGO', 'LIKE', '%'.$request->input('OCOCODIGO').'%');
        }

        if($request->input('OCODATA')) {
            $occurrences->where('OCODATA', 'LIKE', '%'.$request->input('OCOCODIGO').'%');
        }

        $occurrences = $occurrences->paginate(15);

        return view('occurrences.index')->with('occurrences', $occurrences);
    }

    public function details($occurrence_id)
    {
        $occurrence = Occurrence::with(['vehicles', 'officialVehiclesAllocations', 'officialVehiclesAllocations.officialVehicle'])->findOrFail($occurrence_id);
        dd($occurrence->vehicles, $occurrence->officialVehiclesAllocations);
    }

    public function map()
    {
        $occurrences = Occurrence::where('OCORODLAT', '<>', ' ')->take(150)->get();
        $ocLatLongs = $occurrences->map(function($occ){
            return [
                'label' => str_replace(' ', '', $occ->RODNOME . ' - ' . $occ->TPIDESCRIC),
                'occurrence' => str_replace(' ', '', $occ->OCOCODIGO),
                'coord' => [
                    'lat' => $occ->OCORODLAT,
                    'lng' => $occ->OCORODLON,
                ]
            ];
        });

        return view('occurrences.map')
            ->with('occurrences', $occurrences)
            ->with('ocLatLongs', $ocLatLongs);
    }
}
