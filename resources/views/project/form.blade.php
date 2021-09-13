

@extends('adminlte::page')
@section('title', 'Create Project')
@section('content_header')
<h1> </h1>
@stop
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{$pageTitle}} </h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <form method="POST" role="form" action="{{ isset($project) ? route('update-project', $project) : route('store-project') }}">
         @isset($project)
         @method('put')
         @endisset
         {{csrf_field()}}
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
                  <label for="quoteLabel">project label</label>
                  <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($project) ? $project->label: old('label') }}" placeholder="project name">
                  @if($errors->has('label'))
                  <strong> {{$errors->first('label')}}</strong>
                  @endif
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
                     <label for="quoteDesc">project description</label>
                     <input class="form-control form-control-lg" type="text" id="description" name="description" value="{{ isset($project) ? $project->description: old('description') }}" placeholder="project desc">
                     @if($errors->has('description'))
                     <strong> {{$errors->first('description')}}</strong>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group  {{$errors->has('project_state') ? 'has-error' : ''}}">
                  <label for="inputCompany">State</label>
                  <select class="form-control" id="selectCompanyValue" name="project_state">
                     <option value="running" id="running"> running </option>
                     <option value="archived" id="archived"> archived </option>
                  </select>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group {{$errors->has('start_date') ? 'has-error' : ''}} ">
                  <label for="quoteDesc">project start date</label>
                  <input class="form-control form-control-lg" type="text" id="start_date" name="start_date"  data-date-format="yyyy-mm-dd"  value="{{ isset($project) ? $project->start_date: old('start_date') }}" placeholder="start date">
                  @if($errors->has('start_date'))
                  <strong> {{$errors->first('start_date')}}</strong>
                  @endif
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <!-- textarea -->
               <div class="form-group  {{$errors->has('concerned_company') ? 'has-error' : ''}}">
                  <label for="inputCompany">Company</label>
                  <select class="form-control" id="selectCompanyValue" name="concerned_company">
                     @foreach ($companies as $company)
                     <option value="{{$company->id}}" id="{{$company->id}}"> {{$company->name}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group">
                  <!-- ------------------------------------ -->
               </div>
            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script> 

$(function() {
     format: 'mm-dd-yyyy',
           $( "#start_date" ).datepicker();
         });
</script>
@stop

