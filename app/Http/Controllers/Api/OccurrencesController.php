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
}
