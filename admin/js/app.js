$(document).ready(function() {

    $("#registros").DataTable({
        "pageLength": 10,
        "lengthChange": false,
        "responsive": true,
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "language": {
            paginate: {
                next: "Siguiente",
                previous: "Anterior",
                last: "Fin",
                first: "Inicio",
                search: "Buscar"
            },
            info: "Mostrando _END_ de _TOTAL_ Resultados",
            emptyTable: "No hay registros",
            infoEmpty: "Mostrando 0 registros",
            search: "Buscar",
        }
    });
    $('#crear_registro').attr('disabled', true);

    $('#confirmar_password').on('blur', function() {
        var password_new = $('#password').val();
        if ($(this).val() == password_new) {
            $('#resultado_password').text('Yupi');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear_registro').attr('disabled', false);
        } else {
            $('#resultado_password').text('No son identicas');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-success');
        }
    });
});