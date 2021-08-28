

@extends('adminlte::page')
@section('title', 'Create Offer')
@section('content_header')
@stop
@section('content')
<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{$pageTitle}} </h3>
   </div>
   <!-- /.card-header -->
   <div class="card-body">
      <form method="POST" role="form" action="{{ isset($offer) ? route('update-offer', $offer) : route('store-offer') }}">
         @isset($offer)
         @method('put')
         @endisset
         {{csrf_field()}}
         <div class="row">
            <div class="col-sm-6">
               <!-- text input -->
               <div class="form-group {{$errors->has('label') ? 'has-error' : ''}} ">
                  <label for="offerLabel">Offer label</label>
                  <input class="form-control form-control-lg" type="text" id="label" name="label" value="{{ isset($offer) ? $offer->label: old('label') }}" placeholder="offer name">
                  @if($errors->has('label'))
                  <strong> {{$errors->first('label')}}</strong>
                  @endif
               </div>
               <div class="form-group  {{$errors->has('concerned_company') ? 'has-error' : ''}}">
                  <label for="inputCompany">Company</label>
                  <select class="form-control" id="selectCompanyValue" name="concerned_company">
                     @isset($currentCompany)
                     <option value="{{$currentCompany->id}}" id="{{$offer->concerned_company}}"> {{$currentCompany->name}}</option>
                     @endisset
                     @foreach ($companies as $company)
                     <option value="{{$company->id}}" id="{{$company->id}}"> {{$company->name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group  {{$errors->has('concerned_client') ? 'has-error' : ''}}">
                  <label for="inputCompany">Concerned client</label>
                  <select class="form-control" id="concerned_client" name="concerned_client">
                     @foreach ($companies as $company)
                     <option value="{{$company->id}}" id="{{$company->id}}"> {{$company->name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group  {{$errors->has('offer_priority_state') ? 'has-error' : ''}}">
                  <label for="inputOfferPriority">Offer Priority </label>
                  <select class="form-control" id="offer_priority_state" name="offer_priority_state">
                     <option value="low" id="low"> Low</option>
                     <option value="medium" id="medium"> medium</option>
                     <option value="high" id="high"> high</option>
                  </select>
               </div>
               <div class="form-group {{$errors->has('due_date') ? 'has-error' : ''}} ">
                  <label for="offerDesc">Offer due date</label>
                  <input class="form-control form-control-lg" type="text" id="due_date" data-date-format="yyyy-mm-dd" name="due_date" value="{{ isset($offer) ? $offer->due_date: old('due_date') }}" placeholder="offer due date">
                  @if($errors->has('due_date'))
                  <strong> {{$errors->first('due_date')}}</strong>
                  @endif
               </div>
            </div>
            <!-- end roow -->
            <div class="col-sm-6">
               <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} ">
                  <label for="offerDesc">Offer description</label>
                  <textarea class="form-control form-control-lg" type="text" id="description" name="description" value="{{ isset($offer) ? $offer->description: old('description') }}" placeholder="offer desc">
                  </textarea>
                  @if($errors->has('description'))
                  <strong> {{$errors->first('description')}}</strong>
                  @endif
               </div>
            </div>
         </div> <!-- end row-->
       
   </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!-- /.card-body -->
</div>
</form>
@stop
@section('css')
<link rel="stylesheet" href="../css/admin_custom.css">
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script> 
   $(function() {
     format: 'mm-dd-yyyy',
           $( "#due_date" ).datepicker();
         });
</script>
@stop

