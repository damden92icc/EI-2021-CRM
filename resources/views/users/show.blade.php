@extends('adminlte::page')

@section('title', 'Listing User')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')

    <h2> User -     {{$user->name }}  {{$user->firstname }} </h2>
    {{$user}}
  
    <h2> Employements </h2>
   
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$pageTabTitle}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>                     
                      <th>Role</th>
                      <th>Company</th>                      
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                  @forelse($employements as $data)
                  <tr>
                      <td>   {{$data->role->label}}    </td>
                      <td>        {{$data->company->name}}    </td>                       
                    </tr>
                @empty
                    <td colspan="2">No role in any company</td>
                @endforelse
                
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>



        <!--    <a class="btn btn-block btn-info" href="{{route('assign-company', $user->id )}}">Assign role and  Company</a> -->

            @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> 



</script>


@stop
