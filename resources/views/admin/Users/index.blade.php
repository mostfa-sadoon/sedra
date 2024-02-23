@extends('admin_temp')


@section('styles')
<style>


/* Custom table styling */


</style>

@endsection

@section('section_name')
<h2><a href="{{route('Admin.users')}}">{{__('dashboard.users')}}</a></h2>

@endsection
@section('content')


    {{-- begain users --}}
    <div class="col-xl-12">

        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{__('dashboard.users')}}
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
                                <div class="col-md-4 my-2 my-md-0">
                                    {{-- <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div> --}}
                                </div>
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
              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{__('dashboard.id')}}</th>
                            <th>{{__('dashboard.customer')}}</th>
                            <th>{{__('dashboard.phone')}}</th>
                            <th>{{__('dashboard.Wallet')}}</th>
                            <th>{{__('dashboard.join_at')}}</th>


                            <th>{{__('dashboard.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody style="width:100%">


                       {{-- @foreach ($users as $user)

                        <tr>



                            <td data-field="OrderID" aria-label="51079-129" class="datatable-cell">

                                <span style="width: 250px;"><div class="d-flex align-items-center">

                                     <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">


                                         <img class="" src="{{$user->img}}" alt="photo">

                                     </div>

                                     <div class="ml-4">
                                         <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ mb_substr($user->name,0,16) }}</div>
                                                 <a href="#" class="text-muted font-weight-bold text-hover-primary">{{$user->email}}</a>
                                         </div>
                                     </div>
                                </span>
                             </td>



                            <td>  {{$user->phone}}    </td>


                            <td>   {{$user->wallet}}   </td>
                            <td>   {{$user->created_at}}   </td>
                            <td>

                                 <a   class="show_order  svg-icon svg-icon-primary svg-icon-2x "   href="{{route('Admin.user.show',$user->id)}}">

                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>
                                  </a>


                                  <a class="delete_user" data-id="{{$user->id}}" data-toggle="modal" data-target="#deleteuser">

                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>

                                  </a>


                            </td>



                        </tr>

                       @endforeach --}}
                    </tbody>



                </table>

                {{-- <div class="justify-content-center d-flex">
                    {!! $users->appends(Request::except('page'))->render() !!}
                </div> --}}


                <!--end: Datatable-->
            </div>
        </div>

    </div>

    {{-- end users --}}


     {{--begain::Wallet money --}}
     <div class="modal fade outer-repeater" id="walletmoney" tabindex="-1" role="dialog" aria-labelledby="walletmoney" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.wallet')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('User.Update.wallet')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="wallet_user_id">
                    <div class="modal-body" id="detailes">

                            <div class="form-group">
                                <input type="number" name="balance" id="balance" value="" class="form-control">
                            </div>



                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dashboard.edit')}}</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    {{--end::Wallet money --}}


 <!-- start delete user modal -->
    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_user')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('Admin.user.delete')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="user_id">

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


@endsection

@section('scripts')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

   <script>




        $('#datatable').on('click','.delete_user',function (){

              var id=$(this).attr("data-id");
              $('#user_id').val(id);

        });

        $('#datatable').on('click','.walletmoney',function (){

             var id=$(this).attr("data-id");
             var wallet = $(this).attr("data-wallet");
             $('#wallet_user_id').val(id);
             $('#balance').val(wallet);

        });



   </script>


{{-- staet get datatable --}}
<script>

    var name ={!!json_encode(__('dashboard.name'))!!};
    var showurl ={!!json_encode(route('Admin.user.show',0))!!};
    var searchtranslate   ={!!json_encode(__('dashboard.search'))!!}

    $(document).ready(function() {
        $('#datatable').DataTable({
                "ajax": {
                    "url": "/list/users", // Replace with your API endpoint
                    "type": "GET",
                },
                "columns": [
                    // Define your columns here

                    { "data": "id" },
                    { "data": "name" },
                    { "data": "phone" },
                    { "data": "wallet" },
                    { "data": "created_at" },
                    {
                        data: "id",
                        className: "text-center",
                        orderable:  false,
                        render: function (data, type, row, meta) {
                            return  `
                               <a   class="show_order  svg-icon svg-icon-primary svg-icon-2x "   href="${showurl}${row.id}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>
                                </a>

                                <span class="svg-icon svg-icon-primary svg-icon-2x walletmoney" data-toggle="modal" data-target="#walletmoney" data-id="${row.id}" data-wallet="${row.wallet}"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                        <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>


                                <a class="delete_user" data-id="${row.id}" data-toggle="modal" data-target="#deleteuser">

                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                    </svg><!--end::Svg Icon--></span>
                                </a>
                            `
                        }
                    },

                    // Add more columns as needed
                ],

                "processing": true,
                "serverSide": true, // Enable server-side processing
                "paging": true, // Enable client-side pagination
                "lengthMenu": [10, 25, 50], // Number of records per page options
                "language": {
                   "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                }
         });



    });


  </script>
{{-- end get datatable --}}


@endsection
