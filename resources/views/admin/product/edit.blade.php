@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">{{__('dashboard.ecommerce')}}</li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Admin.product.index')}}">{{__('dashboard.products')}}</a></li>
    </ol>
  </nav>
@endsection
@section('content')



<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">

                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Form-->
                        <form action="{{route('Admin.product.update')}}"  method="post" enctype="multipart/form-data" id="my-form">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                        {{-- start edit --}}
                        <div class="row">

                            @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <div>
                                    <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                    <input class="form-control" name="{{$locale}}[name]"   value="{{$product->translateOrNew($locale)->name, true }}" type="text">
                                </div>
                                @if ($errors->has($locale.'.name'))
                                <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                                @endif


                                <div>
                                <label>{{ __('dashboard.'.$locale.'.desc') }}</label>
                                <textarea class="form-control" name="{{$locale}}[desc]"> {{$product->translateOrNew($locale)->description, true }}  </textarea>
                                </div>
                                @if ($errors->has($locale.'.desc'))
                                <p class="text-danger">{{ $errors->first($locale.'.desc')}}</p>
                                @endif


                            </div>
                        @endforeach


                            <div class="form-group col-6 mt-1">
                                <label>{{ __('dashboard.price') }}</label>
                                <input class="form-control" type="number" name="price" value="{{$product->price}}">
                                @if ($errors->has('price'))
                                <p class="text-danger">{{ $errors->first('price')}}</p>
                                @endif
                            </div>


                            <div class="form-group col-6 mt-1">
                                <label>{{ __('dashboard.quantity') }}</label>
                                <input class="form-control" type="number" name="quantity" value="{{$product->count}}">
                                @if ($errors->has('quantity'))
                                <p class="text-danger">{{ $errors->first('quantity')}}</p>
                                @endif
                            </div>


                            <div class="row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right">{{__('dashboard.main_img')}}</label>

                                <div class="col-lg-6 col-xl-6">
                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                        <div class="image-input-wrapper" style="background-image: url({{$product->main_img}})" ></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="main_img" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <span class="form-text text-muted">{{__('dashboard.alloed_imgs')}}</span>
                                </div>


                                <div class="col-lg-3 col-xl-3">

                                    <label>{{__('dashboard.category')}}</label>
                                    <select class="form-control" name="category">
                                        <option value="man"    {{ ($product->type=='man') ? 'selected' : '' }} > {{__('dashboard.man')}} </option>
                                        <option value="woman"  {{ ($product->type=='woman') ? 'selected' : '' }}> {{__('dashboard.woman')}} </option>
                                    </select>

                                </div>

                            </div>


                            <div class="multiple-uploader" id="multiple-uploader">
                                <div class="mup-msg">
                                    <span class="mup-main-msg">{{__('dashboard.click_to_upload_img')}}</span>
                                    {{-- <span class="mup-msg" id="max-upload-number">dsds</span> --}}
                                    <span class="mup-msg">{{__('dashboard.alloed_imgs')}}</span>
                                </div>
                            </div>

                            {{-- start feature --}}

                            <div class="col-lg-12 row" id="product_feature_body">
                                <h4>{{__('dashboard.features')}}</h4>


                                @foreach ($product->productFeatures as $key=>$feature)
                                    <div class="col-lg-12 row" id="feature{{$key+1}}">


                                        <div class="col-lg-5 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{-- <i class="la la-phone"></i> --}}
                                                    </span>
                                                </div>
                                                <input type="text" name="ar[feature][]" class="form-control" value="{{$feature->translateOrNew('ar')->feature,true}}" placeholder="{{__('dashboard.'.'ar'.'.feature')}}" />
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{-- <i class="la la-envelope"></i> --}}
                                                    </span>
                                                </div>
                                                <input type="text" name="ar[value][]"  value="{{$feature->translateOrNew('ar')->value,true}}" class="form-control" placeholder="{{__('dashboard.'.'ar'.'.value')}}" />
                                            </div>
                                        </div>



                                        <div class="col-lg-5 mt-1">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{-- <i class="la la-phone"></i> --}}
                                                    </span>
                                                </div>
                                                <input type="text" name="en[feature][]" class="form-control" value="{{$feature->translateOrNew('en')->feature,true}}"  placeholder="{{__('dashboard.'.'en'.'.feature')}}" />
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        {{-- <i class="la la-envelope"></i> --}}
                                                    </span>
                                                </div>
                                                <input type="text" name="en[value][]"  class="form-control" value="{{$feature->translateOrNew('en')->value,true}}" placeholder="{{__('dashboard.'.'en'.'.value')}}" />
                                            </div>
                                        </div>


                                    </div>
                                @endforeach



                            </div>

                            <div class="col-2 m-5">
                                <input type="button" class="btn btn-primary col-5 add_input mr-1" value="{{__('dashboard.add')}}">
                                <input type="button" class="btn btn-danger col-5 delete_input"  value="{{__('dashboard.delete')}}">

                            </div>

                            {{-- end feature --}}




                        </div>
                        <div class="row d-flex mt-5 mr-5">
                            <input type="submit" class="btn btn-primary col-1 justify-content-end" value="{{__('dashboard.edit')}}">

                        </div>

                        </form>
                        {{-- end edit --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}} "></script>
<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

<script src="{{asset('multi_upload_img/js/multiple-uploader.js')}}"></script>





<script>

    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        maxUpload : 20, // maximum number of uploaded images
        maxSize:2, // in size in mb
        filesInpName:'images', // input name sent to backend
        formSelector: '#my-form', // form selector
    });

</script>

 {{-- begain repeat feature script --}}
 <script>

    let inputcount={!!json_encode($product->productFeatures->count())!!};
        $('.add_input').click(function(){


            inputcount+=1;

            $('#product_feature_body').append(`

            <div class="col-lg-12 row" id="feature${inputcount}">
                            <div class="col-lg-5 mt-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-phone"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="ar[feature][]" class="form-control" placeholder="{{__('dashboard.'.'ar'.'.feature')}}" />
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-envelope"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="ar[value][]"  class="form-control" placeholder="{{__('dashboard.'.'ar'.'.value')}}" />
                                </div>
                            </div>



                            <div class="col-lg-5 mt-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-phone"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="en[feature][]" class="form-control" placeholder="{{__('dashboard.'.'en'.'.feature')}}" />
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-envelope"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="en[value][]"  class="form-control" placeholder="{{__('dashboard.'.'en'.'.value')}}" />
                                </div>
                            </div>


                    </div>



            `);
        });

        $(document).on('click','.delete_input',function(){

            $('#feature'+inputcount).remove();
            inputcount-=1;
        });

    </script>
  {{-- end repeat feature script --}}



@endsection
