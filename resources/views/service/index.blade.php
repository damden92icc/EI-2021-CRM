@extends('adminlte::page')

@section('title', 'Listing service')

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
                <table class="table table-striped" id="main-table">
                  <thead>
                    <tr>
                     
                      <th>ID</th>
                      <th>name</th>
                      <th>Desc</th>
                      <th>Is Recurrent</th>
                      <th>Active</th>
                      <th> Validity Delay </th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($services as $service)
                    <tr>
                      <td> {{$service->id}} </td>
                      <td> {{$service->label}} </td>
                      <td> {{$service->description}} </td>
                      <td> {{$service->recurrent}} </td>
                      <td> {{$service->active}} </td>
                      <td> {{$service->validity_delay}} </td>
                      <td>
                        <div class="btn-group">
                         <a class="btn btn-inline btn-danger" href="">Archive</a>

          


                         <a class="btn btn-block btn-info" href="{{route('edit-service', $service->id )}}">edit</a>

                         <a class="btn btn-block btn-info" href="{{route('single-service', $service->id )}}">view</a>
                        </div>
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
    <script>
        $(document).ready( function () {
    $('#main-table').DataTable();
} );
    </script>
@stop
