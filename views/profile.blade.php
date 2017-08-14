@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          @if(Session::has('sailee_msg'))
              <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp <em>{!! session('sailee_msg')!!}</em></div>
              @endif
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">

                  <form action="retrieve" id="pokeform" method="POST">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" name="name" value="{{$p->name}}" />

                                  </div>
                        </div>
                          <br><br>



                      <div class="form-group">
                          <label for="email" class="col-sm-3 control-label">Email</label>
                              <div class="col-sm-9">
                                  <input type="email" class="form-control" name="email" value="{{$p->email}}" />

                              </div>
                      </div>
                        <br><br>


                      <div class="form-group">
                          <label for="hometown" class="col-sm-3 control-label">Home Town</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="hometown" value="{{$p->hometown}}" />

                              </div>
                      </div>
                        <br><br>

                     <div class="form-group">
                       <label for="pokemon_id" class="col-sm-3 control-label">Add Pokemons</label>
                          <div class="col-sm-9">
                              <select name="pokemon_id" class="form-control" form="pokeform">
                                  <option value="None">None</option>
                                  @foreach($pokemons as $i)
                                  <option value={{$i->id}}>{{$i->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>

                   <br><br>
                      <input type="submit" value="Submit" class="btn btn--primary btn-lg"></input>
                      <input type="hidden" name="_token" value={{csrf_token()}}>
                        <br>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
