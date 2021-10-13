

@extends('adminlte::page')
@section('title', 'Single Company')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<div class="row">
   <div class="col-6">
      <div class="card">
         <h3 class="card-title">           {{$company->name}}</h3>
         {{$company}}
      </div>
   </div>
   <!-- end col -->
   <div class="col-6">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">    Employe </h3>
         </div>
         <div class="card-body">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th> id </th>
                     <th> name </th>
                     <th> firstname</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @forelse($company->companyEmploye as $data)
                  <tr>
                     <td> {{$data->users->id}} </td>
                     <td> {{$data->users->name}} </td>
                     <td> {{$data->users->firstname}} </td>
                     <td>
                        <form method="post" action="{{route('remove-employe', $data )}}">
                           @method('put')
                           @csrf
                           <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                           Remove </button>
                        </form>
                     </td>
                  </tr>
               </tbody>
               @empty
               no employe
               @endforelse
            </table>
         </div>
         <!-- end card body -->
      </div>
   </div>
   <!-- end col -->
</div>
<!-- end row -->
<div class="row">
   <div class="col-12">
      <div class="btn-group">
         <form method="post" action="{{route('archive-company', $company )}}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger " style="margin-right: 5px;">
            <i class="fa fa-download"></i>Archive Company</button>
         </form>
         <form method="post" action="{{route('enable-company', $company )}}">
            @csrf
            <button type="submit" class="btn btn-success " style="margin-right: 5px;">
            <i class="fa fa-download"></i>Enable Company</button>
         </form>
         <!--   Add service -->
         <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-default">
         <i class="fa fa-download"></i> Add Employe
         </button>
      </div>
      <!-- end btn group-->
   </div>
   <!-- end col-12 -->
</div>
<!-- end row -->
<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add new employe</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" role="form" action="{{ route('assign-employe', ) }}">
               {{csrf_field()}}
               <input type ="hidden" id="company_id" name="company_id" value="{{$company->id}}"> 
               <select id="selectUser"  class=" js-data-example-ajax form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="user_id" >               
               </select>
               <br>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> 
   $('#selectUser').select2({
    ajax: {
        url:"{{route('s2-user-employable' )}}",
        processResults: function (data){
                   return {
                       results: $.map(data, function(item) {
                           return {
                               text : item.name + ' ' + item.firstname,
                               id: $.parseJSON(item.id ),
                           }
                       } )
                   }
               }
           }
       });   
   
   
   
</script>
@stop

