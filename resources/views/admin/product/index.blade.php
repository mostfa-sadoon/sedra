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



	<!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Page Layout-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-column offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">


                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column mb-3">
                                <span class="card-label font-size-h3 font-weight-bolder text-dark"  data-toggle="modal" data-target="#exampleModal">{{__('dashboard.Add_new_product')}}</span>
                            </h3>


                            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                                {{__('dashboard.add_product')}}
                            </button>

                        </div>


                        <!--begin::Forms Widget 15-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Form-->
                                <form action="{{route('Admin.product.index')}}"  method="get">
                                    @csrf
                                    <!--begin::Categories-->
                                    <div class="form-group mb-11">
                                        <label class="font-size-h3 font-weight-bolder text-dark mb-7">{{__('dashboard.categories')}}</label>
                                        <!--begin::Checkbox list-->
                                        <div class="checkbox-list">
                                            <label class="checkbox checkbox-lg mb-7">
                                                <input type="checkbox" name="man"  @if ($selectCategory=='both' || $selectCategory=='man')  checked @endif>
                                                <span></span>
                                                <div class="font-size-lg text-dark-75 font-weight-bold">{{__('dashboard.man')}}</div>
                                            </label>
                                            <label class="checkbox checkbox-lg mb-7">
                                                <input type="checkbox" name="Woman" @if ($selectCategory=='both' || $selectCategory=='woman') checked @endif  />
                                                <span></span>
                                                <div class="font-size-lg text-dark-75 font-weight-bold" >{{__('dashboard.woman')}}</div>
                                            </label>
                                        </div>
                                        <!--end::Checkbox list-->
                                    </div>



                                    <button type="submit" class="btn btn-primary font-weight-bolder mr-2 px-8">{{__('dashboard.reset')}}</button>
                                    {{-- <button type="reset" class="btn btn-clear font-weight-bolder text-muted px-8">Setup</button> --}}
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Forms Widget 15-->
                        <!--begin::List Widget 21-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column mb-5">
                                    <span class="card-label font-weight-bolder text-dark mb-1">{{__('dashboard.Recent_Products')}}</span>
                                </h3>

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                <!--begin::Item-->
                                @foreach ($products as $key=>$product)
                                   @if($key>2)
                                   @break
                                   @endif
                                <div class="d-flex mb-8">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="d-flex flex-column">
                                            <div class="symbol-label mb-3" style="background-image: url('{{$product->main_img}}')"></div>
                                            <a href="{{route('Admin.product.edit',$product->id)}}" class="btn btn-light-primary font-weight-bolder py-2 font-size-sm">{{__('dashboard.edit')}}</a>

                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <p   class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2">{{$product->name}}</p>
                                        <span class="text-muted font-weight-bold font-size-sm mb-3">  {{mb_substr($product->description,0,35)}}</span>
                                        <span class="text-muted font-weight-bold font-size-lg">{{__('dashboard.price')}}:
                                        <span class="text-dark-75 font-weight-bolder">{{$product->price}} رس</span></span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                @endforeach

                                <!--end::Item-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 21-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Layout-->
                    <div class="flex-row-fluid ml-lg-8">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <!--begin::Engage Widget 15-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-body rounded p-0 d-flex bg-light">
                                        <div class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-650px py-10 py-md-14 px-10 px-md-20 pr-lg-0">
                                            <h1 class="font-weight-bolder text-dark mb-0">{{__('dashboard.search')}}</h1>
                                            <!--begin::Form-->
                                            <form class="d-flex flex-center py-2 px-6 bg-white rounded" action="{{route('Admin.product.index')}}" method="get">
                                                @csrf
                                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>

                                                    <!--end::Svg Icon-->
                                                </span>
                                                <input type="text" name="search_key" class="form-control border-0 font-weight-bold pl-2" placeholder="{{__('dashboard.search_product')}}" />
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <div class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover" style="background-image: url({{asset('assets/media/svg/illustrations/copy.svg')}});"></div>
                                    </div>
                                </div>
                                <!--end::Engage Widget 15-->

                                <!--begin::Section-->
                                <div class="row">
                                    @foreach ($products as $product)
                                        <!--begin::Product-->
                                        <div class="col-md-4 col-lg-12 col-xxl-4">
                                            <div class="card card-custom gutter-b card-stretch">
                                                <div class="card-body d-flex flex-column rounded bg-light justify-content-between">
                                                    <div class="text-center rounded mb-7">
                                                        <img src="{{$product->main_img}}" class="mw-100 w-200px" />
                                                    </div>
                                                    <div>
                                                        <h4 class="font-size-h5">
                                                            <a href=""  class="text-dark-75 font-weight-bolder productcount" data-count="{{$product->count}}" data-soldQuantity="{{$product->sold_quantity}}" data-toggle="modal" data-target="#productcount">{{$product->name}}</a>
                                                        </h4>
                                                        <div class="font-size-h6 text-muted font-weight-bolder">رس {{$product->price}} </div>

                                                        <a href="{{route('Admin.product.edit',$product->id)}}">
                                                            <span class="svg-icon svg-icon-primary svg-icon-2x edit_product" data-toggle="modal" data-target="#editproduct"   data-id="{{$product->id}}"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
                                                        </a>



                                                            <span   class="show_product  svg-icon svg-icon-primary svg-icon-2x "  data-id="{{$product->id}}" data-toggle="modal" data-target="#showproduct"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>



                                                            <a class="delete_product" data-id="{{$product->id}}" data-toggle="modal" data-target="#deleteproduct">
                                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                                    </g>
                                                                </svg><!--end::Svg Icon--></span>
                                                           </a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Product-->
                                    @endforeach
                                </div>
                                <!--end::Section-->
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Page Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->





     {{--begain::add product model --}}
        <div class="modal fade outer-repeater" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">
                <form action="{{route('Admin.product.store')}}" method="post" enctype="multipart/form-data" id="my-form">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.add_product')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">

                                @foreach (config('translatable.locales') as $locale)
                                <div class="col-6">
                                      <div>
                                          <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                          <input class="form-control" name="{{$locale}}[name]" type="text" required>
                                      </div>
                                      @if ($errors->has($locale.'.name'))
                                      <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                                      @endif


                                    <div>
                                    <label>{{ __('dashboard.'.$locale.'.desc') }}</label>
                                    <textarea class="form-control" name="{{$locale}}[desc]" required> </textarea>
                                    </div>
                                    @if ($errors->has($locale.'.desc'))
                                    <p class="text-danger">{{ $errors->first($locale.'.desc')}}</p>
                                    @endif


                                 </div>
                               @endforeach


                                <div class="form-group col-6 mt-1">
                                    <label>{{ __('dashboard.price') }}</label>
                                    <input class="form-control" type="number" name="price" value="0" required>
                                    @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price')}}</p>
                                    @endif
                                </div>


                                <div class="form-group col-6 mt-1">
                                    <label>{{ __('dashboard.quantity') }}</label>
                                    <input class="form-control" type="number" name="quantity" value="0" required>
                                    @if ($errors->has('quantity'))
                                    <p class="text-danger">{{ $errors->first('quantity')}}</p>
                                    @endif
                                </div>


                                <div class="row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">{{__('dashboard.main_img')}}</label>

                                    <div class="col-lg-6 col-xl-6">
                                        <div class="image-input image-input-outline image-input-circle" id="kt_image_3">
                                            <div class="image-input-wrapper" style="background-image: url({{asset('/uploads/products/main_imgs/defaultimg/default.jpg')}})" ></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="main_img" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">{{__('dashboard.allowed_file')}}</span>
                                    </div>


                                    <div class="col-lg-3 col-xl-3">

                                          <label>{{__('dashboard.category')}}</label>
                                          <select class="form-control" name="category">
                                               <option value="man"> {{__('dashboard.man')}} </option>
                                               <option value="woman">  {{__('dashboard.woman')}} </option>

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

                                        <div class="col-lg-12 row" id="feature1">


                                            <div class="col-lg-5 mt-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-phone"></i> --}}
                                                        </span>
                                                    </div>
                                                    <input type="text" name="ar[feature][]" class="form-control" placeholder="{{__('dashboard.'.'ar'.'.feature')}}"  required/>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-envelope"></i> --}}
                                                        </span>
                                                    </div>
                                                    <input type="text" name="ar[value][]"  class="form-control" placeholder="{{__('dashboard.'.'ar'.'.value')}}" required/>
                                                </div>
                                            </div>



                                            <div class="col-lg-5 mt-1">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-phone"></i> --}}
                                                        </span>
                                                    </div>
                                                    <input type="text" name="en[feature][]" class="form-control" placeholder="{{__('dashboard.'.'en'.'.feature')}}" required/>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{-- <i class="la la-envelope"></i> --}}
                                                        </span>
                                                    </div>
                                                    <input type="text" name="en[value][]"  class="form-control" placeholder="{{__('dashboard.'.'en'.'.value')}}" required/>
                                                </div>
                                            </div>


                                        </div>


                                </div>

                                <div class="col-2 m-2">
                                    <input type="button" class="btn btn-primary col-5 add_input mr-1" value="{{__('dashboard.add')}}">
                                    <input type="button" class="btn btn-danger col-5 delete_input"  value="{{__('dashboard.delete')}}">

                                </div>

                                {{-- end feature --}}


                            </div>
                        </div>


                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('dashboard.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('dashboard.add')}}</button>
                        </div>
                    </div>
               </form>


            </div>
        </div>
    {{--end::add product model --}}

     {{--begain::show product model --}}
     <div class="modal fade outer-repeater" id="showproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body" id="product_detailes">


                    </div>



                </div>


        </div>
     </div>
     {{--end::show product model --}}


        {{--begain::add product model --}}
        <div class="modal fade outer-repeater" id="productcount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body" id="product_detailes">
                         <div class="form-group">
                            <label>{{__('dashboard.product_count')}}</label>
                            <input type="number" class="form-control" value="" id="piece_count" disabled>

                         </div>

                         <div class="form-group">
                            <label>{{__('dashboard.sold_quantity')}}</label>
                            <input type="number" class="form-control" value="" id="sold_quantity" disabled>

                         </div>

                    </div>



                </div>


        </div>
        </div>
    {{--end::add product model --}}



     <!-- start delete product modal -->
     <div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_product')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('Admin.product.delete')}}" method="post">
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="product_id">

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
   <!-- end delete product modal -->




@endsection
@section('scripts')
<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/form-repeater.js')}} "></script>
<script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>
<script src="{{asset('multi_upload_img/js/multiple-uploader.js')}}"></script>



<script>

    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        maxUpload : 20, // maximum number of uploaded images
        maxSize:3, // in size in mb
        filesInpName:'images', // input name sent to backend
        formSelector: '#my-form', // form selector
    });

</script>


 {{-- begain edit product script --}}

<script>
$('.show_product').click(function(){
    var id=$(this).attr("data-id");
    $.ajax({
        url:"show/product/"+id,
        type:"GET", //send it through get method
        success: function (response) {

            $('#product_detailes').html(response);

        },
        error: function(response) {

        }
        });
    });
</script>

 {{-- end edit product script --}}

  {{-- begain repeat feature script --}}
    <script>

    let inputcount=1;
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
                                    <input type="text" name="ar[feature][]" class="form-control" placeholder="{{__('dashboard.'.'ar'.'.feature')}}" required/>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-envelope"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="ar[value][]"  class="form-control" placeholder="{{__('dashboard.'.'ar'.'.value')}}" required/>
                                </div>
                            </div>



                            <div class="col-lg-5 mt-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-phone"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="en[feature][]" class="form-control" placeholder="{{__('dashboard.'.'en'.'.feature')}}" required/>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            {{-- <i class="la la-envelope"></i> --}}
                                        </span>
                                    </div>
                                    <input type="text" name="en[value][]"  class="form-control" placeholder="{{__('dashboard.'.'en'.'.value')}}" required/>
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


  {{-- start display error --}}
       @if (Session::get('errors')!=null)
       <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
    </script>
       @endif

  {{-- end display error --}}


   {{-- start piece count --}}

   <script>

         $('.productcount').click(function(){

               var count=  $(this).attr("data-count");
               var soldQuantity = $(this).attr("data-soldQuantity");
               $('#piece_count').val(count);
               $('#sold_quantity').val(soldQuantity);
         })


   </script>


   {{-- end piece of count --}}


   {{-- delete product --}}
      <script>
           $('.delete_product').click(function(){
                 var id =$(this).attr("data-id");
                 $('#product_id').val(id);
           });
      </script>
   {{-- delete product --}}

@endsection

