@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<a href="{{route('Admin.country.city',$country_id)}}">{{__('dashboard.cities')}}</a>

@endsection
@section('content')

<div class="row">
    <div class="col-xl-12">


        <div class="col-3">
            <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#addCity"> {{__('dashboard.Add_city')}}</button>
        </div>



    </div>

</div>


{{-- begain countries --}}
<div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-favourite text-primary"></i>
                </span>
                <h3 class="card-label">{{__('dashboard.cities')}}</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->

            </div>
        </div>
        <div class="card-body">

            <!--begin: Datatable-->
			<div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="{{__('dashboard.search')}}" id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">{{__('dashboard.search')}}</a>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                    <thead>
                        <tr>

                            <th>{{__('dashboard.city')}}</th>
                            <th>{{__('dashboard.status')}}</th>

                            <th>{{__('dashboard.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <td>{{$city->name}}</td>
                                <td>
                                       @if ($city->status==0)
                                       <p> <span  class="label label-lg font-weight-bold label-light-danger label-inline"> {{__('dashboard.unpublish')}}  </span></p>
                                       @else
                                       <p>  <span  class="label label-lg font-weight-bold label-light-success label-inline"> {{__('dashboard.publish')}}  </span></p>
                                       @endif

                                </td>
                                <td>

                                        <span class="svg-icon svg-icon-primary svg-icon-2x editcity" data-toggle="modal" data-target="#editcity"
                                            data-id="{{$city->id}}"  data-status="{{$city->status}}"
                                            @foreach (config('translatable.locales') as $locale)
                                                    data-{{$locale}}="{{$city->translateOrNew($locale)->name}}"

                                            @endforeach
                                        >
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            </g>
                                            </svg><!--end::Svg Icon--></span>

                                    <span class="svg-icon svg-icon-primary svg-icon-2x deletecity" data-toggle="modal" data-target="#deletecity" data-id="{{$city->id}}"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>


                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>


            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->



     {{--begain::store city --}}
     <div class="modal fade outer-repeater" id="addCity" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
        <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.Add_city')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('Admin.city.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="country_id" value="{{$country_id}}">
                    <div class="modal-body" id="detailes">

                            <div class="row">
                                @foreach (config('translatable.locales') as $locale)
                                    <div class="col-6">
                                        <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                        <input class="form-control" name="{{$locale}}[name]" type="text" required>
                                    </div>

                                @endforeach
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            {{__('dashboard.publish')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                                        <label class="form-check-label" for="exampleRadios2">
                                            {{__('dashboard.unpublish')}}
                                        </label>
                                    </div>

                            </div>




                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('dashboard.add')}}</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
    {{--end::end store city   --}}


       {{--begain::edit city --}}
            <div class="modal fade outer-repeater" id="editcity" tabindex="-1" role="dialog" aria-labelledby="changeprice" aria-hidden="true">
                <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.edit_city')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{route('Admin.city.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="edit_city_id" id="edit_city_id">
                            <div class="modal-body" id="detailes">

                                    <div class="row">
                                        @foreach (config('translatable.locales') as $locale)
                                            <div class="col-6">
                                                <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                                <input class="form-control" id="{{$locale}}_name" name="{{$locale}}[name]" type="text" required>
                                            </div>

                                        @endforeach
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status_1" value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    {{__('dashboard.publish')}}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status_2" value="0">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    {{__('dashboard.unpublish')}}
                                                </label>
                                            </div>

                                    </div>

                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                            </div>
                        </form>
                        </div>
                </div>
            </div>
        {{--end::edit city   --}}



 <!-- start delete city modal -->
 <div class="modal fade" id="deletecity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_city')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('Admin.city.delete')}}" method="post" value="">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="city_id" id="city_id">

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
<!-- end delete user modal -->




</div>






@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>

{{-- staet delete city --}}
<script>

$('#kt_datatable').on('click','.deletecity',function (){
    var id=$(this).attr("data-id");
    $('#city_id').val(id);

});

  var locales =  {!!json_encode(config('translatable.locales'))!!};

$('#kt_datatable').on('click','.editcity',function (){
    for (locale of locales) {
        var name=$(this).attr("data-"+locale);
        $('#'+locale+'_name').val(name);
    }
     var status = $(this).attr("data-status");
     if(status==1){
       $("#status_1").prop("checked", true);
     }
     if(status==0){
        $("#status_2").prop("checked", true);
    }

    var id = $(this).attr("data-id");
     $('#edit_city_id').val(id);

});

</script>
{{-- end delete city --}}

@endsection
