


@extends('adminlte::page')
@section('title', 'Listing quote')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<div class="card">
  
<table>

<thead>
    <tr>
    <th> Name </th>
    <th> URL </th>
    <tr>
</thead>
@forelse($notifications as $data)
<tr>

    <td>{{$data->data['label']}}</td>
<td> <a href="{{$data->data['url']}}"> Link </a> </td>

@empty
no notifications
@endforelse
</tr>
</table>
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')

<script> 


</script>
@stop

