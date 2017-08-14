@extends('layouts.app')

@section('content')
<style>
input[type=text], select {
   width: 100%;
   padding: 10px 15px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   font-size:15px;
}

input[type=submit] {
   width: 100%;
   background-color: #4CAF50;
   color: white;
   padding: 14px 20px;
   margin: 8px 0;
   border: none;
   border-radius: 4px;
   cursor: pointer;
   font-size:20px;
}

input[type=submit]:hover {
   background-color: #45a049;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          @if(Session::has('sailee_msg'))
              <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp <em>{!! session('sailee_msg')!!}</em></div>
              @endif
            <div class="panel panel-default">
                <div class="panel-heading">User Edit Profile</div>
                <div class="panel-body">
                  <form action="editpok" method="POST" id="pokeform">

                    <div class="form-group">
                      Select the User to edit profile <br>
                      <select name="user_id" class="form-control" form="pokeform">
                          @foreach(App\User::all() as $i)
                          <option value={{$i->id}}>{{$i->name}}</option>
                          @endforeach
                      </select>


                                         <br>
                                            <input type="submit" value="Select User Profile" class="btn btn--primary btn-lg"></input>
                                            <input type="hidden" name="_token" value={{csrf_token()}}>
                                            <br>

                    </div>

                  </form>
                  <div>

                  <?php if(isset($_POST['user_id'])):?>

                    <?php $p = App\User::find($_POST['user_id']); ?>

                    <form action="editpok/EditUserProfile" method="POST" id="poke">
                      <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" value="{{$p->name}}" />
                      </div>
                      <br>
                      <br>
                      <div class="form-group">
                        <label for="id" class="col-sm-5 control-label">Profile id</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="id" value="{{$p->id}}" />
                      </div>
                      <br>
                      <br>
                      <div class="form-group">
                        <label for="hometown" class="col-sm-5 control-label">Home Town</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="hometown" value="{{$p->hometown}}" />
                      </div>
                      <br>
                      <br>


                           <div class="form-group">
                             <label for="pokemon_id" class="col-sm-5 control-label">Add Pokemons</label>
                                <div class="col-sm-7">
                                    <select name="pok_id" class="form-control" form="poke">
                                           <option value ="None">None</option>
                                        @foreach(App\Pokemon::all() as $i)
                                        <option value={{$i->id}}>{{$i->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                          </div>
                          <br>
                          <br>
                          <div class="form-group">
                            <label for="pokemon_id" class="col-sm-5 control-label">Delete Pokemons</label>
                               <div class="col-sm-7">
                                   <select name="del_id" class="form-control" form="poke">
                                      <option value ="None">None</option>
                                       @foreach(App\User::find($_POST['user_id'])->pokemon as $i)
                                       <option value={{$i->id}}>{{$i->name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                         </div>
                         <br>
                         <br>
                            <input type="submit" value="Update User Profile" class="btn btn--primary btn-lg"></input>
                            <input type="hidden" name="_token" value={{csrf_token()}}>
                            <br>
                            <br>
                      </div>

                    </form>
                  <?php endif;?>

                 </div>
           </div>
       </div>
    </div>
</div>


@endsection
