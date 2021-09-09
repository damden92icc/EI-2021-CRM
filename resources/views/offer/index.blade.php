@extends('adminlte::page')

@section('title', 'Listing quote')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')
    
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$pageTabTitle}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered table-striped dataTable dtr-inline" id="main-table">
                  <thead>
                    <tr>
                    
                      <th >ID</th>
                      <th>name</th>
                      <th>Desc</th>
                      <th>Last update</th>
                      <th>State</th>
                      <th> Due Date </th>
                      <th> Company </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($offers as $data)
                    <tr>
                      <td> {{$data->id}} </td>
                      <td> {{$data->label}} </td>
                      <td> {{ \Illuminate\Support\Str::limit($data->description, 30, $end='...') }}</td>
                      <td> {{ \Illuminate\Support\Str::limit($data->updated_at, 10, $end='') }}</td>
                    
                      <td> {{$data->offer_state}} </td>
                      <td> {{$data->due_date}} </td>
                      <td> {{$data->company->name}} </td>
                      
                     <td>
                     <div class="btn-group">
                         <a class="btn btn-block btn-info" href="{{route('single-offer', $data->id )}}">view</a>

                         @isManager
                          <!--  Update offer -->
                     <form method="get" action="{{route('edit-offer', $data )}}">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                        Update  </button>
                     </form>
                     <!--  Update offer -->
                         @endisManager
</div>
                    </td>

                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
    @stop

@section('css')
    <link rel="stylesheet" href="../css/admin_custom.css">
@stop

@section('js')


    <script> 
    $(document).ready( function () {
    $('#main-table').DataTable();
} );
</script>

@stop
