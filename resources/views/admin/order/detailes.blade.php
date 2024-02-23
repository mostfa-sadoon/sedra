



<div class="col-md-10">
    <!-- begin: Invoice header-->
<div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
<div class="col-md-10">
<div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
   <h1 class="display-4 font-weight-boldest mb-10">{{__('dashboard.order_detailes')}}</h1>
   <div class="d-flex flex-column align-items-md-end px-0">
       <!--begin::Logo-->
       <a href="#" class="mb-5">
           <img src="assets/media/logos/logo-dark.png" alt="" />
       </a>
       <!--end::Logo-->
       <span class="d-flex flex-column align-items-md-end opacity-70">
           {{-- <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
           <span>Mississippi 96522</span> --}}
       </span>
   </div>
</div>
<div class="border-bottom w-100"></div>
<div class="d-flex justify-content-between pt-6">
   <div class="d-flex flex-column flex-root">
       <span class="font-weight-bolder mb-2">{{__('dashboard.order_date')}}</span>
       <span class="opacity-70">{{$order->created_at}}</span>
   </div>
   <div class="d-flex flex-column flex-root">
       <span class="font-weight-bolder mb-2">{{__('dashboard.order_no')}}</span>
       <span class="opacity-70">{{$order->id}}</span>
   </div>
   <div class="d-flex flex-column flex-root">
       <span class="font-weight-bolder mb-2">{{__('dashboard.deliverd_to')}}</span>
       <span class="opacity-70">{{$order->detailes[0]->address}}
   </div>


   <div class="d-flex flex-column flex-root">
      <span class="font-weight-bolder mb-2">{{__('dashboard.Customer_name')}}</span>
      <span class="opacity-70">{{$order->detailes[0]->name}}
   </div>


</div>


   <div class="mt-5">

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.Note')}}</span>
            <span class="opacity-70">{{$order->detailes[0]->note}}
        </div>

   </div>

</div>
</div>
<!-- end: Invoice header-->


</div>







<div class="col-md-10">




    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="pl-0 font-weight-bold text-muted text-uppercase">Ordered Items</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                    <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                    <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($order->items as $item)

                    <tr class="font-weight-boldest">
                        <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                            <div class="symbol-label" style="background-image: url('{{$item->product->main_img}}')"></div>
                        </div>
                        <!--end::Symbol-->
                        {{$item->product->name}}</td>
                        <td class="text-right pt-7 align-middle">{{$item->quantity}}</td>
                        <td class="text-right pt-7 align-middle">رس {{$item->price/$item->quantity}}</td>
                        <td class="text-primary pr-0 pt-7 text-right align-middle">رس {{$item->price}}</td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div>
    @if ($order->payment_type==2)
    <h3>التحويل البنكي</h3>
    @if ($banktransfare!='')
      <img src="{{$banktransfare->img}}" class="img-fluid">
    @endif
  @endif

</div>

