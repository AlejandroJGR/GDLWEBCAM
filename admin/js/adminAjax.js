$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario Creado',
                        showConfirmButton: true,
                    }).then(function() { window.location = "admin-lista.php" });
                } else {
                    Swal.fire({
                        title: 'Hubo un error',
                        icon: 'error'
                    })
                }
            }
        });
    });

    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    data: {
                        id: id,
                        registro: 'eliminar'
                    },
                    url: 'modelo-' + tipo + '.php',
                    success: function(data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
                            $('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: '¡No se pudo eliminar el registro!'
                            })
                        }
                    }
                });
            }
        });
    });


});