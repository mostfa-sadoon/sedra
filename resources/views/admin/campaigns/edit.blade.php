@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<a href="{{route('Admin.product.index')}}">{{__('dashboard.campaign')}}</a>

@endsection
@section('content')



                              	<!--begin::Card-->
								<div class="card card-custom gutter-b example example-compact">
									<div class="card-header">
										<h3 class="card-title">{{__('dashboard.edit_campaign')}}</h3>
										<div class="card-toolbar">

										</div>
									</div>
									<!--begin::Form-->
									<form class="form" action="{{route('Admin.Campaign.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                       <input type="hidden" name="id" value="{{$campaign->id}}">

										<div class="card-body">

                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="form-group row">
                                                            <div class="col-2">
                                                                <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                                            </div>
                                                            <div class="col-lg-4 col-md-9 col-sm-12">

                                                                    <input type="text"   class="form-control"  name="{{$locale}}[name]"  value="{{$campaign->translateOrNew($locale)->name, true}}"  placeholder="{{ __('dashboard.'.$locale.'.name') }}" >

                                                            </div>
                                                        </div>
                                                    @endforeach






                                                    @foreach (config('translatable.locales') as $locale)
                                                    <div class="form-group row">
                                                        <div class="col-2">
                                                            <label>{{ __('dashboard.'.$locale.'.desc') }}</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">


                                                                <textarea name="{{$locale}}[desc]" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$campaign->translateOrNew($locale)->name, true}}</textarea>



                                                        </div>
                                                    </div>
                                                    @endforeach



                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.program') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                        <select class="form-control" name="program">
                                                                            <option @if($campaign->program==1) selected   @endif value="1">makkah</option>
                                                                            <option @if($campaign->program==1) selected   @endif value="2">makkah & madina</option>
                                                                    </select>
                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.single_price') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <input type="number"  name="single_price" class="form-control"  value="{{$campaign->single_price}}">
                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.persons_count') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <input type="number" name="persons_count" class="form-control" value="{{$campaign->persons_count}}">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.double_price') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <input type="number" name="double_price" class="form-control" value="{{$campaign->double_price}}">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.country') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                        <select class="form-control" name="country" id="country">

                                                                            @foreach ($countries  as  $country)
                                                                                <option value="{{$country->id}}" @if($country->id==$campaign->country_id)  selected @endif>  {{$country->name}}  </option>
                                                                            @endforeach

                                                                        </select>
                                                                 </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.city') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12" >
                                                                        <select class="form-control"  name="city" id="city">
                                                                            <option value="{{$campaign->city->id}}">  {{$campaign->city->name}}  </option>

                                                                            @foreach ($campaign->country->cities  as  $city)
                                                                                <option value="{{$city->id}}">  {{$city->name}}  </option>
                                                                            @endforeach
                                                                        </select>
                                                                 </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.Campaign_adminstrator') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                                    <input type="text" class="form-control" name="admin_name" value="{{$campaign->campaignOfficial->name}}">
                                                                 </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.country_code') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">


                                                                       <input type="text" class="form-control" name="country_code" value="{{$campaign->campaignOfficial->country_code}}">


                                                                 </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.Campaign_adminstrator_phone') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">


                                                                       <input type="number" class="form-control" name="admin_number" value="{{$campaign->campaignOfficial->phone}}">


                                                                 </div>
                                                            </div>





                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.Adress') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">


                                                                       <input type="text" class="form-control" name="address" value="{{$campaign->address}}">


                                                                 </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <div class="col-2">
                                                                    <label>{{ __('dashboard.Img') }}</label>
                                                                </div>
                                                                <div class="col-lg-4 col-md-9 col-sm-12">


                                                                    <div class="image-input image-input-outline" id="kt_image_1">
                                                                        <div class="image-input-wrapper" style="background-image: url({{$campaign->img}})"></div>
                                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                                            <input type="file"   name="img" accept=".png, .jpg, .jpeg" />
                                                                            <input type="hidden" name="profile_avatar_remove" />
                                                                        </label>
                                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                        </span>
                                                                    </div>
                                                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>


                                                                 </div>
                                                            </div>



                                                            <div class="col-lg-9 col-xl-6">

                                                            </div>







                                                    </div>


										</div>
										<div class="card-footer">
											<div class="row">
												<div class="col-lg-9 ml-lg-auto">
													<button type="submit" class="btn btn-success mr-2">{{__('dashboard.update')}}</button>

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
