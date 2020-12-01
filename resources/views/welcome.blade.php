@extends('layouts.master-without-nav')

@section('title') Welcome @endsection

@section('body')

<body>
    @endsection

    @section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="login" class="text-dark"><i class='bx bxs-layout h2' style="color:#db4b1a"></i></a>
    </div>
    <section class="my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="home-wrapper">
                        <div class="mb-5">
                            <img src="/images/site-icon.png" alt="logo" height="55" />
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="maintenance-img">
                                    <img src="/images/widget-img.png" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-5">An Active & Engaging Learning Experience</h3>
                        <p>Premium educational support tailored to meet the individual needs of our students</p>
                        <a href="enquiry/create" class="btn btn-primary btn-lg btn-block">Create Enquire</a>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mt-4 maintenance-box">
                                    <div class="card-body">
                                        <h5 class="font-size-15 text-uppercase">Catch up or get ahead</h5>
                                        <p class="text-muted mb-0">Feeling left behind, struggling to keep up with the school program?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mt-4 maintenance-box">
                                    <div class="card-body">
                                        <h5 class="font-size-15 text-uppercase">
                                        Catch up or get ahead</h5>
                                        <p class="text-muted mb-0">Finding it difficult to grasp foundation skills needed for reading, writing or maths</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mt-4 maintenance-box">
                                    <div class="card-body">
                                        <h5 class="font-size-15 text-uppercase">
                                            Catch up or get ahead</h5>
                                        <p class="text-muted mb-0">Received a diagnosis of dyslexia or other learning difficulty?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection