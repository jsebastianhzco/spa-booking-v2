$(function () {
    "use strict";

    const validarHoraAjax = (hora, fecha) => {
        $.post("custom/consultas.php?opc=validar_hora_ajax", {
            hora_reserva: hora,
            dates: fecha
        }, function (response) {
            const mensaje = JSON.parse(response);
            $('.error-mensaje').text(mensaje);
        });
    };

    const bloquearHorasOcupadas = (fecha) => {
        $.post("custom/consultas.php?opc=validar_hora_ajax2", { fecha }, function (response) {
            const obj = JSON.parse(response);

            // Primero resetear todos los botones
            $('button.tabla').prop('disabled', false).css('backgroundColor', '#28a745');

            if (obj.length > 0) {
                obj.forEach(item => {
                    ["hora", "hora2", "hora3", "hora4"].forEach(h => {
                        const hora = item[h];
                        if (hora) {
                            $(`button[table-data="${hora}"]`).css('backgroundColor', 'red').attr('disabled', true);
                        }
                    });
                });
            }
        });
    };

    // Al seleccionar fecha
    $('input[name="dates"]').on('hide.daterangepicker', function () {
        const fecha = $('.fecha_reserva').val();
        bloquearHorasOcupadas(fecha);

        const hora = $('.hora_reserva').val();
        if (fecha) validarHoraAjax(hora, fecha);
    });

    // Al abrir el calendario
    $('input[name="dates"]').on('show.daterangepicker', function () {
        const fecha = $('.fecha_reserva').val();
        const hora = $('.hora_reserva').val();

        if (fecha) validarHoraAjax(hora, fecha);
    });

    // Al esconder el calendario (evento propio del plugin)
    $('input[name="dates"]').on('hideCalendar.daterangepicker', function () {
        const fecha = $('.fecha_reserva').val();
        const hora = $('.hora_reserva').val();
        if (fecha) validarHoraAjax(hora, fecha);
    });

    // Al mostrar calendario completo
    $('input[name="dates"]').on('showCalendar.daterangepicker', function () {
        const fecha = $('.fecha_reserva').val();

        if (fecha) {
            $.get(`horarios-disponibles.php?fecha=${fecha}`, function (data) {
                $(".horarios-response").html(data);
            });

            const hora = $('.hora_reserva').val();
            validarHoraAjax(hora, fecha);
        }
    });

    // Clic sobre botón de horario
    $(document).on('click', '.tabla', function (e) {
        e.preventDefault();
        const hora = $(this).attr('table-data');
        const fecha = $('.fecha_reserva').val();

        $('.hora_reserva').val(hora);

        bloquearHorasOcupadas(fecha);

        $('.servicio_reserva_test').trigger('change');
    });
});
