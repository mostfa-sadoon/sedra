@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<a href="{{route('Admin.product.index')}}">{{__('dashboard.regmint')}}</a>

@endsection
@section('content')



                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">{{__('dashboard.edit_regmint')}}</h3>
                            <div class="card-toolbar">

                            </div>
                        </div>
                         @if (Session::has('error'))

                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>

                         @endif
                        <!--begin::Form-->
                        <form class="form" action="{{route('Admin.regmint.update')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$regmint->id}}">

                            <div class="card-body">

                                                <div class="form-group row">
                                                    <div class="col-2">
                                                        <label>{{ __('dashboard.persons_count') }}</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <input type="number"  name="persons_count" class="form-control"  value="{{$regmint->persons_count}}">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-2">
                                                        <label>{{ __('dashboard.days_count') }}</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <input type="number"  name="days_count" class="form-control"  value="{{$regmint->days_count}}">
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <div class="col-2">
                                                        <label>{{ __('dashboard.cancellation_date') }}</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <input type="date" name="cancellation_date" class="form-control" value="{{$regmint->cancellation_date}}">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-2">
                                                        <label>{{ __('dashboard.start_date') }}</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <input type="date" name="date" class="form-control" value="{{$regmint->date}}">
                                                    </div>
                                                </div>



                                                <div class="col-lg-9 col-xl-6">

                                                </div>
                                        </div>


                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-9 ml-lg-auto">
                                        <button type="submit" class="btn btn-success mr-2">Update</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->

@endsection


@section('scripts')

<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>

<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

{{-- change city --}}
<script>
      $('#country').change(function(){

        var country_id =$("#country option:selected").val();


                $.ajax({
                url:  "get/cities/"+country_id,
                type:"GET", //send it through get method
                success: function (response) {

                    $("#city").empty();

                    for (const city in response) {

                          $("#city").append(`<option value='${response[city].id}'>${response[city].name} </option>`);
                    }




                },
                error: function(response) {

                }
                });


      });
</script>

@endsection
