


@extends('adminlte::page')
@section('title', 'Listing quote')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<div class="card">
  



@forelse($notifications as $data)

{{$data->data['label']}}


@empty
no notifications
@endforelse
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')

<script> 


</script>
@stop

