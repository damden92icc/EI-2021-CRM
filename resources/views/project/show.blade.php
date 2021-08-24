

@extends('adminlte::page')
@section('title', 'Single project')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
{{$project}}
<br>
<br> <br>
<div class="card">
   <div class="card-header">
      <h3 class="card-title">{{$pageTabTitle}}</h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0">
      <table class="table table-striped">
         <thead>
            <tr>
               <th>Quantity - name  </th>
               <th>Recurrency</th>
               <th> Int. is rec </th>
               <th> Service State </th>
               @isManager
               <th> Cost price </th>
             
               <th> Prov. Cost price </th>
               @endisManager
               <th>Sell  price</th>
               <th> Start Date </th>
               <th> Next pay date </th>
               <th> Is billable </th>
               <th> Last Payement date </th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @forelse($project->services as $data)       
            <tr>
               <td> {{$data->quantity}} - {{$data->service->label}}  </td>
               <td>{{$data->recurrency_payement}}</td>
               <td>{{$data->service->recurrent}}</td>
               <td>{{$data->service_state}}</td>
            
            @isManager
               <td>{{$data->unit_cost_ht}} 
               </td>
             
               <td>
                
                  @if(isset($data->serviceProv ))
                  {{$data->serviceProv->spd_unit_cost_ht}}  
                  {{$data->serviceProv->provided->name}}
                  @else 
                  <p> - </p>
                  @endif
               </td>
               @endisManager
               <td>{{$data->unit_sell_ht}}</td>
               <td>{{$data->start_date}}</td>
               <td>{{$data->next_payement_date}}</td>
               <td>{{$data->is_billable}}</td>
               <td>
                  @if(isset($data->last_payement_date ))
                  {{$data->last_payement_date}}
                  @else 
                  <p> Never billed </p>
                  @endif
               </td>
               <td>
                  @isManager
                  <div class="btn-group">
                     @isset($data->serviceProv )       
                     <!--   Edit service -->
                     <button type="button" data-toggle="modal" data-target="modal-edit-prov" class="btn btn-primary float-right btn-edit-service-prov"   
                        data-servicelist='{{$data->id}}'  
                        data-slp-id='{{$data->serviceProv->id}}'   
                        data-service-name='{{ $data->service->label}}'     
                        data-quantity='{{ $data->quantity}}'
                        data-reccurency='{{$data->recurrency_payement}}'
                        data-cost-ht='{{ $data->unit_cost_ht}}'
                        data-sell-ht='{{$data->unit_sell_ht}}'
                        data-spd-cost-ht='{{$data->serviceProv->spd_unit_cost_ht}}'
                        data-spd-is-active='{{$data->serviceProv->spd_is_active}}'
                        data-spd-start-date='{{$data->serviceProv->spd_start_date}}'
                        data-spd-recurrency='{{$data->serviceProv->spd_recurrency_payement}}'
                        data-spd-state='{{$data->serviceProv->spd_service_state}}'
                        data-spd-id='{{$data->serviceProv->id}}' 
                        >
                     <i class="fa fa-download"></i> Edit
                     </button>
                     <!--   /Edit service -->
                     @endisset 
                     @empty($data->serviceProv )
                     <!--   Edit service -->
                     <button type="button" data-toggle="modal" data-target="modal-edit-prov" class="btn btn-primary float-right btn-edit-service"  
                        data-servicelist='{{$data->id}}'     
                        data-name='{{ $data->service->label}}'     
                        data-quantity='{{ $data->quantity}}'
                        data-cost-ht='{{ $data->unit_cost_ht}}'
                        data-start-date='{{ $data->start_date}}'
                        data-sell-ht='{{ $data->unit_sell_ht}}'
                        data-recurrency='{{$data->recurrency_payement}}'
                        data-id='{{$data->service->id}}' 
                        >
                     <i class="fa fa-download"></i> Edit 
                     </button>
                     <!--   /Edit service -->
                     @endempty
                     <!--  Remove service Quote -->
                     <form method="post" action="{{route('remove-service-doc-project', $data->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i>Remove  </button>
                     </form>
                     <!--  /Remove service Quote -->
                     @endisManager
                     @isClient
                     <!--  Ask cancellation  -->
                     <form method="post" action="{{route('cancel-service-doc-project', $data->id )}}">
                        @csrf
                        <button type="submit" class="btn btn-warning float-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i>Ask cancellation  </button>
                     </form>
                     <!--  / Ask cancellation e -->
                     @endisClient
                  </div>
               </td>
            </tr>
            @empty
            <td> no service currently </td>
            @endforelse
         </tbody>
      </table>
   </div>
   <!-- /.card-body -->
</div>
@isManager
<div class="btn-group">
   <!--  Update  -->
   <form method="get" action="{{route('edit-project', $project->id )}}">
      @csrf
      <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
      <i class="fa fa-download"></i>Update Project  </button>
   </form>
   <!--  /Update  -->
   <!--  Archive  -->
   <form method="post" action="{{route('archive-project', $project )}}">
      @csrf
      <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
      <i class="fa fa-download"></i>Archive  </button>
   </form>
   <!--  /Archive  -->
   <!--  /Ask update   -->
   <!--   Add service -->
   <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
   <i class="fa fa-download"></i> Add a new service 
   </button>
   <!--   /Add service -->
</div>
@endisManager
<div class="modal fade" id="modal-default">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add new service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" role="form" action="{{ route('store-service-doc-project') }}">
               @isset($qService)
               @method('put')
               @endisset
               {{csrf_field()}}
               <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
               <div class="row">
                  <div class="col-6  {{$errors->has('service_id') ? 'has-error' : ''}}">
                     <label for="inputService">Service</label>
                     <select class="form-control" id="selectCompanyValue" name="service_id">
                        @forelse($servicesSelectable as $data)
                        <option value="{{$data->id}}" id="{{$data->id}}"> {{$data->label}}</option>
                        @empty 
                        <p> No service </p>
                        @endforelse
                     </select>
                  </div>
                  <div class="col-6 {{$errors->has('quantity') ? 'has-error' : ''}} ">
                     <label for="quantity">Quantity</label>
                     <input class="form-control form-control-lg" type="text" id="edit-quantity" name="quantity" value="{{ isset($project) ? $project->quantity: old('quantity') }}" placeholder="service quantity">
                     @if($errors->has('quantity'))
                     <strong> {{$errors->first('quantity')}}</strong>
                     @endif
                  </div>
               </div>
               <div class="row">
                  <div class="col-6 {{$errors->has('unit_cost_ht') ? 'has-error' : ''}} ">
                     <label for="costPrice">Cost Price</label>
                     <input class="form-control form-control-lg" type="text" id="edit-cp" name="unit_cost_ht" value="{{ isset($project) ? $project->unit_cost_price: old('unit_cost_price') }}" placeholder="service cost price">
                     @if($errors->has('unit_cost_price'))
                     <strong> {{$errors->first('unit_cost_ht')}}</strong>
                     @endif
                  </div>
                  <div class="col-6 {{$errors->has('unit_sell_ht') ? 'has-error' : ''}} ">
                     <label for="sellPrice">sell Price</label>
                     <input class="form-control form-control-lg" type="text" id="edit-cp" name="unit_sell_ht" value="{{ isset($project) ? $project->unit_sell_ht: old('unit_sell_ht') }}" placeholder="service sell price">
                     @if($errors->has('unit_sell_ht'))
                     <strong> {{$errors->first('unit_sell_ht')}}</strong>
                     @endif
                  </div>
               </div>
               <!-- end roow -->
               <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="checkFormSwitch()">
                  <label class="custom-control-label" for="customSwitch1">Toggle if external provider</label>
               </div>
               <div id="form-external">
                  <div class="row">
                     <div class="col-12">
                        <div class="row">
                           <div class="col-4 {{$errors->has('provider_id') ? 'has-error' : ''}} ">
                              <label for="costPrice">Provider Cost Price</label>
                              <select class="form-control" id="provider_id" name="provider_id">
                                 @foreach ($selectableProviders as $provider)                      
                                 <option value="{{$provider->id}}" id="{{$provider->id}}">   {{$provider->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-4 {{$errors->has('spd_unit_cost_ht') ? 'has-error' : ''}} ">
                              <label for="costPrice">Provider Cost Price</label>
                              <input class="form-control form-control-lg" type="text" id="edit-cp" name="spd_unit_cost_ht" value="{{ isset($project) ? $project->spd_unit_cost_ht: old('spd_unit_cost_ht') }}" placeholder="Cost Provider HT">
                              @if($errors->has('spd_unit_cost_ht'))
                              <strong> {{$errors->first('spd_unit_cost_ht')}}</strong>
                              @endif
                           </div>
                           <div class="col-4  {{$errors->has('spd_is_active') ? 'has-error' : ''}}">
                              <label for="inputActive"> Service provider Active </label>
                              <select class="form-control" id="spd_is_active" name="spd_is_active">
                                 <option value="1" id="1"> True</option>
                                 <option value="0" id="0"> False</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 {{$errors->has('spd_start_date') ? 'has-error' : ''}} ">
                              <label for="startDate">Start date</label>
                              <input class="form-control form-control-lg" type="text" id="edit-cstp" name="spd_start_date" value="{{ isset($project) ? $project->spd_start_date: old('spd_start_date') }}" placeholder="service start date">
                              @if($errors->has('spd_start_date'))
                              <strong> {{$errors->first('spd_start_date')}}</strong>
                              @endif
                           </div>
                           <div class="col-4 {{$errors->has('spd_recurrency_payement') ? 'has-error' : ''}} ">
                              <label for="recurrency">Reccurency payement</label>
                              <select class="form-control" id="recurrency" name="recurrency_payement">
                                 <option value="YEARLY" id="YEARLY"> YEARLY</option>
                                 <option value="HALF-YEARLY" id="HALF-YEARLY"> Half-yearly</option>
                                 <option value="SEMESTRIAL" id="SEMESTRIAL"> Semestrial</option>
                                 <option value="MONTHLY" id="MONTHLY"> Montlhy</option>
                              </select>
                              @if($errors->has('recurrency_payement'))
                              <strong> {{$errors->first('recurrency_payement')}}</strong>
                              @endif
                           </div>
                           <div class="col-4  {{$errors->has('spd_service_state') ? 'has-error' : ''}}">
                              <label for="inputState">State </label>
                              <select class="form-control" id="spd_service_state" name="spd_service_state">
                                 <option value="1" id="1"> True</option>
                                 <option value="0" id="0"> False</option>
                              </select>
                           </div>
                        </div>
                        <!-- end roow -->
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-6  {{$errors->has('is_active') ? 'has-error' : ''}}">
                     <label for="inputActive">Active </label>
                     <select class="form-control" id="is_active" name="is_active">
                        <option value="1" id="1"> True</option>
                        <option value="0" id="0"> False</option>
                     </select>
                  </div>
                  <div class="col-6  {{$errors->has('service_state') ? 'has-error' : ''}}">
                     <label for="inputState">State </label>
                     <select class="form-control" id="service_state" name="service_state">
                        <option value="1" id="1"> True</option>
                        <option value="0" id="0"> False</option>
                     </select>
                  </div>
               </div>
               <!-- end roow -->
               <div class="row">
                  <div class="col-6 {{$errors->has('start_date') ? 'has-error' : ''}} ">
                     <label for="startDate">Start date</label>
                     <input class="form-control form-control-lg" type="text" id="edit-cstp" name="start_date" value="{{ isset($project) ? $project->start_date: old('start_date') }}" placeholder="service start date">
                     @if($errors->has('start_date'))
                     <strong> {{$errors->first('start_date')}}</strong>
                     @endif
                  </div>
                  <div class="col-6{{$errors->has('recurrency_payement') ? 'has-error' : ''}} ">
                     <label for="recurrency">Reccurency payement</label>
                     <select class="form-control" id="recurrency" name="recurrency_payement">
                        <option value="YEARLY" id="YEARLY"> YEARLY</option>
                        <option value="HALF-YEARLY" id="HALF-YEARLY"> Half-yearly</option>
                        <option value="SEMESTRIAL" id="SEMESTRIAL"> Semestrial</option>
                        <option value="MONTHLY" id="MONTHLY"> Montlhy</option>
                     </select>
                     @if($errors->has('recurrency_payement'))
                     <strong> {{$errors->first('recurrency_payement')}}</strong>
                     @endif
                  </div>
               </div>
               <!-- end roow -->
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
         <form method="post" action="{{route('update-service-doc-project', $project)}}">
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
               <div class="row">
                  <div class="col-6  {{$errors->has('is_active') ? 'has-error' : ''}}">
                     <label for="inputActive">Active  </label>
                     <select class="form-control" id="is_active" name="is_active">
                        <option value="1" id="1"> True</option>
                        <option value="0" id="0"> False</option>
                     </select>
                  </div>
                  <div class="col-6  {{$errors->has('service_state') ? 'has-error' : ''}}">
                     <label for="inputState">State </label>
                     <select class="form-control" id="service_state" name="service_state">
                        <option value="RUNNING" id="RUNNING"> Running</option>
                        <option value="0" id="0"> END</option>
                     </select>
                  </div>
               </div>
               <!-- end roow -->
               <div class="row">
                  <div class="col-6 {{$errors->has('start_date') ? 'has-error' : ''}} ">
                     <label for="startDate">Start date</label>
                     <input class="form-control form-control-lg" type="text" id="start-date" name="start_date" value="{{ isset($project) ? $project->start_date: old('start_date') }}" placeholder="service start date">
                     @if($errors->has('start_date'))
                     <strong> {{$errors->first('start_date')}}</strong>
                     @endif
                  </div>
                  <div class="col-6 {{$errors->has('recurrency_payement') ? 'has-error' : ''}} ">
                     <label for="recurrency">Reccurency payement</label>
                     <select class="form-control" id="recurrency" name="recurrency_payement">
                        <option value="YEARLY" id="YEARLY"> YEARLY</option>
                        <option value="HALF-YEARLY" id="HALF-YEARLY"> Half-yearly</option>
                        <option value="SEMESTRIAL" id="SEMESTRIAL"> Semestrial</option>
                        <option value="MONTHLY" id="MONTHLY"> Montlhy</option>
                     </select>
                     @if($errors->has('recurrency_payement'))
                     <strong> {{$errors->first('recurrency_payement')}}</strong>
                     @endif
                  </div>
               </div>
               <!-- end roow -->
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
<!-- Modal edit Service Modal -->
<div class="modal fade" id="modal-edit-prov" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Edit provider service</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" role="form" action="{{ route('update-service-doc-project', $project) }}">
               {{csrf_field()}}
               <input type="hidden" id="sl-id" name="sl_id" value="{{$project}}" >
               <input type="hidden" id="slp-id" name="slp_id" value="{{$project}}" >
               <div class="row">
                  <div class="col-6  {{$errors->has('service_id') ? 'has-error' : ''}}">
                     <label for="inputService">Service</label>
                     <select class="form-control" id="selectCompanyValue" name="service_id">
                        @forelse($servicesSelectable as $data)
                        <option value="{{$data->id}}" id="{{$data->id}}"> {{$data->label}}</option>
                        @empty 
                        <p> No service </p>
                        @endforelse
                     </select>
                  </div>
                  <div class="col-6 {{$errors->has('quantity') ? 'has-error' : ''}} ">
                     <label for="quantity">Quantity</label>
                     <input class="form-control form-control-lg" type="text" id="edit-spd-quantity" name="quantity" value="{{ isset($project) ? $project->quantity: old('quantity') }}" placeholder="service quantity">
                     @if($errors->has('quantity'))
                     <strong> {{$errors->first('quantity')}}</strong>
                     @endif
                  </div>
               </div>
               <div class="row">
                  <div class="col-6 {{$errors->has('unit_cost_ht') ? 'has-error' : ''}} ">
                     <label for="costPrice"> Internal Cost Price</label>
                     <input class="form-control form-control-lg" type="text" id="edit-cost-ht" name="unit_cost_ht" value="{{ isset($project) ? $project->unit_cost_price: old('unit_cost_price') }}" placeholder="service cost price">
                     @if($errors->has('unit_cost_price'))
                     <strong> {{$errors->first('unit_cost_ht')}}</strong>
                     @endif
                  </div>
                  <div class="col-6 {{$errors->has('unit_sell_ht') ? 'has-error' : ''}} ">
                     <label for="sellPrice">sell Price</label>
                     <input class="form-control form-control-lg" type="text" id="edit-spd-sp" name="unit_sell_ht" value="{{ isset($project) ? $project->unit_sell_ht: old('unit_sell_ht') }}" placeholder="service sell price">
                     @if($errors->has('unit_sell_ht'))
                     <strong> {{$errors->first('unit_sell_ht')}}</strong>
                     @endif
                  </div>
               </div>
               <!-- end roow -->
               <div id="form-external">
                  <div class="row">
                     <div class="col-12">
                        <div class="row">
                           <div class="col-4  {{$errors->has('provider_id') ? 'has-error' : ''}}">
                              <label for="inputActive"> Provider </label>
                              <select class="form-control" id="provider_id" name="provider_id">
                                 @foreach ($selectableProviders as $provider)                      
                                 <option value="{{$provider->id}}" id="{{$provider->id}}">   {{$provider->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="col-4 {{$errors->has('spd_unit_cost_ht') ? 'has-error' : ''}} ">
                              <label for="costPrice">Provider Cost Price</label>
                              <input class="form-control form-control-lg" type="text" id="edit-spd-cost-ht" name="spd_unit_cost_ht" value="{{ isset($project) ? $project->spd_unit_cost_ht: old('spd_unit_cost_ht') }}" placeholder="Cost Provider HT">
                              @if($errors->has('spd_unit_cost_ht'))
                              <strong> {{$errors->first('spd_unit_cost_ht')}}</strong>
                              @endif
                           </div>
                           <div class="col-4  {{$errors->has('spd_is_active') ? 'has-error' : ''}}">
                              <label for="inputActive"> Service provider Active </label>
                              <select class="form-control" id="spd_is_active" name="spd_is_active">
                                 <option value="1" id="1"> True</option>
                                 <option value="0" id="0"> False</option>
                              </select>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-4 {{$errors->has('spd_start_date') ? 'has-error' : ''}} ">
                              <label for="startDate">Start date</label>
                              <input class="form-control form-control-lg" type="text" id="edit-prov-start-date" name="spd_start_date" value="{{ isset($project) ? $project->spd_start_date: old('spd_start_date') }}" placeholder="service start date">
                              @if($errors->has('spd_start_date'))
                              <strong> {{$errors->first('spd_start_date')}}</strong>
                              @endif
                           </div>
                           <div class="col-4 {{$errors->has('spd_recurrency_payement') ? 'has-error' : ''}} ">
                              <label for="recurrency">Reccurency payement</label>
                              <input class="form-control form-control-lg" type="text" id="edit-prov-reccurency" name="spd_recurrency_payement" value="{{ isset($project) ? $project->spd_recurrency_payement: old('spd_recurrency_payement') }}" placeholder="service reccurency">
                              @if($errors->has('spd_recurrency_payement'))
                              <strong> {{$errors->first('spd_recurrency_payement')}}</strong>
                              @endif
                           </div>
                           <div class="col-4  {{$errors->has('spd_service_state') ? 'has-error' : ''}}">
                              <label for="inputState">State </label>
                              <select class="form-control" id="spd_service_state" name="spd_service_state">
                                 <option value="1" id="1"> True</option>
                                 <option value="0" id="0"> False</option>
                              </select>
                           </div>
                        </div>
                        <!-- end roow -->
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-6  {{$errors->has('is_active') ? 'has-error' : ''}}">
                     <label for="inputActive">Active  </label>
                     <select class="form-control" id="is_active" name="is_active">
                        <option value="1" id="1"> True</option>
                        <option value="0" id="0"> False</option>
                     </select>
                  </div>
                  <div class="col-6  {{$errors->has('service_state') ? 'has-error' : ''}}">
                     <label for="inputState">State </label>
                     <select class="form-control" id="service_state" name="service_state">
                        <option value="RUNNING" id="RUNNING"> RUNNING</option>
                        <option value="TO PAY" id="TO PAY"> TO PAY</option>
                     </select>
                  </div>
               </div>
               <!-- end roow -->
               <div class="row">
                  <div class="col-6 {{$errors->has('start_date') ? 'has-error' : ''}} ">
                     <label for="startDate">Start date</label>
                     <input class="form-control form-control-lg" type="text" id="edit-cstp" name="start_date" value="{{ isset($project) ? $project->start_date: old('start_date') }}" placeholder="service start date">
                     @if($errors->has('start_date'))
                     <strong> {{$errors->first('start_date')}}</strong>
                     @endif
                  </div>
                  <div class="col-6{{$errors->has('recurrency_payement') ? 'has-error' : ''}} ">
                     <label for="recurrency">Reccurency payement</label>
                     <input class="form-control form-control-lg" type="text" id="edit-reccurency" name="recurrency_payement" value="{{ isset($project) ? $project->recurrency_payement: old('recurrency_payement') }}" placeholder="service reccurency">
                     @if($errors->has('recurrency_payement'))
                     <strong> {{$errors->first('recurrency_payement')}}</strong>
                     @endif
                  </div>
               </div>
               <!-- end roow -->
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script> 
   $('#form-external').hide();
   
   
   
   
   function checkFormSwitch() {
           if (document.getElementById('customSwitch1').checked) {
            $('#form-external').show();
            $('#form-internal').hide();
           } else {
            $('#form-external').hide();
            $('#form-internal').show();
           }
       }
   
      
      
   $('.btn-edit-service').click(function() {
   
     $('#sl_id').val($(this).data('servicelist'));
           $('#service_id').val($(this).data('id'));
           $('#service_name').val($(this).data('name'));
           $('#quantity').val($(this).data('quantity'));
           $('#sell-ht').val($(this).data('sell-ht'));
           $('#cost-ht').val($(this).data('cost-ht'));
           $('#recurrency').val($(this).data('recurrency'));
           $('#start-date').val($(this).data('start-date'));
   
           $("#choose-service").append(new Option( $(this).data('name') , $(this).data('id') , true, true ));
   
   
             $('#modal-edit-service').modal('show');
         });
   
   
         $('.btn-edit-service-prov').click(function() {
            $("#choose-service-prov").append(new Option( $(this).data('service-name') , $(this).data('id') , true, true ));
           
            $('#sl-id').val($(this).data('servicelist'));
            $('#slp-id').val($(this).data('slp-id'));
            $('#service_id').val($(this).data('servicelist'));
            $('#service_name').val($(this).data('name'));     
            $('#edit-spd-quantity').val($(this).data('quantity'));      
            $('#edit-cost-ht').val($(this).data('cost-ht'));
            $('#edit-spd-sp').val($(this).data('sell-ht'));
            $('#edit-prov-start-date').val($(this).data('spd-start-date'));
            $('#edit-prov-reccurency').val($(this).data('spd-recurrency'));
            $('#edit-spd-cost-ht').val($(this).data('spd-cost-ht'));
            $('#edit-reccurency').val($(this).data('reccurency'));          
           
   
          $('#modal-edit-prov').modal('show');
         });
    
</script>
@stop

