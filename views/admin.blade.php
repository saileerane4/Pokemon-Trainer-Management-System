@extends('layouts.app')
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
      text-align:center;
    padding: 8px;
    border: 1px solid black;

}

td{
        font-size: 25px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
    font-size: 30px;
}

input[type=text], select {
   width: 100%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   font-size:20px;
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

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          @if(Session::has('sailee_msg'))
              <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp <em>{!! session('sailee_msg')!!}</em></div>
              @endif
            <div class="panel panel-default">
                <div class="panel-heading">Admin Page</div>

                <div class="panel-body">

                    <table>
                      <tr>
                        <th text-align="center">&nbsp &nbsp &nbsp &nbsp &nbsp Pokemon Name</th>
                        <th text-align="center">&nbsp &nbsp &nbsp &nbsp &nbsp Number of Owning Trainers</th>
                      </tr>
                      @foreach(App\Pokemon::all() as $eachPoke)
                     <tr>
                          <td>{{ $eachPoke->name}}</td>
                          <td><?php echo count($eachPoke->users);?></td>
                     </tr>
                     @endforeach

                    </table>

                    <br><br>

                    <form action="admin/addnewpokemon" method="POST">
                       <input font-size="25px" type="text" name="newpoki" value="">
                       <input  font-size="25px" type="submit" value="Add Pokemon" class="btn btn-default"></input>
                       <input type="hidden" name="_token" value={{csrf_token()}}>
                    </form>

                    <br>

                    <form action="admin/deletepoke" method="POST" id="pokeform2">
                      <select name="pokemdelete" class="form-control" form="pokeform2">
                          <option font-size="25px" value ="None">None</option>
                          @foreach(App\Pokemon::all() as $i)
                          <option  font-size="25px" value={{$i->id}}>{{$i->name}}</option>
                          @endforeach
                      </select>
                      <input  font-size="25px" type="submit" value="Delete Pokemon" class="btn btn-default" >
                      <input type="hidden" name="_token" value={{csrf_token()}}>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
