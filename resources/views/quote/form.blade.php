

@extends('adminlte::page')
@section('title', 'Create quote')
@section('content_header')
@stop
@section('content')
<br>
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{$pageTitle}} </h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <form method="POST" role="form" action="{{ isset($quote) ? route('update-quote', $quote) : route('store-quote') }}">
         @isset($quote)
         @method('put')
         @endisset
         {{csrf_field()}}
         <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
            <label for="quoteLabel">Quote label</label>
            <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($quote) ? $quote->label: old('label') }}" placeholder="quote name">
            @if($errors->has('label'))
            <strong> {{$errors->first('label')}}</strong>
            @endif
         </div>
         <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
            <label for="quoteDesc">Quote description</label>
        
            <textarea class="form-control form-control-lg" rows="3" type="text" id="description" name="description" value="{{ isset($quote) ? $quote->description: old('description') }}" placeholder="quote description">
            
            
            @isset($quote)
            {{$quote->description}}
            @endisset
         </textarea>
            @if($errors->has('description'))
            <strong> {{$errors->first('description')}}</strong>
            @endif
         </div>
         <div class="form-group  {{$errors->has('concerned_company') ? 'has-error' : ''}}">
            <label for="inputCompany">Company</label>
            <select class="form-control" id="selectCompanyValue" name="concerned_company">
               @foreach ($user->employes as $data)
               <option value="{{$data->company->id}}" id="{{$data->company->id}}"> {{$data->company->name}}</option>
               @endforeach
            </select>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
   <!-- /.card-body -->
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> </script>
@stop

