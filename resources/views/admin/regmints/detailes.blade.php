<div class="row">
   <div class="d-flex col-6">
      <div class="justify-content-start">
          <img class="img-fluid" src="{{$regmint->campaign->img}}">
      </div>

   </div>
   <div class="col-6">

    <h3>{{__('dashboard.regmint_info')}}</h3>

    <div class="d-flex justify-content-between pt-6">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.company')}}</span>
            <span class="opacity-70">{{$regmint->campaign->company->name}}</span>
        </div>


        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.date')}}</span>
            <span class="opacity-70">{{$regmint->date}}</span>
        </div>


        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.family_price')}}</span>
            <span class="opacity-70">{{$regmint->campaign->double_price}}</span>
        </div>


        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.individual_price')}}</span>
            <span class="opacity-70">{{$regmint->campaign->single_price}}</span>
        </div>


    </div>



    <div class="d-flex justify-content-between pt-6">
        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.campaign_count')}}</span>
            <span class="opacity-70">{{$regmint->campaign->persons_count}}</span>
        </div>


        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.regmint_count')}}</span>
            <span class="opacity-70">{{$regmint->persons_count}}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.city')}}</span>
            <span class="opacity-70">{{$regmint->campaign->city->name}}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.country')}}</span>
            <span class="opacity-70">{{$regmint->campaign->country->name}}</span>
        </div>

        <div class="d-flex flex-column flex-root">
            <span class="font-weight-bolder mb-2">{{__('dashboard.program')}}</span>
            <span class="opacity-70">
            @if ($regmint->campaign->program==1)
                {{__('dashboard.makkah')}}
            @elseif ($regmint->campaign->program==2)
            {{__('dashboard.makkah_and_madina')}}
            @endif

            </span>
        </div>

    </div>



   </div>

</div>
