$(document).ready(function() {

    $('#login-admin').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    let timerInterval;
                    Swal.fire({
                        title: 'Inicio de Sesión Exitoso!',
                        icon: 'success',
                        html: 'Redireccionando... <b></b>',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then(function() { window.location = "adminArea.php"; });
                } else {
                    Swal.fire({
                        title: 'Hubo un error al Iniciar Sesión',
                        icon: 'error'
                    });
                }
            }
        })
    });


});