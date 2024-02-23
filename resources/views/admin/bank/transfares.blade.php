@extends('admin_temp')

@section('styles')
<link href="{{asset('multi_upload_img/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('section_name')

<h2><a href="{{route('Admin.Promocode.index')}}">{{__('dashboard.transfares')}}</a></h2>


@endsection
@section('content')


<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('dashboard.services')}}</span>

        </h3>
        <div class="card-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                <li class="nav-item">
                    <a class="nav-link py-2 px-4 @if($type=='barcode') active  @endif "  href="{{route('Admin.bank.transfare','barcode')}}">{{__('dashboard.barcode')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 px-4 @if($type=='omra') active  @endif"   href="{{route('Admin.bank.transfare','omra')}}">{{__('dashboard.omra_visa')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link py-2 px-4 @if($type=='booking') active  @endif "  href="{{route('Admin.bank.transfare','booking')}}">{{__('dashboard.booking')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link py-2 px-4 @if($type=='order') active  @endif" href="{{route('Admin.bank.transfare','order')}}">{{__('dashboard.orders')}}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link py-2 px-4 @if($type=='wallet') active  @endif" href="{{route('Admin.bank.transfare','wallet')}}">{{__('dashboard.wallet')}}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-checkable" id="datatable" style="margin-top: 13px !important">
            <thead style="font-size: 20px">
                <tr>

                    <th>{{__('dashboard.user_name')}}</th>
                    <th>{{__('dashboard.bank_name')}}</th>
                    <th>{{__('dashboard.img')}}</th>
                    <th>{{__('dashboard.amount')}}</th>
                    <th>{{__('dashboard.created_at')}}</th>
                </tr>
            </thead>
            <tbody style="font-size: 16px">


            </tbody>
        </table>
    </div>


</div>


{{--begain::show transfare  --}}
<div class="modal fade outer-repeater" id="showTransfare" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>


                <div class="modal-body" id="detailes">
                    <div class="row">
                            <img class="img-fluid" id="transimg" src="">

                    </div>

                </div>



            </div>


    </div>
</div>




  {{--begain::Wallet money --}}
  <div class="modal fade outer-repeater" id="walletmoney" tabindex="-1" role="dialog" aria-labelledby="walletmoney" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.wallet')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Acept.wallet.transfare')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" id="wallet_user_id">
                    <input type="hidden" name="trans_id" id="trans_id">
                <div class="modal-body" id="detailes">

                        <div class="form-group">
                            <input type="number" name="balance" id="balance" value="" class="form-control">
                        </div>



                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.transfare')}}</button>
                </div>
            </form>
            </div>
    </div>
</div>
{{--end::Wallet money --}}



{{--end::show transfare --}}

{{-- <div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">



</div>


</div> --}}




@endsection

@section('scripts')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>


 <script>




    var transfaretype= {!!json_encode($type)!!};
    var url =  {!!json_encode(url('/'))!!};
    var confirmtransfare = {!!json_encode(route('confirm.transfare',0))!!};
    var refusetransfare = {!!json_encode(route('refuse.transfare',0))!!};

   // console.log(url);
    $(document).ready(function() {

        $('#datatable').DataTable({
                "ajax": {
                    "url": `${url}/transfare/list/${transfaretype}`, // Replace with your API endpoint
                    "type": "GET",
                },
                "columns": [
                    // Define your columns here

                    { "data": "name" },
                    { "data": "bank" },
                    { "data": "img" , render: function (data, type, row, meta) {
                          return  `
                              <img class="img-fluid showTransfare" src="${row.img}" data-img="${row.img}" style="cursor: grab; width:150px"  data-toggle="modal" data-target="#showTransfare">
                          `;

                    }},
                    { "data": "amount" },
                    { "data": "created_at" , render: function (data, type, row, meta) {

                        if(transfaretype=='wallet'){
                            return `${row.created_at} <buttom  class="btn  ml-2 transfaremoney ${row.confirmation=='pending' ? 'btn-primary' : 'btn-secondary'}"  data-user_id="${row.user_id}" data-id="${row.id}"  ${row.confirmation=='pending' ? 'data-toggle="modal" data-target="#walletmoney" ' : ' disabled'} >{{ __('dashboard.transfare')}} </buttom>`
                        }else{

                               if(row.confirmation=='pending'){
                                return `${row.created_at}

                                <a href="${confirmtransfare}${row.id}"  class="btn  ml-2 transfaremoney btn-primary"  data-user_id="${row.user_id}" data-id="${row.id}"} >{{ __('dashboard.confirmation')}} </a>

                                <a href="${refusetransfare}${row.id}"  class="btn  ml-2 transfaremoney btn-danger"  data-user_id="${row.user_id}" data-id="${row.id}"} >{{ __('dashboard.refused')}} </a>`

                               }
                               if(row.confirmation=='accepted'){
                                return `${row.created_at} <p class="text-success" style="font-size:18px"> {{__('dashboard.accepted')}} </p>`
                               }

                               if(row.confirmation=='rejected'){
                                return `${row.created_at} <p class="text-danger" style="font-size:18px"> {{__('dashboard.rejected')}}  </p>`
                             }
                        }


                    } },


                    // Add more columns as needed
                ],

                "processing": true,
                "serverSide": true, // Enable server-side processing
                "paging": true, // Enable client-side pagination
                "lengthMenu": [10, 25, 50], // Number of records per page options
                "language": {
                   "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                }
         });

    });

    $('#datatable').on('click','.showTransfare',function (){
        var img =$(this).attr('data-img');
        $('#transimg').attr("src",img);
    });


    $('#datatable').on('click','.transfaremoney',function(){


        var user_id=$(this).attr("data-user_id");
        var trans_id=$(this).attr("data-id");
        $('#wallet_user_id').val(user_id);

        $('#trans_id').val(trans_id);

     });




 </script>

@endsection
