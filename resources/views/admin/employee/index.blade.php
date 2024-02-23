@extends('admin_temp')

@section('styles')
<style>


/* Custom table styling */
#datatable {
    font-size: 14px;
    border-collapse: collapse;
    width: 100% !important;
}

/* Style table headers */
#datatable thead th {
    background-color: #333;
    color: white;
}

/* Style table rows and alternating row colors */
#datatable tbody tr {
    background-color: #f2f2f2;
}

#datatable tbody tr:nth-child(odd) {
    background-color: #e0e0e0;
}

/* Style pagination controls */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    background-color: #bcc9d7;
    color: white;
}

/* Style search input */
.dataTables_filter input {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 4px;
}


</style>

@endsection

@section('section_name')
<h2><a href="{{route('Admin.employee.index')}}">{{__('dashboard.employees')}}</a></h2>

@endsection
@section('content')



        <div class="row">
            <div class="col-xl-12">

                <div class="col-3">
                    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#addemployee"> {{__('dashboard.Add_employee')}}</button>
                </div>

            </div>

        </div>

    {{-- begain employees --}}

        <div class="col-xl-12">

            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">{{__('dashboard.employees')}}
                    </div>
                    <div class="card-toolbar">


                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    {{-- <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4 my-2 my-md-0">
                                        {{-- <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" id="kt_datatable_search_status">
                                                <option value="">All</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Delivered</option>
                                                <option value="3">Canceled</option>
                                                <option value="4">Success</option>
                                                <option value="5">Info</option>
                                                <option value="6">Danger</option>
                                            </select>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                            <select class="form-control" id="kt_datatable_search_type">
                                                <option value="">All</option>
                                                <option value="1">Online</option>
                                                <option value="2">Retail</option>
                                                <option value="3">Direct</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">{{__('dashboard.search')}}</a>
                            </div> --}}
                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    {{-- <table class="datatable datatable-bordered datatable-head-custom" id="datatable"> --}}
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

                        <thead>
                            <!-- Define table headers -->
                            <th>{{__('dashboard.id')}} </th>
                            <th>{{__('dashboard.name')}} </th>
                            <th>{{__('dashboard.email')}} </th>
                            <th> {{__('dashboard.created_at')}}</th>
                            <th> {{__('dashboard.actions')}}</th>


                        </thead>
                        <tbody>

                        </tbody>


                    </table>


                    <!--end: Datatable-->
                </div>
            </div>

        </div>

    {{-- end employees --}}





   {{--begain::Add employee --}}
   <div class="modal fade outer-repeater" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="addemployee" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.Add_employee')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.employee.store')}}" method="post">
                    @csrf
                <div class="modal-body" id="detailes">

                        <div class="row">
                            <div class="form-group col-6">
                                <label>  {{__('dashboard.name')}} </label>
                                <input class="form-control" type="text" name="name" required>
                                  @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name')}}</p>
                                @endif
                            </div>

                            <div class="form-group col-6">
                                <label>  {{__('dashboard.email')}} </label>
                                <input class="form-control" type="email" name="email" required>
                                @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email')}}</p>
                                @endif
                            </div>

                            <div class="form-group col-6">
                                <label>  {{__('dashboard.password')}} </label>
                                <input class="form-control" id="amount" type="password" name="password" required>
                            </div>

                            <div class="form-group col-6">
                                <label>  {{__('dashboard.password_confirmation')}} </label>
                                <input class="form-control" id="percent" type="password" name="password_confirmation" value="0" required>
                            </div>



                            <div class="form-group col-6">
                                <label>  {{__('dashboard.role')}} </label>
                              <select  name="role"  style="width:100%" class="js-example-basic-single form-control " required>
                                  @foreach ($roles as $role)

                                     <option value="{{$role->name}}"> {{$role->name}}</option>
                                  @endforeach
                              </select>
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
    {{--end::Add employee --}}


    {{--begain::edit employee --}}
   <div class="modal fade outer-repeater" id="editemployee" tabindex="-1" role="dialog" aria-labelledby="addemployee" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.edit_employee')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.employee.update')}}" method="post">
                    @csrf

                    <input type="hidden" name="id" id="emplyee_id" value="">
                <div class="modal-body" id="detailes">

                        <div class="row">
                            <div class="form-group col-6">
                                <label>  {{__('dashboard.name')}} </label>
                                <input class="form-control" type="text" name="name" value="{{old('name')}}" id="name" required>

                                @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name')}}</p>
                                @endif

                            </div>

                            <div class="form-group col-6">
                                <label>  {{__('dashboard.email')}} </label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}}" id="email" required>
                                @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email')}}</p>
                                @endif
                            </div>




                            <div class="form-group col-6">
                                <label>  {{__('dashboard.role')}} </label>
                              <select  name="role"  style="width:100%" class="js-example-basic-single form-control " id="role" required>
                                  @foreach ($roles as $role)

                                     <option value="{{$role->name}}"> {{$role->name}}</option>
                                  @endforeach
                              </select>
                            </div>




                        </div>




                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                </div>
            </form>
            </div>
    </div>
   </div>
    {{--end::edit employee --}}



@endsection

@section('scripts')

   <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>



   {{-- edit employee script --}}

    <script>
            $('#datatable').on('click','.edit_employee',function (){
            var role = document.getElementById("role");
            var id=$(this).attr("data-id");
            $.ajax({
                url:"employee/edit/"+id,
                type:"GET", //send it through get method
                success: function (response) {


                       $('#name').val(response.employee.name);
                       $('#email').val(response.employee.email);
                       $('#emplyee_id').val(id);
                       role.value = response.role[0];

                },
                error: function(response) {

                }
             });
        });

    </script>

   {{-- end edit employee script --}}

   {{-- start validation error --}}
        @if(session('modal') === 'storeErrorModal')
            <script>
                $(document).ready(function() {
                    $('#addemployee').modal('show');
                });
            </script>
        @endif

        @if(session('modal') === 'updateErrorModal')
            <script>
                $(document).ready(function() {
                    $('#editemployee').modal('show');
                });
            </script>
        @endif
    {{-- end validation error  --}}


    {{-- staet get datatable --}}
      <script>

        var name              ={!!json_encode(__('dashboard.name'))!!};
        var trashurl          ={!!json_encode(route('Admin.employee.trash',0))!!};
        var searchtranslate   ={!!json_encode(__('dashboard.search'))!!}
        $(document).ready(function() {
            $('#datatable').DataTable({
                    "ajax": {
                        "url": "/list/employee", // Replace with your API endpoint
                        "type": "GET",
                    },
                    "columns": [
                        // Define your columns here
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "email" },
                        { "data": "created_at" },
                        {
                            data: "id",
                            className: "text-center",
                            orderable:  false,
                            render: function (data, type, row, meta) {
                                return  `${row.id!=1 ? ` <a   class="show_order  svg-icon svg-icon-primary svg-icon-2x "   >

                                                <span class="svg-icon svg-icon-primary svg-icon-2x edit_employee" data-toggle="modal" data-target="#editemployee"   data-id="${row.id}"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>

                                                </a>
                                                <a href="${trashurl}${row.id}">

                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>

                                                    </a>
                                                ` : ``}

                                `
                            }
                        },

                        // Add more columns as needed
                    ],

                    "processing": true,
                    "serverSide": true, // Enable server-side processing
                    "paging": true, // Enable client-side pagination
                    "lengthMenu": [5, 25, 50], // Number of records per page options
                    "autoWidth": true,
                    "language": {
                       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                     }
             });






        });




      </script>
    {{-- end get datatable --}}


@endsection
