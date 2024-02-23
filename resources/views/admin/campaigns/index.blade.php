@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

@endsection

@section('section_name')



<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('Admin.campaigns',1)}}">{{__('dashboard.campaigns')}}</a></li>
      @if ($type==8)
        <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.cancel_requests')}}</li>
      @elseif ($type==7)
        <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.delete_requests')}}</li>

      @elseif ($type==6)
      <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.distinct_campaigns')}}</li>
    @endif

    </ol>
  </nav>


@endsection
@section('content')

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @if ($type==1 || $type==3 || $type==4)
            <div class="col-xl-12">
                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                                <!--begin::Nav Tabs-->
                                <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">





                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center @if($type==1) active  @endif "  href="{{route('Admin.campaigns',1)}}">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Cart2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M3.28077641,9 L20.7192236,9 C21.2715083,9 21.7192236,9.44771525 21.7192236,10 C21.7192236,10.0817618 21.7091962,10.163215 21.6893661,10.2425356 L19.5680983,18.7276069 C19.234223,20.0631079 18.0342737,21 16.6576708,21 L7.34232922,21 C5.96572629,21 4.76577697,20.0631079 4.43190172,18.7276069 L2.31063391,10.2425356 C2.17668518,9.70674072 2.50244587,9.16380623 3.03824078,9.0298575 C3.11756139,9.01002735 3.1990146,9 3.28077641,9 Z M12,12 C11.4477153,12 11,12.4477153 11,13 L11,17 C11,17.5522847 11.4477153,18 12,18 C12.5522847,18 13,17.5522847 13,17 L13,13 C13,12.4477153 12.5522847,12 12,12 Z M6.96472382,12.1362967 C6.43125772,12.2792385 6.11467523,12.8275755 6.25761704,13.3610416 L7.29289322,17.2247449 C7.43583503,17.758211 7.98417199,18.0747935 8.51763809,17.9318517 C9.05110419,17.7889098 9.36768668,17.2405729 9.22474487,16.7071068 L8.18946869,12.8434035 C8.04652688,12.3099374 7.49818992,11.9933549 6.96472382,12.1362967 Z M17.0352762,12.1362967 C16.5018101,11.9933549 15.9534731,12.3099374 15.8105313,12.8434035 L14.7752551,16.7071068 C14.6323133,17.2405729 14.9488958,17.7889098 15.4823619,17.9318517 C16.015828,18.0747935 16.564165,17.758211 16.7071068,17.2247449 L17.742383,13.3610416 C17.8853248,12.8275755 17.5687423,12.2792385 17.0352762,12.1362967 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">{{__('dashboard.current')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->




                                     <!--begin::Item-->
                                     <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center @if($type==3)  active  @endif"  href="{{route('Admin.campaigns',3)}}">
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
                                            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{__('dashboard.started')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->



                                    <!--begin::Item-->
                                    {{-- <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center @if($type==2) active  @endif"  href="{{route('Admin.campaigns',2)}}">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Thumbtack.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
                                                    <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bold text-center">{{__('dashboard.finished')}}</span>
                                        </a>
                                    </li> --}}
                                    <!--end::Item-->





                                    <!--begin::Item-->
                                    <li class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                        <a class="nav-link  border py-10 d-flex flex-grow-1 rounded flex-column align-items-center  @if($type==4)   active  @endif"  href="{{route('Admin.campaigns',4)}}">
                                            <span class="nav-icon py-2 w-auto">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Shield-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </span>
                                            <span class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{__('dashboard.canceled')}}</span>
                                        </a>
                                    </li>
                                    <!--end::Item -->

                                </ul>
                                <!--end::Nav Tabs-->
                    </div>
                </div>
            </div>
            @endif


        </div>










            {{-- begain campaigns --}}

          <!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header">
										<div class="card-title">
											<span class="card-icon">
												<i class="flaticon2-favourite text-primary"></i>
											</span>
											<h3 class="card-label">{{__('dashboard.campaigns')}}</h3>
										</div>
										<div class="card-toolbar">
											<!--begin::Dropdown-->
											{{-- <div class="dropdown dropdown-inline mr-2">
												<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="la la-download"></i>Export</button>
												<!--begin::Dropdown Menu-->
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
													<ul class="nav flex-column nav-hover">
														<li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-print"></i>
																<span class="nav-text">Print</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-copy"></i>
																<span class="nav-text">Copy</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-excel-o"></i>
																<span class="nav-text">Excel</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-text-o"></i>
																<span class="nav-text">CSV</span>
															</a>
														</li>
														<li class="nav-item">
															<a href="#" class="nav-link">
																<i class="nav-icon la la-file-pdf-o"></i>
																<span class="nav-text">PDF</span>
															</a>
														</li>
													</ul>
												</div>
												<!--end::Dropdown Menu-->
											</div> --}}
											<!--end::Dropdown-->
											<!--begin::Button-->
											{{-- <a href="#" class="btn btn-primary font-weight-bolder">
											<i class="la la-plus"></i>New Record</a> --}}
											<!--end::Button-->
										</div>
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
											<thead>
												<tr>

													<th>{{__('dashboard.id')}}</th>
                                                    <th>{{__('dashboard.campaign')}}</th>
													<th>{{__('dashboard.country')}}</th>
													<th>{{__('dashboard.city')}}</th>
													<th>{{__('dashboard.single_price')}}</th>
													<th>{{__('dashboard.double_price')}}</th>
													<th>{{__('dashboard.company')}}</th>
                                                    <th>{{__('dashboard.created_at')}}</th>
                                                    <th>{{__('dashboard.program')}}</th>
                                                    {{-- <th>{{__('dashboard.Booking')}}</th> --}}

                                                    <th>{{__('dashboard.distinct')}}</th>

													<th>{{__('dashboard.actions')}}</th>
												</tr>
											</thead>
											<tbody>

                                                {{-- @foreach ($campaigns as $campaign)
                                                    <tr>
                                                        <td>{{$campaign->id}}</td>
                                                        <td>{{$campaign->country->name}}</td>
                                                        <td>{{$campaign->city->name}}</td>
                                                        <td>{{$campaign->single_price}}</td>
                                                        <td>{{$campaign->double_price}}</td>
                                                        <td>{{$campaign->company->name}}</td>
                                                        <td>

                                                              @if ($campaign->program=1)
                                                                   Makaah
                                                              @else
                                                                   Makaah and madinaa
                                                              @endif

                                                        </td>

                                                         <td>  {{$campaign->regiments->count()}} </td>

                                                         <td>  {{$campaign->UserRegiment->count()}} </td>

                                                        <td>

                                                            <span class="switch switch-success">
                                                                <label>
                                                                    <input type="checkbox"  data-id="{{$campaign->id}}"  class="distinct_check"    @if($campaign->distinct==1)  checked="checked" @endif   name="select" />
                                                                    <span></span>
                                                                </label>
                                                            </span>

                                                        </td>


                                                        <td>




                                                            <span class="svg-icon svg-icon-md svg-icon-primary">

                                                                <a href="{{route('Admin.Campaign.edit',$campaign->id)}}">

                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                </a>

                                                            </span>


                                                            <span   class="show_order  svg-icon svg-icon-primary svg-icon-2x " data-id="{{$campaign->id}}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>




                                                             @if ($type==4 || $type==2)
                                                             <a href="{{route('Admin.Campaign.Delete',$campaign->id)}}">
                                                                <span class="svg-icon svg-icon-primary svg-icon-2x "><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                                    </g>
                                                                </svg><!--end::Svg Icon--></span>


                                                            </a>

                                                             @endif


                                                        </td>


                                                    </tr>
                                                @endforeach --}}



											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->

            {{-- end campaigns --}}


    </div>
</div>



    {{--begain::show campaign model --}}
        <div class="modal fade outer-repeater" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">
                <form action="{{route('Admin.product.store')}}" method="post" enctype="multipart/form-data" id="my-form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.regmints')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body" id="campaign_detailes">



                        </div>


                        <div class="modal-footer">

                        </div>
                    </div>
            </form>











            </div>
        </div>
    {{--end::show campaign model --}}



{{-- show regmint detailes --}}
        <div class="modal fade outer-repeater" id="showregmint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">
                <form action="{{route('Admin.product.store')}}" method="post" enctype="multipart/form-data" id="my-form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.regmint_detailes')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body" id="regmint_detailes">



                        </div>


                        <div class="modal-footer">

                        </div>
                    </div>
            </form>
            </div>
        </div>
{{-- end show regmint detailes --}}


 <!-- start cancel campaign modal -->
    <div class="modal fade" id="cancelcampaign" tabindex="-1" role="dialog" aria-labelledby="cancelcampaign" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.cancel_request')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('Admin.cancel.campaign')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <p style="font-weight: 800; font-size :16px;"> {{__('dashboard.campaign_id')}} : <span id="campaign_id"></span> </p>
                <h4>{{__('dashboard.sure')}}</h4>


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
            <button type="submit" class="btn btn-danger">{{__('dashboard.cancel')}}</button>
            </div>
            </form>
        </div>
        </div>
    </div>
<!-- end  cancel campaign modal -->

 <!-- start delete campaign modal -->
    <div class="modal fade" id="deletecampaign" tabindex="-1" role="dialog" aria-labelledby="deletecampaign" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_request')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('Admin.delete.campaign')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="delete_campaign_id">
                <p style="font-weight: 800; font-size :16px;"> {{__('dashboard.campaign_id')}} : <span class="campaign_id"></span> </p>
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
<!-- end delete campaignmodal -->



@endsection


@section('scripts')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



{{-- start get datatable --}}

<script>


    var searchtranslate                 ={!!json_encode(__('dashboard.search'))!!};
    var type                            ={!!json_encode($type)!!};
    var editcampign                     ={!!json_encode(route('Admin.Campaign.edit',0))!!};
    var campaignType = type;


    $(document).ready(function() {
        $('#datatable').DataTable({
                "ajax": {
                    "url": `/campaigns/list/${type}`, // Replace with your API endpoint
                    "type": "GET",
                },
                "columns": [
                    // Define your columns here
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "country" },
                    { "data": "city" },

                    { "data": "single_price" },
                    { "data": "double_price" },
                    { "data": "company" },
                    { "data": "created_at" },

                    { "data": "program" , render: function (data, type, row, meta) {
                        return `
                            <td>
                                ${row.progran==1 ?   'Makaah' : 'Makaah and madinaa'}

                            </td>

                        `
                    } },
                    { "data": "distinct" , render (data, type, row, meta) {
                        return `
                        <td>

                            <span class="switch switch-success">
                                <label>
                                    <input type="checkbox"  data-id="${row.id}"  class="distinct_check" ${row.distinct==1 ? 'checked="checked"' : "" }   name="select" />
                                    <span></span>
                                </label>
                            </span>

                        </td>


                        `
                    }},
                    { "data": "options" ,render (data, type, row, meta){

                             return `


                             <span class="svg-icon svg-icon-md svg-icon-primary">

                                <a href="${editcampign}${row.id}">

                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                </a>

                                </span>

                                <span class="svg-icon svg-icon-primary svg-icon-2x ${campaignType==8 ? 'cancelcampaign' : 'deletecampaign'} " data-toggle="modal" data-target="${campaignType==7?'deletecampaign': ''}${campaignType==8?'cancelcampaign':''}" data-id="${row.id}" ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>


                                <span   class="show_order  svg-icon svg-icon-primary svg-icon-2x " data-id="${row.id}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                </g>
                                </svg><!--end::Svg Icon--></span>







                             `;


                    }},




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





</script>
{{-- END get datatable --}}


<script>

    $('#datatable').on('click','.show_order',function (){

            var id=$(this).attr("data-id");


            $.ajax({
                url:"/campaigns/campaign/show/"+id,
                type:"GET", //send it through get method
                success: function (response) {

                    $('#campaign_detailes').html(response);

                },
                error: function(response) {

                }
                });

    });


    let campaignMessageTitle={!!json_encode(__('dashboard.campaign'))!!};

    let campaigndistinct={!!json_encode(__('dashboard.distinctMessage'))!!};

    let campaignundistinct={!!json_encode(__('dashboard.undistinctMessage'))!!};


    //start make distinct campaign
    $('#datatable').on('click','.distinct_check',function (){

        var id=$(this).attr("data-id");
        if ($(this).is(':checked')) {
            $.ajax({
                url:"/campaigns/make/distinct/campaigns/"+id,
                type:"GET", //send it through get method
                success: function (response) {
                    $(document).ready(function() {
                        displayMessage(campaigndistinct);
                        function displayMessage(message) {
                            toastr.success(message, campaigndistinct);
                            }
                    });
                  return true;
                },
                error: function(response) {

                }
                });

        }else{

            $.ajax({
                url:"/campaigns/make/normal/campaigns/"+id,
                type:"GET", //send it through get method
                success: function (response) {
                    $(document).ready(function() {
                        displayMessage(campaignundistinct);
                        function displayMessage(message) {
                            toastr.success(message, campaignMessageTitle);
                            }
                    });
                  return true;

                },
                error: function(response) {

                }
                });

        }

    });

    //end make distinct campaign

    // show regmint detailes

      function showregmint(id){
        $.ajax({
                url:"/campaigns/regmint/detailes/"+id,
                type:"GET", //send it through get method
                success: function (response) {
                   $('#regmint_detailes').html(response);
                  return true;
                },
                error: function(response) {

                }
          });
      }

    // end show regmint detailes


</script>

{{-- @if(session::get('message'))

@if(session::get('update'))
<script>
      $(document).ready(function() {
         displayMessage("the menu updated successfully succesfully");
        function displayMessage(message) {
            toastr.success(message, 'menu');
            }
      });
</script>
@endif --}}


<script>

$('#datatable').on('click','.cancelcampaign',function (){
    var id=$(this).attr("data-id");
    $('#cancelcampaign').modal('show');
    $('#campaign_id').html(id);
    $('#id').val(id);
});

$('#datatable').on('click','.deletecampaign',function (){
    var id=$(this).attr("data-id");
    $('#deletecampaign').modal('show');
    $('.campaign_id').html(id);
    $('#delete_campaign_id').val(id);
});

</script>

@endsection






