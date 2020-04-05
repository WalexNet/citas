    <script> /* Funcion Calendario */
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
        header: {
          left: 'prev,next today', // 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        defaultView: 'timeGridWeek',
        // defaultDate: '2020-02-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: false,
        selectMirror: true,
        locale: 'es',
        businessHours: {
            startTime: '16:00',
            endTime: '19:00',
            daysOfWeek: [2, 4], // 0=Dom, 1=Lun, 2=Mar, 3=Mie, 4=Jue, 5=Vie y 6=Sab
        },
        selectConstraint: 'businessHours',
        defaultTimedEventDuration:'00:15:00',
        editable: true,
        eventLimit: true, // allow "more" link when too many events

        events: <?= $data ?>, /* EVENTOS */
      
        select: function(arg)
        {
          var SITEURL = '<?= base_url() ?>';
          var title = '<?= $this->session->userdata('username') ?>';
          var idcliente = '<?= $this->session->userdata('id') ?>';
          var start = arg.startStr;
          var end = arg.endStr;
          var descripcion = prompt("Breve descripción");
          
          if (descripcion){ 
            $.ajax({
              url: SITEURL+'Agenda/insertar',
              type: 'POST',
              data: {title:title, start:start, end:end, description:descripcion, idcliente:idcliente},
              success: function(arg)
              {
                calendar.addEvent({
                  title: title,
                  start: start,
                  end: end,
                  description: descripcion,
                  color: '#9a5680',
                  textcolor: '#000000'
                }),
                alert('El registro se ha añadido correctamente');
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert(textStatus+' '+errorThrown);
              }
            }) // fin ajax
          }
        },

        eventClick: function(info) {
          alert('Event: ' + info.event.title + ' Desc: '+info.event.description);
          alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
          alert('View: ' + info.view.type);

          // change the border color just for fun
          //info.el.style.borderColor = 'red';
        },

        dateClick: function(info) {
          alert('Clicked on: ' + info.date);
          alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
          alert('Current view: ' + info.view.type);
          // change the day's background color just for fun
          // info.dayEl.style.backgroundColor = 'red';
        }
        

      });
  
          calendar.render();
    </script>