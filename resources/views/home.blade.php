@extends('admin_temp')
@section('section_name')
{{__('dashboard.dashboard')}}
@endsection
@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">



        <!--Begin::Row-->
        <div class="row">

            <div class="col-xl-3">
                <!--begin::Stats Widget 32-->
                <div class="card card-custom bg-dark card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="{{route('Admin.companies',1)}}">
                        <span class="svg-icon svg-icon-2x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                    <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>

                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block">{{$companyCount}}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{__('dashboard.companies')}}</span>

                        </a>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 32-->
            </div>

            <!--End::Row-->


            <div class="col-xl-3">
                <!--begin::Stats Widget 31-->
                <div class="card card-custom bg-danger card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="{{route('Admin.campaigns',1)}}">
                            <span class="svg-icon svg-icon-2x svg-icon-white">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>

                            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$campaignCount}}</span>
                            <span class="font-weight-bold text-white font-size-sm">{{__('dashboard.campaigns')}}</span>

                        </a>

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Stats Widget 31-->
            </div>



            <div class="col-xl-3">
                <!--begin::Stats Widget 30-->
                <div class="card card-custom bg-info card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="{{route('Admin.users')}}">
                        <span class="svg-icon svg-icon-2x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$userCount}}</span>
                        <span class="font-weight-bold text-white font-size-sm">{{__('dashboard.users')}}</span>
                        </a>
                    </div>
                    <!--end::Body-->
                </div>
            </div>


            <div class="col-xl-3">
                <!--begin::Stats Widget 30-->
                <div class="card card-custom bg-primary card-stretch gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <a href="{{route('Admin.order.index',1)}}">

                        <span class="svg-icon svg-icon-2x svg-icon-white">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">{{$ordersCount}}</span>
                        <span class="font-weight-bold text-white font-size-sm">{{__('dashboard.orders')}}</span>
                        </a>
                    </div>
                    <!--end::Body-->
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-xl-4">
                <!--begin::Tiles Widget 8-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <div class="card-label">
                                <div class="font-weight-bolder">{{__('dashboard.weekley_sales')}}</div>
                                <div class="font-size-sm text-muted mt-2">   @php
                                    $amount=0;
                                    foreach ($salescountsByweek as $key => $value) {
                                        $amount+=$value;
                                    }
                                @endphp
                                  {{$amount}}
                                {{__('dashboard.Sales')}} </div>
                            </div>
                        </div>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column p-0">
                        <!--begin::Items-->
                        <div class="flex-grow-1 card-spacer">
                            <!--begin::Item-->

                            <!--end::Item-->

                        </div>
                        <!--end::Items-->
                        <!--begin::Chart-->
                        <div id="kt_tiles_widget_5_chart" class="card-rounded-bottom" data-color="danger" style="height: 150px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tiles Widget 8-->
            </div>


            <div class="col-xl-4">
                <!--begin::Tiles Widget 8-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <div class="card-label">
                                <div class="font-weight-bolder">{{__('dashboard.monthely_sales')}}</div>
                                <div class="font-size-sm text-muted mt-2">
                                    @php
                                        $amount=0;
                                        foreach ($salescountsByMonth as $key => $value) {
                                            $amount+=$value;
                                        }
                                    @endphp
                                      {{$amount}}
                                    {{__('dashboard.Sales')}}</div>
                            </div>
                        </div>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column p-0">
                        <!--begin::Items-->
                        <div class="flex-grow-1 card-spacer">
                            <!--begin::Item-->

                            <!--end::Item-->

                        </div>
                        <!--end::Items-->
                        <!--begin::Chart-->
                        <div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" data-color="danger" style="height: 150px"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tiles Widget 8-->
            </div>

            <div class="col-xl-4">
                <!--begin::Tiles Widget 15-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <div class="card-title">
                            <div class="card-label">
                                <div class="font-weight-bolder">{{__('dashboard.orders')}}</div>
                            </div>
                        </div>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Items-->
                        <div class="flex-grow-1">

                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between mb-10">
                                <div class="d-flex align-items-center mr-2">

                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">{{__('dashboard.complete')}}</a>

                                    </div>
                                </div>
                                <div class="d-flex flex-column w-100 mr-2">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$completedpercent}}%</span>
                                        <span class="text-muted font-size-sm font-weight-bold">{{__('dashboard.complete')}}</span>
                                    </div>
                                    <div class="progress progress-xs w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$completedpercent}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{$completedcount}}</div>
                            </div>
                            <!--end::Item-->
                           <!--begin::Item-->
                           <div class="d-flex align-items-center justify-content-between mb-10">
                            <div class="d-flex align-items-center mr-2">

                                <div>
                                    <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">{{__('dashboard.rejecte')}}</a>

                                </div>
                            </div>
                            <div class="d-flex flex-column w-100 mr-2">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$rejectpercent}}%</span>
                                    <span class="text-muted font-size-sm font-weight-bold">{{__('dashboard.rejecte')}}</span>
                                </div>
                                <div class="progress progress-xs w-100">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$rejectpercent}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{$rejectedcount}}</div>
                        </div>
                        <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between mb-10">
                                <div class="d-flex align-items-center mr-2">

                                    <div>
                                        <a href="#" class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">{{__('dashboard.cancel')}}</a>


                                    </div>

                                </div>
                                <div class="d-flex flex-column w-100 mr-2">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$cancelpercent}}%</span>
                                        <span class="text-muted font-size-sm font-weight-bold">{{__('dashboard.cancel')}}</span>
                                    </div>
                                    <div class="progress progress-xs w-100">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$cancelpercent}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="label label-light label-inline font-weight-bold text-dark-50 py-4 px-3 font-size-base">{{$canceledcount}}</div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tiles Widget 15-->
            </div>
    </div>

        <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{asset('assets/media/svg/shapes/abstract-2.svg')}})">
            <!--begin::Body-->
            <div class="card-body">

                    <div class="row">
                            <div class="col-xl-4">
                                <!--begin::Stats Widget 7 for monthly orders-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column p-0">
                                        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                            <div class="d-flex flex-column mr-2">
                                                <a href="{{route('Admin.order.index','pending')}}" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h5">{{__('dashboard.Monthly_sales')}}</a>
                                                <span class="text-muted font-weight-bold mt-2">{{__('dashboard.your_Monthly_sales')}}</span>
                                            </div>
                                            <span class="symbol symbol-light-success symbol-45">
                                                <span class="symbol-label font-weight-bolder font-size-h6">+
                                                  @foreach ($monthelyorders as $ordercount)
                                                          @if(date('n') == $ordercount->month)

                                                            {{$ordercount->count}}


                                                          @endif
                                                  @endforeach

                                                </span>
                                            </span>
                                        </div>
                                        <div id="kt_stats_widget_7_chart" class="card-rounded-bottom" style="height: 150px"></div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Stats Widget 7 monthly orders-->
                            </div>

                            <div class="col-4">
                                <!--begin::Stats Widget 8 for monthly users-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column p-0">
                                        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                            <div class="d-flex flex-column mr-2">
                                                <a href="{{route('Admin.users')}}" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h5">{{__('dashboard.Monthly_users_subscribers')}}</a>
                                                <span class="text-muted font-weight-bold mt-2">{{__('dashboard.your_Monthly_users_subscribers')}}</span>
                                            </div>
                                            <span class="symbol symbol-light-success symbol-45">
                                                <span class="symbol-label font-weight-bolder font-size-h6">+

                                                    @foreach ($monthelyusers as $count)

                                                        @if(date('n') == $count->month)

                                                          {{$count->count}}

                                                        @endif


                                                    @endforeach
                                                </span>
                                            </span>
                                        </div>
                                        <div id="kt_stats_widget_8_chart" class="card-rounded-bottom" style="height: 150px"></div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Stats Widget 8 monthly users-->

                            </div>



                            <div class="col-4">
                                <!--begin::Stats Widget 9 for monthly companies-->
                                <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column p-0">
                                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                        <div class="d-flex flex-column mr-2">
                                            <a href="{{route('Admin.companies',1)}}" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h5">{{__('dashboard.Monthly_companies_subscribers')}}</a>
                                            <span class="text-muted font-weight-bold mt-2">{{__('dashboard.your_Monthly_companies_subscribers')}}</span>
                                        </div>
                                        <span class="symbol symbol-light-success symbol-45">
                                            <span class="symbol-label font-weight-bolder font-size-h6">+

                                                @foreach ($monthelycompanies as $count)
                                                    @if(date('n') ==$count->month)
                                                       @if ($count->count!=null)
                                                          {{$count->count}}


                                                       @endif



                                                    @endif
                                                @endforeach
                                            </span>
                                        </span>
                                    </div>
                                    <div id="kt_stats_widget_9_chart" class="card-rounded-bottom" style="height: 150px"></div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Stats Widget 9 monthly companies-->

                        </div>

                    </div>
                    <div class="d-flex">
                        <div class="justify-content-start">
                              <h4>  {{__('dashboard.last_new_orders')}} </h4>
                        </div>
                   </div>

                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{__('dashboard.order_id')}}</th>
                                <th>{{__('dashboard.customer_name')}}</th>
                                <th>{{__('dashboard.customer_phone')}}</th>
                                <th>{{__('dashboard.user_name')}}</th>
                                <th>{{__('dashboard.phone')}}</th>
                                <th>{{__('dashboard.payment_method')}}</th>
                                <th>{{__('dashboard.price')}}</th>
                                <th>{{__('dashboard.date')}}</th>

                                <th>{{__('dashboard.actions')}}</th>
                                   </tr>
                        </thead>
                        <tbody style="width:100%">

                            @foreach ($orders as $order)

                                <tr>
                                    <td>{{$order->id}}</td>

                                   <td>{{$order->detailes[0]->name}}</td>
                                   <td>{{$order->detailes[0]->phone}}</td>
                                    <td>
                                        @if ($order->user!=null)
                                            {{$order->user->name}}
                                        @else
                                           {{__('dashboard.Previous_user')}}
                                        @endif
                                    </td>
                                   <td>
                                        @if ($order->user!=null)
                                           {{$order->user->phone}}
                                        @endif
                                   </td>
                                    <td>
                                        @if ($order->payment_type==1)
                                         {{__('dashboard.wallet')}}
                                        @elseif($order->payment_type==1)
                                        {{__('dashboard.bank')}}
                                        @else
                                        {{__('dashboard.visa')}}
                                        @endif

                                    </td>
                                    <td>رس{{$order->price_after_discount}}</td>
                                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>

                                    <td class="text-right">
                                        <a href="{{route('Admin.order.accept',$order->id)}}">{{__('dashboard.accept')}}</a>|
                                        <a href="{{route('Admin.order.reject',$order->id)}}">{{__('dashboard.reject')}}</a>



                                        <span   class="show_order  svg-icon svg-icon-primary svg-icon-2x " data-id="{{$order->id}}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>


                                    </td>
                                </tr>

                            @endforeach

                        </tbody>



                       </table>
            </div>
        </div>


    </div>
</div>



 {{--begain::show  order model --}}
 <div class="modal fade outer-repeater" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">
        <form action="{{route('Admin.product.store')}}" method="post" enctype="multipart/form-data" id="my-form">
            @csrf
            <div class="modal-content">


                <div class="modal-body">

                    <div class="card card-custom gutter-b">
                        <div class="card-body p-0">

                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" id="order_detailes">

                        </div>

                    </div>
                    </div>

                </div>


                <div class="modal-footer">

                </div>
            </div>
       </form>











    </div>
</div>
{{--end::show  order model --}}


@endsection

@section('scripts')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>



<script>

    $('#datatable').on('click','.show_order',function (){

            var id=$(this).attr("data-id");

            $.ajax({
                url:"/show/order/detailes/"+id,
                type:"GET", //send it through get method
                success: function (response) {

                    $('#order_detailes').html(response);

                },
                error: function(response) {

                }
                });
    });


</script>


 {{-- start widgets --}}
<script>
    // start translate script
            // translate
            var categoriesval={!!json_encode([
                                    __('dashboard.Jan'),__('dashboard.Feb'),__('dashboard.Mar'),__('dashboard.Apr'),__('dashboard.May'),__('dashboard.Jun'),
                                    __('dashboard.Jul'),__('dashboard.Aug'),__('dashboard.Sep'),__('dashboard.Oct'),__('dashboard.Nov'),__('dashboard.Dec')
                            ])!!};

                                var daycategoriesval={!!json_encode([
            __('dashboard.Saturday'),__('dashboard.Sunday'),__('dashboard.Monday'),__('dashboard.Tuesday'),__('dashboard.Wednesday'),__('dashboard.Thursday'),
            __('dashboard.Friday')
    ])!!};
            var    orderCount =  {!!json_encode(__('dashboard.orderCount'))!!};
            var    orders     =  {!!json_encode(__('dashboard.orders'))!!};
            var    users      =  {!!json_encode(__('dashboard.users'))!!};
            var    companies  =  {!!json_encode(__('dashboard.companies'))!!};
            var   userscount  =  {!!json_encode(__('dashboard.userscount'))!!};
            var   companiescount  =  {!!json_encode(__('dashboard.companiescount'))!!};



    // end translate script

    const orderByMonth = Object.values({!!json_encode($countsByMonth)!!});

    const usersByMonth = Object.values({!!json_encode($usercountsByMonth)!!});

    const companiesByMonth = Object.values({!!json_encode($companycountsByMonth)!!});
    const salesByMonth     = Object.values({!!json_encode($salescountsByMonth)!!});
    const weaklysales     = Object.values({!!json_encode($salescountsByweek)!!});
    console.log(weaklysales);

    var KTWidgets = function () {

        // start orders count wedgit
        var _initStatsWidget7 = function () {
            var element = document.getElementById("kt_stats_widget_7_chart");

            if (!element) {
                return;
            }

            var options = {
                series: [{
                    name: orderCount,
                    data: orderByMonth,
                }],
                chart: {
                    type: 'area',
                    height: 150,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [KTApp.getSettings()['colors']['theme']['base']['success']]
                },
                xaxis: {
                    categories: categoriesval,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: KTApp.getSettings()['colors']['gray']['gray-300'],
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    },
                    y: {
                        formatter: function (val) {
                            return  val + orders
                        }
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                markers: {
                    colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                    strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success']],
                    strokeWidth: 3
                }
            };

            var chart = new ApexCharts(element, options);
            chart.render();
        }

        // start users count order
        var _initStatsWidget8 = function () {
            var element = document.getElementById("kt_stats_widget_8_chart");

            if (!element) {
                return;
            }

            var options = {
                series: [{
                    name: userscount,
                    data: usersByMonth,
                }],
                chart: {
                    type: 'area',
                    height: 150,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [KTApp.getSettings()['colors']['theme']['base']['success']]
                },
                xaxis: {
                    categories: categoriesval,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: KTApp.getSettings()['colors']['gray']['gray-300'],
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    },
                    y: {
                        formatter: function (val) {
                            return  val
                        }
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                markers: {
                    colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                    strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success']],
                    strokeWidth: 3
                }
            };

            var chart = new ApexCharts(element, options);
            chart.render();
        }

        // start users count companies
        var _initStatsWidget9 = function () {
            var element = document.getElementById("kt_stats_widget_9_chart");

            if (!element) {
                return;
            }

            var options = {
                series: [{
                    name: companiescount,
                    data: companiesByMonth,
                }],
                chart: {
                    type: 'area',
                    height: 150,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid',
                    opacity: 1
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [KTApp.getSettings()['colors']['theme']['base']['success']]
                },
                xaxis: {
                    categories: categoriesval,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: KTApp.getSettings()['colors']['gray']['gray-300'],
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                yaxis: {
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    },
                    y: {
                        formatter: function (val) {
                            return  val
                        }
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                markers: {
                    colors: [KTApp.getSettings()['colors']['theme']['light']['success']],
                    strokeColor: [KTApp.getSettings()['colors']['theme']['base']['success']],
                    strokeWidth: 3
                }
            };

            var chart = new ApexCharts(element, options);
            chart.render();
        }

        var _initTilesWidget5 = function () {
            var element = document.getElementById("kt_tiles_widget_5_chart");
            var height = parseInt(KTUtil.css(element, 'height'));
            var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'danger';

            if (!element) {
                return;
            }

            var options = {
                series: [{
                    name: 'ر.س',
                    data: weaklysales
                }],
                chart: {
                    type: 'area',
                    height: 150,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid'
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
                },
                xaxis: {
                    categories: daycategoriesval,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: KTApp.getSettings()['colors']['gray']['gray-300'],
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                yaxis: {

                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    },
                    y: {
                        formatter: function (val) {
                            return  val
                        }
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
                markers: {
                    colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
                    strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
                    strokeWidth: 3
                },
                padding: {
                    top: 0,
                    bottom: 0
                }
            };

            var chart = new ApexCharts(element, options);
            chart.render();
      }
      var _initTilesWidget2 = function () {
            var element = document.getElementById("kt_tiles_widget_2_chart");
            var height = parseInt(KTUtil.css(element, 'height'));
            var color = KTUtil.hasAttr(element, 'data-color') ? KTUtil.attr(element, 'data-color') : 'success';

            if (!element) {
                return;
            }

            var options = {
                series: [{
                    name: 'ر.س',
                    data: salesByMonth
                }],
                chart: {
                    type: 'area',
                    height: 150,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    sparkline: {
                        enabled: true
                    }
                },
                plotOptions: {},
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'solid'
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [KTApp.getSettings()['colors']['theme']['base'][color]]
                },
                xaxis: {
                    categories: categoriesval,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    },
                    crosshairs: {
                        show: false,
                        position: 'front',
                        stroke: {
                            color: KTApp.getSettings()['colors']['gray']['gray-300'],
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                yaxis: {

                    labels: {
                        show: false,
                        style: {
                            colors: KTApp.getSettings()['colors']['gray']['gray-500'],
                            fontSize: '12px',
                            fontFamily: KTApp.getSettings()['font-family']
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px',
                        fontFamily: KTApp.getSettings()['font-family']
                    },
                    y: {
                        formatter: function (val) {
                            return  val
                        }
                    }
                },
                colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
                markers: {
                    colors: [KTApp.getSettings()['colors']['theme']['light'][color]],
                    strokeColor: [KTApp.getSettings()['colors']['theme']['base'][color]],
                    strokeWidth: 3
                },
                padding: {
                    top: 0,
                    bottom: 0
                }
            };

            var chart = new ApexCharts(element, options);
            chart.render();
      }


        return {
            init: function () {
                // Stats Widgets
                _initStatsWidget7();
                _initStatsWidget8();
                _initStatsWidget9();
                _initTilesWidget5();
                _initTilesWidget2();
            }
        }
    }();


    // Webpack support
    if (typeof module !== 'undefined') {
        module.exports = KTWidgets;
    }

    jQuery(document).ready(function () {
        KTWidgets.init();
    });


</script>
{{-- end widgets --}}

@endsection
