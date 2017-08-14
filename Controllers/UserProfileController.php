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


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function _construct()
   {
     $this->middleware('auth');
   }

    public function index()
    {
        $puser_id=Auth::user()->id;

        $p=User::find($puser_id);
        $pokemons=Pokemon::all();
        return View::make('profile', compact('p','pokemons'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $pokemonAlreadyExists=0;
      User::where('id',Auth::user()->id)->update(['name'=>$_POST['name'],'email'=>$_POST['email'],'hometown'=>$_POST['hometown']]);





    echo $_POST['pokemon_id'];
    if($_POST['pokemon_id']=="None")
    {

                Session::flash('sailee_msg','User Profile updated Successfully');//save//return
              return Redirect::to('home');

    }



        foreach(User::find(Auth::user()->id)->pokemon as $poke){
           if($poke->id == $_POST['pokemon_id']){
             Session::flash('sailee_msg','Pokemon already exists');//save//return
              return Redirect::to('profile');
              $pokemonAlreadyExists = 1;
              break;
           }
        }
       if($pokemonAlreadyExists == 0){
          User::find(Auth::user()->id)->pokemon()->attach($_POST['pokemon_id']);
        }
                  Session::flash('sailee_msg','User Profile updated Successfully');//save//return
                return Redirect::to('home');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function update(Request $request)
    {
        //  $user= Auth::user()->id;
        //  $name = Input::get('name');
          $email = Input::get('email');
          $hometown = Input::get('hometown');


          User::where('id', $user)->update(array(
            'name' => $name,
            'email'=> $email,
            'hometown'=>$hometown          ));
            //return Redirect::to('home');
              db($user);

    */
    public function update()
    {
      //$validator = Validator::make($request->all(),[
        //'name' => 'required',
        //'email' => 'required',
        //'hometown' => 'required'
    //  ]);
      //if($validator->fails()){
        //return redirect('/home')
          //  ->withInput()
            //->withErrors($validator);
      //}
      $user_id = Auth::user()->id;
      //$poke_user_record = Pokemon_User::find()
      //$user = Input::get('id');

      //$user->name = $request->name;
      //$user->email = $request->email;
      //$user->hometown = $request->hometown;
      $name=Input::get('name');

      $email=Input::get('email');

      $hometown=Input::get('hometown');
      //dd($hometown);
      User::where('id', $user_id)->update(array(
        'name'=>$name,
      'email'=>$email,
    'hometown'=>$hometown
  ));


  Session::flash('sailee_msg','Information Updated Sucessfully');//save//return
  return Redirect::to('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
