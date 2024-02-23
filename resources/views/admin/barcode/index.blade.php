@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<h2><a href="{{route('Admin.product.index')}}">{{__('dashboard.barcode')}}</a></h2>

@endsection
@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">


                <div class="col-3">
                    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#changeprice"> {{__('dashboard.change_price')}}</button>
                </div>


                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                                <!--begin::Nav Tabs-->
                                <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">





                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center @if($type=='pending') active  @endif"  href="{{route('Admin.barcodes','pending')}}">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Cart2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">{{__('dashboard.new')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->




                                     <!--begin::Item-->
                                     <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center @if($type=='accepted')  active  @endif"  href="{{route('Admin.barcodes','accepted')}}">
                                            <span class="nav-icon py-2 w-auto">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Loader.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,4 C8.55228475,4 9,4.44771525 9,5 L9,17 L18,17 C18.5522847,17 19,17.4477153 19,18 C19,18.5522847 18.5522847,19 18,19 L9,19 C8.44771525,19 8,18.5522847 8,18 C7.44771525,18 7,17.5522847 7,17 L7,6 L5,6 C4.44771525,6 4,5.55228475 4,5 C4,4.44771525 4.44771525,4 5,4 L8,4 Z" fill="#000000" opacity="0.3"/>
                                                        <rect fill="#000000" opacity="0.3" x="11" y="7" width="8" height="8" rx="4"/>
                                                        <circle fill="#000000" cx="8" cy="18" r="3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{__('dashboard.accepted')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->



                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center @if($type=='refused') active  @endif"  href="{{route('Admin.barcodes','refused')}}">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Thumbtack.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
                                                    <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">{{__('dashboard.rejected')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Nav Tabs-->
                    </div>
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
											<h3 class="card-label">{{__('dashboard.barcode')}}</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->

										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
											<thead>
												<tr>
                                                    <th>{{__('dashboard.id')}}</th>
													<th>{{__('dashboard.name')}}</th>
													<th>{{__('dashboard.phone')}}</th>
													<th>{{__('dashboard.passport')}}</th>
													<th>{{__('dashboard.status')}}</th>
                                                    <th>{{__('dashboard.price')}}</th>
													<th>{{__('dashboard.payment_method')}}</th>
                                                    <th>{{__('dashboard.created_at')}}</th>

													<th>{{__('dashboard.actions')}}</th>
												</tr>
											</thead>
											<tbody>





											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->

            {{-- end campaigns --}}





    </div>
</div>


    <!-- start reject barcode modal -->
        <div class="modal fade" id="rejectbarcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.rejextRequest')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.barcode.reject')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <p style="font-weight: 800; font-size :16px;"> {{__('dashboard.request_id')}} : <span id="order_id"></span> </p>
                    <h4>{{__('dashboard.sure')}}</h4>


                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                <button type="submit" class="btn btn-danger">{{__('dashboard.reject')}}</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    <!-- end reject barcode modal -->



    {{--begain::show parcode --}}
        <div class="modal fade outer-repeater" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.barcode')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body" id="detailes">



                        </div>


                        <div class="modal-footer">

                        </div>
                    </div>


            </div>
        </div>
   {{--end::show parcode --}}


   {{--begain::change price --}}
   <div class="modal fade outer-repeater" id="changeprice" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.change_price')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.barcode.changeprice')}}" method="post">
                    @csrf
                <div class="modal-body" id="detailes">

                        <div class="form-group">
                            <input type="number" name="price" value="{{$price}}" class="form-control">
                        </div>



                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.edit')}}</button>
                </div>
            </form>
            </div>
    </div>
   </div>
    {{--end::change price --}}
@endsection


@section('scripts')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


{{-- /show barcode --}}


<script>

    $('#datatable').on('click','.show_barcode',function (){

            var id=$(this).attr("data-id");


            $.ajax({
                url:"/barcode/show/"+id,
                type:"GET", //send it through get method
                success: function (response) {

                    $('#detailes').html(response);

                },
                error: function(response) {

                }
                });

    });




</script>
  {{-- start get datatable --}}

    <script>
        var searchtranslate            ={!!json_encode(__('dashboard.search'))!!};
        var barcodetype                ={!!json_encode($type)!!};
        var barcodeRejectUrl           ={!!json_encode(route('Admin.barcode.reject',0))!!}
        var barcodeAcceptUrl           ={!!json_encode(route('Admin.barcode.accept',0))!!}

    $(document).ready(function() {
            $('#datatable').DataTable({
                    "ajax": {
                        "url": `/list/barcode/${barcodetype}`, // Replace with your API endpoint
                        "type": "GET",
                    },
                    "columns": [
                        // Define your columns here
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "phone" },
                        { "data": "passport" },
                        { "data": "status" ,
                        render: function (data, type, row, meta) {
                            if(barcodetype=='pending'){
                                return `{{__('dashboard.pending')}}`;
                            }else if(barcodetype=='accepted'){
                                return `{{__('dashboard.accepted')}}`;
                            }else{
                                return  `{{__('dashboard.rejected')}}`;

                            }
                        }},
                        { "data": "price" },
                        { "data": "payment_type" ,render(data, type, row, meta){
                                if(row.payment_type==1){
                                    return `{{__('dashboard.wallet')}}`;
                                }else if(row.payment_type==2){
                                    return `{{__('dashboard.bank')}}`;
                                }else{
                                    return `{{__('dashboard.visa')}}`;
                                }
                        }},
                        { "data": "created_at" },
                        {
                            data: "options",
                            className: "text-center",
                            orderable:  false,
                            render: function (data, type, row, meta) {
                                if(barcodetype=='pending'){
                                    return `
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <a href="${barcodeAcceptUrl}${row.id}">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                                </a>
                                                </svg><!--end::Svg Icon-->
                                        </span>

                                        <span   class="show_barcode  svg-icon svg-icon-primary svg-icon-2x " data-id="${row.id}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>


                                        <a class="reject_barcode" data-id="${row.id}" data-toggle="modal" data-target="#rejectbarcode">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-disabled.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M10.5857864,12 L9.17157288,10.5857864 C8.78104858,10.1952621 8.78104858,9.56209717 9.17157288,9.17157288 C9.56209717,8.78104858 10.1952621,8.78104858 10.5857864,9.17157288 L12,10.5857864 L13.4142136,9.17157288 C13.8047379,8.78104858 14.4379028,8.78104858 14.8284271,9.17157288 C15.2189514,9.56209717 15.2189514,10.1952621 14.8284271,10.5857864 L13.4142136,12 L14.8284271,13.4142136 C15.2189514,13.8047379 15.2189514,14.4379028 14.8284271,14.8284271 C14.4379028,15.2189514 13.8047379,15.2189514 13.4142136,14.8284271 L12,13.4142136 L10.5857864,14.8284271 C10.1952621,15.2189514 9.56209717,15.2189514 9.17157288,14.8284271 C8.78104858,14.4379028 8.78104858,13.8047379 9.17157288,13.4142136 L10.5857864,12 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </a>
                                    `;

                                }else{
                                    return `
                                    <span   class="show_barcode  svg-icon svg-icon-primary svg-icon-2x " data-id="${row.id}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                `;
                                }
                        }
                      },

                        // Add more columns as needed
                    ],

                    "processing": true,
                    "serverSide": true, // Enable server-side processing
                    "paging": true, // Enable client-side pagination
                    "lengthMenu": [10, 25, 50], // Number of records per page options
                    "autoWidth": true,
                    "language": {
                       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                     }
            });



        });

        $('#datatable').on('click','.reject_barcode',function (){

                var id=$(this).attr("data-id");
                $('#id').val(id);
                $('#order_id').html(id);


            });

    </script>
  {{-- END get datatable --}}


@endsection





