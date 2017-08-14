<?php

namespace App\Http\Controllers;

use App\User;
use App\Pokemon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use View;
use App\Http\Requests;

class Addpokemon extends Controller
{
    public function Add()
    {
      $pokename = strtolower(Input::get('newpoki'));
      if($pokename == "")
      {
        Session::flash('sailee_msg','Please Enter a valid Pokemon name');//save//return
        return Redirect::to('admin');

      }
    //  dd($pokename);
    $ab= Pokemon::all();
    foreach($ab as $a)
    {
      if(strtolower($a->name) == $pokename)
      {
        Session::flash('sailee_msg','Pokemon already exists');//save//return
        return Redirect::to('admin');

      }
    }
    $poke = new Pokemon;
    $poke->name = $pokename;
    $poke->save();
    Session::flash('sailee_msg','New pokemon added Successfully');//save//return

    return Redirect::to('home');
    }


    public function Delete()
    {
        $pokem = Input::get('pokemdelete');
        if($pokem=="None"){
          Session::flash('sailee_msg','No Pokemon was deleted');//save//return
         return Redirect::to('home');
        }
        else
        {        $del = DB::table('pokemon')->where('id', $pokem)->delete();
                Session::flash('sailee_msg','Pokemon was successfully deleted');//save//return

                return Redirect::to('home');

        }

    }
}
