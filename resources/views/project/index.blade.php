@extends('adminlte::page')

@section('title', 'Listing quote')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
    
@isManager
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
@endisManager


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
                      <th>State</th>
                      <th>Company</th>
                      <th>Created on </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($projects as $data)
                    <tr>

                      <td> {{$data->id}} </td>
                      <td> {{$data->label}} </td>
                      <td> {{ \Illuminate\Support\Str::limit($data->description, 30, $end='...') }} </td>
                      <td> {{$data->project_state}} </td>
                      <td> {{$data->company->name}} </td>
                      <td> {{ \Illuminate\Support\Str::limit($data->created_at, 30, $end='...') }} </td>
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
