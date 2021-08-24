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
                    <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($service) ? $user->label: old('label') }}" placeholder="service name">
                        @if($errors->has('label'))
                        <strong> {{$errors->first('label')}}</strong>
                        @endif
     </div>


     <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
            <label for="servicedescription">Service description</label>
                    <input class="form-control form-control-lg" type="text" id="description" name="description" value="{{ isset($service) ? $user->description: old('description') }}" placeholder="service description">
                        @if($errors->has('description'))
                        <strong> {{$errors->first('description')}}</strong>
                        @endif
     </div>


     <div class="form-group">
     <label for="inputReccurent">Service recurrent</label>
          <select class="form-control" id="recurrent" name="recurrent">

            <option value="0" id="0"> False</option>
            <option value="1" id="1"> True </option>

          </select>
        </div>

        <div class="form-group">
        <label for="inputReccurent">Service Active</label>
          <select class="form-control" id="active" name="active">

            <option value="0" id="0"> False</option>
            <option value="1" id="1"> True </option>

          </select>
        </div>



     <div class="form-group {{$errors->has('validity_delay') ? 'has-error' : ''}} ">
            <label for="serviceValidity">Service validity_delay</label>
                    <input class="form-control form-control-lg" type="text" id="validity_delay" name="validity_delay" value="{{ isset($service) ? $user->validity_delay: old('validity_delay') }}" placeholder="service validity">
                        @if($errors->has('validity_delay'))
                        <strong> {{$errors->first('validity_delay')}}</strong>
                        @endif
     </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> 



</script>


@stop
