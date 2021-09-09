

@extends('adminlte::page')
@section('title', 'Listing User')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{$pageTitle}} </h3>
   </div>

   <form method="POST" role="form" action="{{ route('store-my-profil')  }}">
      @isset($user)
      @method('put')
      @endisset
      {{csrf_field()}}
      <div class="card-body">
         <div class="row">
            <div class="col-6">
               <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} ">
                  <label for="Username">Name</label>
                  <input class="form-control form-control-lg" type="text" id="name" name="name" value="{{ isset($user) ? $user->name: old('name') }}" placeholder="user name">
                  @if($errors->has('name'))
                  <strong> {{$errors->first('name')}}</strong>
                  @endif
               </div>
            </div>
            <div class="col-6">
               <div class="form-group {{$errors->has('firstname') ? 'has-error' : ''}} ">
                  <label for="Userfirstname">Firstname</label>
                  <input class="form-control form-control-lg" type="text" id="firstname" name="firstname" value="{{ isset($user) ? $user->firstname: old('firstname') }}" placeholder="user first name">
                  @if($errors->has('firstname'))
                  <strong> {{$errors->first('firstname')}}</strong>
                  @endif
               </div>
            </div>
            <div class="col-3">
               <div class="form-group {{$errors->has('phone') ? 'has-error' : ''}} ">
                  <label for="UserPhone">Phone </label>
                  <input class="form-control form-control-lg" type="text" id="phone" name="phone" value="{{ isset($user) ? $user->phone: old('phone') }}" placeholder="user phone">
                  @if($errors->has('phone'))
                  <strong> {{$errors->first('phone')}}</strong>
                  @endif
               </div>
            </div>
            <div class="col-3">
               <div class="form-group {{$errors->has('mobile') ? 'has-error' : ''}} ">
                  <label for="userMobile">Mobile </label>
                  <input class="form-control form-control-lg" type="text" id="mobile" name="mobile" value="{{ isset($user) ? $user->mobile: old('mobile') }}" placeholder="user mobile">
                  @if($errors->has('mobile'))
                  <strong> {{$errors->first('mobile')}}</strong>
                  @endif
               </div>
            </div>


            <div class="col-3">
            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}} ">
            <label for="UserPassword">User password </label>
                    <input class="form-control form-control-lg" type="password" id="password" name="password" value="{{ isset($user) ? $user->password: old('password') }}" placeholder="user password">
                        @if($errors->has('password'))
                        <strong> {{$errors->first('password')}}</strong>
                        @endif
     </div>
   
</div>
<button type="submit" class="btn btn-primary">Submit</button>  
   </form>
   </div>   <!-- / row -->
   </div>  <!-- /.card-body -->
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> </script>
@stop

