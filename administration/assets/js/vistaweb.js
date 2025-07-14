$(document).ready(function () {
    $('#firma').focus(function (e) { 


        setInterval(function () {
        $("#firma").addClass('datepicker');
        $('#firma').attr('data-toggle', 'flatpickr'); }, 0 );

    
    });



    $( ".view-pass" )
    .mouseup(function() {
        $("#pass").attr('type' , 'password');
    })
    .mousedown(function() {
        $("#pass").attr('type' , 'text');
    });


});


