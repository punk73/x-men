<?php

namespace App\Http\Controllers;

use App\Hero;
use Illuminate\Http\Request;
use App\Skill;

class MarryController extends Controller
{
    //
    public function index(Request $request) {
        $calon_suami = Hero::where('jenis_kelamin', 'laki-laki')->get();
        $calon_istri = Hero::where('jenis_kelamin', 'perempuan')->get();
        $skills = []; //default value;
        $suami = $request->suami;
        $istri = $request->istri;
        if($request->has('suami') && $request->has('istri')){

            $heroIds = [$suami, $istri];

            $skills = Skill::join('hero_skill', 'skills.id', '=', 'hero_skill.skill_id')
                ->whereIn('hero_skill.hero_id', $heroIds )
                ->get(); 

        }


        return view('marry.index', [
            'calon_suami' => $calon_suami,
            'calon_istri' => $calon_istri,
            'suami' => $suami,
            'istri' => $istri,
            'skills' => $skills
        ]);
    }
}
