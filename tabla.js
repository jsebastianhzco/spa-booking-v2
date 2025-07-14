$(document).ready(function () {
  cargarDatosUsuario();
});

function cargarDatosUsuario() {
  $.ajax({
    type: "POST",
    url: "mon-compte.php",
    dataType: "html",
    success: function (respuesta) {
      $(".datos-usuarios").html(respuesta);
    },
    error: function (xhr, status, error) {
      console.error("Erreur lors du chargement des données utilisateur:", status, error);
      $(".datos-usuarios").html("<p>Une erreur s'est produite lors du chargement des données. Veuillez réessayer plus tard.</p>");
    }
  });
}
