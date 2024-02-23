@extends('admin_temp')
@section('section_name')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('Admin.companies',1)}}">{{__('dashboard.companies')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Admin.company.show',$company->id)}}">{{__('dashboard.company')}}</a></li>
    </ol>
  </nav>
@endsection
@section('content')




	<!--begin::Container-->
    <div class="container">
        <!--begin::Profile Overview-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-280px w-xl-330px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--begin::Toolbar-->

                        <!--end::Toolbar-->
                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <div class="symbol-label" style="background-image:url('{{$company->logo}}')"></div>
                                <i class="symbol-badge bg-success"></i>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">  {{$company->name}}  </a>

                                {{-- <div class="mt-2">
                                    <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>
                                    <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">Follow</a>
                                </div> --}}
                            </div>
                        </div>
                        <!--end::User-->
                        <!--begin::Contact-->
                        <div class="py-9">

                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.phone')}}:</span>
                                <span class="text-muted">{{$company->phone}}</span>
                            </div>

                              <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.campaigns')}}:</span>
                                <span class="text-muted">{{$company->campaign->count()}}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.balance')}}:</span>
                                <span class="text-muted">{{$company->balance}}</span>
                            </div>


                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.total_sales')}}:</span>
                                <span class="text-muted">{{$company->total_sales}}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.net_profit')}}:</span>
                                <span class="text-muted">{{$company->net_profit}}</span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.Ratio_application')}}:</span>
                                <span class="text-muted">{{$company->total_sales-$company->net_profit}}</span>
                            </div>


                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('dashboard.bank_accounts')}}</span>
                                <span class="font-weight-bold mr-2">{{__('dashboard.account_numbers')}}</span>
                            </div>

                            @foreach ($company->companyBankAccounts as $bakaccount)
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">{{$bakaccount->name}}</span>
                                    <span class="font-weight-bold mr-2">{{$bakaccount->account_number}}</span>
                                </div>
                            @endforeach


                        </div>
                        <!--end::Contact-->
                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                            <div class="navi-item mb-2">

                            </div>
                             <div class="navi-item mb-2">
                                <a href="{{route('Admin.company.info',$company->id)}}" class="navi-link py-4">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="navi-text font-size-lg">{{__('dashboard.company_info')}}</span>
                                </a>
                            </div>

                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-10">
                <!--begin::campaigns-->

                <div class="card card-custom">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">
                            <span class="card-icon">
                                <i class="flaticon2-favourite text-primary"></i>
                            </span>
                            <h3 class="card-label">{{__('dashboard.campaigns')}}</h3>
                        </div>



                        {{-- <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <a class="btn btn-primary"  data-toggle="modal" data-target="#addCampaign">{{__('dashboard.addCampaign')}}</a>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('dashboard.name')}}</th>
                                    <th>{{__('dashboard.country')}}</th>
                                    <th>{{__('dashboard.city')}}</th>
                                    <th>{{__('dashboard.single_price')}}</th>
                                    <th>{{__('dashboard.double_price')}}</th>
                                    <th>{{__('dashboard.program')}}</th>
                                    <th>{{__('dashboard.regiments')}}</th>
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



            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Overview-->
    </div>
    <!--end::Container-->


    <div>

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


    <!-- start delete campigin modal -->
        <div class="modal fade" id="deletecampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_campaign')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.Campaign.destroy')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="campaign_id">

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
    <!-- end delete comapny modal -->

{{--begain::Add campaign--}}
<div class="modal fade outer-repeater" id="addCampaign" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.addCampaign')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.transfare.mony')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="companey_id">
                <div class="modal-body" id="detailes">

                        <div class="form-group">
                            <input type="number" name="balance" id="balance" value="" class="form-control">
                        </div>



                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.transfare')}}</button>
                </div>
            </form>
            </div>
    </div>
</div>
{{--end::Add campaign --}}



@endsection

@section('scripts')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


  {{-- start get datatable --}}

  <script>


    var searchtranslate            ={!!json_encode(__('dashboard.search'))!!};
    var company_id                 ={!!json_encode($company->id)!!};


    var makah_progrm                ={!!json_encode(__('dashboard.makkah'))!!};
    var makah_madina                ={!!json_encode(__('dashboard.makkah_and_madina'))!!};
    var editCampignUrl           ={!!json_encode(route('Admin.Campaign.edit',0))!!}
    // var barcodeAcceptUrl           ={!!json_encode(route('Admin.barcode.accept',0))!!}



$(document).ready(function() {
        $('#datatable').DataTable({
                "ajax": {
                    "url": `/companies/list/campigns/${company_id}`, // Replace with your API endpoint
                    "type": "GET",
                },
                "columns": [
                    // Define your columns here
                    { "data": "name",  orderable: false},
                    { "data": "country",  orderable: false},
                    { "data": "city" ,    orderable: false},
                    { "data": "single_price"},
                    { "data": "double_price"},
                    { "data": "program" , orderable: false ,render: function (data, type, row, meta) {
                         if(row.program==1){
                              return makah_progrm;
                         }else if(row.program==2){
                             return makah_madina;
                         }

                    }},

                     {"data":"regiments" , orderable: false},
                     {"data":"created_at" },
                     {"data":"actions" ,render: function (data, type, row, meta) {

                              return  `
                                <span class="svg-icon svg-icon-md svg-icon-primary">

                                    <a href="${editCampignUrl}${row.id}">

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


                                    <span   class="show_campaign  svg-icon svg-icon-primary svg-icon-2x " data-id="${row.id}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>

                                    </span>


                                    <span class="delete_campaign svg-icon svg-icon-primary svg-icon-2x" data-id=${row.id}><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                          `;

                    }},

                    // Add more columns as needed
                ],
                "order": [[2, 'desc']],
                "order": [[3, 'desc']],
                "processing": true,
                "serverSide": true, // Enable server-side processing
                "paging": true, // Enable client-side pagination
                "lengthMenu": [5, 25, 50], // Number of records per page options
              //  "autoWidth": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                }
        });

        //start chow campaign
        $('#datatable').on('click','.show_campaign',function (){
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
       //start chow campaign


       // start delete campaign
       $('#datatable').on('click','.delete_campaign',function (){
        var id=$(this).attr("data-id");

            $('#deletecampaign').modal('show');
            $('#campaign_id').val(id);

       });

       // end delete campaign
    });




</script>
{{-- END get datatable --}}

@endsection
