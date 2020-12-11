@extends('layouts.master-without-nav')

@section('title') Welcome @endsection

@section('css')
<!-- Plugin css -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-style.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-theme23w.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">
@endsection


@section('body')

<body>
    @endsection
    

    @section('content')
    <div class="form-body on-top-mobile">
        <div class="website-logo">
            <a href="welcome">
                <div class="logo">
                    <img class="logo-size" src="{{URL::asset('images/site-icon.png')}}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <!-- emcabezado del formulario -->
            <div class="img-holder">
                <!-- <div class="bg"></div> -->
                <div class="info-holder simple-info">
                    <div><img src="{{URL::asset('images/enquiry.svg')}}" alt=""></div>
                    <div>
                        <h3>Welcome to Educate tutoring!</h3>
                    </div>
                    <div>
                        <p>leave us your information and <br>we will write you soon</p>
                    </div>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Enrolment Details</h3>
                        <p>All information is required, each item displays new requirements, please fill out the information as requested</p>
                        <!-- Inicio de fomulario :::::::::: -->
                        <!-- <form data-parsley-validate novalidate action="{{route('enquiry.store')}}" method="POST"> -->
                        <form class="needs-validation" novalidate="" action="{{route('enrolment.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf  
                            <div id="accordion">
                                <div class="card mb-1 shadow-none">
                                    <a href="#collapseOne" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                        <div class="card-header bg-blue-color p-2.3 " id="headingOne">
                                            <h6 class="m-0 text-white font-size-18">
                                                Student Information
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <input type="text" name="first_name" class="form-control" placeholder="Student first name" value="{{$enquiry->first_name}}" required>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <input type="text" name="last_name" class="form-control" placeholder="Student last name" value="{{$enquiry->last_name}}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="home_phone" class="form-control" placeholder="Home Phone" value="{{$enquiry->home_phone}}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="adress" class="form-control" placeholder="Adress" value="{{$enquiry->adress}}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="suburb" class="form-control" placeholder="suburb" value="{{$enquiry->suburb}}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="post_code" class="form-control" placeholder="P/Code" value="{{$enquiry->post_code}}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" data-provide="datepicker" name="date_of_birth" class="form-control " placeholder="Date of Birth" value="{{$enquiry->date_of_birth}}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="language_home" class="form-control" placeholder="Language Spoken at Home" value="{{$enquiry->language_home}}" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4 mb-3">
                                                    <select name="gender" class="js-custom-select form-control" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }' required>
                                                        <option value="" disabled>Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                                <div class="col-12 col-sm-8">
                                                    <select name="delivered" class="js-custom-select form-control" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }' required>
                                                        <option value="">how would you like your support delivered?</option>
                                                        <option value="Online">Online</option>
                                                        <option value="In Person">In Person</option>
                                                        <option value="Combination Online - In person">Combination Online - In person</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <select name="subjet" id="subjet" onchange="subjets()" class="js-custom-select" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }' required>
                                                        <option value="">which subjet would you like help with?</option>
                                                        <option value="Chemistry">Chemistry</option>
                                                        <option value="English">English</option>
                                                        <option value="Essay Writing">Essay writing</option>
                                                        <option value="Exam Preparation">Exam Preparation</option>
                                                        <option value="Mathematics">Mathematics</option>
                                                        <option value="organisation and study skills">organisation and study skills</option>
                                                        <option value="Physics">Physics</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                                <div class="col-12 col-sm-6 " id="subjetOne">
                                                    <select name="package" id="package" onchange="packages()" class="js-custom-select" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }'>
                                                        <option value="">what type of support package would you like</option>
                                                        <option value="Academic Coaching">Academic Coaching</option>
                                                        <option value="Academic Extension">Academic Extension</option>
                                                        <option value="Academic Intervention">Academic Intervention</option>
                                                        <option value="Diagnostic Assessment">Diagnostic Assessment</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                                <div class="col-12 col-sm-6 packageSelectHide" id="subjetTwo">
                                                    <select name="package1" id="package-1" onchange="packages1()" class="js-custom-select " data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }'>
                                                        <option value="">what type of support package would you like</option>
                                                        <option value="Academic Coaching">Academic Coaching</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                            </div>
                                            <div class="row pt-3">
                                                <div class="col-12 col-sm-12 packageSelectHide" id="packageOne">
                                                    <select name="type_package" class="js-custom-select" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }'>
                                                        <option value="" disabled>how long would you like tutoring for?</option>
                                                        <option value="I'm not sure yet">I'm not sure yet</option>
                                                        <option value="Ongoing - 1 lesson per week ongoing">Ongoing - 1 lesson per week ongoing</option>
                                                        <option value="Ongoing Intensive - 2 lesson per week ongoing">Ongoing Intensive - 2 lesson per week ongoing</option>
                                                        <option value="single lesson - 1 lesson per week for 1 week">single lesson - 1 lesson per week for 1 week</option>
                                                        <option value="three weeks - 1 lesson per week for 3 weeks ">three weeks - 1 lesson per week for 3 weeks </option>
                                                        <option value="five weeks - 1 lesson per week for 5 weeks">five weeks - 1 lesson per week for 5 weeks</option>
                                                        <option value="Single term intensive - 3 lesson per week for 10 weeks">Single term intensive - 3 lesson per week for 10 weeks</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                                <div class="col-12 col-sm-12 packageSelectHide" id="packageTwo">
                                                    <select name="type_package1" class="js-custom-select" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }'>
                                                        <option value="" disabled>how long would you like tutoring for?</option>
                                                        <option value="I'm not sure yet">I'm not sure yet</option>
                                                        <option value="Ongoing - 1 lesson per week ongoing">Ongoing - 1 lesson per week ongoing</option>
                                                        <option value="Ongoing Intensive - 2 lesson per week ongoing">Ongoing Intensive - 2 lesson per week ongoing</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                                <div class="col-12 col-sm-12 packageSelectHide" id="packageThree">
                                                    <select name="type_package2" class="js-custom-select" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }'>
                                                        <option value="" disabled>how long would you like tutoring for?</option>
                                                        <option value="I'm not sure yet">I'm not sure yet</option>
                                                        <option value="Ongoing - 1 lesson per week ongoing">Ongoing - 1 lesson per week ongoing</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-12">
                                                    <input type="text" name="know" class="form-control" placeholder="Is there anything else you would like us to know?" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 shadow-none">
                                    <a href="#collapseTwo" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="card-header bg-blue-color p-2.3" id="headingTwo">
                                            <h6 class="m-0 text-white font-size-18">
                                                Parent/Guardian Information
                                            </h6>
                                        </div>
                                    </a>

                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-8">
                                                    <input type="text" name="parent_name" class="form-control" placeholder="Parent/Guardian Name" value="{{ $enquiry->parent_name }}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <select name="parent_iam" class="js-custom-select" data-hs-select2-options='{                                       
                                                            "minimumResultsForSearch": "Infinity",
                                                            "dropdownAutoWidth": true                                       
                                                                }' required>
                                                        <option value="">I am ...</option>
                                                        <option value="The parent of a student">The parent of a student</option>
                                                        <option value="The guardian of a student">The guardian of a student</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                    <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <input type="email" name="parent_email" class="form-control" placeholder="Email" value="{{ $enquiry->parent_email }}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="parent_mobile" class="form-control" placeholder="Mobile Phone" value="{{ $enquiry->parent_mobile }}" required>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input type="text" name="parent_adress" class="form-control" placeholder="Adress" value="{{ $enquiry->parent_adress }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 shadow-none">
                                    <a href="#collapseThree" class=" collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">

                                        <div class="card-header bg-blue-color p-2.3" id="headingThree">
                                            <h6 class="m-0 text-white font-size-18">
                                                Schooling Information
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5 class="text-left pl-3 pb-2"> Schooling information</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-5">
                                                    <!-- Select School Attending start -->
                                                    <select name="school" class="js-custom-select" data-hs-select2-options='{
                                                        "placeholder": "Select School Attending"
                                                         }' required>
                                                        <option value="">School Attending</option>
                                                        <option value="Albuera St Primary School">Albuera St Primary School
                                                        </option>
                                                        <option value="Bellerive Primary School">Bellerive Primary School
                                                        </option>
                                                        <option value="Blackmans Bay Primary School">Blackmans Bay Primary
                                                            School</option>
                                                        <option value="Brighton Primary School">Brighton Primary School
                                                        </option>
                                                        <option value="Calvin Christian School">Calvin Christian School
                                                        </option>
                                                        <option value="Campbell Street Primary School">Campbell Street Primary
                                                            School</option>
                                                        <option value="Channel Christian School">Channel Christian School
                                                        </option>
                                                        <option value="Bruce Maynard">Bruce Maynard</option>
                                                        <option value="Corpus Christi Catholic School">Corpus Christi Catholic School
                                                        </option>
                                                        <option value="Cygnet Primary School">Cygnet Primary School</option>
                                                        <option value="Howrah Primary Schoolville Primary">Howrah Primary Schoolville
                                                            Primary</option>
                                                        <option value="Elizabeth College">Elizabeth College</option>
                                                        <option value="Fahan School">Fahan School</option>
                                                        <option value="MHobart College">MHobart College</option>
                                                        <option value="Kingston Primary School">Kingston Primary School</option>
                                                        <option value="Lansdowne Crescent Primary School">Lansdowne Crescent Primary
                                                            School</option>
                                                        <option value="Lindisfarne Primary School">Lindisfarne Primary School</option>
                                                        <option value="Margate Primary School">Margate Primary School</option>
                                                        <option value="Montague Bay Primary School">Montague Bay Primary School</option>
                                                        <option value="Mount Carmel College">Mount Carmel College</option>
                                                        <option value="Mt Nelson Primary School">Mt Nelson Primary School</option>
                                                        <option value="Mt Stuart Primary School">Mt Stuart Primary School</option>
                                                        <option value="N/A">N/A</option>
                                                        <option value="North Lindisfarne Primary Schoo">North Lindisfarne Primary School
                                                        </option>
                                                        <option value="Other">Other</option>
                                                        <option value="Princess Street Primary School">Princess Street Primary School
                                                        </option>
                                                        <option value="Richmond Primary School">Richmond Primary School</option>
                                                        <option value="Risdon Vale Primary School">Risdon Vale Primary School</option>
                                                        <option value="Rose Bay High School">Rose Bay High School</option>
                                                        <option value="Sacred Heart Catholic School (Geeveston)">Sacred Heart Catholic
                                                            School (Geeveston)</option>
                                                        <option value="Sacred Heart College (New Town)">Sacred Heart College (New Town)
                                                        </option>
                                                        <option value="Schoolwarra Primary School">Schoolwarra Primary School</option>
                                                        <option value="Sandy Bay Infants School">Sandy Bay Infants School</option>
                                                        <option value="Snug Primary School">Snug Primary School</option>
                                                        <option value="South Hobart Primary">South Hobart Primary</option>
                                                        <option value="South Hobart Primary School">South Hobart Primary School</option>
                                                        <option value="Southern Christian College">Southern Christian College</option>
                                                        <option value="St Aloysius Catholic College">St Aloysius Catholic College
                                                        </option>
                                                        <option value="St Johns Catholic School">St Johns Catholic School</option>
                                                        <option value="St Marys Catholic College">St Marys Catholic College</option>
                                                        <option value="St Michaels Collegiate">St Michaels Collegiate</option>
                                                        <option value="Taroona Primary School">Taroona Primary School</option>
                                                        <option value="Tarremah Steiner School">Tarremah Steiner School</option>
                                                        <option value="Waimea Heights Primary School">Waimea Heights Primary School
                                                        </option>
                                                        <option value="Windermere Primary School">Windermere Primary School</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                    <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                    <!-- End Select Select School Attending end -->
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <!-- Select grade -->
                                                    <input name="grade" type="text" class="form-control" placeholder="Grade" required>
                                                    <!-- End Select grade end-->
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input name="teacher_name" type="text" class="form-control" placeholder="Teacher Name" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-8">
                                                    <label for="">I am happy for my child´s school teacher to contact or be contacted by
                                                        Educate: </label>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <!-- Select -->
                                                    <select name="teacher_contact" id="select" class="js-custom-select" data-hs-select2-options='{                                       
                                                        "minimumResultsForSearch": "Infinity",
                                                        "dropdownAutoWidth": true                                       
                                                            }' required>
                                                        <option value="" selected disabled>Select..</option>
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                    <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                    <!-- End Select -->
                                                </div>
                                                <!--Campo si aparece -->
                                                <div class="col-md-12 pt-3 cel-teacher">
                                                    <div class="form-group mb-5">
                                                        <input type="text" id="name" name="teacher_mobile" class="form-control" placeholder="Mobile Phone">
                                                    </div>
                                                </div>
                                                <!--End-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 shadow-none">
                                    <a href="#collapseFour" class=" collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">

                                        <div class="card-header bg-blue-color p-2.3" id="headingThree">
                                            <h6 class="m-0 text-white font-size-18">
                                                In case of emergency
                                            </h6>
                                        </div>
                                    </a>

                                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            <!--in case of emergency-->
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5 class="text-left pb-2 pt-3"> In case of emergency</h5>
                                                </div>
                                                <div class="col-12">
                                                    <label>In case of emergency, an attempt will be made to contact parent/guardian
                                                        first. In the event this is not succesful, we will contact the relative or
                                                        trusted friend listed below.</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <input name="emergency_name" type="text" class="form-control" placeholder="Name" required>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <!-- Select relationship to student -->
                                                    <select name="emergency_relation" class="js-custom-select" data-hs-select2-options='{
                                                        "minimumResultsForSearch": "Infinity",
                                                        "placeholder": "<span class=\"d-flex align-items-center\"><i class=\"far fa-user icon-text mr-2\"></i> Relationship to student</span>"
                                                        }' required>
                                                        <option label="empty"></option>
                                                        <option value="Parent">Parent</option>
                                                        <option value="Grandparent">Grandparent</option>
                                                        <option value="Carer">Carer</option>
                                                        <option value="Aunt">Aunt</option>
                                                        <option value="Uncle">Uncle</option>
                                                        <option value="Family Friend">Family Friend</option>
                                                        <option value="Neighbour">Neighbour</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                    <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                    <!-- End Select relationship to student -->
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-12 col-sm-6">
                                                    <!-- Phone Number -->
                                                    <div class="form-group">
                                                        <input name="emergency_mobile" type="text" class="form-control" placeholder="Phone number" required>
                                                    </div>
                                                    <!-- End Phone Number -->
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <input name="emergency_phone" type="text" class="form-control" placeholder="Home Phone" required>
                                                </div>

                                            </div>
                                            <!--in case of emergency end-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 shadow-none">
                                    <a href="#collapseFive" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="card-header bg-blue-color p-2.3" id="headingThree">
                                            <h6 class="m-0 text-white font-size-18">
                                                Previus Interventions
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card mb-3 mb-lg-5">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <span class="d-block">Activate the button according to your answer</span>
                                                </div>
                                                <!--E1 Has your child been assessed by school psycchologist or equivalente? -->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e1" id="selectE1" class="js-custom-select" data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity",
                                                    "customClass": "custom-select custom-select-sm",
                                                    "dropdownAutoWidth": true
                                                    }' required>
                                                            <option value="yes"  data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Has your child been assessed by school psycchologist or equivalente?</span>
                                                        <small class="d-block text-muted">E1</small>
                                                    </div>
                                                    <!--Campo si aparece E1 -->
                                                    <div class="col-md-12 pt-3 file_e1">
                                                        <div class="btn btn-sm btn-primary file-attachment-btn">Upload File
                                                            <input name="interventions_attachmen_e1" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                                                "textTarget": "#fileE1",
                                                                "maxFileSize": "Infinity"
                                                             }'>
                                                        </div>
                                                        <span id="fileE1"></span>
                                                    </div>
                                                    <!--End-->
                                                </div>
                                                <!--End E1-->
                                                <!--E2 Has your child been assessed by an optometrist or opthalmologist? -->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e2" id="selectE2" class="js-custom-select" data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity",
                                                    "customClass": "custom-select custom-select-sm",
                                                    "dropdownAutoWidth": true
                                                    }' required>
                                                            <option value="yes"  data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Has your child been assessed by an optometrist or opthalmologist?</span>
                                                        <small class="d-block text-muted">E2</small>
                                                    </div>

                                                    <!--Campo si aparece E2  -->
                                                    <div class="col-md-12 pt-3 file_e2">
                                                        <div class="btn btn-sm btn-primary file-attachment-btn">Upload File
                                                            <input name="interventions_attachmen_e2" type="file" class="js-file-attach file-attachment-btn-label" data-hs-file-attach-options='{
                                                                "textTarget": "#fileE2",
                                                                "maxFileSize": "Infinity"
                                                             }'>
                                                        </div>
                                                        <span id="fileE2"></span>
                                                    </div>
                                                    <!--End-->
                                                </div>
                                                <!--End E2-->
                                                <!--E3 Have you received any educational assitence prior to this time? -->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e3" id="selectE3" class="js-custom-select" data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity",
                                                    "customClass": "custom-select custom-select-sm",
                                                    "dropdownAutoWidth": true
                                                    }' required>
                                                            <option value="yes"  data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Have you received any educational assitence prior to this time?</span>
                                                        <small class="d-block text-muted">E3</small>
                                                    </div>
                                                    <!--Campo si aparece E2  -->
                                                    <div class="col-md-12 pt-3 file_e3">
                                                        <div class="btn btn-sm btn-primary file-attachment-btn">Upload File
                                                            <input name="interventions_attachmen_e3" type="file" class="js-file-attach file-attachment-btn-label"  data-hs-file-attach-options='{
                                                                "textTarget": "#fileE3",
                                                                "maxFileSize": "Infinity"
                                                             }'>
                                                        </div>
                                                        <span id="fileE3"></span>
                                                    </div>
                                                    <!--End-->
                                                </div>
                                                <!--End E3-->
                                                <!--E4 Are there any legal issus regarding child custody? -->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e4" id="selectE4" class="js-custom-select" data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity",
                                                    "customClass": "custom-select custom-select-sm",
                                                    "dropdownAutoWidth": true
                                                    }' required>
                                                            <option value="yes"  data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Are there any legal issus regarding child custody?</span>
                                                        <small class="d-block text-muted">E4</small>
                                                    </div>
                                                    <!--Campo si aparece -->
                                                    <div class="col-md-12 pt-3 file_e4">
                                                        <div class="form-group mb-5">
                                                            <input type="text" id="name" name="interventions_details_e4" class="form-control" placeholder="Please provide details">
                                                        </div>
                                                    </div>
                                                    <!--End-->
                                                </div>
                                                <!--End E4-->
                                                <!--E5 Do you give consent for you child to have their photo taken, and for to be used for media related purposes? -->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e5" class="js-custom-select" data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity",
                                                    "customClass": "custom-select custom-select-sm",
                                                    "dropdownAutoWidth": true
                                                    }' required>
                                                            <option value="yes"  data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Do you give consent for you child to have their photo taken, and for to be used for media related purposes?</span>
                                                        <small class="d-block text-muted">E5</small>
                                                    </div>
                                                </div>
                                                <!--End E5-->
                                                <!--E6 Do your child have any allergies?-->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e6" id="selectE6" class="js-custom-select" data-hs-select2-options='{
                                                     "minimumResultsForSearch": "Infinity",
                                                     "customClass": "custom-select custom-select-sm",
                                                     "dropdownAutoWidth": true
                                                     }' required>
                                                            <option value="yes"  data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Do your child have any allergies?</span>
                                                        <small class="d-block text-muted">E6</small>
                                                    </div>
                                                    <!--Campo si aparece -->
                                                    <div class="col-md-12 pt-3 file_e6">
                                                        <div class="form-group mb-5">
                                                            <input type="text" id="name" name="interventions_details_e6" class="form-control" placeholder="Please provide details">
                                                        </div>
                                                    </div>
                                                    <!--End-->
                                                </div>
                                                <!--End E6-->
                                                <!--E7 Do you give consent for your child to be given occasional chocolate/sweets?-->
                                                <hr class="my-3">
                                                <div class="row ">
                                                    <div class="col-2">
                                                        <!-- Select -->
                                                        <select name="interventions_e7" class="js-custom-select" data-hs-select2-options='{
                                                     "minimumResultsForSearch": "Infinity",
                                                     "customClass": "custom-select custom-select-sm",
                                                     "dropdownAutoWidth": true
                                                     }' required>
                                                            <option value="yes" selected data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-success mr-2"></span>Si</span>'>Yes</option>
                                                            <option value="no" data-option-template='<span class="d-flex align-items-center"><span class="legend-indicator bg-danger mr-2"></span>No</span>'>No</option>
                                                        </select>
                                                        <div class="invalid-feedback margin-top-validate">This field is required</div>
                                                        <div class="valid-feedback margin-top-validate">Looks good!</div>
                                                        <!-- End Select -->
                                                    </div>
                                                    <div class="col-10">
                                                        <span class="d-block">Do you give consent for your child to be given occasional chocolate/sweets?</span>
                                                        <small class="d-block text-muted">E7</small>
                                                    </div>
                                                </div>
                                                <!--End E7-->
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                        <!--E8 Previus Interventions ¿Dónde se enteró de Educate Tutoring?-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="">Where did you hear about Educate Tutoring?</label>
                                    <input name="about" type="text" class="form-control" placeholder="Where did you hear about Us" required>

                                </div>
                                <div class="col-12 col-sm-6">
                                </div>
                            </div>
                            <!-- E9 Notas coments-->
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="notes" class="form-control" placeholder="Notes..."></textarea>
                                </div>
                            </div>
                            <!-- E9 Notas coments end-->
                            <div class="row top-padding">
                                <div class="col-12 col-sm-6">
                                    <input name="terms" type="checkbox" id="chk1" required="" value="Accept">
                                    <label for="chk1">I agree on <a href="#">terms & conditions</a> of iofrm</label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                                <!--Button enviar-->
                                <div class="col-12 col-sm-6">
                                    <div class="form-button text-right">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block pt-2 pb-2">
                                            <span class="font-size-18">Submit Enrolment</span></button>
                                    </div>
                                </div>
                                <!-- end Button enviar-->
                            </div>
                        </form>
                        <!-- Final de formulario ::::::::: -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-btn d-none d-sm-block">
        <a href="../../welcome" class="text-dark"><i class='bx bxs-left-arrow-square h1' style="color:#366db1"></i></a>
    </div>

    @endsection

    @section('script')
    <!-- validacion de formularios -->
    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script>
    <script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
    <!-- script de funcionamiento de los select -->
    <script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/select2.full.min.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/toastr.min.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.core.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.validation.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.select2.js')}}"></script>
    <script src="{{ URL::asset('js/enrolment2/hs.mask.js')}}"></script>
    <script>
        $(document).on('ready', function() {
            // initialization of select2
            $('.js-custom-select').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
            // initialization of masked input
            $('.js-masked-input').each(function() {
                var mask = $.HSCore.components.HSMask.init($(this));
            });
            // initialization of custom file
            $('.js-file-attach').each(function() {
                var customFile = new HSFileAttach($(this)).init();
            });
            //  archivo de carga si selecciona que si 
            $('.cel-teacher').hide();
            $('#select').on('change', function() {
                var selectValor = $(this).val();
                if (selectValor == 'yes') {
                    $('.cel-teacher').show();
                } else {
                    $('.cel-teacher').hide();
                }
            });
            // selectE1 archivo de carga si selecciona que si 
            $('.file_e1').hide();
            $('#selectE1').on('change', function() {
                var selectValor = $(this).val();
                // alert (selectValor);
                if (selectValor == 'yes') {
                    $('.file_e1').show();
                } else {
                    $('.file_e1').hide();
                    // alert('esta es la opcion 2')
                }
            });
            // selectE1 archivo de carga si selecciona que si 
            $('.file_e2').hide();
            $('#selectE2').on('change', function() {
                var selectValor = $(this).val();
                // alert (selectValor);
                if (selectValor == 'yes') {
                    $('.file_e2').show();
                } else {
                    $('.file_e2').hide();
                    // alert('esta es la opcion 2')
                }
            });
            // selectE1 archivo de carga si selecciona que si 
            $('.file_e3').hide();
            $('#selectE3').on('change', function() {
                var selectValor = $(this).val();
                // alert (selectValor);
                if (selectValor == 'yes') {
                    $('.file_e3').show();
                } else {
                    $('.file_e3').hide();
                    // alert('esta es la opcion 2')
                }
            });
            // selectE1 archivo de carga si selecciona que si 
            $('.file_e4').hide();
            $('#selectE4').on('change', function() {
                var selectValor = $(this).val();
                // alert (selectValor);
                if (selectValor == 'yes') {
                    $('.file_e4').show();
                } else {
                    $('.file_e4').hide();
                    // alert('esta es la opcion 2')
                }
            });
            // selectE1 archivo de carga si selecciona que si 
            $('.file_e6').hide();
            $('#selectE6').on('change', function() {
                var selectValor = $(this).val();
                // alert (selectValor);
                if (selectValor == 'yes') {
                    $('.file_e6').show();
                } else {
                    $('.file_e6').hide();
                    // alert('esta es la opcion 2')
                }
            });
        });
    </script>
    <script>
        function packages() {
            var package = document.getElementById('package').value;
            // var package = new String(document.getElementById('package').value);
            // alert(package);
            if (package == "Academic Coaching") {
                var packageOne = document.getElementById('packageOne');
                packageOne.classList.remove('packageSelectHide');
                var packageTwo = document.getElementById('packageTwo');
                packageTwo.classList.add('packageSelectHide');
                packageTwo.firstElementChild.setAttribute("name","no-package");
                var packageThree = document.getElementById('packageThree');
                packageThree.classList.add('packageSelectHide');
                packageThree.firstElementChild.setAttribute("name","no-package");

            } else {
                if (package == "Academic Extension") {
                    var packageOne = document.getElementById('packageOne');
                    packageOne.classList.remove('packageSelectHide');
                    var packageTwo = document.getElementById('packageTwo');
                    packageTwo.classList.add('packageSelectHide');
                    packageTwo.firstElementChild.setAttribute("name","no-package");
                    var packageThree = document.getElementById('packageThree');
                    packageThree.classList.add('packageSelectHide');
                    packageThree.firstElementChild.setAttribute("name","no-package");
                } else {
                    if (package == "Academic Intervention") {
                        var packageOne = document.getElementById('packageOne');
                        packageOne.classList.add('packageSelectHide');
                        packageOne.firstElementChild.setAttribute("name","no-package");
                        var packageTwo = document.getElementById('packageTwo');
                        packageTwo.classList.remove('packageSelectHide');
                        packageTwo.firstElementChild.setAttribute("name","type_package");
                        var packageThree = document.getElementById('packageThree');
                        packageThree.classList.add('packageSelectHide');
                        packageThree.firstElementChild.setAttribute("name","no-package");


                    } else {
                        if (package == "Diagnostic Assessment") {
                            var packageOne = document.getElementById('packageOne');
                            packageOne.classList.add('packageSelectHide');
                            packageOne.firstElementChild.setAttribute("name","no-package");
                            var packageTwo = document.getElementById('packageTwo');
                            packageTwo.classList.add('packageSelectHide');
                            packageTwo.firstElementChild.setAttribute("name","no-package");
                            var packageThree = document.getElementById('packageThree');
                            packageThree.classList.remove('packageSelectHide');
                            packageThree.firstElementChild.setAttribute("name","type_package");
                        }
                    }
                }

            }

        }
    </script>
    <script>
        function packages1() {
            var package = document.getElementById('package-1').value;
            // var package = new String(document.getElementById('package').value);
            // alert(package);
            if (package == "Academic Coaching") {
                var packageOne = document.getElementById('packageOne');
                packageOne.classList.remove('packageSelectHide');
                packageOne.firstElementChild.setAttribute("name","type_package");
                var packageTwo = document.getElementById('packageTwo');
                packageTwo.classList.add('packageSelectHide');
                packageTwo.firstElementChild.setAttribute("name","no-package");
                var packageThree = document.getElementById('packageThree');
                packageThree.classList.add('packageSelectHide');
                packageThree.firstElementChild.setAttribute("name","no-package");

            }
        }
    </script>
    <script>
        function subjets() {
            var subjets = document.getElementById('subjet').value;
            // alert(subjets);
            if (subjets == "English" || subjets == "Mathematics") {
                var subjetOne = document.getElementById('subjetOne');
                subjetOne.classList.remove('packageSelectHide');
                subjetOne.firstElementChild.setAttribute("name","package");
                var subjetTwo = document.getElementById('subjetTwo');
                subjetTwo.classList.add('packageSelectHide');
                subjetTwo.firstElementChild.setAttribute("name","no-package");

            } else {
                var subjetOne = document.getElementById('subjetOne');
                subjetOne.classList.add('packageSelectHide');
                subjetOne.firstElementChild.setAttribute("name","no-package");
                var subjetTwo = document.getElementById('subjetTwo');
                subjetTwo.classList.remove('packageSelectHide');
                subjetTwo.firstElementChild.setAttribute("name","package");
            }
        }
    </script>

    @endsection
    