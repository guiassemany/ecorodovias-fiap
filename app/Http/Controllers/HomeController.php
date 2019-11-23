<?php

namespace App\Http\Controllers;

use App\Occurrence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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
        $lastOccurrences = Occurrence::orderBy('OCOCODIGO', 'desc')->take(10)->get();
        return view('home')
            ->with('ocLatLongs', $ocLatLongs)
            ->with('lastOccurrences', $lastOccurrences);
    }

}
