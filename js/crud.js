$(function () {
    "use strict";

    // Recargar tabla al cerrar modal de edición
    $('#modal-edit-reservation-cliente').on('hidden.bs.modal', function () {
        $('#tabla-mi-cuenta').DataTable().ajax.reload(null, false); // Asume que usas ajax para cargar la tabla
    });

    // Inicializar DataTable
    $('#tabla-mi-cuenta').DataTable({
        order: [[0, "desc"]],
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ éléments",
            info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            infoEmpty: "Affichage de l'élément 0 à 0 sur 0 éléments",
            infoFiltered: "(filtré de _MAX_ éléments au total)",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun élément à afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Précédent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });

    $('.set_pass').hide();

    // Eliminar reserva
    $('.borrar_reserva').click(function () {
        const id_reserva = $(this).attr("id");

        if (confirm('Êtes-vous sûr de supprimer votre réservation? Cette action est irréversible.')) {
            $.post("custom/mon-compte.php?opc=borrar_reserva", { id_reserva })
                .done(() => {
                    setTimeout(() => location.reload(), 1000);
                });
        }
    });

    // Abrir modal y cargar datos de reserva
    $('.editar_reserva_cliente').click(function (e) {
        e.preventDefault();
        const id_reserva = this.id;

        $.post("custom/mon-compte.php?opc=edit_reserva_cliente_detalles", { id_reserva }, function (datos) {
            const obj = JSON.parse(datos);
            $('.hora_reserva').val(obj.hora);
            $('.fecha_reserva_cliente').val(obj.fecha_reserva);
            $('#service-reserva-update').val(obj.title);
            $('#modal-edit-reservation-cliente').modal('show');
        });
    });

    // Guardar cambios en reserva
    $('.edit_reserva_btn_cliente').click(function (e) {
        e.preventDefault();

        const id_reserva = $('.editar_reserva_cliente').attr('id');
        const fecha_reserva = $('.fecha_reserva_cliente').val();
        const hora = $('.hora_reserva').val();
        const title = $('#service-reserva-update').val();

        if (!fecha_reserva || !hora || !title) {
            alert("Tous les champs sont obligatoires.");
            return;
        }

        const datos = {
            id_reserva,
            hora,
            fecha: fecha_reserva,
            title,
            start: `${fecha_reserva}T${hora}`,
            end: `${fecha_reserva}T${hora}`
        };

        $.post("custom/mon-compte.php?opc=edit_reserva_cliente", datos, function () {
            alert("Données modifiées avec succès");
            location.reload();
        });
    });
});
