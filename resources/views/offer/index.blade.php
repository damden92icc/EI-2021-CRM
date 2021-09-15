@extends('adminlte::page')

@section('title', 'Listing quote')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
    
    <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-6">
        <h3 class="card-title">{{$pageTabTitle}}</h3>
</div>
<div class="col-6">
@isClient
                <div class="button-group">
                <form method="get" id="doc-filter" action="{{route('my-offer-by-state')}}">
                        @csrf
                        <select class="form-control" id="state" name="state">
                                 <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
                                 <option value="DRAFT" id="DRAFT"> DRAFT</option>         
                                 <option value="SENDED" id="SENDED"> SENDED</option>                            
                              </select>
                           
                     </form>
</div>
                     @endisClient


                     @isManager
                     <form method="get" action="{{route('all-offer-by-state')}}">
                        @csrf
                        <select class="form-control" id="state" name="state">
                                 <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
                                 <option value="ACCEPTED" id="ACCEPTED"> ACCEPTED</option>         
                                 <option value="SENDED" id="SENDED"> SENDED</option>  
                                 <option value="VALIDED" id="VALIDED"> VALIDED</option>           
                                 <option value="UPDATE ASKED" id="UPDATE ASKED"> UPDATE ASKED</option>                           
                              </select>
                              <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
     @endisManager    
</div>
</div>
             
             
                  
     
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="main-table">
                  <thead>
                    <tr>
                    
                      <th >ID</th>
                      <th>name</th>
                      <th>Desc</th>
                      <th>Last update</th>
                      <th>State</th>
                      <th> Due Date </th>
                      <th> Company </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($offers as $data)
                    <tr>
                      <td> {{$data->id}} </td>
                      <td> {{$data->label}} </td>
                      <td> {{ \Illuminate\Support\Str::limit($data->description, 30, $end='...') }}</td>
                      <td> {{ \Illuminate\Support\Str::limit($data->updated_at, 10, $end='') }}</td>
                    
                      <td> {{$data->offer_state}} </td>
                      <td> {{$data->due_date}} </td>
                      <td> {{$data->company->name}} </td>
                      
                     <td>
                     <div class="btn-group">
                         <a class="btn btn-block btn-info" href="{{route('single-offer', $data->id )}}">view</a>

                         @isManager
                          <!--  Update offer -->
                     <form method="get" action="{{route('edit-offer', $data )}}">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                        Update  </button>
                     </form>
                     <!--  Update offer -->
                         @endisManager
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



$(function() {
   $("#doc-filter").change(function() {
     $("#doc-filter").submit();
   });
 });

</script>

@stop
