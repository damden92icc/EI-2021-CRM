

@extends('adminlte::page')
@section('title', 'Listing quote')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<div class="card">
   <div class="card-header">
      <h3 class="card-title">{{$pageTabTitle}}</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0">
      <table class="table table-striped">
         <thead>
            <tr>
               <th>num</th>
               <th>name</th>
               <th>Desc</th>
               <th>Company</th>
               <th> Created Date </th>
               <th>Last update</th>
               <th>State</th>
            </tr>
         </thead>
         <tbody>
            @foreach($quotes as $data)
            <tr>
               <td> to do</td>
               <td> {{$data->label}} </td>
               <td> {{$data->description}} </td>
               <td> {{$data->company->name}} </td>
               <td> {{$data->created_at}} </td>
               <td> {{$data->updated_at}} </td>
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
   <!-- /.card-body -->
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop

