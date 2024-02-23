@extends('admin_temp')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

@endsection
@section('section_name')

<h2><a href="{{route('Admin.companies',1)}}">{{__('dashboard.companies')}}</a></h2>

@endsection
@section('content')

<div class="row">
    <div class="col-xl-12">

        <div class="col-3">
            <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#addCompany"> {{__('dashboard.Add_company')}}</button>
        </div>

    </div>

</div>


 {{-- begain orders --}}
 <div class="col-xl-12">

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">

                 @if($type=='active')   {{__('dashboard.companies')}}  @elseif ($type=='pending')    {{__('dashboard.pending_companies')}}       @endif

                </h3>
            </div>
            <div class="card-toolbar">


            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->

            <!--end: Search Form-->
            <!--begin: Datatable-->
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>{{__('dashboard.companies')}}</th>
                        <th>{{__('dashboard.phone')}}</th>
                        <th>{{__('dashboard.email')}}</th>
                        <th>{{__('dashboard.balance')}}</th>
                        <th>{{__('dashboard.join_at')}}</th>
                        <th>{{__('dashboard.status')}}</th>
                        <th>{{__('dashboard.actions')}}</th>
                    </tr>
                </thead>
                <tbody>


                   {{-- @foreach ($companies as $company)

                    <tr>



                        <td data-field="OrderID" aria-label="51079-129" class="datatable-cell">

                            <span style="width: 250px;"><div class="d-flex align-items-center">

                                 <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">


                                     <img class="" src="{{$company->logo}}" alt="photo">

                                 </div>

                                 <div class="ml-4">
                                     <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">   {{ mb_substr($company->name,0,16) }}</div>
                                             <a href="#" class="text-muted font-weight-bold text-hover-primary">{{$company->name}}</a>
                                     </div>
                                 </div>
                            </span>
                         </td>



                        <td>  {{$company->phone}}    </td>


                        <td>   {{$company->email}}   </td>
                        <td class="balance">{{$company->balance}}</td>
                        <td>   {{$company->created_at}}   </td>

                         <td>

                            <span class="switch switch-success">
                                <label>
                                    <input type="checkbox"  data-id="{{$company->id}}"  class="status_check"    @if($company->status==1)  checked="checked" @endif   name="select" />
                                    <span></span>
                                </label>
                            </span>


                         </td>


                        <td>

                             <a   class="show_order  svg-icon svg-icon-primary svg-icon-2x "   href="{{route('Admin.company.show',$company->id)}}">

                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                </g>
                                </svg><!--end::Svg Icon--></span>
                            </a>


                            <a class="delete_company" data-id="{{$company->id}}" data-toggle="modal" data-target="#deletecompany">

                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>

                              </a>


                                <span class="svg-icon svg-icon-primary svg-icon-2x transfaremoney" data-toggle="modal" data-target="#transfaremoney" data-id="{{$company->id}}"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                        <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>



                        </td>



                    </tr>

                   @endforeach --}}


                </tbody>



            </table>

            {{-- <div class="justify-content-center d-flex">
                {!! $companies->appends(Request::except('page'))->render() !!}
            </div> --}}


            <!--end: Datatable-->
        </div>
    </div>

</div>

{{-- end compaanies --}}

 {{--begain::Add country --}}
 <div class="modal fade outer-repeater" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="addCompany" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.Add_company')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.company.store')}}" method="post" enctype="multipart/form-data">
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
                                <input class="form-control" type="password" name="password" required>
                                @if ($errors->has('password'))
                                   <p class="text-danger">{{ $errors->first('password')}}</p>
                                @endif
                            </div>

                            <div class="form-group col-6">
                                <label>  {{__('dashboard.password_confirmation')}} </label>
                                <input class="form-control" type="password" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                   <p class="text-danger">{{ $errors->first('password_confirmation')}}</p>
                                @endif

                            </div>

                              <div class="form-group col-6">
                                <label>  {{__('dashboard.phone')}} </label>
                                <input class="form-control"  type="text" name="phone" required>
                                @if ($errors->has('phone'))
                                  <p class="text-danger">{{ $errors->first('phone')}}</p>
                                @endif
                            </div>

                            <div class="form-group col-6">
                                <label>  {{__('dashboard.country_code')}} </label>
                                <input class="form-control" type="text" name="country_code"  required>
                                @if ($errors->has('phone'))
                                  <p class="text-danger">{{ $errors->first('phone')}}</p>
                                @endif
                            </div>

                            <div class="form-group col-lg-6 col-xl-6">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.logo')}}
                                </label>


                                  <div>
                                    <div class="image-input image-input-outline " id="kt_image_3">
                                        <div class="image-input-wrapper" style="background-image: url({{asset('public/uploads/companies/default/default.png')}}); width:180px;  height:180px"  ></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="img" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <span class="form-text text-muted">{{__('dashboard.alloed_imgs')}}</span>
                                  </div>


                            </div>



                             {{-- start bank account --}}
                                <div class="col-6">
                                    <div  id="bank_accounts">
                                        <h4>{{__('dashboard.bank_accounts')}}</h4>



                                        <div class="row" id="bank1">
                                            <div class="col-lg-5 mt-1">
                                                <label>{{__('dashboard.bank_names')}}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-phone"></i> --}}
                                                        </span>
                                                    </div>

                                                    <input type="text" name="bank_names[]" class="form-control" placeholder="{{__('dashboard.bank_names')}}"  required/>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <label>{{__('dashboard.account_numbers')}}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-envelope"></i> --}}
                                                        </span>
                                                    </div>

                                                    <input type="text" name="account_number[]"  class="form-control" placeholder="{{__('dashboard.account_numbers')}}" required/>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($errors->has('account_number'))
                                           <p class="text-danger">{{ $errors->first('account_number')}}</p>
                                        @endif









                                    </div>

                                    <div class="col-2 m-2">
                                        <i class="fa-solid fa-trash delete_input text-danger"></i>
                                        <i class="fa-sharp fa-solid fa-plus add_input text-primary"></i>
                                        {{-- <input type="button" class="btn btn-primary col-5 add_input mr-1" value="{{__('dashboard.add')}}"> --}}
                                        {{-- <input type="button" class="btn btn-danger col-5 delete_input"  value="{{__('dashboard.delete')}}"> --}}
                                    </div>
                                </div>




                            {{-- end bank account --}}







                        </div>




                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.add')}}</button>
                </div>
            </form>
            </div>
    </div>
   </div>
    {{--end::Add country --}}



   {{--begain::transfare money --}}
    <div class="modal fade outer-repeater" id="transfaremoney" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.transfare_money')}}</h5>
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
    {{--end::transfare money --}}

    <!-- start delete comapny modal -->
    <div class="modal fade" id="deletecompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_user')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('Admin.company.delete')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="company_id">

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

    <!-- start company has campain -->
        <div class="modal fade" id="companyHasCampign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_user')}}</h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <div class="modal-body">

                    <h4> {{__('dashboard.has_campaign')}} </h4>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                </div>

            </div>
            </div>
        </div>
    <!-- end company has campain -->


@endsection

@section('scripts')

   <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>



   {{-- start add bank account --}}


            <script>
                var bank_names =  {!!json_encode(__('dashboard.bank_names'))!!};
                var account_numbers =  {!!json_encode(__('dashboard.account_numbers'))!!};
                let inputcount=1;
            $('.add_input').click(function(){
                inputcount+=1;
                $('#bank_accounts').append(`

                        <div class="row" id="bank${inputcount}">
                            <div class="col-lg-5 mt-1">
                                <label>${bank_names}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-phone"></i> --}}
                                        </span>
                                    </div>

                                    <input type="text" name="bank_names[]" class="form-control" placeholder="${bank_names}" required/>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <label>${account_numbers}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-envelope"></i> --}}
                                        </span>
                                    </div>

                                    <input type="text" name="account_number[]"  class="form-control" placeholder=">${account_numbers}"required />
                                </div>
                            </div>
                        </div>

                `);
            })

            $(document).on('click','.delete_input',function(){

                $('#bank'+inputcount).remove();
                inputcount-=1;
            });

            </script>


            {{-- end add bank account --}}


     {{-- active companies --}}
         <script>

                let company={!!json_encode(__('dashboard.company'))!!};

                let active_company={!!json_encode(__('dashboard.active_company'))!!};

                let disaple_company={!!json_encode(__('dashboard.disaple_company'))!!};

                $('#datatable').on('click','.status_check',function (){

                var id=$(this).attr("data-id");
                if ($(this).is(':checked')) {
                    $.ajax({
                        url:"/companies/active/company/"+id,
                        type:"GET", //send it through get method
                        success: function (response) {
                            $(document).ready(function() {
                                displayMessage(active_company);
                                function displayMessage(message) {
                                    toastr.success(message, company);
                                    }
                            });
                        return true;

                        },
                        error: function(response) {

                        }
                        });

                }else{

                    $.ajax({
                        url:"/companies/disactive/company/"+id,
                        type:"GET", //send it through get method
                        success: function (response) {
                            $(document).ready(function() {
                                displayMessage(disaple_company);
                                function displayMessage(message) {
                                    toastr.success(message, company);
                                    }
                            });
                        return true;

                        },
                        error: function(response) {

                        }
                        });

                }

                });

        </script>
     {{-- end transfare money --}}


     {{-- start transfdare money --}}
        <script>


            $('#datatable').on('click','.transfaremoney',function (){
                      var id=$(this).attr("data-id");
                      $('#companey_id').val(id);
                     $.ajax({
                        url:"/companies/balance/company/"+id,
                        type:"GET", //send it through get method
                        success: function (response) {
                         $('#balance').val(response);
                        return true;

                        },
                        error: function(response) {

                        }
                    });
             });


        </script>
     {{-- end transfare money --}}

     {{-- start delete company script --}}
         <script>
            $('#datatable').on('click','.delete_company',function (){

                var id=$(this).attr("data-id");
                $('#company_id').val(id);
            });
         </script>
     {{-- end delete company script --}}


     {{--  start comapny has campaign --}}

        @if (Session::get('hascampaign'))

            <script>
                $('#companyHasCampign').modal('show');
            </script>

        @endif


     {{-- end company has campain --}}


     <script>


     </script>

  {{-- start get datatable --}}

  <script>



$(document).ready(function() {
    var type                       ={!!json_encode($type)!!};
    var searchtranslate            ={!!json_encode(__('dashboard.search'))!!};   //
    var showcompany                 ={!!json_encode(route('Admin.company.show',0))!!};



        $('#datatable').DataTable({
                "ajax": {
                    "url": `/companies/list/${type}`, // Replace with your API endpoint
                    "type": "GET",
                },
                "columns": [
                    // Define your columns here
                    { "data": "name",render:function(data, type, row, meta){
                       return `

                       <span style="width: 250px;"><div class="d-flex align-items-center">

                        <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">


                            <img class="" src="${row.logo}" alt="photo">

                        </div>

                        <div class="ml-4">
                            <div class="text-dark-75 font-weight-bolder font-size-lg mb-0"> ${row.name}</div>
                                    <a href="#" class="text-muted font-weight-bold text-hover-primary">${row.name}</a>
                            </div>
                        </div>
                        </span>

                         `
                    }},
                    { "data": "phone" , orderable: false},
                    { "data": "email", orderable: false},
                    { "data": "balance"},
                    { "data": "created_at"},

                     {"data":"status" , orderable: false,render: function (data, type, row, meta) {

                        if(row.status==1){
                            return  `
                                    <span class="switch switch-success">
                                        <label>
                                            <input type="checkbox"  data-id="${row.id}"  class="status_check"  checked="checked"  name="select" />
                                            <span></span>
                                        </label>
                                    </span>
                                `;
                        }
                        if(row.status==0){
                            return  `
                                    <span class="switch switch-success">
                                        <label>
                                            <input type="checkbox"  data-id="${row.id}"  class="status_check"  name="select" />
                                            <span></span>
                                        </label>
                                    </span>
                                `;
                        }




                      }},

                     {"data":"actions" ,render: function (data, type, row, meta) {

                              return  `
                              <a   class="show_order  svg-icon svg-icon-primary svg-icon-2x "   href="${showcompany}${row.id}">

                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                </g>
                                </svg><!--end::Svg Icon--></span>
                            </a>


                            <a class="delete_company" data-id="${row.id}" data-toggle="modal" data-target="#deletecompany">

                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>

                            </a>


                            <span class="svg-icon svg-icon-primary svg-icon-2x transfaremoney" data-toggle="modal" data-target="#transfaremoney" data-id="${row.id}"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                    <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
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
                "lengthMenu": [10, 25, 50], // Number of records per page options
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

{{-- store company validation --}}
@if (Session::get('errors'))
    <script>
        $(document).ready(function() {
            $('#addCompany').modal('show');

        });
    </script>
@endif


{{-- end store company validation  --}}



@endsection
