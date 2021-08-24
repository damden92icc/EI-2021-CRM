@extends('adminlte::page')

@section('title', 'Dashboard')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
        


    <form method="POST" role="form" action="{{ isset($company) ? route('update-company', $company) : route('store-company') }}">

    @isset($company)
                  @method('put')
                  @endisset
    {{csrf_field()}}

    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} ">
            <label for="companyName">Company name</label>
                    <input class="form-control form-control-lg" type="text" id="name" name="name" value="{{ isset($company) ? $company->name: old('name') }}" placeholder="company name">
                        @if($errors->has('name'))
                        <strong> {{$errors->first('name')}}</strong>
                        @endif
     </div>


     <div class="form-group {{$errors->has('vat') ? 'has-error' : ''}} ">
            <label for="companyVAT">Company vat</label>
                    <input class="form-control form-control-lg" type="text" id="vat" name="vat" value="{{ isset($company) ? $company->vat: old('vat') }}" placeholder="company vat">
                        @if($errors->has('vat'))
                        <strong> {{$errors->first('vat')}}</strong>
                        @endif
     </div>


     <div class="form-group {{$errors->has('street_name') ? 'has-error' : ''}} ">
            <label for="companyStreetName">Company street_name</label>
                    <input class="form-control form-control-lg" type="text" id="street_name" name="street_name" value="{{ isset($company) ? $company->street_name: old('street_name') }}" placeholder="company street_name">
                        @if($errors->has('street_name'))
                        <strong> {{$errors->first('street_name')}}</strong>
                        @endif
     </div>



     <div class="form-group {{$errors->has('street_number') ? 'has-error' : ''}} ">
            <label for="companyStreetNumber">Company street_number</label>
                    <input class="form-control form-control-lg" type="text" id="street_number" name="street_number" value="{{ isset($company) ? $company->street_number: old('street_number') }}" placeholder="company street_number">
                        @if($errors->has('street_number'))
                        <strong> {{$errors->first('street_number')}}</strong>
                        @endif
     </div>

     <div class="form-group {{$errors->has('zip_code') ? 'has-error' : ''}} ">
            <label for="companyZIP">Company zip_code</label>
                    <input class="form-control form-control-lg" type="text" id="zip_code" name="zip_code" value="{{ isset($company) ? $company->zip_code: old ('zip_code') }}" placeholder="companzip_code">
                        @if($errors->has('zip_code'))
                        <strong> {{$errors->first('zip_code')}}</strong>
                        @endif
     </div>



     <div class="form-group {{$errors->has('locality') ? 'has-error' : ''}} ">
            <label for="companyLocality">Company locality</label>
                    <input class="form-control form-control-lg" type="text" id="locality" name="locality" value="{{ isset($company) ? $company->locality: old ('locality') }}" placeholder="company_locality">
                        @if($errors->has('locality'))
                        <strong> {{$errors->first('locality')}}</strong>
                        @endif
     </div>


     <div class="form-group {{$errors->has('email') ? 'has-error' : ''}} ">
            <label for="companyEmail">Company email</label>
                    <input class="form-control form-control-lg" type="text" id="email" name="email" value="{{ isset($company) ? $company->email : old ('email') }}" placeholder="company_email">
                        @if($errors->has('email'))
                        <strong> {{$errors->first('email')}}</strong>
                        @endif
     </div>

     <div class="form-group {{$errors->has('company_type') ? 'has-error' : ''}} ">
            <label for="companyType">Company company_type</label>
                    <input class="form-control form-control-lg" type="text" id="company_type" name="company_type" value="{{ isset($company) ? $company->company_type : old ('company_type') }}" placeholder="company_type">
                        @if($errors->has('company_type'))
                        <strong> {{$errors->first('company_type')}}</strong>
                        @endif
     </div>


     <div class="form-group {{$errors->has('active') ? 'has-error' : ''}} ">
            <label for="companyActive">Company active</label>
                    <input class="form-control form-control-lg" type="text" id="active" name="active" value="{{ isset($company) ? $company->active : old ('active') }}" placeholder="active">
                        @if($errors->has('active'))
                        <strong> {{$errors->first('active')}}</strong>
                        @endif
     </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>




    @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
