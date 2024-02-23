@extends('admin_temp')
@section('section_name')
<h2><a href="{{route('Admin.permissions.index')}}">{{__('dashboard.roles')}}</a></h2>
@endsection
@section('content')

<div class="row">
    <div class="col-3">
        <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#create_role"> {{__('dashboard.create_role')}}</button>
    </div>

</div>



<table class="table" id="datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key=>$role)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$role->name}}</td>

            <td>
               @if ($role->super_admin==false)
                <a href="{{route('Admin.role.index',$role->id)}}">

                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>

                </a>
                <span class="svg-icon svg-icon-md svg-icon-primary">

                    <a  data-toggle="modal" class="edit_role" data-name="{{$role->name}}" data-id="{{$role->id}}" data-target="#edit_role">

                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                    </a>

                </span>
               @endif







            </td>

          </tr>
        @endforeach

    </tbody>
  </table>



 {{--begain::create role --}}
 <div class="modal fade outer-repeater" id="create_role" tabindex="-1" role="dialog" aria-labelledby="create_role" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.create_role')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.permission.assign')}}" method="post">
                    @csrf
                <div class="modal-body" id="detailes">

                        <div class="form-group">
                            <label >{{__('dashboard.name')}}</label>
                            <input type="text" name="name" value="" class="form-control" required>
                        </div>

                        {{-- start employee --}}
                        <div>
                            <h4 style="font-size: 25px;  ">{{__('dashboard.employees')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='employees')
                                        <div class="form-check col-6">
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
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



                            {{-- start roles --}}
                                <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.roles')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='roles')
                                            <div class="form-check col-6">
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                            {{-- end roles--}}
                            <hr>
                            {{-- start countries --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.countries')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='countries')
                                            <div class="form-check col-6">
                                                <input class="form-check-input"name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                            {{-- end countries--}}







                            {{-- start banks --}}
                            <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.banks')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='banks')
                                            <div class="form-check col-6">
                                                <input class="form-check-input"name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                            {{-- end banks--}}

                             {{-- start banks --}}
                             <div>
                                <h4 style="font-size: 25px;">{{__('dashboard.transfares')}}</h4>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        @if ($permission->module_name=='bank_transfares')
                                            <div class="form-check col-6">
                                                <input class="form-check-input"name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{__('dashboard.'.$permission->name)}}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                </div>
                            {{-- end banks--}}




                           {{-- start settings --}}
                           <div>
                            <h4 style="font-size: 25px;">{{__('dashboard.settings')}}</h4>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    @if ($permission->module_name=='settings')
                                        <div class="form-check col-6">
                                            <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->name}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{__('dashboard.'.$permission->name)}}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            </div>
                        {{-- end settings--}}









                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.Add')}}</button>
                </div>
            </form>
            </div>
    </div>
</div>
{{--end::create role --}}

 {{--begain::edit role --}}
 <div class="modal fade outer-repeater" id="edit_role" tabindex="-1" role="dialog" aria-labelledby="edit_role" aria-hidden="true">
    <div class="modal-dialog modal-xl bd-example-modal-xl" role="document">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('dashboard.update_role')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{route('Admin.role.update')}}" method="post">
                    @csrf
                <div class="modal-body" id="detailes">

                        <div class="form-group">
                            <label>{{__('dashboard.name')}}</label>
                            <input type="text" id="name" name="name" value="" class="form-control" required>
                        </div>

                        <div id="roleDetailes">

                        </div>



                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
                </div>
            </form>
            </div>
    </div>
</div>
{{--end::edit role --}}




@endsection

@section('scripts')

   <script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>

   <script>

        // $('#kt_datatable').KTDatatable({
        //     "paging": false
        // });


        //
        $('#datatable').on('click','.edit_role',function (){
            var name = $(this).attr("data-name");
            var id = $(this).attr("data-id");
            $('#name').val(name);
            $.ajax({
                url:"/get/role/"+id,
                type:"GET", //send it through get method
                success: function (response) {
                    $('#roleDetailes').html(response);
                },
                error: function(response) {

                }
                });




        });

   </script>


@endsection
