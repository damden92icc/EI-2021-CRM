@extends('adminlte::page')

@section('title', 'Single Service')

    @section('content_header')
    <h1> {{$pageTitle}} </h1>
    @stop

    @section('content')

    <h2> Service -     {{$service->label }}  </h2>


   
    <div class="card">
              <div class="card-header">
          
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>                     
                      <th>ID</th>
                      <th>Label</th>                      
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                
                  <tr>
                      <td>   {{$service->id}}    </td>                       
                      <td>   {{$service->label}}    </td>                       
                      <td>   {{$service->description}}    </td>                       
                    </tr>
    
                
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



</script>


@stop
