@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{__('dashboard.setting')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{__('dashboard.campaign_setting')}}</li>
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
                            <form action="{{route('setting.campaign.update')}}" method="post">
                                @csrf
                                <div class="d-flex justify-content-between">
                                <h2 style="font-weight:800;" class="text-primary"> {{__('dashboard.Ratio_application')}}</h2>
                                <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                                </div>
                                <div class="row">
                                   <input type="number" name="rate" class="form-control mt-5" value="{{$setting->rate}}">
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
