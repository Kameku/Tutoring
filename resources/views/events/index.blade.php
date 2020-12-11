@extends('layouts.master')

@section('title') Calendar @endsection

@section('css')
<!-- Plugin css -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-style.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/iofrm-theme23w.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontEnrolment/theme.css')}}">

<link rel="stylesheet" href="{{asset('fullcalendar/core/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/daygrid/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">
<link rel="stylesheet" href="{{asset('libs/toastr/css/main.css')}}">
<style>
    
    .fc-row fc-widget-header {
        color: red;
        background: blueviolet;
     } 
</style>

@endsection

@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

@component('common-components.breadcrumb')
@slot('title') Calendar @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->



@endsection

@section('script')
<!-- plugin js -->
<script src="{{asset('fullcalendar/core/main.js')}}"></script>
<script src="{{asset('fullcalendar/interaction/main.js')}}"></script>
<script src="{{asset('fullcalendar/daygrid/main.js')}}"></script>
<script src="{{asset('fullcalendar/list/main.js')}}"></script>
<script src="{{asset('fullcalendar/timegrid/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://kit.fontawesome.com/ced421920a.js" crossorigin="anonymous"></script>
<script>


    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],
            // timeZone: 'UTC',
            timeZone: 'local', 
            navLinks: true,
            selectable:true,
            selectMirror:true,     
            //Muestra la cabecera del calendario(next, hoy, mes, semana y dia)
            header: {
                left: 'prev,next today Miboton',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'               
                },
            //boton personalizable
            customButtons: {
                Miboton: {
                    text: "Create Event",
                    click: function() {
                        //alert("Hola mundo");
                        limpiarFormulario();  
                        $('#btnAgregar').show(false);
                        $('#btnModificar').hide(true);
                        $('#btnEliminar').hide(true);                          
                        $('#eventModal').modal('toggle');
                        
            
                    }
                }
            }, //fin boton personalizable (, borrar si quita el bloque)            

            //bloque para click en el dia, al hacer click hace alguna funcion (ej: modal, debe existir la referencia a interection/main.js )
            dateClick: function(info) {
                limpiarFormulario();

                $('#txtFecha').val(info.dateStr); //asignado el valor de la fecha en este campo
               $clicDay = info.dateStr; //AAAA-MM-DD ontiene la fecha donde ha hecho click
                var today = new Date();//obtiene la fecha completa
                
                var month = (today.getMonth()+1).toString();
                if (month.length <=1){
                    month = "0"+ month;
                }

                var day = today.getDate().toString();
                if (day.length <=1){
                    day = "0"+ day;
                }


                $nowToday = today.getFullYear()+"-"+month+"-"+day; // Fecha Actual AAAA-MM-DD igualamos el formato con la variable clicDay

                if ($clicDay < $nowToday){
                    // alert("No puede generar un evento pasado de la fecha actual");
                    toastr["error"](" No puede crear un evento en el pasado", $clicDay )
                    toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": true,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "2000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    }          
                    //$('#alertNotNewEvent').html("No puede generar un evento pasado de la fecha actual");  
                }else{
                    $('#eventModal').modal();
                    $('#btnAgregar').show(false);
                    $('#btnModificar').hide(true);
                    $('#btnEliminar').hide(true);
                }            
                //alert(nowToday);             
                // $('#eventModal').modal();
                //console.log(info);
                //calendar.addEvent({title:"Evento x", date: info.dateStr});
            },

            //funcion hover eventMouseEnter ver informacon del evento
            eventMouseEnter: function(info) {
                console.log(info);
                console.log(info.event.title);
                console.log(info.event.start);

                console.log(info.event.end);
                console.log(info.event.txtColor);
                console.log(info.event.backgroundColor);
                console.log(info.event.extendedProps.descripcion);
                console.log(info.event.extendedProps.nameStudent);
                console.log(info.event.extendedProps.nameTutor);  
                        
            },           

            //funcion click en el evento eventDblClick
            eventClick: function(info) {
                //$('#tituloEvento').html(info.event.title);               
               
                $('#btnAgregar').hide(true);
                $('#btnModificar').show(false);
                $('#btnEliminar').show(false);
                console.log(info);
                console.log(info.event.title);
                console.log(info.event.start);

                console.log(info.event.end);
                console.log(info.event.txtColor);
                console.log(info.event.backgroundColor);
                console.log(info.event.extendedProps.descripcion);
                console.log(info.event.extendedProps.nameStudent);

                $('#txtID').val(info.event.id);
                $('#txtTitulo').val(info.event.title);

                mes = (info.event.start.getMonth() + 1);
                dia = (info.event.start.getDate());
                anio = (info.event.start.getFullYear());

                mes = (mes < 10) ? "0" + mes : mes;
                dia = (dia < 10) ? "0" + dia : dia;

                minutos = info.event.start.getMinutes();
                hora = info.event.start.getHours();

                minutos = (minutos < 10) ? "0" + minutos : minutos;
                hora = (hora < 10) ? "0" + hora : hora;

                horario = (hora + ":" + minutos);



                $('#txtFecha').val(anio + "-" + mes + "-" + dia);
                $('#txtHora').val(horario);
                $('#txtColor').val(info.event.backgroundColor);
                $('#txtDescripcion').val(info.event.extendedProps.descripcion);
                $('#nameStudent').val(info.event.extendedProps.nameStudent),
                $('#nameTutor').val(info.event.extendedProps.nameTutor),


                $('#eventModal').modal();


            },
            // dradable
            editable: true,


            eventDrop: function(info) {
                $('#txtID').val(info.event.id);
                $('#txtTitulo').val(info.event.title);
                $('#txtColor').val(info.event.backgroundColor);
                $('#txtDescripcion').val(info.event.extendedProps.descripcion);

                mes = (info.event.start.getMonth() + 1);
                dia = (info.event.start.getDate());
                anio = (info.event.start.getFullYear());

                mes = (mes < 10) ? "0" + mes : mes;
                dia = (dia < 10) ? "0" + dia : dia;

                minutos = info.event.start.getMinutes();
                hora = info.event.start.getHours();

                minutos = (minutos < 10) ? "0" + minutos : minutos;
                hora = (hora < 10) ? "0" + hora : hora;

                horario = (hora + ":" + minutos);



                $('#txtFecha').val(anio + "-" + mes + "-" + dia);
                $('#txtHora').val(horario);
                $('#nameStudent').val(info.event.extendedProps.nameStudent);
                $('#nameTutor').val(info.event.extendedProps.nameTutor);


                objEvento = recolectarDatosGUI("PATCH");
                EnviarInformacion('/' + $('#txtID').val(), objEvento, true);
                
                
               

            },

           




            //agregar evento (datos del evento).s

            events: "{{ url('events/show') }}"


        });

        
       

        //calendar.setOption('locale','En');
        calendar.render();



        $('#btnAgregar').click(function() {
            objEvento = recolectarDatosGUI("POST");
            EnviarInformacion('', objEvento);
            
        });

        $('#btnEliminar').click(function() {
            objEvento = recolectarDatosGUI("DELETE");
            EnviarInformacion('/' + $('#txtID').val(), objEvento);
            $id = $('#txtID').val();
            $title = $('#txtTitulo').val();
            $hora = $('#txtHora').val();
            $student = $('#nameStudent').val();
            toastr["error"]("Event successfully removed.","Event: " +$id + " | " + $title + " | "+$student+ " | "+$hora)
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }

        });

        $('#btnModificar').click(function() {
            objEvento = recolectarDatosGUI("PATCH");
            EnviarInformacion('/' + $('#txtID').val(), objEvento);
        });


        function recolectarDatosGUI(method) {
            nuevoEvento = {
                id: $('#txtID').val(),
                title: $('#txtTitulo').val(),
                descripcion: $('#txtDescripcion').val(),
                color: $('#txtColor').val(),
                textColor: '#ffffff',
                start: $('#txtFecha').val() + " " + $('#txtHora').val(),
                end: $('#txtFecha').val() + " " + $('#txtHora').val(),

                nameStudent:$('#nameStudent').val(),
                nameTutor:$('#nameTutor').val(),


                '_token': $("meta[name='csrf-token']").attr("content"),
                '_method': method
            }
            return (nuevoEvento);
            

        }

        function EnviarInformacion(accion, objEvento, modal) {
            $.ajax({
                type: "POST",
                url: "{{url('/events')}}" + accion,
                data: objEvento,
                success: function(msg) {
                    console.log(msg);
                    if (!modal) {
                        $('#eventModal').modal('toggle'); // hace que se desaparezca el modal
                        // alert(msg);
                        if(msg ==1){
                            toastr["success"]("Event  successfully updated.")

                                    toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": true,
                                    "progressBar": true,
                                    "positionClass": "toast-bottom-right",
                                    "preventDuplicates": true,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "2000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                    }
                        }
                    }

                    calendar.refetchEvents(); //actualizar o refrescar los eeventos



                },
                error: function() {
                    toastr["error"]("All fields are required.")
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                }

            });

        }

        //limpiar formulario
        function limpiarFormulario() {
            $('#txtID').val("");
            $('#txtTitulo').val("");
            $('#txtFecha').val("");
            $('#txtHora').val("08:00");
            $('#txtColor').val("");
            $('#txtDescripcion').val("");
            $('#nameStudent').val("");
            $('#nameTutor').val("");
        }


    });
</script>

<!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-calendar"></i> Event title </h5>             
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">


                    <input type="hidden" name="txtID" id="txtID">

                    <div class="form-group col-md-6">
                        <label for="">Date</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar-day text-success"></i>
                                </div>
                            </div>
                            <input class="form-control" type="date" name="txtFecha" id="txtFecha">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Hour</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-clock text-info"></i>
                                </div>
                            </div>
                            <input class="form-control" type="time" name="txtHora" id="txtHora">
                        </div>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Title Event</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-calendar-check text-warning" ></i></i>
                                </div>
                            </div>
                            <input class="form-control" type="text" name="txtTitulo" id="txtTitulo" required>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Color Event</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-fill-drip text-danger"></i>
                                </div>
                            </div>
                            <input class="form-control" type="color" name="txtColor" id="txtColor">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Student</label>
                        <div class="input-group mb-2">
                            
                            {{-- <input class="form-control" type="text" name="nameStudent" id="nameStudent"> --}}
                            {{-- <select id="nameStudent" class="form-control js-custom-select">
                                 <option value="">Select Student</option>
                                 @foreach ($enquirys as $enquiry)
                                    <option value="{{ $enquiry -> first_name}}">{{ $enquiry -> first_name}}</option>
                                 @endforeach                                
                                 
                                 
                            </select> --}}
                            <select id="nameStudent" class="form-control js-custom-select" data-hs-select2-options='{
                                "placeholder": "Select Student"                                
                                    }'>
                                    <option value="">Select Student</option>
                                @foreach ($enquirys as $enquiry)
                                
                                   <option value="{{$student = $enquiry->first_name }}">{{ $student }}</option>
                                @endforeach                                
                                
                                
                           </select>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Tutor</label>
                        <div class="input-group mb-2">
                            
                            <select class="form-control js-custom-select" id="nameTutor">
                                <option>Tutor</option>
                                <option>Pepeito</option>
                                <option>Pedro</option>
                                <option>Naomi</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group col-md-12">
                        <label for="">Description</label>
                        <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="4" rows="4"></textarea>
                    </div>


                </div>
                <div class="row">
                    <div class="col">
                        <p id="alertNotNewEvent" class="text-danger" ></p>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <buton id="btnAgregar" class="btn btn-info">Add</buton>
                <buton id="btnModificar" class="btn btn-warning">Update</buton>
                <buton id="btnEliminar" class="btn btn-danger">Delete</buton>
                <buton id="btnCancelar" data-dismiss="modal" class="btn btn-secondary">Cancel</buton>

            </div>
        </div>
    </div>
</div>

<!--Popover show event-->

<!-- End Modal show event-->
<!-- validacion de formularios -->
<script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
{{-- <script src="{{ URL::asset('js/pages/form-validation.init.js')}}"></script> --}}
<script src="{{ URL::asset('js/pages/form-advanced.init.js')}}"></script>
<!-- script de funcionamiento de los select -->
<script src="{{ URL::asset('js/enrolment2/jquery-migrate.min.js')}}"></script>
{{-- <script src="{{ URL::asset('js/enrolment2/hs-toggle-state.min.js')}}"></script> --}}
<script src="{{ URL::asset('js/enrolment2/select2.full.min.js')}}"></script>
{{-- <script src="{{ URL::asset('js/enrolment2/hs-file-attach.js')}}"></script> --}}
{{-- <script src="{{ URL::asset('js/enrolment2/jquery.mask.min.js')}}"></script> --}}
{{-- <script src="{{ URL::asset('js/enrolment2/toastr.min.js')}}"></script> --}}
<script src="{{ URL::asset('js/enrolment2/hs.core.js')}}"></script>
{{-- <script src="{{ URL::asset('js/enrolment2/hs.validation.js')}}"></script> --}}
<script src="{{ URL::asset('js/enrolment2/hs.select2.js')}}"></script>
{{-- <script src="{{ URL::asset('js/enrolment2/hs.mask.js')}}"></script> --}}

<script>
$(document).on('ready', function() {
            // initialization of select2
            $('.js-custom-select').each(function() {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
</script>


@endsection