@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title') Dashboard @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="row">
    <div class="col-8">
        <div class="card border">
            <div class="card-header border-primary">
                <h5 class=" my-0 text-primary">
                    <i class="mdi dripicons-user-group mr-3"></i>
                    Enquire - Enrolment
                </h5>
            </div>
            <div class="card-body">
                <table class="table  table-hover ">
                    <thead class="thead-light">
                        <tr class="table-warning">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user -> id}}</td>
                            <td>{{ $user -> name}}</td>
                            <td>{{ $user -> email}}</td>
                        </tr>
                        @endforeach
                </table>
                <a href="users.index" class=" font-size-14 btn-block text-right ">
                    <i class="mdi mdi-arrow-right-circle mr-1"></i>
                    View Detail...
                </a>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card border">
            <div class="card-header border-primary">
                <h5 class=" my-0 text-primary">
                    <i class="mdi dripicons-user-group mr-3"></i>
                    Enquire - Enrolment
                </h5>
            </div>
            <div class="card-body">
                <table class="table  table-hover ">
                    <thead class="thead-light">
                        <tr class="table-warning">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user -> id}}</td>
                            <td>{{ $user -> name}}</td>
                            <td>{{ $user -> email}}</td>
                        </tr>
                        @endforeach
                </table>
                <a href="users.index" class=" font-size-14 btn-block text-right ">
                    <i class="mdi mdi-arrow-right-circle mr-1"></i>
                    View Detail...
                </a>
            </div>
        </div>
    </div>

</div>



@endsection

@section('script')
<!-- plugin js -->
<script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- jquery.vectormap map -->
<script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

<!-- Calendar init -->
<script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
@endsection