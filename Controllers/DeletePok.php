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



class DeletePok extends Controller
{
          public function index()
           {
             $poke = Auth::user()->id;
             $pu = User::find($poke);
             return view('deleteGen')->with('usr', $pu);
           }

           public function delete()
           {
             $pokem = Input::get('pokemdelete');

             if($pokem=="None")
             {
               Session::flash('sailee_msg','No Pokemon was deleted');//save//return
              return Redirect::to('home');
             }
             else{


             $user = Auth::user()->id;
             $poke = ['pokemon_id'=>$pokem,'user_id'=>$user];

             $del = DB::table('pokemon_user')->where($poke)->delete();
              Session::flash('sailee_msg','Pokemon deleted Successfully');//save//return
             return Redirect::to('home');}
           }
}
