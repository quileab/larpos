//$(document).ready(function() {
$(".btn-delete").click(function(event) {
    event.preventDefault();
    var delete_data = $(this),
        url = delete_data.attr("href"),
        title = delete_data.attr("title"),
        csrf_token = $('meta[name="csrf-token"]').attr("content");

    swal({
        title: "¿Confirma la Eliminación?",
        text: title,
        icon: "warning",
        dangerMode: true,
        buttons: {
            cancel: "Cancelar",
            confirm: "Eliminar"
        }
    }).then(result => {
        if (result) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: csrf_token
                },
                success: function(response) {
                    swal({
                        icon: "success",
                        title: "Eliminado !",
                        text: title + ", fué eliminado."
                    });
                    location.reload();
                },
                error: function(xhr) {
                    swal({
                        icon: "error",
                        title: "Error",
                        text: title + ", No pudo eliminarse."
                    });
                }
            });
            //location.reload();
        }
    });
});
//});
