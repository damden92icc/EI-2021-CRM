@extends('adminlte::page')

@section('title', 'My Profil')

    @section('content_header')
    <h1> {{$pageTitle}} -  {{$user->name }}  {{$user->firstname }}  </h1>
    @stop

    @section('content')

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               

                <h3 class="profile-username text-center">  {{$user->name }}  {{$user->firstname }} </h3>

                <p class="text-muted text-center">{{$user->role->label}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email : </b> <p>{{$user->email}}</p>
                  </li>
                  <li class="list-group-item">
                    <b>Phone : </b>  <p>{{$user->phone}}</p>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile </b>  <p>{{$user->mobile}}</p>
                  </li>
                  <li class="list-group-item">
                    <b>User State </b>  <p>{{$user->user_state}}</p>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                <a class="btn btn-block btn-danger" href="{{route('assign-company', $user->id )}}">Ask Remove account </a> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        
          </div>
          <!-- /.col -->
          <div class="col-md-9">
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
                      <td>    </td>
                      <td>        {{$data->company->name}}    </td>                       
                    </tr>
                @empty
                    <td colspan="2">No role in any company</td>
                @endforelse
                
                  </tbody>
                </table>
              </div>    
              
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





      

            @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')
    <script> 



</script>


@stop
