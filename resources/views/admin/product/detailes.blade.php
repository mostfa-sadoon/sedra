<div class="row">

    @foreach (config('translatable.locales') as $locale)
    <div class="col-6">
          <div>
              <label>{{ __('dashboard.'.$locale.'.name') }}</label>
              <input class="form-control" name="{{$locale}}[name]"   value="{{$product->translateOrNew($locale)->name, true }}" type="text" disabled>
          </div>
          @if ($errors->has($locale.'.name'))
          <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
          @endif


        <div>
        <label>{{ __('dashboard.'.$locale.'.desc') }}</label>
        <textarea class="form-control" name="{{$locale}}[desc]" disabled> {{$product->translateOrNew($locale)->description, true }}  </textarea>
        </div>
        @if ($errors->has($locale.'.desc'))
        <p class="text-danger">{{ $errors->first($locale.'.desc')}}</p>
        @endif


     </div>
   @endforeach


    <div class="form-group col-6 mt-1">
        <label>{{ __('dashboard.price') }}</label>
        <input class="form-control" type="number" name="price" value="{{$product->price}}" disabled>
    </div>


    <div class="form-group col-6 mt-1">
        <label>{{ __('dashboard.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" value="{{$product->count}}" disabled>
    </div>


    <div class="row">
        <div class="col-lg-2 col-xl-3 mt-5 mb-5">
        <h4 class="">{{__('dashboard.main_img')}}</h4>


            <img src="{{$product->main_img}}" class="img-fluid">
        </div>


        <div class="col-lg-3 col-xl-3">

              <label>{{__('dashboard.category')}} :  {{__('dashboard.'.$product->type)}}</label>



         </div>

    </div>


    <div class="col-lg-12 row mt-5 mb-5" id="product_feature_body">
        <h4 class="">{{__('dashboard.imgs')}}</h4>


            @foreach ($product->imgs as $img)
                    <div class="col-3">
                        <img src="{{$img->img}}" class="img-fluid" style="max-height: 150px">
                    </div>
            @endforeach
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
                    <input type="text" name="ar[feature][]" class="form-control" value="{{$feature->translateOrNew('ar')->feature,true}}" placeholder="{{__('dashboard.'.'ar'.'.feature')}}" disabled/>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{-- <i class="la la-envelope"></i> --}}
                        </span>
                    </div>
                    <input type="text" name="ar[value][]"  value="{{$feature->translateOrNew('ar')->value,true}}" class="form-control" placeholder="{{__('dashboard.'.'ar'.'.value')}}" disabled/>
                </div>
            </div>



            <div class="col-lg-5 mt-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{-- <i class="la la-phone"></i> --}}
                        </span>
                    </div>
                    <input type="text" name="en[feature][]" class="form-control" value="{{$feature->translateOrNew('en')->feature,true}}"  placeholder="{{__('dashboard.'.'en'.'.feature')}}" disabled/>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            {{-- <i class="la la-envelope"></i> --}}
                        </span>
                    </div>
                    <input type="text" name="en[value][]"  class="form-control" value="{{$feature->translateOrNew('en')->value,true}}" placeholder="{{__('dashboard.'.'en'.'.value')}}"  disabled/>
                </div>
            </div>


        </div>
    @endforeach



    </div>

    

    {{-- end feature --}}




</div>
