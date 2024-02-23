@extends('admin_temp')
@section('section_name')
{{__('dashboard.profile')}}
@endsection
@section('content')



<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">{{__('dashboard.employees')}}
        </div>
        <div class="card-toolbar">


        </div>
    </div>
    <div class="card-body">
        <form action="{{route('Admin.profile.update')}}" method="post">
            @csrf

            <input type="hidden" name="id" value="{{$employee->id}}">
              <div class="modal-body" id="detailes">

                <div class="row">
                    <div class="form-group col-6">
                        <label>  {{__('dashboard.name')}} </label>
                        <input class="form-control" type="text" name="name"
                         @if(old('name') != null)
                            value="{{old('name')}}"
                         @else
                            value="{{$employee->name}}"
                         @endif
                         id="name" required>

                        @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name')}}</p>
                        @endif

                    </div>

                    <div class="form-group col-6">
                        <label>  {{__('dashboard.email')}} </label>
                        <input class="form-control" type="email" name="email"
                        @if(old('name') != null)
                            value="{{old('email')}}"
                        @else
                            value="{{$employee->email}}"
                        @endif

                         id="email" required>
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email')}}</p>
                        @endif
                    </div>


                </div>




        </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
        </div>
        </form>

        <h3>{{__('dashboard.update_password')}}</h3>
        <form action="{{route('Admin.update.password')}}" method="post">
            @csrf

            <input type="hidden" name="id" value="{{$employee->id}}">
              <div class="modal-body" id="detailes">

                <div class="row">
                    <div class="form-group col-6">
                        <label>  {{__('dashboard.old_password')}} </label>
                        <input class="form-control" type="password" name="old_password">
                        @if ($errors->has('old_password'))
                        <p class="text-danger">{{ $errors->first('old_password')}}</p>
                        @endif

                    </div>
                    <div class="form-group col-6">
                        <label>  {{__('dashboard.password')}} </label>
                        <input class="form-control" type="password" name="password">
                        @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password')}}</p>
                        @endif

                    </div>
                    <div class="form-group col-6">
                        <label>  {{__('dashboard.password_confirmation')}} </label>
                        <input class="form-control" type="password" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                        <p class="text-danger">{{ $errors->first('password_confirmation')}}</p>
                        @endif

                    </div>




                </div>




        </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">{{__('dashboard.update')}}</button>
        </div>
        </form>



    </div>
</div>




@endsection


@section('scripts')




@endsection

