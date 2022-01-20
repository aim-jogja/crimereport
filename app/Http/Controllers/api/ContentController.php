<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crimereport;

class ContentController extends Controller
{
    public function crimereport(){
        $cr = Crimereport::all();

        return response()->json($cr, 200);
    }

    public function sendreport(Request $request){
        $cr = Crimereport::create([
            'casetype' => $request->casetype,
            'description' => $request->peristiwa,
            'location' => $request->lokasi
        ]);
        if($cr->save()){
            $success['success'] = true;
            return response()->json($success, 200);
        }else{
            $success['success'] = false;
            return response()->json($success, 200);
        }
        
    }
}
