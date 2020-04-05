    <script> /* Funcion Calendario */

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
      
          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            // defaultDate: '2020-02-12',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            locale: 'es',
            editable: true,
            eventLimit: true, // allow "more" link when too many events

            events: <?= $data ?>, /* EVENTOS */

            select: function(arg)
            {
              var title = '<?= $this->session->userdata('username') ?>';
              var idcliente = '<?= $this->session->userdata('id') ?>';
              var start = arg.start;
              var end = arg.end;
              var descripcion = prompt("Breve descripción");
              alert('hola');
              //prompt(start);
              $.ajax({
                url: '<?= base_url() ?>Agenda/insertar',
                type: 'POST',
                data: {title:title, start:start, end:end, descripcion:descripcion, idcliente:idcliente},
                success:function()
                {
                  calendar.fullCalendar('refetchEvents');
                  alert("Added Successfully");
                }
              })
            },

          });
      
          calendar.render();
        });
      
    </script>