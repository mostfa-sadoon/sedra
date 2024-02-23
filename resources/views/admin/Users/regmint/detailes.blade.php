<div class="row">
    <div class="d-flex col-6">
       <div class="justify-content-start">
           <img class="img-fluid" src="{{$userregmint->regiment->campaign->img}}">
       </div>

    </div>
    <div class="col-6">

     <h3>{{__('dashboard.regmint_info')}}</h3>

     <div class="d-flex justify-content-between pt-6">
         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.company')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->campaign->company->name}}</span>
         </div>


         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.date')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->date}}</span>
         </div>


         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.family_price')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->campaign->double_price}}</span>
         </div>


         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.individual_price')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->campaign->single_price}}</span>
         </div>


     </div>



     <div class="d-flex justify-content-between pt-6">
         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.campaign_count')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->campaign->persons_count}}</span>
         </div>


         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.regmint_count')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->persons_count}}</span>
         </div>

         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.city')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->campaign->city->name}}</span>
         </div>

         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.country')}}</span>
             <span class="opacity-70">{{$userregmint->regiment->campaign->country->name}}</span>
         </div>

         <div class="d-flex flex-column flex-root">
             <span class="font-weight-bolder mb-2">{{__('dashboard.program')}}</span>
             <span class="opacity-70">
             @if ($userregmint->regiment->campaign->program==1)
                 {{__('dashboard.makkah')}}
             @elseif ($userregmint->regiment->campaign->program==2)
             {{__('dashboard.makkah_and_madina')}}
             @endif

             </span>
         </div>

     </div>





         <h3 class="mt-5">{{__('dashboard.booking_info')}}</h3>
         <div class="d-flex justify-content-between pt-6">
             <div class="d-flex flex-column flex-root">
                 <span class="font-weight-bolder mb-2">{{__('dashboard.paied')}}</span>
                 <span class="opacity-70">{{$userregmint->price}}</span>
             </div>

           

             <div class="d-flex flex-column flex-root">
                 <span class="font-weight-bolder mb-2">{{__('dashboard.payment_method')}}</span>
                    @if ($userregmint->payment_type==1)
                        {{__('dashboard.wallet')}}
                    @elseif($userregmint->payment_type==1)
                        {{__('dashboard.bank')}}
                    @else
                    {{__('dashboard.visa')}}
                    @endif
             </div>

             <div class="d-flex flex-column flex-root">
                 <span class="font-weight-bolder mb-2">{{__('dashboard.number')}}</span>
                 <span class="opacity-70">{{$userregmint->number}}</span>
             </div>


         </div>


    </div>

 </div>
