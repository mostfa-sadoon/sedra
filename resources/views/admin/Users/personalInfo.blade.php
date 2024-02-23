@extends('admin_temp')
@section('section_name')
{{__('dashboard.user')}}

@endsection
@section('content')














      	<!--begin::Content-->
          <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{__('dashboard.personal_info')}}</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">{{__('dashboard.update_personal_info')}}</span>
                    </div>
                    <div class="card-toolbar">
                        <button  form="form-update"  class="btn btn-success mr-2">{{__('dashboard.save_changes')}}</button>
                        {{-- <button type="reset" class="btn btn-secondary">{{__('dashboard.save')}}</button> --}}
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" id="form-update" action="{{route('Admin.user.updateinfo')}}"  method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$user->id}}"   >

                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mb-6">{{__('dashboard.customer_info')}}</h5>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.personal_img')}}
                            </label>


                            <div class="col-lg-6 col-xl-6" id="personal_img">
                                <div class="image-input image-input-outline " id="kt_image_3">
                                    <div class="image-input-wrapper" id="personal_warpper" style="background-image: url({{$user->img}}); width:180px;  height:180px"  ></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="img" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="profile_avatar_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow "  data-toggle="modal" data-target="#removepersonal"  title="{{__('dashboard.remove_personal_img')}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">{{__('dashboard.alloed_imgs')}}</span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.passport_img')}}
                            </label>


                            <div class="col-lg-6 col-xl-6" id="passport_img">
                                <div class="image-input image-input-outline " id="kt_image_2">
                                    <div class="image-input-wrapper" id="passport_warpper" style="background-image: url({{$user->passport_img}}); width:180px;  height:180px"  ></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="passport_img" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="profile_avatar_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow "  data-toggle="modal" data-target="#removepassport"  title="{{__('dashboard.remove_passport_img')}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">{{__('dashboard.alloed_imgs')}}</span>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.name')}}</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{$user->name}}"  />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('dashboard.passport')}}</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="passport" value="{{$user->passport}}"  />
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
                                    <input type="text" class="form-control form-control-lg form-control-solid"  name="country_code"  value="{{$user->country_code}}" placeholder="country code" />
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
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="phone" value="{{$user->phone}}" placeholder="Phone" />
                                </div>

                            </div>
                        </div>


                    </div>
                    <!--end::Body-->
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->





        {{-- start delete passport img --}}
        <div class="modal fade" id="removepassport" tabindex="-1" role="dialog" aria-labelledby="removepassport" aria-hidden="true">

            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.remove_passport_img')}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   {{__('dashboard.sure')}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                  <button type="button" data-id="{{$user->id}}" data-dismiss="modal" class="btn btn-primary remove_passport_img">{{__('dashboard.remove')}}</button>
                </div>
              </div>
            </div>
          </div>
       {{-- end delete passport img --}}


    {{-- start delete personal img --}}
        <div class="modal fade" id="removepersonal" tabindex="-1" role="dialog" aria-labelledby="removepersonal" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.remove_personal_img')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__('dashboard.sure')}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                <button type="button" data-id="{{$user->id}}" data-dismiss="modal" class="btn btn-primary remove_personal_img">{{__('dashboard.remove')}}</button>
            </div>
            </div>
        </div>
        </div>
  {{-- end delete personal img --}}





@endsection


@section('scripts')


<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}} "></script>
<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

{{-- <script src="{{asset('multi_upload_img/js/multiple-uploader.js')}}"></script>


<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script> --}}

{{-- <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
<script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script> --}}


<script>
    let remove_passport_img={!!json_encode(__('dashboard.remove_passport_img'))!!};
    let remove_personal_img={!!json_encode(__('dashboard.remove_personal_img'))!!};
    let defaultimg =      {!!json_encode(asset('uploads/users/default/default.png'))!!};

    // remove passport img
   $('.remove_passport_img').click(function(){
        var id=$(this).attr("data-id");
          $("#removepassport").modal("hide");
        $.ajax({
                url:"/delete/img/passport/"+id,
                type:"GET", //send it through get method
                success: function (response) {

                    var myDiv = document.getElementById("passport_warpper");
                    // Set the new background image URL
                    myDiv.style.backgroundImage = `url(${defaultimg})`;

                    displayMessage(remove_passport_img);
                        function displayMessage(message) {
                            toastr.success(message, remove_passport_img);
                            }
                  return true;
                },
                error: function(response) {

                }
          });
   });

   // remove personal img
   $('.remove_personal_img').click(function () {
    var id=$(this).attr("data-id");
          $("#removepassport").modal("hide");
        $.ajax({
                url:"/delete/img/img/"+id,
                type:"GET", //send it through get method
                success: function (response) {

                    var myDiv = document.getElementById("personal_warpper");
                    // Set the new background image URL
                    myDiv.style.backgroundImage = `url(${defaultimg})`;
                    displayMessage(remove_personal_img);
                        function displayMessage(message) {
                            toastr.success(message, remove_personal_img);
                            }

                  return true;
                },
                error: function(response) {

                }
          });
   });


</script>


@endsection
