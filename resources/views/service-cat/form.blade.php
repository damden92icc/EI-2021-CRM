

@extends('adminlte::page')
@section('title', 'Create service')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<form method="POST" role="form" action="{{ isset($serviceCat) ? route('update-service-cat', $serviceCat) : route('store-service-cat') }}">
   @isset($serviceCat)
   @method('put')
   @endisset
   {{csrf_field()}}
   <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
      <label for="serviceLabel">Service label</label>
      <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($serviceCat) ? $serviceCat->label: old('label') }}" placeholder="service name">
      @if($errors->has('label'))
      <strong> {{$errors->first('label')}}</strong>
      @endif
   </div>
   <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
      <label for="servicedescription">Service description</label>
      <input class="form-control form-control-lg" type="text" id="description" name="description" value="{{ isset($serviceCat) ? $serviceCat->description: old('description') }}" placeholder="service description">
      @if($errors->has('description'))
      <strong> {{$errors->first('description')}}</strong>
      @endif
   </div>


   <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> </script>
@stop

