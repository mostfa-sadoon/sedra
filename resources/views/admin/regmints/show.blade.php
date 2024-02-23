@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('Admin.campaigns',1)}}">{{__('dashboard.campaigns')}}</a></li>
      <li class="breadcrumb-item"><a href="{{route('Admin.regmint.show',$regmint->id)}}">{{__('dashboard.regmint')}}</a></li>

      <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.booking')}}</li>
    </ol>
</nav>

@endsection

@section('content')





                 <!--begin::Advance Table: booking 7-->
                 <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">{{__('dashboard.booking')}}</span>
                        </h3>
                        <div class="card-toolbar">
                            <h2 class="text-success">{{$regmint->campaign->name}}</h2>

                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0 mt-n3">


            <!--begin: Datatable-->
			<div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="{{__('dashboard.search')}}" id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">{{__('dashboard.search')}}</a>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                    <thead>
                        <tr>

                            <th>{{__('dashboard.user')}}</th>
                            <th>{{__('dashboard.company')}}</th>
                            <th>{{__('dashboard.price')}}</th>

                            <th>{{__('dashboard.type')}}</th>
                            <th>{{__('dashboard.booking_at')}}</th>
                            <th>{{__('dashboard.regmint_date')}}</th>
                            <th>{{__('dashboard.days_count')}}</th>
                            <th>{{__('dashboard.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regmint->booking as $UserRegiment)



                        <tr>

                            <td class="">
                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"> {{$UserRegiment->user->name}}  </a>
                                <div>
                                    <span class="font-weight-bolder">Phone:</span>
                                    <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$UserRegiment->user->phone}}</a>
                                </div>
                            </td>

                            <td class="p-0 py-4">
                                <div class="symbol symbol-50 symbol-light">
                                    <a href="{{route('Admin.company.show',$UserRegiment->campaign->company->name)}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"> {{$UserRegiment->campaign->company->name}}  </a>
                                    <span class="symbol-label">
                                        <img src="{{$UserRegiment->campaign->img}}" class="h-50 align-self-center" alt="" />
                                    </span>
                                </div>
                            </td>

                            <td class="text-right">
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">رس  {{$UserRegiment->price}}</span>
                                <span class="text-muted font-weight-bold">
                                    @if ($UserRegiment->payment_type==1)
                                       {{__('dashboard.wallet')}}
                                    @elseif($UserRegiment->payment_type==1)
                                       {{__('dashboard.bank')}}
                                    @else
                                       {{__('dashboard.visa')}}
                                    @endif
                                </span>
                            </td>


                             <td class="text-right">
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg"> {{__('dashboard.'.$UserRegiment->type)}}</span>

                                    <span class="text-muted font-weight-bold">{{$UserRegiment->number}}</span>

                            </td>

                            <td class="text-right">
                                <span class="text-muted font-weight-bold">{{$UserRegiment->created_at->format('Y-m-d')}}</span>
                            </td>

                            <td class="text-right">
                              {{$regmint->date}}
                            </td>

                            <td class="text-right">
                                {{$regmint->days_count}}
                              </td>


                            <td class="pr-0 text-right">



                                <a class="cancelbooking" data-toggle="modal" data-target="#cancelbooking" data-id="{{$UserRegiment->id}}">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>

                            </td>
                        </tr>


                    @endforeach


                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>


            <!--end: Datatable-->












                        {{-- <div class="tab-content mt-5" id="myTabTables12">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade" id="kt_tab_pane_12_1" role="tabpanel" aria-labelledby="kt_tab_pane_12_4">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-50px"></th>
                                                <th class="p-0 min-w-200px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-160px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade" id="kt_tab_pane_12_2" role="tabpanel" aria-labelledby="kt_tab_pane_12_5">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-50px"></th>
                                                <th class="p-0 min-w-200px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-160px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>







                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_tab_pane_12_3" role="tabpanel" aria-labelledby="kt_tab_pane_12_6">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                            <tr>
                                                <th class="p-0 w-50px"></th>
                                                <th class="p-0 min-w-200px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-120px"></th>
                                                <th class="p-0 min-w-160px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($regmint->booking as $UserRegiment)



                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light">
                                                            <span class="symbol-label">
                                                                <img src="{{$UserRegiment->campaign->img}}" class="h-50 align-self-center" alt="" />
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"> {{$UserRegiment->user->name}}  </a>
                                                        <div>
                                                            <span class="font-weight-bolder">Phone:</span>
                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$UserRegiment->user->phone}}</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$  {{$UserRegiment->price}}</span>
                                                        <span class="text-muted font-weight-bold">
                                                            @if ($UserRegiment->payment_type==1)
                                                            Wallet
                                                            @elseif($UserRegiment->payment_type==1)
                                                                bank
                                                            @else
                                                                visa
                                                            @endif
                                                        </span>
                                                    </td>


                                                     <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"> {{$UserRegiment->type}}</span>

                                                            <span class="text-muted font-weight-bold">{{$UserRegiment->number}}</span>

                                                    </td>



                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"> Date</span>

                                                        <span class="text-muted font-weight-bold">{{$UserRegiment->date}}</span>
                                                    </td>



                                                    <td class="pr-0 text-right">

                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                        <a href="{{route('Admin.cancelBooking',$UserRegiment->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>


                                            @endforeach





                                        </tbody>
                                    </table>



                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                        </div> --}}
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table booking 7-->






<!-- start cancel booking -->
<div class="modal fade" id="cancelbooking" tabindex="-1" role="dialog" aria-labelledby="cancelbooking" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.cancel_booking')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('Admin.cancelBooking')}}" method="post">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="id" id="regmint_id">

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
<!-- end cancel booking -->






@endsection


@section('scripts')

    <script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>




    <script>

        //
        $('#kt_datatable').on('click','.cancelbooking',function (){
              var id =$(this).attr('data-id');
              $('#regmint_id').val(id);

        });

    </script>
@endsection






