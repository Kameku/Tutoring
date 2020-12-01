@extends('layouts.master')

@section('title') Dashboard @endsection
@section('css')

<!-- DataTables -->
<link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

@component('common-components.breadcrumb')
@slot('title') Enquiry - Name Student {{$enquiry->first_name}} @endslot
@slot('title_li') Welcome to {{ Auth::user()->name }} @endslot


@endcomponent
<!-- boton que envia a la vista de lista -->
<div class="row">
    <div class="col-auto mr-auto"></div>
    <div class="col-auto">
        <a href="{{route('enquiry.index')}}" class="badge badge-secondary mb-2">Go Back</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header bg-trama text-white rounded">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#enrolmentProcess" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Enrolment Process</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#enrolmentDetails" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Enrolment Details</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#reports" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Reports</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">History</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">       
                    <div class="tab-pane" id="enrolmentProcess" role="tabpanel">
                        @include('enquiry.enrolmentProcess')
                    </div>
                    <div class="tab-pane active" id="enrolmentDetails" role="tabpanel">
                        <div class="row">
                            <div class="col-7">
                                <div class="card-body bg-tramaSecond border border-primary shadow rounded">
                                    <div class="card-header bg-primary rounded">
                                        <h5 class="card-title mb-3 mt-3 text-white font-size-18">Student Information</h5>

                                        <p class="card-title-desc text-white">
                                            This information corresponds to the one sent in the first contact through the initial registration form
                                        </p>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">First Name</p>
                                        <h6 class="font-size-16">{{$enquiry->first_name}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Last Name</p>
                                        <h6 class="font-size-16">{{$enquiry->last_name}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Home Phone</p>
                                        <h6 class="font-size-16">{{$enquiry->home_phone}}</h6>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Adress</p>
                                        <h6 class="font-size-16">{{$enquiry->adress}}</h6>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Suburb</p>
                                        <h6 class="font-size-16">{{$enquiry->suburb}}</h6>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Post Code</p>
                                        <h6 class="font-size-16">{{$enquiry->post_code}}</h6>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Date of Birth</p>
                                        <h6 class="font-size-16">{{$enquiry->date_of_birth}}</h6>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Language Spoken at Home</p>
                                        <h6 class="font-size-16">{{$enquiry->language_home}}</h6>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#enquiryStudenEdit">Edit Information Student</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="card-body bg-tramaSecond border border-primary shadow rounded">
                                    <div class="card-header bg-primary rounded">
                                        <h5 class="card-title mb-3 mt-3 text-white font-size-18">Parent Information</h5>

                                        <p class="card-title-desc text-white">
                                            This information corresponds to the one sent in the first contact through the initial registration form
                                        </p>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Parent Name</p>
                                        <h6 class="font-size-16">{{$enquiry->parent_name}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Mobile Phone</p>
                                        <h6 class="font-size-16">{{$enquiry->parent_mobile}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Email</p>
                                        <h6 class="font-size-16">{{$enquiry->parent_email}}</h6>
                                    </div>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">Adress</p>
                                        <h6 class="font-size-16">{{$enquiry->parent_adress}}</h6>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" data-toggle="modal" data-target="#enquiryParentEdit" class="btn btn-primary">Edit Information Parent</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="reports" role="tabpanel">
                        <p class="mb-0">
                            Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free.
                        </p>
                    </div>
                    <div class="tab-pane" id="history" role="tabpanel">
                        <p class="mb-0">
                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>

<!-- Modal Edit Studen-->
<form data-parsley-validate novalidate action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}" method="POST">
    <div class="modal fade " id="enquiryStudenEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit student information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Studen First Name</label>
                            <input type="text" name="first_name" class="form-control mb-3" value="{{$enquiry->first_name}}" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="">Studen Last Name</label>
                            <input type="text" name="last_name" class="form-control mb-3" value="{{$enquiry->last_name}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Studen Phone Home</label>
                            <input type="text" name="home_phone" class="form-control mb-3" value="{{$enquiry->home_phone}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Studen Adress</label>
                            <input type="text" name="adress" class="form-control mb-3" value="{{$enquiry->adress}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Studen Suburb</label>
                            <input type="text" name="suburb" class="form-control mb-3" value="{{$enquiry->suburb}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Studen Post Code</label>
                            <input type="number" name="post_code" class="form-control mb-3" value="{{$enquiry->post_code}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Studen Date Of Birth</label>
                            <input type="text" id="datepicker" name="date_of_birth" class="form-control mb-3 " value="{{$enquiry->date_of_birth}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Studen Laguage Home</label>
                            <input type="text" name="language_home" class="form-control mb-3" value="{{$enquiry->language_home}}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal Edit Studen END-->

<!-- Modal Edit PARENT-->
<form data-parsley-validate novalidate action="{{route('enquiry.update', ['enquiry' => $enquiry->id])}}" method="POST">
    <div class="modal fade " id="enquiryParentEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg  ">
            <div class="modal-content border-primary p-3 rounded shadow-primary">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Parent information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <label for="">Parent Name</label>
                            <input type="text" name="parent_name" class="form-control mb-3" value="{{$enquiry->parent_name}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Parent Mobile</label>
                            <input type="text" name="parent_mobile" class="form-control mb-3" value="{{$enquiry->parent_mobile}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Parent Email</label>
                            <input type="text" name="parent_email" class="form-control mb-3" value="{{$enquiry->parent_email}}" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="">Parent Adress</label>
                            <input type="text" name="parent_adress" class="form-control mb-3" value="{{$enquiry->parent_adress}}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal Edit PARENT END-->

@endsection


@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

<script>
    for ( var item = 1; item<= 14; item++){ 
        var statusEnrolmentProcess = document.getElementById('statusEnrolmentProcess-'+item).innerText;
        if (statusEnrolmentProcess == 'Complete'){
            var itemEnrolmentProcess = document.getElementById('itemEnrolmentProcess-'+item);
            itemEnrolmentProcess.classList.add('enrolmentProcess-mark');
        };
    }
</script>
@endsection