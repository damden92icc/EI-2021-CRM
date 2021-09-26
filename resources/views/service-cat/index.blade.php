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
                
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($services as $service)
                    <tr>
                      <td> {{$service->id}} </td>
                      <td> {{$service->label}} </td>
                      <td> {{$service->description}} </td>
                    
                      <td>
                        <div class="btn-group">                  
                    
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
