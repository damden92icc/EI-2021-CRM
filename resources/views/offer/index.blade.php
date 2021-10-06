

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
         <select class="form-control " id="documentState"  onchange="reloadTabData()">
            <option value="ALL" > ALL</option>      
            <option value="ARCHIVE" > ARCHIVE</option>
            <option value="SENT" > SENT</option>
            <option value="ACCEPTED" > ACCEPTED</option>
            <option value="VALIDED" > VALIDED</option>
            <option value="UPDATE ASKED" > UPDATE ASKED</option>
            @isManager
            <option value="DRAFT" > DRAFT</option>             
            @endisManager
            </select>   
         </div>
      </div>
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0">
      <table class="table table-bordered table-striped dataTable dtr-inline" id="main-table">
         <thead>
           
            <tr>
               <th ></th>
               <th> Reference</th> 
               <th>State</th>
               <th>name</th>
               <th>Desc</th>  
               <th> Company </th>
               <th> Due Date </th>
               <th></th>
            </tr>
         </thead>
      
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
     $(document).ready(function () {   
         seedTabData();   
      });
   

   function seedTabData(){
         $('#main-table').DataTable( {
          
          "ajax": "{{route('listing-json-offer' )}}",
        
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
              { "data": "due_date" },
  
              {"render":function(data, type, row, meta){
                var link =  window.location + '/single/'+ row.offer_id ;
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
         "ajax": '/offers/json/index-by-state/'+choiceState.value,
      
         "processing": true,
         "serverSide": true,
         select: true,
         "columns": [
         { "data": "DT_RowId" },
         
            { "data": "label" },
            { "data": "description" },
            { "data": "reference" },
            { "data": "state" },
            { "data": "due_date" },
            { "data": "company" },

            {"render":function(data, type, row, meta){
               var link =  window.location + '/single/'+ row.offer_id ;
               return "<a class='btn btn-block btn-info' href='"+link+"'> Detail </a> "; 
            }},
          ],
   
   
      } );
    }
      
   
   }
</script>
@stop

