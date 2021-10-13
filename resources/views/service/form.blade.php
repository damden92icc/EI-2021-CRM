

@extends('adminlte::page')
@section('title', 'Create service')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<form method="POST" role="form" action="{{ isset($service) ? route('update-service', $service) : route('store-service') }}">
   @isset($service)
   @method('put')
   @endisset
   {{csrf_field()}}
   <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
      <label for="serviceLabel">Service label</label>
      <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($service) ? $service->label: old('label') }}" placeholder="service name">
      @if($errors->has('label'))
      <strong> {{$errors->first('label')}}</strong>
      @endif
   </div>
   <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
      <label for="servicedescription">Service description</label>
      <input class="form-control form-control-lg" type="text" id="description" name="description" value="{{ isset($service) ? $service->description: old('description') }}" placeholder="service description">
      @if($errors->has('description'))
      <strong> {{$errors->first('description')}}</strong>
      @endif
   </div>
   <div class="form-group">
      <label for="inputReccurent">Service is recurrent</label>
      @if(isset($service))
      @if($service->recurrent == 0)
      <select class="form-control" id="recurrent-service" name="recurrent">
         <option value="0" id="0" selected> False</option>
         <option value="1" id="1"> True </option>
      </select>
      @else
      <select class="form-control" id="recurrent-service" name="recurrent">
         <option value="0" id="0"> False</option>
         <option value="1" id="1"  selected> True </option>
      </select>
      @endif
      @else
      <select class="form-control" id="recurrent-service" name="recurrent">
         <option value="0" id="0"> False</option>
         <option value="1" id="1"> True </option>
      </select>
      @endif
   </div>
   <div class="form-group">
      <label for="inputReccurent">Service Active</label>
      @if(isset($service))
      @if($service->active == 0)
      <select class="form-control" id="active" name="active">
         <option value="0" id="0" selected> False</option>
         <option value="1" id="1"> True </option>
      </select>
      @else 
      <select class="form-control" id="active" name="active">
         <option value="0" id="0"> False</option>
         <option value="1" id="1" selected> True </option>
      </select>
      @endif 
      @else 
      <select class="form-control" id="active" name="active">
         <option value="0" id="0"> False</option>
         <option value="1" id="1"> True </option>
      </select>
      @endif      
   </div>
   <div class="form-group {{$errors->has('validity_delay') ? 'has-error' : ''}} ">
      <label for="serviceValidity">Default validity delay</label>
      @if(isset($service))
      <input class="form-control form-control-lg" type="number" id="validity_delay" name="validity_delay" value="{{ isset($service) ? $service->validity_delay: old('validity_delay') }}" placeholder="{{$service->validity_delay}}">
      @else
      <input class="form-control form-control-lg" type="number" id="validity_delay" name="validity_delay" value="{{ isset($service) ? $service->validity_delay: old('validity_delay') }}" placeholder="service validity">
      @endif
      @if($errors->has('validity_delay'))
      <strong> {{$errors->first('validity_delay')}}</strong>
      @endif
   </div>
   <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}} ">
      <select class="form-control" id="category_id" name="category_id">
         @forelse($categories as $data )
         <option value="{{$data->id}}" id="{{$data->id}}" > {{$data->label}}</option>
         @empty
         no categories
         @endforelse
      </select>
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

