@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<h2><a href="{{route('Admin.product.index')}}">{{__('dashboard.countries')}}</a></h2>

@endsection
@section('content')

{{-- begain countries --}}
<div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-favourite text-primary"></i>
                </span>
                <h3 class="card-label">{{__('dashboard.countries')}}</h3>
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

                            <th>{{__('dashboard.country')}}</th>
                            <th>{{__('dashboard.status')}}</th>

                            <th>{{__('dashboard.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody style="">



                    </tbody>
                </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->



     {{--begain::edit city --}}
     <div class="modal fade outer-repeater" id="editcountry" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.edit_country')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('Admin.country.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="edit_country_id" id="edit_country_id">
                    <div class="modal-body" id="detailes">



                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
{{--end::edit city   --}}


</div>






@endsection

@section('scripts')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{-- staet get datatable --}}
<script>



    var searchtranslate       ={!!json_encode(__('dashboard.search'))!!};
    var publish               ={!!json_encode(__('dashboard.publish'))!!};
    var unpublish             ={!!json_encode(__('dashboard.unpublish'))!!};
    var cityUrl               ={!!json_encode(route('Admin.country.city',0))!!};
    var locales               = {!!json_encode(config('translatable.locales'))!!};
     $data='';



    $(document).ready(function() {
        $('#datatable').DataTable({
                "ajax": {
                    "url": `/countries/list`, // Replace with your API endpoint
                    "type": "GET",
                },
                "columns": [
                    // Define your columns here

                    { "data": "name" },
                    { "data": "status"  , render: function (data, type, row, meta) {
                             if(row.status==1){
                                 return ` <span  class="label label-lg font-weight-bold label-light-success label-inline"> ${publish}  </span>`
                             }else{
                                return ` <span  class="label label-lg font-weight-bold label-light-danger label-inline">  ${unpublish}  </span>`

                             }

                    },"orderable": false},
                    { "data": "actions", render: function (data, type, row, meta) {

                        return `
                             <a href="${cityUrl}${row.id}">
                                <span   class="show_order  svg-icon svg-icon-primary svg-icon-2x " data-id="${row.id}"  data-toggle="modal" data-target="#exampleModal"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                </g>
                                </svg><!--end::Svg Icon--></span>
                            </a>


                                         <span class="svg-icon svg-icon-primary svg-icon-2x editcountry" data-toggle="modal" data-target="#editcountry"
                                            data-id="${row.id}"  data-status="${row.status}"
                                          >
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            </g>
                                            </svg><!--end::Svg Icon--></span>

                         `;

                    } ,"orderable": false},

                    // Add more columns as needed
                ],

                "processing": true,
                "serverSide": true, // Enable server-side processing
                "paging": true, // Enable client-side pagination
                "lengthMenu": [10, 25, 50,100], // Number of records per page options
                "autoWidth": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                }


         });






    });

  </script>
{{-- end get datatable --}}

{{-- start edit country script --}}
<script>

    $('#datatable').on('click','.editcountry',function (){
        var id=$(this).attr("data-id");
        $.ajax({
                url:"/country/edit/"+id,
                type:"GET", //send it through get method
                success: function (response) {

                    $('#detailes').html(response);

                },
                error: function(response) {

                }
            });

    });

</script>



{{-- end edit country script --}}



@endsection
