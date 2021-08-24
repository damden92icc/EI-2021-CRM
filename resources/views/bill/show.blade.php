

@extends('adminlte::page')
@section('title', 'Single bill')
@section('content_header')
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.', true)
<h1> {{$pageTitle}} </h1>

@stop
@section('content')
{{$bill}}
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
         <th> Origine </th>
         <th> Quantity </th>
            <th>Label</th>
            <th> Unit  price HT </th>
            <th> VAT Rate </th>
            <th> Total Sell price HT </th>
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
               <td> 
                    <!--  Remove service Quote -->
                  <form method="post" action="{{route('remove-service-doc-bill', $data->id )}}">
                     @csrf
                     <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                     <i class="fa fa-download"></i>Remove  </button>
                  </form>
                  <!--  /Remove service Quote -->
               </td>
         </tr>
         </tbody>
     
         
         @empty
         <tr><td>
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
   <!-- /.card-body -->
</div>
<div class="btn-group">
   <!--  Update  -->
   <form method="get" action="{{route('edit-bill', $bill )}}">
      @csrf
      <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
      <i class="fa fa-download"></i>Update bill  </button>
   </form>
   <!--  /Update  -->
   <!--  Valide  -->
   <form method="post" action="{{route('send-bill', $bill )}}">
      @csrf
      <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;">
      <i class="fa fa-download"></i>Send bill </button>
   </form>

   <!--  /Valide  -->
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
  
   <!--   Add service -->
   <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-default">
   <i class="fa fa-download"></i> Add billable service 
   </button>
   <!--   /Add service -->

       <!--  Archive  -->
   <form method="post" action="{{route('archive-bill', $bill )}}">
      @csrf
      <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
      <i class="fa fa-download"></i>Pay  </button>
   </form>
   <!--  /Archive  -->
</div>

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
                            text : item.project_name + ' ' + item.service_name  + ' ' + item.unit_sell_ht + ' €' + '(' + item.quantity + ')' ,
                            id: $.parseJSON(item.id ),
                        }
                    } )
                }
            }
        }
    });   



</script>
@stop

