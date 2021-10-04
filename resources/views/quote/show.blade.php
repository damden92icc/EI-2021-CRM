

@extends('adminlte::page')
@section('title', 'Single quote')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')




<div class="container">
<div class="row">
   <div class="col-12">
      <!-- Main content -->
      <div class="invoice p-3 mb-3">
         <!-- title row -->
         <div class="row">
            <div class="col-12">
               <h4>
                  <i class="fas fa-globe"></i> Label : {{$quote->label}}
                  
               </h4>
            </div>
            <!-- /.col -->
         </div>
         <!-- info row -->
         <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
               From
               <address>
                  <strong>{{$quote->company->name}}</strong><br>
                  {{$quote->company->street_name}} , {{$quote->company->street_number}} <br>
                  {{$quote->company->locality}} ,    {{$quote->company->zip_code}} <br>
                  Phone :    {{$quote->company->phone}} <br>
                  Email:   {{$quote->company->email}} <br>
                  VAT:   {{$quote->company->vat}} <br>
               </address>
               <address>
                  Representant : <br>
                  <strong> {{$quote->users->name}} </strong>
               </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
               To
               <address>
                  <strong> {{$myCompany->name}} </strong><br>
                  {{$myCompany->street_name}} ,   {{$myCompany->street_number}} <br>
                  {{$myCompany->zip_code}} -  {{$myCompany->locality}}  <br>
                  Phone :  {{$myCompany->phone}} <br>
                  Email:    {{$myCompany->email}}<br>
                  VAT :  {{$myCompany->vat}}<br>
               </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
               <b>Quote Referance :</b>  {{$quote->reference}}  <br>
              
               <b>Quote State :  </b>{{$quote->quote_state}}</b><br>
               <b>Created Date: </b> {{ \Illuminate\Support\Str::limit($quote->created_at, 10, $end='') }} <br>
                  <b>Updated Date:</b> {{ \Illuminate\Support\Str::limit($quote->updated_at, 10, $end='') }}<br>
                  <b>Sended date: </b>
                  @if(isset($quote->sended_date))
                  {{ \Illuminate\Support\Str::limit($quote->sended_date, 10, $end='') }}
                  @else 
                     none 
                  @endif   
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
         <!-- Table row -->
         <div class="row">
            <div class="col-12 table-responsive">       
               <table class="table table-striped">
                  <thead>
                     <tr>                   
                        <th>name</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>This service is recurrent</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($quote->services as $data)
                     <tr>
            
                        <td>{{$data->service->label}}</td>
                        <td> {{$data->quantity}} </td>
                        <td>{{$data->service->description}}</td>
                        <td>
                           @if($data->service->recurrent == true)
                          Yes 
                           @else
                       No
                           @endif
                        </td>
                        <td>
                           @isClient
                           @if($quote->quote_state == 'DRAFT')
                           <div class="btn-group">
                              <!--   Edit service -->
                              <button type="button" data-toggle="modal"  class="btn btn-primary  btn-edit-service"  
                                 data-servicelist='{{$data->id}}'     
                                 data-name='{{ $data->service->label}}'     
                                 data-quantity='{{ $data->quantity}}'
                                 data-id='{{$data->service->id}}' 
                                 >
                              Edit 
                              </button>
                              <!--   /Edit service -->
                              <!--  Remove service Quote -->
                              <form method="post" action="{{route('remove-service-doc', $data->id )}}">
                                 @csrf
                                 <button type="submit" class="btn btn-danger">
                                Remove  </button>
                              </form>
                              <!--  /Remove service Quote -->
                              @endisClient
                           </div>
                           @endif
                        </td>
                     </tr>
                     @empty 
                     <td colspan="4"> This quote has currently no service </td>
                     @endforelse
                  </tbody>
               </table>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                  <h4> Description : </h4>
                  <br>
                  <p> {{$quote->description}} </p>
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
               <div class="col-12">
                  <div class="btn-group">
                     @isManager
                     
                     @if($quote->quote_state != "TRAITED" &&  $quote->quote_state == "SENDED")
                     <!--  Mark as traite Quote -->
                     <form method="post" action="{{route('change-state-quote', [$quote, 'TRAITED'] )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i>Mark as traited  </button>
                     </form>
                     <!--  /Mark as traite Quote -->

                         <!--  Turn into offer - -->
                          <form method="post" action="{{route('turn-into-offer', $quote )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Turn into Offer </button>
                     </form>
                     <!--  /Turn into Offer  -->
                     @endif

                     @endisManager

                     @isClient
                     @if($quote->quote_state != "SENDED" &&  $quote->quote_state != "ARCHIVED" && $quote->quote_state != "TRAITED"  )
                     <!--  Archive Quote -->
                     <form method="post" action="{{route('change-state-quote', [ $quote , 'ARCHIVED']  )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger float-right ">
                        <i class="fa fa-download"></i>Archive  </button>
                     </form>
                     <!--  /Archive Quote -->
                     @if ($quote->services()->exists())
                     <!--  Send Quote -->
                     <form method="post" action="{{route('change-state-quote', [$quote, 'SENDED']  )}}">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right" >
                        <i class="fa fa-download"></i>Send  </button>
                     </form>
                     <!--  /Send Quote -->
                     @endif
                     <!--   Add service -->
                     <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
                     <i class="fa fa-download"></i> Add a new service 
                     </button>
                     <!--   /Add service -->
                     <!--  Update Quote -->
                     <form method="get" action="{{route('edit-quote', $quote )}}">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i>Update  </button>
                     </form>
                     <!--  Update Quote -->
                     @endif
                     @endisClient
                  </div>
                  <!-- end button group -->
               </div>
            </div>
         </div>
         <!-- /.invoice -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</div>
<div class="modal fade " id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add new service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="addNewService" >

               <input type="hidden" name="quote_id" value="{{$quote->id}}">
  
               <div class="form-group  {{$errors->has('service_id') ? 'has-error' : ''}}">
                  <label for="inputService">Service</label>

                  <select  id="service_id" name="service_id">
                        @foreach($services as $data)
                        <option value="{{$data->id}}" id="{{$data->id}}"> {{$data->label}} -  {{$data->description}} </option>
                        @endforeach             
                   </select>


               </div>
               <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
                  <label for="quantity">Quantity</label>
                  <input class="form-control form-control-lg" type="number" min="1" required name="quantity" value="{{ isset($quote) ? $quote->quantity: old('quantity') }}" placeholder="service quantity">
                  @if($errors->has('quantity'))
                  <strong> {{$errors->first('quantity')}}</strong>
                  @endif
               </div>
               <button type="submit" class="btn btn-primary " id="btn-submit-new-service">Submit</button>
            </form>
         </div>
         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal edit Service Modal -->
<div class="modal fade" id="modal-edit-service" style="display: none;">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span></button>
         <h4 class="modal-title">Edit services</h4>
      </div>
      <!-- formService Modal -->
      <form  >
 
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" id="sl_id" name="sl_id" value="sl_id">
               <label for="serviceName">Service </label>
               <select class="form-control " id="choose-service" name="edit_service_id">                   
               </select>
            </div>
            <div class="form-group">
               <label for="quantity">Quantity</label>
               <input class="form-control " type="number" min="1" id="edit-quantity"  name="edit-quantity"  placeholder="Quantity">
            </div>
         </div>
         <!-- end Modal body -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="sumbit" id="btn-edit-service" class="btn btn-primary btn-edit-service">Save changes</button>
         </div>
      </form>
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> 


$("#btn-submit-new-service").click(function(event){
      event.preventDefault();

      

      var serviceID = $('#service_id').val()   
      var serviceQT = $("input[name=quantity]").val();
      var serviceQuoteID =  $("input[name=quote_id]").val();
  

      $.ajax({
         url:"{{ route('store-service-doc-quote') }}",
         headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
        type:"POST",
        data:{
         service_id:serviceID ,
               quantity:serviceQT,
               quote_id:serviceQuoteID,
        },
        success:
         function(response){
            console.log(response);
            location.reload(); 
          
        }, 
        error: function(e){
               console.error(e);
               console.log(e.status);
               alert(e.responseText);      
         },

       });
  });

  


$("#btn-edit-service").click(function(event){
      event.preventDefault();

      var serviceID = $('#choose-service').val()   

      var slID = $('#sl_id').val()   
      var serviceQT = $("input[name=edit-quantity]").val();

  

      $.ajax({
         url:"{{ route('update-service-doc-quote') }}",
         headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
        type:"POST",
        data:{
                sl_id:slID ,
               quantity:serviceQT,
               service_id:serviceID,
      
        },
        success:
         function(response){
            console.log(response);
            location.reload(); 
          
        }, 
        error: function(e){
               console.error(e);
               console.log(e.status);
               alert(e.responseText);      
         },

       });
  });




   $('.btn-edit-service').click(function() {
   
     $('#sl_id').val($(this).data('servicelist'));
           $('#service_id').val($(this).data('id'));
           $('#service_name').val($(this).data('name'));
           $('#edit-quantity').val($(this).data('quantity'));
   
           $("#choose-service").append(new Option( $(this).data('name') , $(this).data('id') , true, true ));   
           $('#modal-edit-service').modal('show');
  });

      
      



</script>
@stop

