<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advt;
use App\Models\Passenger;

class SecondAdvtController extends Controller
{
    function indexDate() {
        $ads = Advt::all('date');
        $newAds = [];
        $a = true;
        foreach ($ads as $Avalue) {
            foreach ($newAds as $Bvalue) {
                if ($Avalue->date === $Bvalue) {
                    $a = false;
                    continue;
                }
            }
            if ($a === true) {
                array_push($newAds, $Avalue->date);
            } else {
                $a = true;
            }
        }
        return $newAds;
    }

    function myAdvts(Request $r) {
        return Advt::where('user_id',$r->user_id)->with('user')->with('passengers')->with('comments')->with('car')->get();
    }

    function myParticipation(Request $r) {
        $advts = Advt::having('date','<',date('Y-m-d'))->with('user')->with('passengers')->with('comments')->with('car')->get();
        $myParticipation = [];
        foreach ($advts as $value) {
            $p = Passenger::where('advt_id', $value->id)->where('user_id',$r->user_id)->get();
            if(count($p)) array_push($myParticipation,$value);
        }
        return $myParticipation;
    }
}
