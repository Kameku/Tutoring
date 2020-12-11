@extends('layouts.master')

@section('title') Calendar @endsection

@section('css')
<!-- Plugin css -->
<link rel="stylesheet" href="{{asset('fullcalendar/core/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/daygrid/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/list/main.css')}}">
<link rel="stylesheet" href="{{asset('fullcalendar/timegrid/main.css')}}">
<link rel="stylesheet" href="{{asset('toastr/css/toastr.min.css')}}">

@endsection

@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

    @component('common-components.breadcrumb')
         @slot('title') Calendar  @endslot
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
<script src="{{asset('toastr/js/toastr.min.js')}}"></script>
<script src="https://kit.fontawesome.com/ced421920a.js" crossorigin="anonymous"></script>
<script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],
                timeZone: 'UTC',
                

                

                //Muestra la cabecera del calendario(next, hoy, mes, semana y dia)
                header: {
                    left: 'prev,next today Miboton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'

                },
                //boton personalizable
                customButtons: {
                    Miboton: {
                        text: "Botón",
                        click: function () {
                            //alert("Hola mundo");                            
                            $('#exampleModal').modal('toggle');
                        }
                    }
                },//fin boton personalizable (, borrar si quita el bloque)

                //bloque para click en el dia, al hacer click hace alguna funcion (ej: modal, debe existir la referencia a interection/main.js )
                dateClick:function(info){
                    limpiarFormulario();
                    $('#txtFecha').val(info.dateStr); //asignado el valor de la fecha en este campo

                    $('#btnAgregar').show(false);
                    $('#btnModificar').hide(true);
                    $('#btnEliminar').hide(true);


 

                    $('#exampleModal').modal();
                    //console.log(info);
                    //calendar.addEvent({title:"Evento x", date: info.dateStr});
                },
                //funcion click en el evento 
                eventClick:function(info){
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

                $('#txtID').val(info.event.id);
                $('#txtTitulo').val(info.event.title);

                mes = (info.event.start.getMonth()+1);
                dia = (info.event.start.getDate());
                anio = (info.event.start.getFullYear());

                mes=(mes<10)?"0"+mes:mes;
                dia=(dia<10)?"0"+dia:dia;

                minutos=info.event.start.getMinutes();
                hora=info.event.start.getHours();
                
                minutos=(minutos<10)?"0"+minutos:minutos;
                hora=(hora<10)?"0"+hora:hora;

                horario = (hora+":"+minutos);



                $('#txtFecha').val(anio+"-"+mes+"-"+dia);
                $('#txtHora').val(horario);
                $('#txtColor').val(info.event.backgroundColor);
                $('#txtDescripcion').val(info.event.extendedProps.descripcion);
                
                $('#exampleModal').modal();


                 },
                //agregar evento (datos del evento).s
                
                events:"{{ url('events/show') }}"


            });
            //calendar.setOption('locale','En');
            calendar.render();
            


            $('#btnAgregar').click(function(){
               objEvento=recolectarDatosGUI("POST");
                EnviarInformacion('',objEvento);
            });

            $('#btnEliminar').click(function(){
               objEvento=recolectarDatosGUI("DELETE");
                EnviarInformacion('/'+$('#txtID').val(),objEvento);
            });

            $('#btnModificar').click(function(){
               objEvento=recolectarDatosGUI("PATCH");
                EnviarInformacion('/'+$('#txtID').val(),objEvento);
            });


            function recolectarDatosGUI(method) {
                nuevoEvento={
                    id:$('#txtID').val(),
                    title:$('#txtTitulo').val(),
                    descripcion:$('#txtDescripcion').val(),
                    color:$('#txtColor').val(),
                    textColor:'#ffffff',
                    start:$('#txtFecha').val()+" "+$('#txtHora').val(),
                    end:$('#txtFecha').val()+" "+$('#txtHora').val(),
                    '_token':$("meta[name='csrf-token']").attr("content"),
                    '_method':method
                }
                return (nuevoEvento);
                
            }
            function EnviarInformacion(accion,objEvento){
                $.ajax({
                    type:"POST",
                    url:"{{url('/events')}}"+accion,
                    data:objEvento,
                    success:function(msg){ 
                            console.log(msg);                            
                            $('#exampleModal').modal('toggle');// hace que se desaparezca el modal
                            calendar.refetchEvents();//actualizar o refrescar los eeventos
                            

                    
                    },
                    error:function(){
                        alert("Hay un error");
                    }

                });

            }

            //limpiar formulario
            function limpiarFormulario(){
                $('#txtID').val("");
                $('#txtTitulo').val("");
                $('#txtFecha').val("");
                $('#txtHora').val("06:00");
                $('#txtColor').val("");
                $('#txtDescripcion').val("");
            }

            
        });

    </script>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-calendar"></i> Event title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-row">

                    
                    <input type="hidden" name="txtID" id="txtID">
                    

                    <div class="form-group col-md-6">
                        <label for="">Date</label>
                        <input class="form-control" type="text" name="txtFecha" id="txtFecha">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="">Hour</label>
                        <input class="form-control" type="time" min="06:00" max="21:00" step="600" name="txtHora" id="txtHora">
                    </div>
                    <div class="form-group col-md-8">
                    <label for="">Title Event</label>
                    <input class="form-control" type="text" name="txtTitulo" id="txtTitulo">
                    </div>

                    <div class="form-group col-md-4">
                    <label for="">Color Event</label>
                    <input class="form-control" type="color" name="txtColor" id="txtColor">
                    </div>
                    <div class="form-group col-md-12">
                    <label for="">Description</label>
                    <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="4" rows="4"></textarea>    
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

    
@endsection

                                   
                    

                    
                    

                    

