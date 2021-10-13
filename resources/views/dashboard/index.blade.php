@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome {{$user->firstname}}</p>




<input type="hidden" id="gdpr-validation" value="{{$user->gdpr_valided }}" name="gdpr-validation">
<input type="hidden" id="cgu-validation" value="{{$user->cgu_valided }}" name="cgu-validation">



 <div class="modal fade" id="modal-gdpr-cgu" >
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">GPDR & CGU Validation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            
       
            </div>
            <div class="modal-footer justify-content-between">

            


            <form method="POST"  action="{{ route('valide-account', $user)}}">
              @csrf
   
            <button type="submit" class="btn btn-outline-light">Acceppt CGU & GDPR compilance</button>
            
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $(document).ready(function () {

        if($('#gdpr-validation').val() == 1 &&  $('#cgu-validation').val() == 1 ){
            console.log('ok')
        }

        else{
            openValidationForm();
        }

    });
    function  openValidationForm(){
        $('#modal-gdpr-cgu').modal('show');
    }
     </script>
@stop
