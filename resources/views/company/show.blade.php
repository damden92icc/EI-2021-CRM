@extends('adminlte::page')

@section('title', 'Single Company')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
        
        {{$company}}


        <form method="post" action="{{route('archive-company', $company )}}">
        @method('delete')
                           @csrf
                           <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">
                           <i class="fa fa-download"></i>Archive Company</button>
                        </form>




                        <form method="post" action="{{route('enable-company', $company )}}">
        
                           @csrf
                           <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">
                           <i class="fa fa-download"></i>Enable Company</button>
                        </form>
    @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
