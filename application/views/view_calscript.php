    <script> /* Funcion Calendario */
        $(document).ready(function(){
            const SITEURL  = '<?= base_url() ?>';
            const USERNAME = '<?= $this->session->userdata('username') ?>';
            const IDCLI    = '<?= $this->session->userdata('id') ?>';
            $('#calendar').fullCalendar({
                // CONFIGURAMOS EL CALENDARIO
                //plugins: [ momentPlugin ],
                // Titulos
                header: {
                    left: 'prev,next today',          // 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek,agendaDay'     // 'month,basicWeek,basicDay, agendaWeek,agendaDay'
                },
                defaultView: 'agendaWeek',            // Vista por defecto
                // defaultDate: '2020-02-12',
                navLinks: true,                       // can click day/week names to navigate views
                // Eventos
                selectable: true,
                editable: true,
                eventStartEditable: (USERNAME == 'admin') ? true : false,
                eventDurationEditable: (USERNAME == 'admin') ? true : false,
                allDaySlot: false,
                forceEventDuration: true, 
                defaultTimedEventDuration:'00:45:00', // forsamos la duracion del evento a 30min
                slotDuration: '00:55:00',             // Mostramos citas cada 15min
                minTime: '16:00:00',                  // Citas disponibles a partir de las 16:00
                maxTime: '19:15:00',                  // hasta las 19:15
                
                businessHours: {                      //  Preparo los dias y horas que atiendo
                    start: '16:00',
                    end: '19:00',
                    dow: [1, 2, 3, 4],                // 0=Dom, 1=Lun, 2=Mar, 3=Mie, 4=Jue, 5=Vie y 6=Sab
                },  
                hiddenDays: [ 0, 5, 6 ],              // Oculto los dias que no doy citas

                events: SITEURL+'Agenda/load',        /* EVENTOS (Cargamos los eventos en formato JSON) */

                select: function(startDate, endDate, jsEvent, view) {
                    var title = USERNAME;
                    var idcliente = IDCLI;
                    var start = startDate.format();
                    var end = endDate.format();
                    var diaSemana = new Date(start);
                    var consultorio = ((diaSemana.getDay() == 1) || (diaSemana.getDay() == 3)) ? 'VILLA BALLESTER' : 'BUENOS AIRES';
                    var descripcion = 'Cita para el dia: '+start+' En el consultorio de: '+consultorio; 
                    if (confirm('Va a pedir una cita,\npara el consultorio de:\n'+consultorio)){ 
                    $.ajax({  // Enviamos los datos a la base de datos
                        url: SITEURL+'Agenda/insertar',
                        type: 'POST',
                        data: {title:title, start:start, end:end, description:descripcion, idcliente:idcliente},
                        success: function(arg){ // SI tiene exito el alta añadimos el evento en el calendario
                            $('#calendar').fullCalendar('renderEvent',{ // Añadimos evento dinamicamente
                                title: title,
                                start: start,
                                end: end,
                                description: descripcion,
                                color: '#9a5680',
                                textcolor: '#000000'
                            });
                            alert('La cita se ha añadido correctamente');
                            // ver la manera de enviar mail, pasando una URL o hacerlo directamente
                            // en el controler insert
                        },
                        error: function (jqXHR, textStatus, errorThrown){
                            alert(textStatus+' '+errorThrown);
                        }
                    }) // fin ajax
                    }                      
                }, // Fin Evento Select

                eventClick: function(event){
                    if((event.title == USERNAME)||(USERNAME == 'admin')){
                        if(confirm("¿Seguro que desea eliminar la cita?")){
                            eliminarEvento(event.id);
                        };              
                    }else{
                    alert('Ud no tiene Permiso para eliminar esta cita');
                    };
                }, // Fin EventClick

                eventDrop: function(event, delta, revertFunc) {
                    alert('Va a modificar la cita de: '+event.title + '\nA la fecha: '+ event.start.format());
                    if (!confirm("Está seguro de este cambio?")) {
                        revertFunc();
                    }else{
                        modEvento(event);
                    };
                }

            }); // Fin Calendar

            function eliminarEvento(id){
                $.ajax({
                    url: SITEURL+'Agenda/borrar',
                    type:"POST",
                    data:{id:id},
                    success: function(){
                        $('#calendar').fullCalendar('removeEvents', id);
                        alert("Cita eliminada correctamente");
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        alert(textStatus+' '+errorThrown);
                    },
                });
            };

            function modEvento(evento){
                var id = evento.id;
                var title = evento.title;
                var idcliente = evento.idcliente;
                var start = evento.start.format();
                var end = evento.end.format();
                var descripcion = 'Modificada por '+USERNAME+'. Nota Anterior: '+evento.description; 
                $.ajax({
                    url: SITEURL+'Agenda/modificar',
                    type:"POST",
                    data: {id:id, title:title, start:start, end:end, description:descripcion, idcliente:idcliente},
                    success: function(){
                        alert("Cita Modificada correctamente");
                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        alert(textStatus+' '+errorThrown);
                    },
                });                
            }

        })
    </script>