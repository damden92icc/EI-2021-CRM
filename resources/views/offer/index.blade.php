@extends('adminlte::page')

@section('title', 'Listing quote')

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
                      <th>Desc</th>
                      <th>State</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($offers as $data)
                    <tr>
                      <td> {{$data->id}} </td>
                      <td> {{$data->label}} </td>
                      <td> {{$data->description}} </td>
                      <td> {{$data->offer_state}} </td>
                      
                     <td>
                         <a class="btn btn-block btn-info" href="{{route('single-offer', $data->id )}}">view</a>
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
