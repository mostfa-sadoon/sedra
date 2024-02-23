@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<h2><a href="{{route('Admin.Promocode.index')}}">{{__('dashboard.promo_code')}}</a></h2>


@endsection
@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">


                <div class="col-3">
                    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#changeprice"> {{__('dashboard.Add_promocode')}}</button>
                </div>



            </div>

        </div>






            {{-- begain campaigns --}}

          <!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header">
										<div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-favourite text-primary"></i>
											</span>
											<h3 class="card-label">{{__('dashboard.promo_code')}}</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->

										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
											<thead>
												<tr>

													<th>{{__('dashboard.code')}}</th>
													<th>{{__('dashboard.remaining_count')}}</th>
													<th>{{__('dashboard.discount_cash_value')}}</th>
													<th>{{__('dashboard.discount_percent')}}</th>
                                                    <th>{{__('dashboard.start_date')}}</th>
													<th>{{__('dashboard.end_date')}}</th>

                                                    <th>{{__('dashboard.min_price')}}</th>


													<th>{{__('dashboard.actions')}}</th>
												</tr>
											</thead>
											<tbody>

                                                @foreach ($promocodes as $promocode)
                                                    <tr>
                                                        <td>{{$promocode->code}}</td>
                                                        <td>{{$promocode->users_number}}</td>
                                                        <td>{{$promocode->amount}}</td>
                                                        <td>{{$promocode->percent}}</td>
                                                        <td> {{$promocode->start_date}} </td>
                                                        <td> {{$promocode->enddate}}   </td>

                                                        <td>{{$promocode->min_order_price}} </td>
                                                        <td>

                                                            <span class="svg-icon svg-icon-primary svg-icon-2x editPromocode" data-toggle="modal" data-target="#editPromocode"
                                                            data-id="{{$promocode->id}}" data-code="{{$promocode->code}}" data-users_number="{{$promocode->users_number}}" data-amount="{{$promocode->amount}}"
                                                            data-percent="{{$promocode->percent}}" data-start_date="{{date('Y-m-d', strtotime($promocode->start_date))}}" data-end_date="{{date('Y-m-d', strtotime($promocode->end_date))}}"  data-min_order_price="{{$promocode->min_order_price}}"
                                                            ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            </g>
                                                            </svg><!--end::Svg Icon--></span>




                                                            <span class="svg-icon svg-icon-primary svg-icon-2x deleeteBromoCode" data-toggle="modal" data-target="#deletepromocode" data-id="{{$promocode->id}}" ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>




                                                        </td>








                                                    </tr>
                                                @endforeach



											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->

            {{-- end campaigns --}}





    </div>
</div>





    {{--begain::edit parcode --}}
        <div class="modal fade outer-repeater" id="editPromocode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.promo_code')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{route('Admin.promocode.update')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id">
                        <div class="modal-body" id="detailes">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.code')}} </label>
                                    <input class="form-control" type="text" id="code" name="code" required>
                                    @if ($errors->has('code'))
                                    <p class="text-danger">{{ $errors->first('code')}}</p>
                                    @endif
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.discount_number')}} </label>
                                    <input class="form-control" type="number" id="users_number" name="users_number" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.discount_cash_value')}} </label>
                                    <input class="form-control" id="amount" type="number" id="amount" name="amount" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.discount_percent')}} </label>
                                    <input class="form-control" id="percent" type="number" id="pwercent" name="percent" value="0" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.start_date')}} </label>
                                    <input class="form-control" type="date"  id="start_date" name="start_date" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.end_date')}} </label>
                                    <input class="form-control" type="date" id="end_date" name="end_date" required>
                                </div>

                                <div class="form-group col-6">
                                     <label>  {{__('dashboard.min_price')}} </label>
                                    <input class="form-control" type="number" id="min_order_price" name="min_order_price" required>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{__('dashboard.edit')}}</button>
                        </div>
                        </form>
                    </div>











            </div>
        </div>
    {{--end::edit parcode    --}}


   {{--begain::store promocode --}}
    <div class="modal fade outer-repeater" id="changeprice" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.Add_promocode')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('Admin.promocode.store')}}" method="post">
                        @csrf
                    <div class="modal-body" id="detailes">

                            <div class="row">
                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.code')}} </label>
                                    <input class="form-control" type="text" name="code" required>
                                    @if ($errors->has('code'))
                                    <p class="text-danger">{{ $errors->first('code')}}</p>
                                    @endif
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.discount_number')}} </label>
                                    <input class="form-control" type="number" name="users_number" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.discount_cash_value')}} </label>
                                    <input class="form-control" id="amount" type="number" name="amount" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.discount_percent')}} </label>
                                    <input class="form-control" id="percent" type="number" name="percent" value="0" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.start_date')}} </label>
                                    <input class="form-control" type="date" id="stert_date" name="start_date" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.end_date')}} </label>
                                    <input class="form-control" type="date" id="end_date" name="end_date" required>
                                </div>

                                <div class="form-group col-6">
                                    <label>  {{__('dashboard.min_price')}} </label>
                                    <input class="form-control" type="number" id="min_order_price" value="0" name="min_order_price" required>
                                </div>
                            </div>




                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dashboard.add')}}</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    {{--end::end store promocode   --}}

    {{-- start::delete promocode alert --}}
       <!-- start delete user modal -->
    <div class="modal fade" id="deletepromocode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_promocode')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('Admin.promocode.delete')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="promocode_id">

                <h4>{{__('dashboard.sure')}}</h4>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
            <button type="submit" class="btn btn-danger">{{__('dashboard.delete')}}</button>
            </div>
            </form>
        </div>
        </div>
    </div>
<!-- end delete user modal -->

    {{-- end::delete promocode alert  --}}

@endsection


@section('scripts')

<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>


{{-- /show barcode --}}


<script>



    $('#amount').click(function(){
      $('#percent').val(0);
    });
    $('#percent').click(function(){
      $('#amount').val(0);
    });





</script>





@if (Session::get('errors')!=null)
<script>
        $(document).ready(function() {
            $('#changeprice').modal('show');
        });
</script>
@endif



{{-- start edit promo code --}}

 <script>

$('#kt_datatable').on('click','.editPromocode',function (){

        var id                =$(this).attr("data-id");
        var code              =$(this).attr("data-code");
        var users_number      =$(this).attr("data-users_number");
        var amount            =$(this).attr("data-amount");
        var percent           =$(this).attr("data-percent");
        var start_date        =$(this).attr("data-start_date");
        var end_date          =$(this).attr("data-end_date");
        var min_order_price   =$(this).attr("data-min_order_price");




        $('#id').val(id);
        $('#code').val(code);
        $('#users_number').val(users_number);
        $('#amount').val(amount);
        $('#percent').val(percent);
        $('#start_date').val(start_date);
        $('#end_date').val(end_date);
        $('#min_order_price').val(min_order_price);
});


$('#kt_datatable').on('click','.deleeteBromoCode',function (){

    var id       =$(this).attr("data-id");

    $('#promocode_id').val(id);
});




 </script>


{{-- end edit promo code   --}}
@endsection





