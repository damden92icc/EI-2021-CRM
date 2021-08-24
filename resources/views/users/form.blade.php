@extends('adminlte::page')

@section('title', 'Listing User')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
    <form method="POST" role="form" action="{{ isset($user) ? route('update-user', $user) : route('store-user') }}">
    @isset($$user)
                  @method('put')
                  @endisset
    {{csrf_field()}}

    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} ">
            <label for="Username">User name</label>
                    <input class="form-control form-control-lg" type="text" id="name" name="name" value="{{ isset($user) ? $user->name: old('name') }}" placeholder="user name">
                        @if($errors->has('name'))
                        <strong> {{$errors->first('name')}}</strong>
                        @endif
     </div>

     <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}} ">
            <label for="Userfirstname">User firstname</label>
                    <input class="form-control form-control-lg" type="text" id="firstname" name="firstname" value="{{ isset($user) ? $user->firstname: old('firstname') }}" placeholder="user first name">
                        @if($errors->has('firstname'))
                        <strong> {{$errors->first('firstname')}}</strong>
                        @endif
     </div>





     <div class="form-group {{$errors->has('email') ? 'has-error' : ''}} ">
            <label for="userEmail">User email </label>
                    <input class="form-control form-control-lg" type="text" id="email" name="email" value="{{ isset($user) ? $user->email: old('email') }}" placeholder="user email">
                        @if($errors->has('email'))
                        <strong> {{$errors->first('email')}}</strong>
                        @endif
     </div>


     <div class="form-group {{$errors->has('password') ? 'has-error' : ''}} ">
            <label for="UserPassword">User password </label>
                    <input class="form-control form-control-lg" type="text" id="password" name="password" value="{{ isset($user) ? $user->password: old('password') }}" placeholder="user password">
                        @if($errors->has('password'))
                        <strong> {{$errors->first('password')}}</strong>
                        @endif
     </div>
     



     <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}} ">
            <label for="UserPhone">User phone </label>
                    <input class="form-control form-control-lg" type="text" id="phone" name="phone" value="{{ isset($user) ? $user->phone: old('phone') }}" placeholder="user phone">
                        @if($errors->has('phone'))
                        <strong> {{$errors->first('phone')}}</strong>
                        @endif
     </div>
     



     <div class="form-group {{$errors->has('mobile') ? 'has-error' : ''}} ">
            <label for="userMobile">User mobile </label>
                    <input class="form-control form-control-lg" type="text" id="mobile" name="mobile" value="{{ isset($user) ? $user->mobile: old('mobile') }}" placeholder="user mobile">
                        @if($errors->has('mobile'))
                        <strong> {{$errors->first('mobile')}}</strong>
                        @endif
     </div>
     


     <div class="form-group  {{$errors->has('role_id') ? 'has-error' : ''}}">
          <label for="inputRole">Role</label>
          <select class="form-control" id="selectRoleValue" name="role_id">
            @foreach ($roles as $role)
            <option value="{{$role->id}}" id="{{$role->id}}"> {{$role->label}}</option>
            @endforeach
          </select>
        </div>



     <div class="form-group  {{$errors->has('company_id') ? 'has-error' : ''}}">
          <label for="inputCompany">Company</label>
          <select class="form-control" id="selectCompanyValue" name="company_id">
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
