

@extends('adminlte::page')
@section('title', 'Listing quote')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
        
<div class="card">
   <table class="table table-striped" id="main-table">
      <thead>
         <tr>
            <th> Name </th>
            <th> URL </th>
            <th> Created at </th>
         </tr>
      </thead>
      <tbody>
         @forelse($notifications as $data)
         <tr>
            <td>{{$data->data['label']}}</td>
            <td>
               <div class="btn-group">
                  <a class="btn  btn-info" href="{{$data->data['url']}}">view</a>
                  @if($data->read_at == null )
                  <a class="btn  btn-danger" href="{{route('mark-notif-as-view', $data->id )}}">Marsk as read</a>
                  @endif
               </div>
            </td>
            <td> {{$data->created_at}} </td>
            @empty
            no notifications
            @endforelse
      <tbody>
         </tr>
   </table>
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> 
   $(document).ready( function () {
   $('#main-table').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
   } );
</script>
@stop

