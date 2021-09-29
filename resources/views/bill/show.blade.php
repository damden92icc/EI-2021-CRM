

@extends('adminlte::page')
@section('title', 'Single bill')
@section('content_header')
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.', true)
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<section class="content">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
               <!-- title row -->
               <div class="row">
                  <div class="col-12">
                     <h4>
                        <i class="fas fa-globe"></i> {{$bill->label}}
                        <small class="float-right">Date: 2/10/2014</small>
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
                        Phone :  <br>
                        Email:    {{$myCompany->email}}<br>
                        VAT :  {{$myCompany->vat}}<br>
                     </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                     To
                     <address>
                        <strong>{{$bill->company->name}}</strong><br>
                        {{$bill->company->street_name}} , {{$bill->company->street_number}} <br>
                        {{$bill->company->locality}} ,    {{$bill->company->zip_code}} <br>
                        Phone :    {{$bill->company->mail}} <br>
                        Email:   {{$bill->company->email}} <br>
                        VAT:   {{$bill->company->vat}} <br>
                     </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                     <b>Bill Reference : </b> {{$bill->reference}}</b><br>
                     <b>Bill State : </b>{{$bill->bill_state}}<br>
                     <b>Bill Due date  : </b>{{$bill->due_date}}<br>
                     <b>Bill Reference : </b>{{$bill->reference}}<br>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
               <!-- Table row -->
               <div class="row">
                  <div class="col-12 table-responsive">
                     {{$pageTabTitle}}
                     <table class="table table-striped">
                        <thead>
                           <th> Origine </th>
                           <th> Quantity </th>
                           <th>Label</th>
                           <th> Unit  price HT </th>
                           <th> VAT Rate </th>
                           <th> Total Sell price HT </th>
                           <th></th>
                        </thead>
                        <tbody>
                           @forelse ($bill-> billServices as $data)
                           <tr>
                              <td>  {{$data->service->project->label}} </td>
                              <td> {{$data->service->quantity}} </td>
                              <td>  {{$data->service->service->label}} </td>
                              <td> {{$data->service->unit_sell_ht}} </td>
                              <td> {{$data->vat_rate}} % </td>
                              <td>  {{ $data->service->unit_sell_ht * $data->service->quantity }}   </td>
                              @isManager
                              @if($bill->bill_state == "DRAFT")  
                              <td>
                                 <!--  Remove service Quote -->
                                 <form method="post" action="{{route('remove-service-doc-bill', $data->id )}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                                    <i class="fa fa-download"></i>Remove  </button>
                                 </form>
                                 <!--  /Remove service Quote -->
                              </td>
                              @endif
                              @endisManager
                           </tr>
                        </tbody>
                        @empty
                        <tr>
                           <td>
                              no services
                           </td>
                        </tr>
                        @endforelse
                        <tfoot>
                           <th>
                           <tr>
                              <td colspan="3"></td>
                              <td colspan="2">
                                 Total HT
                              </td>
                              <td>
                                 {{$totalSellHT}} €
                              </td>
                           <tr>
                              </th>
                        </tfoot>
                     </table>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->

               
               <div class="row">
                  <div class="col-12">

                  @if(isset($bill->billIssues))
                     Issues for this bill : 
                     <ol>
                           @foreach($bill->billIssues as $data)
                        <li> {{$data->message}} </li>
                        @endforeach 
                     </ol>
                  @endif
              
                  </div>
               </div>
            </div>
            <!-- /.invoice -->
            <div class="btn-group">
               @isManager
               @if($bill->bill_state =="DRAFT")  
               <!--  Update  -->
               <form method="get" action="{{route('edit-bill', $bill )}}">
                  @csrf
                  <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i>Update bill  </button>
               </form>
               <!--  /Update  -->
               <!--  send bill  -->
               <form method="post" action="{{route('send-bill', $bill )}}">
                  @csrf
                  <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i>Send bill </button>
               </form>
               <!--  /send bill  -->
              
               <!--   Add service -->
               <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
               <i class="fa fa-download"></i> Add billable service 
               </button>
               <!--   /Add service -->
              
               @endif
               @if($bill->bill_state =="PAYED" || $bill->bill_state =="ISSUED")  
                <!--  Valide  -->
                <form method="post" action="{{route('valide-bill', $bill )}}">
                  @csrf
                  <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i>Valide bill </button>
               </form>
               <!--  /Valide  -->
               <!--  Archive  -->
               <form method="post" action="{{route('archive-bill', $bill )}}">
                  @csrf
                  <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i>Archive  </button>
               </form>
               <!--  /Archive  -->
               @endif
               @endisManager
               @isClient
               @if($bill->bill_state == "SENDED")  
               <!--  Update  -->
               <!--  Pay  -->
               <form method="post" action="{{route('pay-bill', $bill )}}">
                  @csrf
                  <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i>Pay  </button>
               </form>
               <!--  /Pay  -->
               @endif
               @endisClient

               @isAccount
               @if($bill->bill_state == "VALIDED" ||$bill->bill_state == "PAYED"  )  
            
               <!--  Report issues  -->
        
             
                  <button type="submit" class="btn btn-danger float-right" data-toggle="modal" data-target="#modal-report-issue">
                  <i class="fa fa-download"></i> Report issues  </button>
  
               <!--  /Report issues  -->
               @endif
               @endisAccount



            </div>
            <!-- end button -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<div class="modal fade" id="modal-default">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add billable</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" role="form" action="{{ route('store-service-doc-bill') }}">
               {{csrf_field()}}
               <input value="{{$bill->id}}" name="bill_id"  id="bill_id"  type="hidden">
               <select id="selectorServices" class="js-example-basic-multiple form-select form-select-lg mb-3" name="serviceListing[]" multiple="multiple">               
               </select>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal ask update  Modal -->
<div class="modal fade" id="modal-report-issue" style="display: none;">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span></button>
         <h4 class="modal-title">Report Issue</h4>
      </div>
      <!-- formService Modal -->
      <form method="post" action="{{route('report-bill-issue', $bill->id)}}">
         @csrf
         <div class="modal-body">
            <div class="form-group {{$errors->has('comments') ? 'has-error' : ''}} ">
               <label for="offerComments">Issue </label>
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
   $('#selectorServices').select2({
         
      ajax: {
         url:"{{route('services-billable' )}}",
           //    datatype:'json',
               data: function(param){
                  console.log($("#bill_id").val())
                  
                   var query = {
                     search: JSON.stringify($("#bill_id").val()),
                       type:'public'
                   }
                   return query;
               },
               processResults: function (data){
                   return {
                       results: $.map(data, function(item) {
                           return {
                               text : item.project_name + '('  +  item.ps_id +  ') ' + item.service_name  + ' ' + item.unit_sell_ht + ' €' + '(' + item.quantity + ')' ,
                               id: $.parseJSON(item.id ),
                           }
                       } )
                   }
               }
           }
       });   
   
   
   
</script>
@stop

