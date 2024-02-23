@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{__('dashboard.setting')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.general_setting')}}</li>
    </ol>
  </nav>

@endsection

@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">




            <div class="col-xl-12">
                <!--begin::Nav Panel Widget 1-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">

                        <div  class="mb-5">
                            <form action="{{route('setting.about.update')}}" method="post">
                                @csrf
                                <div class="d-flex justify-content-between">
                                <h2 style="font-weight:800;" class="text-primary"> {{__('dashboard.about_us')}}</h2>
                                <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                                </div>
                                <div class="row">
                                    @foreach (config('translatable.locales') as $locale)
                                        <div class="col-6">
                                            <div>
                                                <label style="font-size: 18px; font-weight:700;">{{ __('dashboard.'.$locale.'.desc') }}</label>
                                                <textarea class="form-control" name="{{$locale}}[desc]" type="text" rows="10" required >{{$setting->translateOrNew($locale)->about_us}}</textarea>
                                            </div>
                                            @if ($errors->has($locale.'.name'))
                                            <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                            </form>
                        </div>


                        <hr>
                        <div  class="mb-5">
                            <form action="{{route('setting.privaceyPolicy.update')}}" method="post">
                                @csrf
                            <div class="d-flex justify-content-between">
                            <h2 style="font-weight:800;" class="text-primary"> {{__('dashboard.privacey_policy')}}</h2>
                            <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                            </div>
                            <div class="row">
                                @foreach (config('translatable.locales') as $locale)
                                    <div class="col-6">
                                        <div>
                                            <label style="font-size: 18px; font-weight:700;">{{ __('dashboard.'.$locale.'.desc') }}</label>
                                            <textarea class="form-control" name="{{$locale}}[desc]" type="text" rows="10" required >{{$setting->translateOrNew($locale)->policy}} </textarea>
                                        </div>
                                        @if ($errors->has($locale.'.name'))
                                        <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </form>
                        </div>

                        <hr>
                        <div  class="mb-5">
                            <form action="{{route('setting.termCondations.update')}}" method="post">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <h2 style="font-weight:800;" class="text-primary"> {{__('dashboard.terms_condations')}}</h2>
                                     <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                                </div>
                                <div class="row">
                                    @foreach (config('translatable.locales') as $locale)
                                        <div class="col-6">
                                            <div>
                                                <label style="font-size: 18px; font-weight:700;">{{ __('dashboard.'.$locale.'.desc') }}</label>
                                                <textarea class="form-control" name="{{$locale}}[desc]" type="text" rows="10" required > {{$setting->translateOrNew($locale)->terms}}</textarea>
                                            </div>
                                            @if ($errors->has($locale.'.name'))
                                            <p class="text-danger">{{ $errors->first($locale.'.name')}}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                            </form>
                            </div>

                            <hr>


                            <div  class="mb-5">
                                <form action="{{route('setting.contact.update')}}" method="post">
                                    @csrf
                                    <div class="d-flex justify-content-between">
                                        <h2 style="font-weight:800;" class="text-primary"> {{__('dashboard.contact')}}</h2>
                                         <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <label style="font-size: 18px; font-weight:700;">{{ __('dashboard.phone') }}</label>
                                                <input type="text" class="form-control" name="phone" value="{{$setting->phone_contact}}">
                                            </div>
                                            @if ($errors->has('phone'))
                                            <p class="text-danger">{{ $errors->first('phone')}}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <div>
                                                <label style="font-size: 18px; font-weight:700;">{{ __('dashboard.country_code') }}</label>
                                                <input type="text"  class="form-control" name="country_code" value="{{$setting->country_code}}">
                                            </div>
                                            @if ($errors->has('phone'))
                                            <p class="text-danger">{{ $errors->first('phone')}}</p>
                                            @endif
                                        </div>


                                        <div class="col-6">
                                            <div>
                                                <label style="font-size: 18px; font-weight:700;">{{ __('dashboard.email') }}</label>
                                                <input type="email"  class="form-control" name="email_contact" value="{{$setting->email_contact}}">
                                            </div>
                                            @if ($errors->has('phone'))
                                            <p class="text-danger">{{ $errors->first('phone')}}</p>
                                            @endif
                                        </div>

                                        
                                    </div>
    
                                </form>
                                </div>
    
                                <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection
