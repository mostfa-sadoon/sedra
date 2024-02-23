@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<h2><a href="{{route('Admin.campaigns',2)}}">{{__('dashboard.distinct_campaigns')}}</a></h2>


@endsection
@section('content')

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->



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
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>

                            <th>{{__('dashboard.canceled')}}</th>
                            <th>{{__('dashboard.country')}}</th>
                            <th>{{__('dashboard.city')}}</th>
                            <th>{{__('dashboard.single_price')}}</th>
                            <th>{{__('dashboard.double_price')}}</th>
                            <th>{{__('dashboard.company_name')}}</th>
                            <th>{{__('dashboard.program')}}</th>
                            <th>{{__('dashboard.regmints')}}</th>
                            <th>{{__('dashboard.Booking')}}</th>

                            <th>{{__('dashboard.distinct')}}</th>

                            <th>{{__('dashboard.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($campaigns as $campaign)
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
                                            <input type="checkbox" class="distinct_check" checked="checked" name="select" />
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





{{--begain::add product model --}}
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
{{--end::add product model --}}










@endsection


@section('scripts')

<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>





<script>

$('#kt_datatable').on('click','.show_order',function (){

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




    //start make distinct campaign
        $('#kt_datatable').on('click','.distinct_check',function (){

            var id=$(this).attr("data-id");
            if ($(this).is(':checked')) {
                $.ajax({
                    url:"/make/distinct/campaigns/"+id,
                    type:"GET", //send it through get method
                    success: function (response) {

                    return true;

                    },
                    error: function(response) {

                    }
                    });

            }else{

                $.ajax({
                    url:"/make/normal/campaigns/"+id,
                    type:"GET", //send it through get method
                    success: function (response) {

                    return true;

                    },
                    error: function(response) {

                    }
                    });

            }

        });

    //end make distinct campaign



</script>



@endsection
