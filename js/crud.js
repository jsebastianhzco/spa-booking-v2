$(function () {



  

    $('#modal-edit-reservation-cliente').on('hidden.bs.modal', function () {

        $('#tabla-mi-cuenta').load();

    });



  

	$('#tabla-mi-cuenta').DataTable({



		"order": [[ 0, "desc" ]],



language: {



	processing: "Traitement en cours...",



	search: "Rechercher&nbsp;:",



	lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",



	info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",



	infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",



	infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",



	infoPostFix: "",



	loadingRecords: "Chargement en cours...",



	zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",



	emptyTable: "Aucune donnée disponible dans le tableau",



	paginate: {



		first: "Premier",



		previous: "Pr&eacute;c&eacute;dent",



		next: "Suivant",



		last: "Dernier"



	},



	aria: {



		sortAscending: ": activer pour trier la colonne par ordre croissant",



		sortDescending: ": activer pour trier la colonne par ordre décroissant"



	}



}



});









//$(".table").DataTable();



    $('.set_pass').hide();



    $('.borrar_reserva').click(function() {
        var id_reserva = $(this).attr("id");

        if (confirm('Êtes-vous sûr de supprimer votre réservation? cette action est irréversible.')) {
            $.ajax({
                type: "post",
                url: "custom/mon-compte.php?opc=borrar_reserva",
                data: { id_reserva: id_reserva }
            }).done(function() {
                setTimeout(function() {
                    location.reload(); // Segunda recarga de la página después de un retraso
                }, 1000); // Retraso de 1000 milisegundos (1 segundo)
            });
        }
    });



    $('.editar_reserva_cliente').click(function (e) {

        e.preventDefault();

        var id_reserva = this.id;



        $.ajax({



            type: "post",



            url: "custom/mon-compte.php?opc=edit_reserva_cliente_detalles",



            data: {



                id_reserva: id_reserva



            },



            success: function (datos) {







                //console.log(datos);

                var json = datos;

                var obj = JSON.parse(json);



                //console.log(obj.fecha);

                //console.log(obj.id_reserva);

                //console.log(obj.hora);

                //console.log(obj.title);

                

                $('.hora_reserva').attr("value", obj.hora);

                $('.fecha_reserva_cliente').val(obj.fecha_reserva);

                $('#service-reserva-update').val(obj.title);

                $('#modal-edit-reservation-cliente').modal('show');







            }



        });







    });



    $('.edit_reserva_btn_cliente').click(function (e) { 

        e.preventDefault();



        let fecha_reserva = $('.fecha_reserva_cliente').val();

        let hora =  $('.hora_reserva').val();

        let id_reserva = $('.editar_reserva_cliente').attr('id')

        



        

        let datos = {

            hora : $('.hora_reserva').val(),

            fecha_reserva : $('.fecha_reserva_cliente').val(),

            title :$('#service-reserva-update').val(),

            start :fecha_reserva + "T"+ hora,

            end : fecha_reserva + "T"+ hora

            

        }





        





        if(fecha_reserva == ""){

            





        }else{

            $.ajax({

                type: "post",

                url: "custom/mon-compte.php?opc=edit_reserva_cliente",

                data: {

                    id_reserva : id_reserva,

                    hora : datos.hora,

                    fecha : datos.fecha_reserva,

                    title : datos.title,

                    start : datos.start,

                    end : datos.end





                },

                success : function(){







                    $.ajax({



                        type: "post",

            

                        url: "custom/mon-compte.php?opc=edit_reserva_cliente_detalles",

            

                        data: {

            

                            id_reserva: $('.editar_reserva_cliente').attr('id')

            

                        },

            

                        success: function (datos) {

            
                            
            alert("données modifiées avec succès");
            location.reload();
            

                            //console.log(datos);

                            var json = datos;

                            var obj = JSON.parse(json);

            

                            //console.log(obj.fecha);

                            //console.log(obj.id_reserva);

                            //console.log(obj.hora);

                            //console.log(obj.title);

                            

                            $('.hora_reserva').attr("value", obj.hora);

                            $('.fecha_reserva_cliente').val(obj.fecha_reserva);

                            $('#service-reserva-update').val(obj.title);

       

            

            

            

                        }

            

                    });













                }

            });

        }









    });



































});