
                       <input type="hidden" name="id" value="{{$role->id}}">

                       {{-- start employee --}}
                        <div>
                            <h4 style="font-size: 25px;">{{__('dashboard.employees')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='employees')
                                        <div class="form-check col-6">

                                            <input class="form-check-input" name="permissions[]" type="checkbox"
                                             @foreach ($role->permissions as $rolepermission)
                                                @if($rolepermission->name == $permission->name)
                                                        checked
                                                @endif
                                             @endforeach
                                            value="{{$permission->name}}" id="flexCheckDefault">

                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{__('dashboard.'.$permission->name)}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- end employees--}}
                        <hr>
                          {{-- start users --}}
                          <div>
                            <h4 style="font-size: 25px;">{{__('dashboard.users')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='users')
                                        <div class="form-check col-6">
                                            <input class="form-check-input" name="permissions[]" type="checkbox"
                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach
                                            value="{{$permission->name}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                 {{__('dashboard.'.$permission->name)}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- end users--}}
                        <hr>
                        {{-- start orders --}}
                        <div>
                            <h4 style="font-size: 25px;">{{__('dashboard.orders')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='orders')
                                        <div class="form-check col-6">
                                            <input class="form-check-input" name="permissions[]" type="checkbox"

                                            @foreach ($role->permissions as $rolepermission)
                                                @if($rolepermission->name == $permission->name)
                                                        checked
                                                @endif
                                            @endforeach
                                            value="{{$permission->name}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{__('dashboard.'.$permission->name)}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- end orders--}}
                        <hr>
                        {{-- start orders --}}
                        <div>
                            <h4 style="font-size: 25px;">{{__('dashboard.products')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='products')
                                        <div class="form-check col-6">
                                            <input class="form-check-input" name="permissions[]" type="checkbox"
                                            @foreach ($role->permissions as $rolepermission)
                                                @if($rolepermission->name == $permission->name)
                                                        checked
                                                @endif
                                            @endforeach
                                            value="{{$permission->name}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{__('dashboard.'.$permission->name)}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- end orders--}}

                        <hr>
                           {{-- start products --}}
                           <div>
                            <h4 style="font-size: 25px;">{{__('dashboard.products')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='products')
                                        <div class="form-check col-6">
                                            <input class="form-check-input" name="permissions[]" type="checkbox"
                                            @foreach ($role->permissions as $rolepermission)
                                                @if($rolepermission->name == $permission->name)
                                                        checked
                                                @endif
                                            @endforeach

                                            value="{{$permission->name}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{__('dashboard.'.$permission->name)}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            </div>
                           {{-- end products--}}
                           <hr>

                            {{-- start products --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.promo_code')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='promocode')
                                            <div class="form-check col-6">
                                                <input class="form-check-input" name="permissions[]"
                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach

                                                type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end promocodes--}}

                               <hr>

                            {{-- start campaigns --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.campaigns')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='campaigns')
                                            <div class="form-check col-6">
                                                <input class="form-check-input" name="permissions[]"

                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach
                                                type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end promocodes--}}

                               <hr>

                                  {{-- start campaigns --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.companies')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='companies')
                                            <div class="form-check col-6">
                                                <input class="form-check-input"name="permissions[]"

                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach

                                                type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end promocodes--}}
                               <hr>

                                     {{-- start barcode --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.barcode')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='barcode')
                                            <div class="form-check col-6">
                                                <input class="form-check-input" name="permissions[]"

                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach

                                                type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end barcode--}}

                               <hr>
                                     {{-- start omravisa --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.omra_visa')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='omravisa')
                                            <div class="form-check col-6">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"

                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach
                                                value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end omravisa--}}
                               <hr>
                                 {{-- start countries --}}
                                    <div>
                                        <h4 style="font-size: 25px;">{{__('dashboard.countries')}}</h4>
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                @if ($permission->module_name=='countries')
                                                    <div class="form-check col-6">
                                                        <input class="form-check-input" name="permissions[]"

                                                        @foreach ($role->permissions as $rolepermission)
                                                            @if($rolepermission->name == $permission->name)
                                                                    checked
                                                            @endif
                                                        @endforeach

                                                        type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{__('dashboard.'.$permission->name)}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        </div>
                                {{-- end countries--}}

                                <hr>
                                  {{-- start roles --}}
                                <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.roles')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='roles')
                                            <div class="form-check col-6">
                                                <input class="form-check-input"name="permissions[]" type="checkbox"

                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach
                                                value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end roles--}}




                                   {{-- start roles --}}
                                   <div>
                                    <h4 style="font-size: 25px;">{{__('dashboard.banks')}}</h4>
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            @if ($permission->module_name=='banks')
                                                <div class="form-check col-6">
                                                    <input class="form-check-input"name="permissions[]" type="checkbox"

                                                    @foreach ($role->permissions as $rolepermission)
                                                        @if($rolepermission->name == $permission->name)
                                                                checked
                                                        @endif
                                                    @endforeach
                                                    value="{{$permission->name}}" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{__('dashboard.'.$permission->name)}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    </div>
                                   {{-- end roles--}}



                                       {{-- start roles --}}
                                <div>
                                    <h4 style="font-size: 25px;">{{__('dashboard.transfares')}}</h4>
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            @if ($permission->module_name=='bank_transfares')
                                                <div class="form-check col-6">
                                                    <input class="form-check-input"name="permissions[]" type="checkbox"

                                                    @foreach ($role->permissions as $rolepermission)
                                                        @if($rolepermission->name == $permission->name)
                                                                checked
                                                        @endif
                                                    @endforeach
                                                    value="{{$permission->name}}" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{__('dashboard.'.$permission->name)}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    </div>
                                   {{-- end roles--}}


                            {{-- start roles --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.settings')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='settings')
                                            <div class="form-check col-6">
                                                <input class="form-check-input" name="permissions[]" type="checkbox"

                                                @foreach ($role->permissions as $rolepermission)
                                                    @if($rolepermission->name == $permission->name)
                                                            checked
                                                    @endif
                                                @endforeach
                                                value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                               {{-- end roles--}}
