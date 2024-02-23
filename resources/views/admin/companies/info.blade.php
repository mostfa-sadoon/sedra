@extends('admin_temp')
@section('section_name')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('Admin.companies',1)}}">{{__('dashboard.companies')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Admin.company.show',$company->id)}}">{{__('dashboard.company')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.company_info')}}</li>
    </ol>
  </nav>
@endsection
@section('content')




      	<!--begin::Content-->
          <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{__('dashboard.company_info')}}
                        </h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">{{__('dashboard.update_company_info')}}</span>
                    </div>
                    <div class="card-toolbar">
                        <button  form="form-update"  class="btn btn-success mr-2">{{__('dashboard.save_changes')}}</button>
                        {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" id="form-update" action="{{route('Admin.company.updateinfo')}}"  method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$company->id}}"   >

                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mb-6">{{__('dashboard.company_info')}}
                                </h5>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.logo')}}
                            </label>


                            <div class="col-lg-6 col-xl-6">
                                <div class="image-input image-input-outline " id="kt_image_3">
                                    <div class="image-input-wrapper" style="background-image: url({{$company->logo}}); width:230px;  height:230px"  ></div>
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





                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.name')}}
                            </label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{$company->name}}"  />
                            </div>
                        </div>



                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mt-10 mb-6">{{__('dashboard.contact_info')}}</h5>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.country_code')}}</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"  name="country_code"  value="{{$company->country_code}}" placeholder="country code" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.phone')}}</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="phone" value="{{$company->phone}}" placeholder="Phone" />
                                </div>
                            </div>
                        </div>




                             {{-- start bank account --}}

                             <div  id="bank_accounts">
                                <h4>{{__('dashboard.bank_accounts')}}</h4>



                                        @foreach ($company->companyBankAccounts as $bankaccount)
                                        <div class="row" id="bank1">
                                            <div class="col-lg-5 mt-1">
                                                <label>{{__('dashboard.bank_names')}}</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-phone"></i> --}}
                                                        </span>
                                                    </div>

                                                    <input type="text" name="bank_names[]" class="form-control" placeholder="{{__('dashboard.bank_names')}}" value="{{$bankaccount->name}}" required/>
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

                                                    <input type="text" name="account_numbers[]"  class="form-control" placeholder="{{__('dashboard.account_numbers')}}" value="{{$bankaccount->account_number}}" required/>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach












                            </div>

                            <div class="col-2 m-2">
                                <input type="button" class="btn btn-primary col-5 add_input mr-1" value="{{__('dashboard.add')}}">
                                <input type="button" class="btn btn-danger col-5 delete_input"  value="{{__('dashboard.delete')}}">

                            </div>

                            {{-- end bank account --}}





                    </div>
                    <!--end::Body-->
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->






@endsection


@section('scripts')


<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}} "></script>
<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

{{-- <script src="{{asset('multi_upload_img/js/multiple-uploader.js')}}"></script>


<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script> --}}

{{-- <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script> --}}

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

                        <input type="text" name="account_numbers[]"  class="form-control" placeholder=">${account_numbers}"required />
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

@endsection













