@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<h2><a href="{{route('Admin.Promocode.index')}}">{{__('dashboard.bank_accounts')}}</a></h2>


@endsection
@section('content')


<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">


                <div class="col-3">
                    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#add_bank_account"> {{__('dashboard.add_back_account')}}</button>
                </div>



            </div>

        </div>









          <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <span class="card-icon">
                                <i class="flaticon2-favourite text-primary"></i>
                            </span>
                            <h3 class="card-label">{{__('dashboard.promo_code')}}</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->

                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                            <thead style="font-size: 20px">
                                <tr>

                                    <th>{{__('dashboard.name')}}</th>
                                    <th>{{__('dashboard.account_number')}}</th>



                                    <th>{{__('dashboard.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 16px">

                                @foreach ($banks as $bank)
                                <tr>
                                    <td>{{$bank->name}}</td>
                                    <td>{{$bank->account_number}}</td>
                                    <td>

                                        <span class="svg-icon svg-icon-primary svg-icon-2x editbank" data-toggle="modal" data-target="#editbank"
                                        data-id="{{$bank->id}}" data-account_number="{{$bank->account_number}}"

                                        @foreach (config('translatable.locales') as $locale)
                                          data-{{$locale}}="{{$bank->translateOrNew($locale)->name}}"
                                        @endforeach

                                        ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                        </svg><!--end::Svg Icon--></span>




                                        <span class="svg-icon svg-icon-primary svg-icon-2x deleeteBromoCode deletebank" data-toggle="modal" data-target="#deletebank" data-id="{{$bank->id}}" ><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                </div>
           <!--end::Card-->






    </div>
</div>



{{--begain::edit bank account --}}
<div class="modal fade outer-repeater" id="editbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.bank_accountsscdsc')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                 <form action="{{route('Admin.bank.update')}}" method="post">
                   @csrf

                <div class="modal-body" id="detailes">
                    <div class="row">
                      <input type="hidden" name="id" id="bank_edit_id">

                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                <input class="form-control" id="{{$locale}}_name" name="{{$locale}}[name]" type="text" required>
                            </div>

                         @endforeach

                        <div class="col-6">
                            <label>{{ __('dashboard.account_number') }}</label>
                            <input class="form-control" id="account_number" name="account_number" type="text" required>
                       </div>


                    </div>


                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> {{__('dashboard.edit')}}</button>
                </div>
               </form>
            </div>


    </div>
</div>
{{--end::edit bank account --}}



 {{--begain::add bank account --}}
 <div class="modal fade outer-repeater" id="add_bank_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.bank_account')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                 <form action="{{route('Admin.bank.store')}}">
                   @csrf

                <div class="modal-body" id="detailes">
                    <div class="row">


                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-6">
                                <label>{{ __('dashboard.'.$locale.'.name') }}</label>
                                <input class="form-control" name="{{$locale}}[name]" type="text" required>
                            </div>
                        @endforeach

                        <div class="col-6">
                            <label>{{ __('dashboard.account_number') }}</label>
                            <input class="form-control" name="account_number" type="text" required>
                       </div>


                    </div>


                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> {{__('dashboard.add')}}</button>
                </div>
               </form>
            </div>


    </div>
</div>
{{--end::add bank account --}}


 <!-- start delete user modal -->
 <div class="modal fade" id="deletebank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.delete_bank_account')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('Admin.bank.delete')}}" method="post">
            @csrf
        <div class="modal-body">
            <input type="hidden" name="id" id="bank_id">

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



@endsection


@section('scripts')

<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


{{-- /show barcode --}}


<script>



    $('#amount').click(function(){
      $('#percent').val(0);
    });
    $('#percent').click(function(){
      $('#amount').val(0);
    });





</script>


{{-- start edit promo code --}}


 <script>

$('#kt_datatable').on('click','.deletebank',function (){
    var id       =$(this).attr("data-id");
    $('#bank_id').val(id);
});


$('#kt_datatable').on('click','.editbank',function (){

    var locales =  {!!json_encode(config('translatable.locales'))!!};

    for (locale of locales) {
        var name=$(this).attr("data-"+locale);
        $('#'+locale+'_name').val(name);
    }


    var id = $(this).attr("data-id");   //account_number
     $('#bank_edit_id').val(id);

     var account_number = $(this).attr("data-account_number");   //account_number
     $('#account_number').val(account_number);

});




 </script>


{{-- end edit promo code   --}}
@endsection
