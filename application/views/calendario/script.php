<script>

    document.addEventListener('DOMContentLoaded', function () {

        $.post('<?php echo base_url(); ?>index.php/calendario/getEventos',
                {
                    vend: document.getElementById('vend').value

                },
        function (data) {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                buttonText: {
                    today: 'Hoje',
                    month: 'Mês',
                    week: 'Semana',
                    day: 'Dia',
                    list: 'Lista'
                },
                locale: 'pt-br',
                timeZone: 'America/Sao_Paulo',
                defaultDate: new Date(),
                navLinks: true,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                //weekNumbers: true,
                weekNumbersWithinDays: true,
                weekNumberCalculation: 'ISO',
                events: $.parseJSON(data),
                eventDrop: function (event) {
                    var id = event.event.id;
                    var start = event.event.start.toISOString();
                    var end = event.event.end.toISOString();
                    if (!confirm("Tem certeza que deseja alterar a data?")) {
                        event.revert();
                    } else {
                        $.post('<?php echo base_url(); ?>index.php/calendario/updateEventos',
                                {
                                    id: id,
                                    start: start,
                                    end: end

                                },
                        function (data) {
                            if (data == 1) {
                                alert("Data alterada com sucesso");
                            }
                            else {
                                alert("ERROR.");
                            }

                        });
                    }
                },
                eventResize: function (event) {
                    var id = event.event.id;
                    var start= event.event.start.toISOString();
                    var end = event.event.end.toISOString();
                    if (!confirm("Tem certeza que deseja alterar a data?")) {
                        event.revert();
                    } else {
                        $.post('<?php echo base_url(); ?>index.php/calendario/updateEventos',
                                {
                                    id: id,
                                    start: start,
                                    end: end

                                },
                        function (data) {
                            if (data == 1) {
                                alert("Data alterada com sucesso");
                            }
                            else {
                                alert("ERROR.");
                            }

                        });
                    }
                },
                eventClick: function (info) {
//                            alert((info.event.id));
//                            $('#mtitulo').html(info.event.title);
//                            $('#mdescricao').html(info.event.description);
//                            $('#mid').html(info.event.id);
//                            $('#modalEvento').modal();
//                            id.value =info.event.id;
//                            titulo.value =info.event.title;
//                            descricao.value=info.event.description;
                    window.location.href = "<?php echo base_url(); ?>./index.php/calendario/edit/" + info.event.id;

                }
            });
            calendar.render();
        });
    });

</script>
