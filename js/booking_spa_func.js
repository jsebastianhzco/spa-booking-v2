	jQuery(function ($) {

		let fecha = new Date();
	
		let hoy = fecha.getDate();
		let mes_actual = fecha.getMonth() + 1;
		let year_actual = fecha.getFullYear();
		let dia_actual = fecha.getDay();

		//console.log(year_actual  +"-"+ mes_actual +"-"+ dia_actual);



	    "use strict";
	   
	    $("#wizard_container").wizard({
	        stepsWrapper: "#wrapped",
	        submit: ".submit",
	        beforeSelect: function (event, state) {
	            if ($('input#website').val().length != 0) {
	                return false;
	            }
	            if (!state.isMovingForward)
	                return true;
	            var inputs = $(this).wizard('state').step.find(':input');
	            return !inputs.length || !!inputs.valid();
	        }
	    }).validate({
	        errorPlacement: function (error, element) {
	            if (element.is(':radio') || element.is(':checkbox')) {
	                error.insertBefore(element.next());
	            } else {
	                error.insertAfter(element);
	            }
	        }
	    });
	    //  progress bar
	    $("#progressbar").progressbar();
	    $("#wizard_container").wizard({
	        afterSelect: function (event, state) {
	            $("#progressbar").progressbar("value", state.percentComplete);
	            $("#location").text("(" + state.stepsComplete + "/" + state.stepsPossible + ")");
	        }
	    });
	    // validate select
	    $('#wrapped').validate({
	        ignore: [],
	        rules: {
	            select: {
	                required: true
	            }
	        },
	        errorPlacement: function (error, element) {
	            if (element.is('select:hidden')) {
	                error.insertAfter(element.next('.nice-select'));
	            } else {
	                error.insertAfter(element);
	            }
	        }
	    });
	    // date picker
	    
	
		var global_festivos;
		let global_exceptions;	

		$.post( "custom/consultas.php?opc=get_holidays", function( holidays ) {	



			let fecha = new Date();
	
			let hoy = fecha.getDate();
			let mes_actual = fecha.getMonth() + 1;
			let year_actual = fecha.getFullYear();
			let dia_actual = fecha.getDay();
	
			//console.log(hoy);
			//console.log("el de test " + year_actual  + "-" + mes_actual +"-"+ hoy);

			
			global_festivos = JSON.parse(holidays);			
			
			let fechaActual = {
				fecha : year_actual +"-"+mes_actual+"-"+hoy
			}


			global_festivos.push(fechaActual);
			//console.log(global_festivos);
			
			
		});	 


		$.post( "custom/consultas.php?opc=get_exceptions", function( exceptions ) {			
			global_exceptions = JSON.parse(exceptions);			
			//console.log(global_festivos);
		});	 




		$('input[name="dates"]').daterangepicker({

			isInvalidDate: function(date) {

				var fecha = date.format('YYYY-MM-DD');
				var festivos = global_festivos;
				var dia = date.day();
				var workday = global_exceptions;

				let desbloquear = workday.findIndex(x => x.fecha === fecha);
				if(desbloquear == -1 && dia == 0) {
					return true;
				}

				if(desbloquear == -1 && dia == 3) {
					return true;
				}

				if(desbloquear == -1 && dia == 5) {
					return true;
				}

				if(desbloquear == -1 && dia == 6) {
					return true;
				}


				


					for (var i = 0; i < festivos.length; i++) {

			
					if (fecha == festivos[i].fecha) {
						return true;
					}
			
				}
			},
			dateFormat: 'YYYY-MM-DD',
			autoUpdateInput: false,
			singleDatePicker: true,
			minYear: '2021',
			maxYear: '2022',

	        locale: {
	            cancelLabel: 'Clear'
	        },

			}, function(start) {
			




			var fecha_consulta = ((start).format('YYYY-MM-DD'));

			$.ajax({
				type: "post",
				url: "custom/consultas.php?opc=validarDateForm",
				data: {
					fecha_consulta : fecha_consulta
				},
				
				success: function (data) {
					
				}

			});


		  }
			
		);
		
	    $('input[name="dates"]').on('apply.daterangepicker', function (ev, picker) {
	        $(this).val(picker.startDate.format('YYYY-MM-DD'));
	    });

		$('input[name="dates"]').on('cancel.daterangepicker', function (ev, picker) {
			$(this).val('');
	    });

	});