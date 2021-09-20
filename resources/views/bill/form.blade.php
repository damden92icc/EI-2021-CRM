@extends('adminlte::page')

@section('title', 'Create Bill')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')


    <form method="POST" role="form" action="{{ isset($bill) ? route('update-bill', $bill) : route('store-bill') }}">
    @isset($bill)
                  @method('put')
                  @endisset
    {{csrf_field()}}


    <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
            <label for="billLabel">Bill label</label>
                    <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($bill) ? $bill->label: old('label') }}" placeholder="bill name">
                        @if($errors->has('label'))
                        <strong> {{$errors->first('label')}}</strong>
                        @endif
     </div>



     <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
            <label for="billDesc">Bill description</label>
                    <input class="form-control form-control-lg" type="text" id="description" name="description" value="{{ isset($bill) ? $bill->description: old('description') }}" placeholder="bill desc">
                        @if($errors->has('description'))
                        <strong> {{$errors->first('description')}}</strong>
                        @endif
     </div>



        <div class="form-group {{$errors->has('validity_delay') ? 'has-error' : ''}} ">
            <label for="offerValidity"> Validity delay</label>

            <select class="form-control"  id="validity_delay" name="validity_delay">
          
            <option value="15" id="15"> 15</option>
            <option value="30" id="30"> 30</option>
            <option value="60" id="60"> 60</option>
            </select>
     </div>


     <div class="form-group  {{$errors->has('concerned_company') ? 'has-error' : ''}}">
          <label for="inputCompany">Company</label>
          <select class="form-control" id="selectCompanyValue" name="concerned_company">
          
          @isset($currentCompany)
          <option value="{{$currentCompany->id}}" id="{{$bill->concerned_company}}"> {{$currentCompany->name}}</option>
                  @endisset
          
          
         
            @foreach ($companies as $company)

            <option value="{{$company->id}}" id="{{$company->id}}"> {{$company->name}}</option>
            @endforeach
          </select>
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
