

@extends('adminlte::page')
@section('title', 'Listing quote')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')

<input type="hidden" id="user-id" value="{{$user->id}}">
<div class="card">
   <div class="card-header">
      <div class="row">
         <div class="col-6">
            <h3 class="card-title">{{$pageTabTitle}}</h3>
         </div>
         <div class="col-6">
            <select class="form-control " id="documentState"  onchange="reloadTabData()">
            
               <option value="ALL" > ALL</option>
               @isClient
               <option value="DRAFT" > DRAFT</option>
               @endisClient
               <option value="ARCHIVED" > ARCHIVED</option>
               <option value="TRAITED" > TRAITED</option>
               <option value="SENT" > SENT</option>
               <option value="VALIDED" > VALIDED</option>
            </select>
         </div>
      </div>
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0">
      <table class="table table-striped" id="main-table">
         <thead>
            <tr>
               <th>#</th>
               <th>reference</th>
               <th>state</th>
               <th>label</th>
               <th>Desc</th>
             
               <th>company</th>
               <th>Action</th>
            </tr>
         </thead>
      </table>
   </div>
</div>
<!-- /.card-body -->
</div>
@stop
@section('css')
@stop
@section('js')
<script> 

var uID =     $('#user-id').val();

   $(document).ready(function () {   
         seedTabData();   
         
         

      });
   

   function seedTabData(){
         $('#main-table').DataTable( {
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
          "ajax": "{{route('listing-json-quote' )}}",
         data:{
            "UID" : uID,
         },
          "processing": true,
          retrieve: true,
         paging: false,
          "serverSide": true,
          select: true,
          "columns": [
           { "data": "DT_RowId" },
           { "data": "reference" },
              { "data": "state" },
              { "data": "label" },
              { "data": "description" },           
              { "data": "company" },
              {"render":function(data, type, row, meta){
                var link =  window.location + '/single/'+ row.quote_id ;
                return "<a class='btn btn-block btn-info' href='"+link+"'> Detail </a> "; 
              }},
          ],
  
  
      } );
  
      }
     



   function reloadTabData(){
   
      var  choiceState = document.getElementById('documentState');

      if(choiceState.value == "ALL"){
         $('#main-table').dataTable().fnDestroy();
         seedTabData();
      }

    else{
      $('#main-table').dataTable().fnDestroy();
      $('#main-table').DataTable( {
         retrieve: true,
       paging: false,
          "ajax": '/quotes/json/index-quote-state/'+choiceState.value,
        
          "processing": true,
          "serverSide": true,
          select: true,
          "columns": [
           { "data": "DT_RowId" },
           { "data": "reference" },
              { "data": "state" },
              { "data": "label" },
              { "data": "description" },
             
              { "data": "company" },
   
              {"render":function(data, type, row, meta){
                var link =  window.location + '/single/'+ row.quote_id ;
                return "<a class='btn btn-block btn-info' href='"+link+"'> Detail </a> "; 
              }},
          ],
   
   
      } );
    }
      
   
   }
   
</script>
@stop

