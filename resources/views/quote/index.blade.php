

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





</script>
@stop

