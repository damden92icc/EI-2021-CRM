

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
   <form method="GET" id="doc-filter" action="{{route('listing-my-quote-by-state', 'ALL')}}">

                        <select class="form-control" id="state" name="state">
                        
                                 <option value="ALL" id="ALL"> ALL</option>
                                 <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
                                 <option value="DRAFT" id="DRAFT"> DRAFT</option>         
                                 <option value="SENDED" id="SENDED"> SENDED</option>                            
                              </select>
                 
                     </form>
                     @endisClient
</div>
</div>

           
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0">
      
   <table class="table table-striped" id="main-table">
         <thead>
            <tr>
               <th>num</th>
               <th>name</th>
               <th>Desc</th>
               <th>Company</th>
               <th> Created Date </th>
               <th>Last update</th>
               <th>State</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @foreach($quotes as $data)
            <tr>
            <td> {{$data->id}} </td>
               <td> {{$data->label}} </td>
               <td> {{ \Illuminate\Support\Str::limit($data->description, 30, $end='...') }}</td>
               <td> {{$data->company->name}} </td>      
               <td> {{ \Illuminate\Support\Str::limit($data->updated_at, 10, $end='') }}</td>
               <td> {{ \Illuminate\Support\Str::limit($data->updated_at, 10, $end='') }}</td>           
               <td> {{$data->quote_state}} </td>
               <td>
                  <div class="btn-group">
                     <a class="btn btn-block btn-info" href="{{route('single-quote', $data->id )}}">view</a>
                     @isClient
                     <!--  Update Quote -->
                     <form method="get" action="{{route('edit-quote', $data )}}">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                        Update  </button>
                     </form>
                     <!--  Update Quote -->
                     @endisClient
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
     
    </div>
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



// Display current selected state by checking paramter
$(function() {

   var e = document.getElementById("state");
   
   if( document.URL == 'http://127.0.0.1:8000/quotes/'){
      var param ="";
   }
   else{

      var param  = (document.URL.replace('http://127.0.0.1:8000/quotes/states=', ''));

      $("#state").val(param);
   }


   $(e).change(function() {
   $("#doc-filter").submit();

   });

});


</script>
@stop

