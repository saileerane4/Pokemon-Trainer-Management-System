<?php

namespace App\Http\Controllers;
use App\User;
use App\Pokemon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use View;
use App\Http\Requests;


class EditUserProfile extends Controller
{
  public function editProfile(){
      User::where('id',$_POST['id'])->update(['name'=>$_POST['name'],'hometown'=>$_POST['hometown']]);
      if($_POST['del_id'] =="None"){

      }
      else{
        foreach(User::find($_POST['id'])->pokemon as $eachUserPokemon){
          if($eachUserPokemon->id == $_POST['del_id']){
             Pokemon::find($_POST['del_id'])->users()->newPivotStatementForId($_POST['id'])->delete();
             Session::flash('sailee_msg','Pokemon deleted Successfully');//save//return
             return Redirect::to('editpok');
          }
        }
    }

    if($_POST['pok_id']=="None"){

    }
    else{
    foreach(User::find($_POST['id'])->pokemon as $eachUserPokemon){
      if($eachUserPokemon->id == $_POST['pok_id'] ){
        Session::flash('sailee_msg','Pokemon already exists');//save//return
        return Redirect::to('editpok');
      }
    }
  }
     User::find($_POST['id'])->pokemon()->attach($_POST['pok_id']);
     Session::flash('sailee_msg', 'Pokemon successfully added');
       return Redirect::to('editpok');
  }
}
