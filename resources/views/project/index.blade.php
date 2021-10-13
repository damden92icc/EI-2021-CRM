@extends('adminlte::page')
@section('title', 'Listing Projects')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')

@isManager
<div class="row">
          <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{$totalAP}}</h3>

                <p>Active Project</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
          
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$totalAS}}</h3>

                <p>Active service</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            
            </div>
          </div>
             <!-- ./col -->
             <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$cptClient}}</h3>

                <p>Number of clients</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
           <!-- .col -->
           <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$totalCostAS}} €</h3>

                <p>Total Cost</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$totalSellAS}} €</h3>

                <p>Total Sell</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
         
           <!-- ./col -->
           <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalSellAS -  $totalCostAS }}</h3>

                <p>Total Benefice</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
        
              <!-- ./col -->
              <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$cptBillableService}}</h3>

                <p>Billable Service</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$totalSellPriceBillable}} €</h3>

                <p>Billable This month</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-4 col-4">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$totalCostPriceBillable}} €</h3>

                <p>Cost This month</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
        </div> <!-- end row -->
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

