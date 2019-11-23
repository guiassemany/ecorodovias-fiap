<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Occurrence;
use Illuminate\Http\Request;

class OccurrencesController extends Controller
{

    public function index(Request $request)
    {
        $occurrences = Occurrence::query();

        if($request->input('OCOCODIGO')) {
            $occurrences->where('OCOCODIGO', 'LIKE', '%'.$request->input('OCOCODIGO').'%');
        }

        if($request->input('OCODATA')) {
            $occurrences->where('OCODATA', 'LIKE', '%'.$request->input('OCOCODIGO').'%');
        }

        $occurrences = $occurrences->paginate(60);

        return response()->json(['data' => $occurrences]);
    }

    /**
     * Get all occurrences recipients near map position.
     */
    public function getOccurrencesNearby(Request $request)
    {
        //Validations
        if (!$request->has('lat') || !$request->has('lng')) {
            return false;
        }
        //Sets variable
        $columnName = false;
        //Get latitude and longitude
        $lat = $request->input("lat");
        $lng = $request->input("lng");

        //Other settings
        $maxDistance = $request->input('maxDistance', 30);
        $distanceUnit = $request->input('unit', '6371');
        $select = "
        occurrences.*,
       ( ? * acos( cos( radians( ? ) )
       * cos( radians( OCORODLAT ) )
       * cos( radians( OCORODLON ) - radians( ? ) )
       + sin( radians( ? ) )
       * sin( radians( OCORODLAT ) ) ) ) AS distance
      ";
        $occurrences = Occurrence::selectRaw($select, [$distanceUnit, $lat, $lng, $lat])
            ->having('distance', '<', $maxDistance)
            //->join('blood_types', 'recipients.blood_type_id', '=', 'blood_types.id')
            /*->where(function ($query) use ($columnName) {
                if ($columnName) {
                    $query->where('blood_types.'.$columnName, '=', 1);
                }
            })*/
            ->orderBy('distance')
            ->take(30)->get();

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

        return response()->json($ocLatLongs);
    }
}
