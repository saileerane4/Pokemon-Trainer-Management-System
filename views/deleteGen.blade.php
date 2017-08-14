@extends('layouts.app')

@section('content')

<style>
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

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-head">
                  Delete Pokemon from the list below
                </div>

    <div class="panel-body">
    <div class="deleteFunct">

      <form action="deletepoke" method="POST" id="pokedelete">
        <select name="pokemdelete" class="form-control" form="pokedelete">
               <option value ="None">None</option>
            @foreach($usr->pokemon as $i)
            <option value={{$i->id}}>{{$i->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="delete" class="btn btn-default" >
        <input type="hidden" name="_token" value={{csrf_token()}}>
      </form>

    </div>
  </div>
  </div>
</div>
</div>

</div>

@endsection
