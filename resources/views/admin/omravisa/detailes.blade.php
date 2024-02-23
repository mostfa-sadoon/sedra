<div class="row">

     <div class="col-6">
          <label>{{__('dashboard.passport_img')}}</label>
          <img src="{{$omravisa->personal_img}}" class="img-fluid">
     </div>


      <div class="col-6">
        <label>{{__('dashboard.personal_img')}} </label>
          <img src="{{$omravisa->passport_img}}" class="img-fluid">

      </div>


</div>


    @if ($omravisa->payment_type==2)
        <div class="col-6">
            <label>البنكي التحويل</label>
            @if ($banktransfare!='')
              <img src="{{$banktransfare->img}}" class="img-fluid">
            @endif
        </div>
    @endif

