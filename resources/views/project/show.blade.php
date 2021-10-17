

@extends('adminlte::page')
@section('title', 'Single project')
@section('content_header')
<h1> {{$pageTitle}} </h1>
@stop
@section('content')
<div class="card">
   <div class="card-header">
      <h3 class="card-title"> Project : {{$project->label}}</h3>
   </div>
   <div class="card-body">
      <div class="row">
         <div class="col-5">
            <strong>Company owner :</strong>
            <br>
            <p> {{$project->company->name}}</p>
            <strong>Company employement :</strong>

            <p>
            @foreach($project->company->companyEmploye as $data )
            <br>   {{$data->users->name}} {{$data->users->firstname}} 
            @endforeach
            </p>
            
            <strong>Projects description :</strong>
            <br>
            <p> {{$project->description}}</p>
         </div>
         <div class="col-7">
            <div class="row">
               <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                     <div class="inner">
                        <h3>{{$project->reference}} </h3>
                        <p> Reference </p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                     <div class="inner">
                        <h3>{{$project->project_state}} </h3>
                        <p> State</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                     <div class="inner">
                        <h3>{{$project->start_date}}</h3>
                        <p>Start Date </p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                  </div>
               </div>
               <!-- ./col -->
            </div>
            <div class="row">
               <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                     <div class="inner">
                        <h3>{{$countAS}}</h3>
                        <p> Active Service </p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                     <div class="inner">
                        <h3>{{$countRS}}</h3>
                        <p>Reccurent Service </p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-4 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                     <div class="inner">
                        <h3>{{$sumReccService}}<sup style="font-size: 20px">€</sup> </h3>
                        <p>Price reccurent Service </p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                  </div>
               </div>
               <!-- ./col -->
            </div>
         </div>
      </div>
   </div>
   <!-- /.card-body -->
</div>
<!-- /.card -->
<br>
<div class="row">
   <div class="col-12">
      <!-- Custom Tabs -->
      <div class="card">
         <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Tabs</h3>
            <ul class="nav nav-pills ml-auto p-2">
               <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Service Active</a></li>
               <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Service Archived</a></li>
               <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Cancellation Asked</a></li>
            </ul>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <div class="tab-content">
               <div class="tab-pane active" id="tab_1">
                  <table class="table table-striped" id="main-table">
                     <thead>
                        <tr>
                           <th> Name  </th>
                           <th>QT.   </th>
                           <th>Recc.</th>
                           <th> State </th>
                           <th> Payement State </th>
                           @isManager
                           <th> Unit Cost HT </th>
                           <th> Total cost HT </th>
                           @endisManager
                           <th>Unit @isManager sell @endisManager </th>
                           <th> Total  @isManager sell @endisManager  </th>
                           <th  class="collapse accordion"> Start Date </th>
                           <th  class="collapse accordion"> Next pay date </th>
                           <th  class="collapse accordion"> Last Payement date </th>
                           @isManager
                           <th> Benefits </th>
                           @endisManager
                           <th> Is billable </th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($project->services->whereIn('service_state', ['RUNNING', 'CANCELLATION ASKED']) as $data)       
                        <tr>
                           <td>  {{$data->service->label}}  </td>
                           <td>{{$data->quantity}} </td>
                           <td>
                              @isset($data->recurrency_payement)
                              {{$data->recurrency_payement}}
                              @else
                              none
                              @endisset
                           </td>
                           <td>{{$data->service_state}}</td>
                           <td>{{$data->payement_state}}</td>
                           @isManager
                           @if(isset($data->serviceProv ))
                           <td> {{$data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht}} €<br>
                              {{$data->unit_cost_ht}} € +         <strong>    {{$data->serviceProv->spd_unit_cost_ht}}€  ({{$data->serviceProv->provided->name}} ) </strong>
                           </td>
                           @else
                           <td>{{$data->unit_cost_ht }} €  </td>
                           @endif
                           <td>
                              @if(isset($data->serviceProv ))
                              {{($data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht) * $data->quantity}}€ <br>
                              @else 
                              {{ (  $data->unit_cost_ht ) * ($data->quantity) }} €
                              @endif      
                           </td>
                           @endisManager
                           <td>{{$data->unit_sell_ht }}€</td>
                           <td>
                              {{$data->unit_sell_ht * $data->quantity }} €
                           </td>
                           <td  class="collapse accordion">{{$data->start_date}}</td>
                           <td  class="collapse accordion">
                              @if ($data->next_payement_date == null) 
                              none
                              @else 
                              {{$data->next_payement_date}}
                              @endif
                           </td>
                           <td  class="collapse accordion">
                              @if(isset($data->last_payement_date ))
                              {{$data->last_payement_date}}
                              @else 
                              <p> No data found<p>
                              @endif
                           </td>
                           @isManager
                           <td>
                              @if(isset($data->serviceProv ))
                              {{ ($data->unit_sell_ht * $data->quantity) - (   ($data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht) * ($data->quantity)) }} € <br/>
                              @else 
                              {{ ($data->unit_sell_ht * $data->quantity) - (   ($data->unit_cost_ht ) * ($data->quantity)) }} € <br/>
                              @endif      
                           </td>
                           <td>
                              @if($data->is_billable == 1)
                              Yes
                              @else
                              No
                              @endif
                           </td>
                           @endisManager
                           <td>
                              <div class="btn-group">
                                 <!--   Show date service -->
                                 <button type="button" data-toggle="collapse" data-target=".accordion"  class="btn btn-success clickable ">
                                 Show date  </button>
                                 <!--   /Show date service -->
                                 @isManager
                                 @isset($data->serviceProv )       
                                 <!--   Edit service -->
                                 <button type="button" data-toggle="modal" data-target="modal-edit-prov" class="btn btn-primary  btn-edit-service-prov"   
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
                                 Edit
                                 </button>
                                 <!--   /Edit service -->
                                 @endisset 
                                 @empty($data->serviceProv )
                                 <!--   Edit service -->
                                 <button type="button" data-toggle="modal" data-target="modal-edit-prov" class="btn btn-primary  btn-edit-service"  
                                    data-servicelist='{{$data->id}}'     
                                    data-name='{{ $data->service->label}}'     
                                    data-quantity='{{ $data->quantity}}'
                                    data-cost-ht='{{ $data->unit_cost_ht}}'
                                    data-start-date='{{ $data->start_date}}'
                                    data-sell-ht='{{ $data->unit_sell_ht}}'
                                    data-recurrency='{{$data->recurrency_payement}}'
                                    data-id='{{$data->service->id}}' 
                                    >
                                 Edit 
                                 </button>
                                 <!--   /Edit service -->
                                 @endempty
                                 <!--  Remove service project -->
                                 <form method="post" action="{{route('remove-service-doc-project', $data->id )}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                                  Archive</button>
                                 </form>
                                 <!--  /Remove service project -->
                                 @endisManager
                                 @isClient
                                 <!--  Ask cancellation  -->
                                 <form method="post" action="{{route('cancel-service-doc-project', $data->id )}}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning float-right" style="margin-right: 5px;">
                                    Ask cancellation  </button>
                                 </form>
                                 <!--  / Ask cancellation e -->
                                 @endisClient
                              </div>
                           </td>
                        </tr>
                        @empty
                        <td colspan="10"> no service currently </td>
                        @endforelse
                     </tbody>
                  </table>
               </div>
               <!-- /.tab-pane -->
               <div class="tab-pane" id="tab_3">
                  <table class="table table-striped" id="second-table">
                     <thead>
                        <tr>
                           <th> Name  </th>
                           <th>QT.   </th>
                           <th>Recc.</th>
                           <th> State </th>
                           <th> Payement State </th>
                           @isManager
                           <th> Unit Cost HT </th>
                           <th> Total cost HT </th>
                           @endisManager
                           <th>Unit @isManager sell @endisManager </th>
                           <th> Total  @isManager sell @endisManager  </th>
                           <th  > Start Date </th>
                           <th  > Last Payement date </th>
                           @isManager
                           <th> Benefits </th>
                           @endisManager
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($project->services->where('service_state', 'CANCELLATION ASKED') as $data)        
                        <tr>
                           <td>  {{$data->service->label}}  </td>
                           <td>{{$data->quantity}} </td>
                           <td>
                              @isset($data->recurrency_payement)
                              {{$data->recurrency_payement}}
                              @else
                              none
                              @endisset
                           </td>
                           <td>{{$data->service_state}}</td>
                           <td>{{$data->payement_state}}</td>
                           @isManager
                           @if(isset($data->serviceProv ))
                           <td> {{$data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht}} €<br>
                              {{$data->unit_cost_ht}} € +         <strong>    {{$data->serviceProv->spd_unit_cost_ht}}€  ({{$data->serviceProv->provided->name}} ) </strong>
                           </td>
                           @else
                           <td>{{$data->unit_cost_ht }} €  </td>
                           @endif
                           <td>
                              @if(isset($data->serviceProv ))
                              {{($data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht) * $data->quantity}}€ <br>
                              @else 
                              {{ (  $data->unit_cost_ht ) * ($data->quantity) }} €
                              @endif      
                           </td>
                           @endisManager
                           <td>{{$data->unit_sell_ht }}€</td>
                           <td>
                              {{$data->unit_sell_ht * $data->quantity }} €
                           </td>
                           <td  >{{$data->start_date}}</td>
                           <td>
                              @if(isset($data->last_payement_date ))
                              {{$data->last_payement_date}}
                              @else 
                              <p> No data found</p>
                              @endif
                           </td>
                           @isManager
                           <td>
                              @if(isset($data->serviceProv ))
                              {{ ($data->unit_sell_ht * $data->quantity) - (   ($data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht) * ($data->quantity)) }} € <br/>
                              @else 
                              {{ ($data->unit_sell_ht * $data->quantity) - (   ($data->unit_cost_ht ) * ($data->quantity)) }} € <br/>
                              @endif      
                           </td>
                           @endisManager
                        </tr>
                        @empty
                        <td colspan="5"> no service currently </td>
                        @endforelse
                     </tbody>
                  </table>
               </div>
               <div class="tab-pane" id="tab_2">
                  <table class="table table-striped" id="second-table">
                     <thead>
                        <tr>
                           <th> Name  </th>
                           <th>QT.   </th>
                           <th>Recc.</th>
                           <th> State </th>
                           <th> Payement State </th>
                           @isManager
                           <th> Unit Cost HT </th>
                           <th> Total cost HT </th>
                           @endisManager
                           <th>Unit @isManager sell @endisManager </th>
                           <th> Total  @isManager sell @endisManager  </th>
                           <th  > Start Date </th>
                           <th  > Last Payement date </th>
                           @isManager
                           <th> Benefits </th>
                           @endisManager
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($project->services->where('service_state', 'ARCHIVED') as $data)        
                        <tr>
                           <td>  {{$data->service->label}}  </td>
                           <td>{{$data->quantity}} </td>
                           <td>
                              @isset($data->recurrency_payement)
                              {{$data->recurrency_payement}}
                              @else
                              none
                              @endisset
                           </td>
                           <td>{{$data->service_state}}</td>
                           <td>{{$data->payement_state}}</td>
                           @isManager
                           @if(isset($data->serviceProv ))
                           <td> {{$data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht}} €<br>
                              {{$data->unit_cost_ht}} € +         <strong>    {{$data->serviceProv->spd_unit_cost_ht}}€  ({{$data->serviceProv->provided->name}} ) </strong>
                           </td>
                           @else
                           <td>{{$data->unit_cost_ht }} €  </td>
                           @endif
                           <td>
                              @if(isset($data->serviceProv ))
                              {{($data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht) * $data->quantity}}€ <br>
                              @else 
                              {{ (  $data->unit_cost_ht ) * ($data->quantity) }} €
                              @endif      
                           </td>
                           @endisManager
                           <td>{{$data->unit_sell_ht }}€</td>
                           <td>
                              {{$data->unit_sell_ht * $data->quantity }} €
                           </td>
                           <td  >{{$data->start_date}}</td>
                           <td>
                              @if(isset($data->last_payement_date ))
                              {{$data->last_payement_date}}
                              @else 
                              <p>No data found </p>
                              @endif
                           </td>
                           @isManager
                           <td>
                              @if(isset($data->serviceProv ))
                              {{ ($data->unit_sell_ht * $data->quantity) - (   ($data->unit_cost_ht + $data->serviceProv->spd_unit_cost_ht) * ($data->quantity)) }} € <br/>
                              @else 
                              {{ ($data->unit_sell_ht * $data->quantity) - (   ($data->unit_cost_ht ) * ($data->quantity)) }} € <br/>
                              @endif      
                           </td>
                           @endisManager
                        </tr>
                        @empty
                        <td colspan="5"> no service currently </td>
                        @endforelse
                     </tbody>
                  </table>
               </div>
               <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
         </div>
         <!-- /.card-body -->
      </div>
      <!-- ./card -->
   </div>
   <!-- /.col -->
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
                  <div class="col-3  {{$errors->has('service_id') ? 'has-error' : ''}}">
                     <label for="inputService">Service</label>
                     <select class="form-control" id="selectCompanyValue" name="service_id">
                        @forelse($servicesSelectable as $data)
                        <option value="{{$data->id}}" id="{{$data->id}}"> {{$data->label}}</option>
                        @empty 
                        <p> No service </p>
                        @endforelse
                     </select>
                  </div>
                  <div class="col-3 {{$errors->has('quantity') ? 'has-error' : ''}} ">
                     <label for="quantity">Quantity</label>
                     <input class="form-control form-control-lg" type="number" min="1" id="edit-quantity" name="quantity" value="{{ isset($project) ? $project->quantity: old('quantity') }}" placeholder="service quantity">
                     @if($errors->has('quantity'))
                     <strong> {{$errors->first('quantity')}}</strong>
                     @endif
                  </div>
                  <div class="col-3 {{$errors->has('unit_cost_ht') ? 'has-error' : ''}} ">
                     <label for="costPrice">Cost Price</label>
                     <input class="form-control form-control-lg" type="number" id="edit-cp" name="unit_cost_ht" value="{{ isset($project) ? $project->unit_cost_price: old('unit_cost_price') }}" placeholder="service cost price">
                     @if($errors->has('unit_cost_price'))
                     <strong> {{$errors->first('unit_cost_ht')}}</strong>
                     @endif
                  </div>
                  <div class="col-3 {{$errors->has('unit_sell_ht') ? 'has-error' : ''}} ">
                     <label for="sellPrice">sell Price</label>
                     <input class="form-control form-control-lg" type="number" id="edit-cp" name="unit_sell_ht" value="{{ isset($project) ? $project->unit_sell_ht: old('unit_sell_ht') }}" placeholder="service sell price">
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
                              <input class="form-control form-control-lg" type="number" min="1" id="edit-cp" name="spd_unit_cost_ht" value="{{ isset($project) ? $project->spd_unit_cost_ht: old('spd_unit_cost_ht') }}" placeholder="Cost Provider HT">
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
                              <input class="form-control form-control-lg" type="text" id="edit-cstp"  data-date-format="yyyy-mm-dd"  name="spd_start_date" value="{{ isset($project) ? $project->spd_start_date: old('spd_start_date') }}" placeholder="service start date">
                              @if($errors->has('spd_start_date'))
                              <strong> {{$errors->first('spd_start_date')}}</strong>
                              @endif
                           </div>
                           <div class="col-4 {{$errors->has('spd_recurrency_payement') ? 'has-error' : ''}} ">
                              <label for="recurrency">Reccurency payement</label>
                              <select class="form-control" id="spd-recurrency" name="spd_recurrency_payement">
                              <option value="NONE" id="NONE"> NONE</option>
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
                             
                                 <option value="RUNNING" id="RUNNING"> RUNNING</option>
                                 <option value="TO PAY" id="TO PAY"> TO PAY</option>
                                 <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
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
                     
                        <option value="RUNNING" id="RUNNING"> RUNNING</option>
                        <option value="TO PAY" id="TO PAY"> TO PAY</option>
                        <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
                     </select>
                  </div>
               </div>
               <!-- end roow -->
               <div class="row">
                  <div class="col-6 {{$errors->has('start_date') ? 'has-error' : ''}} ">
                     <label for="startDate">Start date</label>
                     <input class="form-control form-control-lg" type="text" id="start_date"  data-date-format="yyyy-mm-dd"  name="start_date" value="{{ isset($project) ? $project->start_date: old('start_date') }}" placeholder="service start date">
                     @if($errors->has('start_date'))
                     <strong> {{$errors->first('start_date')}}</strong>
                     @endif
                  </div>
                  <div class="col-6{{$errors->has('recurrency_payement') ? 'has-error' : ''}} ">
                     <label for="recurrency">Reccurency payement</label>
                     <select class="form-control" id="recurrency" name="recurrency_payement">
                     <option value="NONE" id="NONE"> NONE</option>
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
                  <input class="form-control " type="number" id="quantity"  name="quantity"  placeholder="Quantity">
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
                      
                        <option value="RUNNING" id="RUNNING"> RUNNING</option>
                        <option value="TO PAY" id="TO PAY"> TO PAY</option>
                        <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
                     </select>
                  </div>
               </div>
               <!-- end roow -->
               <div class="row">
                  <div class="col-6 {{$errors->has('start_date') ? 'has-error' : ''}} ">
                     <label for="startDate">Start date</label>
                     <input class="form-control form-control-lg" type="text" id="start-date"  data-date-format="yyyy-mm-dd" name="start_date" value="{{ isset($project) ? $project->start_date: old('start_date') }}" placeholder="service start date">
                     @if($errors->has('start_date'))
                     <strong> {{$errors->first('start_date')}}</strong>
                     @endif
                  </div>
                  <div class="col-6 {{$errors->has('recurrency_payement') ? 'has-error' : ''}} ">
                     <label for="recurrency">Reccurency payement</label>
                     <select class="form-control" id="recurrency" name="recurrency_payement">
                     <option value="NONE" id="NONE"> NONE</option>
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
                     <input class="form-control form-control-lg" type="text" id="edit-cost-ht" min="0" name="unit_cost_ht" value="{{ isset($project) ? $project->unit_cost_price: old('unit_cost_price') }}" placeholder="service cost price">
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
                              <input class="form-control form-control-lg" type="text" id="spd-recurrency" name="spd_recurrency_payement" value="{{ isset($project) ? $project->spd_recurrency_payement: old('spd_recurrency_payement') }}" placeholder="service reccurency">
                              @if($errors->has('spd_recurrency_payement'))
                              <strong> {{$errors->first('spd_recurrency_payement')}}</strong>
                              @endif
                           </div>
                           <div class="col-4  {{$errors->has('spd_service_state') ? 'has-error' : ''}}">
                              <label for="inputState">State </label>
                              <select class="form-control" id="spd_service_state" name="spd_service_state">
                               
                                 <option value="RUNNING" id="RUNNING"> RUNNING</option>
                                 <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
                                 <option value="TO PAY" id="TO PAY"> TO PAY</option>
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
                        <option value="ARCHIVED" id="ARCHIVED"> ARCHIVED</option>
               
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
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
            $('#spd-recurrency').val($(this).data('spd_recurrency_payement'));
            $('#edit-spd-cost-ht').val($(this).data('spd-cost-ht'));
            $('#edit-reccurency').val($(this).data('reccurency'));          
           
   
          $('#modal-edit-prov').modal('show');
         });
    
         $(function() {
            format: 'mm-dd-yyyy',
           $( "#spd-start-date" ).datepicker();
      
         });
   
         $(function() {
            format: 'mm-dd-yyyy',
            console.log("HELLO");
           $( "#edit-cstp" ).datepicker();
       
      
         });
   
         $(function() {
            format: 'mm-dd-yyyy',
            $( "#start_date" ).datepicker();
      
         });
   
      
   
   
    $(document).ready( function () {
   
    $('#main-table').DataTable();
    $('#second-table').DataTable();
   } );
</script>
@stop

