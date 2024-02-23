<div class="card card-custom gutter-b">
    <div class="card-body p-0">

    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" id="order_detailes">
         <img src="{{$barcode->passport_img}}" class="img-fluid">
    </div>

</div>
</div>


@if ($barcode->payment_type==2)
    <label>البنكي التحويل</label>
    @if ($banktransfare!='')
      <img src="{{$banktransfare->img}}" class="img-fluid">
    @endif
@endif
