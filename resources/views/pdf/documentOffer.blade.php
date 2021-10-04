
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
                        <td> {{$totalCost}} €</td>
                        <th colspan=""> Total sell HT</th>
                        <td> {{$totalSell}} € </td>
                        <td> <strong>  Balance : </strong>  {{$totalSell - $totalCost }} €</td>
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


