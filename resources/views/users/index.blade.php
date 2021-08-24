@extends('adminlte::page')

@section('title', 'Listing User')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
    
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$pageTabTitle}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     
                      <th>ID</th>
                      <th>name</th>
                      <th>Firstname</th>
                     
                      <th>Email</th>
                  
                      <th>State</th>
                      <th>role</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td> {{$user->id}} </td>
                      <td> {{$user->name}} </td>
                      <td> {{$user->firstname}} </td>
                      <td> {{$user->email}} </td>
                      <td> {{$user->user_state}} </td>
                      <td>
                   
                      <ul>
                      @forelse($user->employes as $e)
                    
                          <li> {{$e->role->label}} -  {{$e->company->name}} </li>                  
                      @empty
                           <li> No role in any company</li>
                      @endforelse
                </ul>

                     <td>
                     <a class="btn btn-block btn-info" href="{{route('single-user', $user->id )}}">view</a>
</td>

                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>


              </div>
              
              <!-- /.card-body -->
            </div>
    @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
