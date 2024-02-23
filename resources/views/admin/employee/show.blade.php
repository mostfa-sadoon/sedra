@extends('admin_temp')
@section('section_name')
{{__('dashboard.employee')}}
@endsection
@section('content')






@endsection

@section('scripts')

   <script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>

   <script>

        $('#kt_datatable').KTDatatable({
            "paging": false
        });

   </script>


@endsection
