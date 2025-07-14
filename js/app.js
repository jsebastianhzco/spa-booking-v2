$(function () {

    // Color por servicio seleccionado
    $('.servicio_reserva_test').on('change', function () {
        const colorMap = {
            "1": "red",
            "2": "aqua",
            "3": "darkorange"
        };
        $('.color-bg').val(colorMap[$(this).val()] || '');
    });

    // Navegación hacia adelante
    $('.forward').on('click', function (e) {
        e.preventDefault();
        $('button.submit').show();
        $(this).hide();
    });

    // Navegación hacia atrás
    $('.backward').on('click', function (e) {
        e.preventDefault();
        $('button.submit').hide();
        $('.forward').show();
    });

    // Verificación de email
    $('.check-email').on('click', function () {
        const email = $('.email').val().trim();

        if (!email) {
            alert('Email Required');
            return;
        }

        $.post('custom/consultas.php?opc=check_email', { email_cliente: email }, function (datos) {
            if (datos == "1") {
                activarNuevoUsuario();
            } else {
                prepararFormularioExistente(email);
            }
        });
    });

    // Función para usuarios nuevos
    function activarNuevoUsuario() {
        $('form#wrapped').attr('action', 'booking_spa_new.php');
        $('.apellido, .nombre, .telefono').removeAttr('readonly').val('');
        setTimeout(() => {
            bloquearHorario('11:30');
            bloquearHorario('15:30');
        }, 0);
    }

    // Función para usuarios existentes
    function prepararFormularioExistente(email) {
        $('form#wrapped').attr('action', 'booking_spa.php');
        $('.email').val(email);
        $('.apellido, .nombre, .telefono').attr('readonly', true);

        fetchCampo(email, 'nombre', '.nombre');
        fetchCampo(email, 'apellido', '.apellido');
        fetchCampo(email, 'telefono', '.telefono');
        fetchCampo(email, 'id', '.user_id', (val) => {
            $('.quickbutton-login').attr("href", "mon-compte.php?id_cliente=" + val);
        });
    }

    // Función genérica para consultar datos por campo
    function fetchCampo(email, campo, selector, callback) {
        $.post(`custom/consultas.php?opc=check_${campo}`, { email_cliente: email }, function (datos) {
            const value = JSON.parse(datos);
            $(selector).val(value);
            if (callback) callback(value);
        });
    }

    // Función para deshabilitar horario
    function bloquearHorario(hora) {
        const boton = $(`button[table-data='${hora}']`);
        boton.css('background-color', 'red').attr('disabled', true);
    }

});
