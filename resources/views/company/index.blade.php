@extends('adminlte::page')

@section('title', 'Dashboard')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
    
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Striped Full Width Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     
                      <th>ID</th>
                      <th>name</th>
                      <th>VAT</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Active</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($companies as $company)
                    <tr>
                      <td> {{$company->id}} </td>
                      <td> {{$company->name}} </td>
                      <td> {{$company->vat}} </td>
                      <td> {{$company->street_name}} {{$company->street_number}}, {{$company->zip_code}} - {{$company->locality}} </td>
                      <td> {{$company->email}} </td>
                      <td> {{$company->company_type}} </td>
                      <td> {{$company->active}} </td>    
                      <td> <a class="btn btn-block btn-info" href="{{route('single-company', $company->id )}}">view</a> </td>                  
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
