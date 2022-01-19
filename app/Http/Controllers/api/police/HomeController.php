<?php

namespace App\Http\Controllers\api\police;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Police;
use Auth;

class HomeController extends Controller
{
    public function profil(){
        $id = Auth::user()->PoliceID;
        $police = Police::where('PoliceID', $id)->first();

        return response()->json($police, 200);
    } 
}
