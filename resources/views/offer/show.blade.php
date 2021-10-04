

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
                  <i class="fas fa-globe"></i> Label : {{$offer->label}} </i>
                  <small class="float-right"> Ref:  {{$offer->reference}}</small><br>
                  <small class="float-right">Created Date: {{$offer->created_at}}</small><br>
                  <small class="float-right">Sended date: {{$offer->sended_date}}</small>
               </h4>
            </div>
            <!-- /.col -->
         </div>
         <!-- info row -->
         <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
               From
               <address>
                  <strong> {{$myCompany->name}} </strong><br>
                  {{$myCompany->street_name}} ,   {{$myCompany->street_number}} <br>
                  {{$myCompany->zip_code}} -  {{$myCompany->locality}}  <br>            
                  Phone : {{$myCompany->phone}} <br>
                  Email:    {{$myCompany->email}}<br>
                  VAT :  {{$myCompany->vat}}<br>
                  <strong> Representant : </strong><br>
                  {{$offer->users->name}}       {{$offer->users->firstname}}
               </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
               To
               <address>
                  <strong> {{$offer->company->name}} </strong><br>
                  {{$offer->company->street_name}} , {{$offer->company->street_number}} <br>
                  {{$offer->company->locality}} ,    {{$offer->company->zip_code}} <br>
                  Email:   {{$offer->company->email}} <br>
                  Phone :    {{$offer->company->phone}} <br>
                  VAT :    {{$offer->company->vat}} <br>
                  <strong> Representant : </strong><br>
                  {{$offer->client->name}}  {{$offer->client->firstname}}
               </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
               <b> Offer Status </b> <br>
               <b>Offer State  : </b>   {{$offer->offer_state}}<br>
               @isManager    <b>Offer Priority : </b>  {{$offer->offer_priority_state}}<br> @endisManager
               <b>Last update Date:</b> {{$offer->updated_at}}  <br>
               <b>Offer due date : </b>  {{$offer->due_date}}<br>
               <b>Offer validity delay : </b> {{$offer->validity_delay}}<br>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
         <!-- Table row -->
         <br>
         <div class="row">
            <div class="col-12 table-responsive">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>name</th>
                        <th>Quantity</th>
                        <th>Is recurrent</th>
                        @isManager
                        <th>Unit Cost  HT</th>
                        @endisManager
                        <th>Unit HT</th>
                        <th> Total HT </th>
                        @isManager    
                        <th></th>
                        @endisManager
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($offer->services as $data)       
                     <tr>
                        <td>{{$data->service->label}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>
                           @if($data->service->recurrent == true)
                           True
                           @else
                           False
                           @endif
                        </td>
                        @isManager  
                        <td>{{$data->unit_cost_ht}}</td>
                        @endisManager
                        <td>{{$data->unit_sell_ht}} € </td>
                        <td> {{ $data->quantity * $data->unit_sell_ht }} € </td>
                        @isManager
                        <td>
                           @if($offer->offer_state != "SENDED" && $offer->offer_state != "DECLINED"   && $offer->offer_state != "VALIDED" && $offer->offer_state != "ACCEPTED" && $offer->offer_state != "ARCHIVED")
                           <div class="btn-group">
                              <!--   Edit service -->
                              <button type="button" data-toggle="modal" data-target="modal-edit-service" class="btn btn-primary float-right btn-edit-service"  
                                 data-servicelist='{{$data->id}}'     
                                 data-name='{{ $data->service->label}}'     
                                 data-quantity='{{ $data->quantity}}'
                                 data-cost-ht='{{ $data->unit_cost_ht}}'
                                 data-sell-ht='{{ $data->unit_sell_ht}}'
                                 data-id='{{$data->service->id}}' 
                                 >
                              <i class="fa fa-download"></i> edit service 
                              </button>
                              <!--   /Edit service -->
                              <!--  Remove service Quote -->
                              <form method="post" action="{{route('remove-service-doc-offer', $data->id )}}">
                                 @csrf
                                 <button type="submit" class="btn btn-danger float-right">
                                 <i class="fa fa-download"></i>Remove  </button>
                              </form>
                              <!--  /Remove service Quote -->
                           </div>
                           @endif
                        </td>
                        @endisManager
                     </tr>
                     @empty
                     <td> no service currently </td>
                     @endforelse
                  </tbody>
                  <tfoot>
                     <th>
                        @isClient
                     <tr>
                        <th colspan="4"> Total HT</th>
                        <td> {{$totalSell}} € </td>
                     </tr>
                     @endisClient
                     @isManager
                     <tr>
                        <th colspan="2"> </th>
                        <th colspan=""> Total cost HT</th>
                        <td> {{$offer->total_cost_ht	}} €</td>
                        <th colspan=""> Total sell HT</th>
                        <td> {{$offer->total_sell_ht	}} €</td>
                        <td> <strong>  Balance : </strong>  {{$offer->total_sell_ht - $offer->total_cost_ht	 }} €</td>
                     </tr>
                     @endisManager
                     </th>      
                  </tfoot>
               </table>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
         <div class="container-fluid">
            <div class="row">
               <div class="col-6">
                  <h4> Description : </h4>
                  <br>
                  <p> {{$offer->description}} </p>
               </div>
               <!-- /.col -->
               <div class="col-6">
                  <h4> Comments : </h4>
          
                  @if($offer->comments)
                  <ol>
                     @foreach ($offer->comments as $data )
                     <li>  {{$data->message}} </li>
                     @endforeach
</ol>
                  @else
                  <p>No comments</p>
                  @endif
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
               <div class="col-12">
                  <div class="btn-group">
                     @isManager
                     @endisManager
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
<div class="card">
   <div class="card-body">
      <div class="btn-group">
         @isManager
         @if($offer->offer_state != "SENDED" && $offer->offer_state != "VALIDED"  && $offer->offer_state != "ACCEPTED"   && $offer->offer_state != "DECLINED"  && $offer->offer_state != "ARCHIVED")
         <!--  Update  -->
         <form method="get" action="{{route('edit-offer', $offer->id )}}">
            @csrf
            <button type="submit" class="btn btn-primary float-right">
            <i class="fa fa-download"></i>Update Offer  </button>
         </form>
         <!--  /Update  -->
         @if ($offer->services()->exists())
         <!--  SEND  -->
         <form method="post" action="{{route('change-state-offer', [$offer, 'SENDED'] )}}">
            @csrf
            <button type="submit" class="btn btn-success float-right">
            <i class="fa fa-download"></i>Send offer </button>
         </form>
         <!--  /SEND  -->
         @endif
         <!--   Add service -->
         <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
         <i class="fa fa-download"></i> Add a new service 
         </button>
         <!--   /Add service -->
         @endif
         @if($offer->offer_state == "ACCEPTED" )
         <!--  Valide  -->
         <form method="post" action="{{route('change-state-offer', [$offer, 'VALIDED'] )}}">
            @csrf
            <button type="submit" class="btn btn-success float-right">
            <i class="fa fa-download"></i>Valide offer </button>
         </form>
         <!--  /Valide  -->
         @endif
         <!--  Archive  -->
         @if($offer->offer_state != "ARCHIVED" && $offer->offer_state != "SENDED" )
         <form method="post" action="{{route('change-state-offer', [$offer, 'ARCHIVED'] )}}">
            @csrf
            <button type="submit" class="btn btn-danger float-right">
            <i class="fa fa-download"></i>Archive  </button>
         </form>
         <!--  /Archive  -->
         @endif 
         @if($offer->offer_state == "VALIDED")
         <!--  Turn into project  -->
         <form method="post" action="{{route('turn-into-project', $offer )}}">
            @csrf
            <button type="submit" class="btn btn-success float-right">
            <i class="fa fa-download"></i>Turn into Project  </button>
         </form>
         <!--  /Turn into projec  -->
         @endif
         @endisManager
         @isClient
         @if($offer->offer_state == "SENDED")
         <!--  Accept  -->
         <form method="post" action="{{route('change-state-offer', [$offer, 'ACCEPTED'] )}}">
            @csrf
            <button type="submit" class="btn btn-success float-right">
            <i class="fa fa-download"></i>Accept  </button>
         </form>
         <!--  /Accept   -->
         <!--  Decline  -->
         <form method="post" action="{{route('change-state-offer', [$offer, 'DECLINED'] )}}">
            @csrf
            <button type="submit" class="btn btn-danger float-right">
            <i class="fa fa-download"></i>Decline  </button>
         </form>
         <!--  /Decline   -->
         <!--  Ask update  -->
         <button type="submit" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-update-service">
         <i class="fa fa-download"></i>Ask update
         </button>
         <!--   /Add service -->
                  <!--  Download PDF  -->
                  <form method="post" action="{{route('dl-pdf-offer', $offer )}}">
            @csrf
            <button type="submit" class="btn btn-success float-right">
            <i class="fa fa-download"></i>Download PDF  </button>
         </form>
         <!--  /Download PDF -->
         @endif
         @endisClient
      </div>
   </div>
   <!-- end card body -->
</div>
<!-- end card -->
<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add new service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" role="form" action="{{ isset($offer->service) ? route('update-service-doc', $offer->service) : route('store-service-doc-offer') }}">
               @isset($qService)
               @method('put')
               @endisset
               {{csrf_field()}}
               <input type="hidden" id="offer_id" name="offer_id" value="{{$offer->id}}">
               <div class="form-group  {{$errors->has('service_id') ? 'has-error' : ''}}">
                  <label for="inputService">Service</label>
                  <select id="selectorServices" class="js-example-basic form-select form-select-lg mb-3" name="service_id"  style="width:100%">>               
               </select>

               </div>
               <div class="form-group {{$errors->has('quantity') ? 'has-error' : ''}} ">
                  <label for="quantity">Quantity</label>
                  <input class="form-control form-control-lg" type="number" min="1" id="edit-quantity" name="quantity" value="{{ isset($offer) ? $offer->quantity: old('quantity') }}" placeholder="service quantity">
                  @if($errors->has('quantity'))
                  <strong> {{$errors->first('quantity')}}</strong>
                  @endif
               </div>
               <div class="form-group {{$errors->has('unit_cost_ht') ? 'has-error' : ''}} ">
                  <label for="costPrice">Cost Price</label>
                  <input class="form-control form-control-lg" type="number" min="0" id="edit-cp" name="unit_cost_ht" value="{{ isset($offer) ? $offer->unit_cost_price: old('unit_cost_price') }}" placeholder="service cost price">
                  @if($errors->has('unit_cost_price'))
                  <strong> {{$errors->first('unit_cost_ht')}}</strong>
                  @endif
               </div>
               <div class="form-group {{$errors->has('unit_sell_ht') ? 'has-error' : ''}} ">
                  <label for="sellPrice">sell Price</label>
                  <input class="form-control form-control-lg" type="number" min="1" id="edit-cp" name="unit_sell_ht" value="{{ isset($offer) ? $offer->unit_sell_ht: old('unit_sell_ht') }}" placeholder="service sell price">
                  @if($errors->has('unit_sell_ht'))
                  <strong> {{$errors->first('unit_sell_ht')}}</strong>
                  @endif
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
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
         <form method="post" action="{{route('update-service-doc-offer', $offer)}}">
            @csrf
            <div class="modal-body">
               <div class="form-group">
                  <input type="hidden" id="sl_id" name="sl_id" value="sl_id">
                  <label for="serviceName">Service </label>
                  <select class="form-control " id="choose-service" name="service_id">                   
                  </select>
               </div>
               <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input class="form-control " type="text" id="quantity"  name="quantity"  placeholder="Quantity">
               </div>
               <div class="form-group">
                  <label for="cost-ht">Cost price ht</label>
                  <input class="form-control " type="text" id="cost-ht"  name="unit_cost_ht"  placeholder="cost price">
               </div>
               <div class="form-group">
                  <label for="sel-ht">Sell price ht</label>
                  <input class="form-control " type="text" id="sell-ht"  name="unit_sell_ht"  placeholder="sell price">
               </div>
            </div>
            <!-- end Modal body -->
            <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               <button type="sumbit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- Modal ask update  Modal -->
<div class="modal fade" id="modal-update-service" style="display: none;">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span></button>
         <h4 class="modal-title">Comment Offer</h4>
      </div>
      <!-- formService Modal -->
      <form method="post" action="{{route('ask-update-service-doc-offer', $offer->id)}}">
         @csrf
         <div class="modal-body">
            <div class="form-group {{$errors->has('comments') ? 'has-error' : ''}} ">
               <label for="offerComments">Offer comments</label>
               <textarea class="form-control form-control-lg" type="text" id="message" name="message"  placeholder="comments">
               </textarea>
               @if($errors->has('message'))
               <strong> {{$errors->first('message')}}</strong>
               @endif
            </div>
         </div>
         <!-- end Modal body -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="sumbit" class="btn btn-primary">Save changes</button>
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
   $('.btn-edit-service').click(function() {
   
     $('#sl_id').val($(this).data('servicelist'));
           $('#service_id').val($(this).data('id'));
           $('#service_name').val($(this).data('name'));
           $('#quantity').val($(this).data('quantity'));
           $('#cost-ht').val($(this).data('cost-ht'));
           $('#sell-ht').val($(this).data('sell-ht'));
   
           $("#choose-service").append(new Option( $(this).data('name') , $(this).data('id') , true, true ));
   
   
             $('#modal-edit-service').modal('show');
             $('#ask-update-service').modal('show');
         });
          
   
         $('#selectorServices').select2({
            placeholder: 'Select a service',
            ajax: {
               url:"{{route('services-selectable' )}}",
               processResults: function (data) {
               // Transforms the top-level key of the response object from 'items' to 'results'
                  return {
                     results: $.map(data, function(item) {
                              return {
                                 text :  item.service_name + ' ( ' + item.service_desc + ' )' ,
                                 id: $.parseJSON(item.id ),
                                 
                              }
                           })
                        };
                     }
               }
            });



</script>
@stop

