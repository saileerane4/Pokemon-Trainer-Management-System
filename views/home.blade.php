@extends('layouts.app')

@section('content')

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

tr:nth-child(even){background-color: #f2f2f2}

td{
    font-size: 25px;

  }
  th {
    background-color: #4CAF50;
    color: white;
    font-size: 30px;
}

</style>

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
          @if(Session::has('sailee_msg'))
              <div class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp <em>{!! session('sailee_msg')!!}</em></div>
              @endif
            <div class="panel panel-default">
                <div class="panel-heading"><a href="profile">My Profile </a>   &nbsp &nbsp &nbsp <a href="deletepok">Delete Pokemon</a> @if(Auth::user()->admin==1)  &nbsp &nbsp &nbsp <a href="editpok">Edit User Profile</a>
                   @endif </div>

                <div class="panel-body">
                  @if (Auth::user()->name!=''&& Auth::user()->email!='' && Auth::user()->hometown!='N/A')
                <table class="table table-default">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Home</th>
                    <th>No. of Pokemon</th>

                    <th>Pokemon Name </th>
                    <th> Is Admin</th>
                  </tr>
                  @foreach(App\User::all() as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->hometown}}</td>
                      <td><?php echo count(App\User::find($user->id)->pokemon);?></td>
                      <td>
                        <?php
                        foreach($user->pokemon as $eachPoke){
                          echo  $eachPoke->name . "   ";
                          }
                        ?>
                      </td>
                       <?php if($user->admin == 1): ?>
                      <td>YES</td>
                        <?php else: ?>
                      <td>NO</td>
                        <?php endif; ?>

                      </tr>
                  @endforeach

                </table>
                @else
                    <div>
                         Please Edit your porfile.
                    </div>

                    <div>
                      <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Home Town</th>
                            <th>No of Pokemons</th>
                            <th>Pokemon Name</th>

                        </tr>
                        <tr>
                          <td>N/A</td>
                          <td>N/A</td>
                          <td>N/A</td>
                          <td>N/A</td>
                          <td>N/A</td>
                        </tr>
                      </table>
                    </div>
                @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
