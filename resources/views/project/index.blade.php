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
              <table class="table table-striped" id="main-table">
                  <thead>
                    <tr>
                     
                      <th>ID</th>
                      <th>Reference</th>
                      <th>State</th>
                      <th>name</th>
                      <th>Desc</th>                  
                      <th>Company</th>
                      <th>Created on </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($projects as $data)
                    <tr>
                      <td> {{$data->id}} </td>
                      <td> {{$data->reference}} </td>
                      <td> {{$data->project_state}} </td>
                      <td> {{$data->label}} </td>
                      <td> {{ \Illuminate\Support\Str::limit($data->description, 30, $end='...') }} </td>
                 
                      <td> {{$data->company->name}} </td>
                      <td> {{ \Illuminate\Support\Str::limit($data->created_at, 10, $end='') }} </td>
                     <td>
                         <a class="btn btn-block btn-info" href="{{route('single-project', $data->id )}}">view</a>
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
