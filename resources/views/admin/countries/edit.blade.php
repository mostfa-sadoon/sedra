<input type="hidden" name="edit_country_id" id="edit_country_id" value="{{$country->id}}">
<div class="row">
    @foreach (config('translatable.locales') as $locale)
        <div class="col-6">
            <label>{{ __('dashboard.'.$locale.'.name') }}</label>
            <input class="form-control" id="{{$locale}}_name" name="{{$locale}}[name]" value="{{$country->translateOrNew($locale)->name}}" type="text" required>
        </div>

    @endforeach
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status_1" value="1" @if($country->status==1) checked  @endif>
            <label class="form-check-label" for="exampleRadios1">
                {{__('dashboard.publish')}}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status_2" value="0"@if($country->status==0) checked  @endif>
            <label class="form-check-label" for="exampleRadios2">
                {{__('dashboard.unpublish')}}
            </label>
        </div>

</div>
