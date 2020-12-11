@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title') Enquiry - Students List @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot

@endcomponent

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                        <thead>
                            <tr role="row">
                                <th>Student Name</th>
                                <th>Parent Name</th>
                                <th>Parent Mobile</th>
                                <th>Cration Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $enquirys as $enquiry )
                            <tr role="row" class="odd">
                                <td>{{ $enquiry -> first_name}}</td>
                                <td>{{ $enquiry -> parent_name}}</td>
                                <td>{{ $enquiry -> parent_mobile}}</td>
                                <td>{{ $enquiry -> created_at}}</td>
                                <td>
                                    <a class="btn btn-sm text-secundary"  href="{{route('enquiry.show',['enquiry' => $enquiry->id])}}" data-toggle="tooltip" data-original-title="Show enquiry student "><i class="bx bxs-user-rectangle font-size-25 text-secundary"></i></a>
                                    <a class="btn btn-sm text-red-danger" href="#" data-toggle="modal" data-target="#deleteModal{{$enquiry -> id}}"><i class="bx bxs-trash font-size-25 text-red-danger"></i></a>
                                    <div class="modal fade" id="deleteModal{{$enquiry -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form method="POST" action="{{route('enquiry.destroy',['enquiry' => $enquiry->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content red-danger border-red-danger">
                                                    <div class="modal-body border-danger text-white text-center">
                                                        <i class='bx bxs-error font-size-100 text-white'></i><br>
                                                        <span class="h2 text-white mb-2">Are you sure?</span><br>
                                                        you want to delete {{ $enquiry -> first_name}} <br>this process cannot be reversed<br>
                                                        <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger mt-3">Yes, Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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