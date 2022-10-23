
(function() {
    "use strict";
    var regalo = document.getElementById('regalo');

    document.addEventListener('DOMContentLoaded', function() {

        //campos de formulario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');
        var errorDiv = document.getElementById('error');
         //campos Pases
         var pase_dia = document.getElementById('pase_dia');
         var pase_completo = document.getElementById('pase_completo');
         var pase_2dias = document.getElementById('pase_2dias');

         var calcular = document.getElementById('calcular');
         var btnRegistro = document.getElementById('btnRegistro');
         var lista_productos = document.getElementById('lista-productos');
         var suma = document.getElementById('suma-total');
 
         //extras 
         var camisas = document.getElementById('camisa_evento');
         var etiquetas = document.getElementById('etiquetas');

         btnRegistro.disabled = true;

            nombre.addEventListener('blur', validarCampos);
            apellido.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarCampos);
            email.addEventListener('blur', validarMail);

            pase_dia.addEventListener('blur', mostrarDias);
            pase_2dias.addEventListener('blur', mostrarDias);
            pase_completo.addEventListener('blur', mostrarDias);

            //Validar
            function validarCampos() {
                if (this.value == '') {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "Este campo no puede estar vacio";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                } else {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                }
            }

            function validarMail() {
                if (this.value.indexOf("@") > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                } else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "El Email no es valido";
                    this.style.border = '1px solid red';
                    errorDiv.style.border = '1px solid red';
                }
            }

            function mostrarDias() {
                var boletosDia = parseInt(pase_dia.value, 10) || 0,
                    boletos2Dias = parseInt(pase_2dias.value, 10) || 0,
                    boletosCompleto = parseInt(pase_completo.value, 10) || 0;

                var diasElegidos = [];

                if (boletosDia > 0) {
                    diasElegidos.push('viernes');
                    console.log(diasElegidos);
                }
                if (boletos2Dias > 0) {
                    diasElegidos.push('viernes', 'sabado');
                    console.log(diasElegidos);
                }
                if (boletosCompleto > 0) {
                    diasElegidos.push('viernes', 'sabado', 'domingo');
                    console.log(diasElegidos);
                }
                for (var i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display='block';
                }
            }
            
            calcular.addEventListener('click', calcularMontos);

            function calcularMontos(event) {
                event.preventDefault();
                if (regalo.value === '') {
                    alert("Debes Elegir un Regalo");
                    regalo.focus();
                } else {
                    var boletosDia = parseInt(pase_dia.value, 10) || 0,
                        boletos2Dias = parseInt(pase_2dias.value, 10) || 0,
                        boletosCompleto = parseInt(pase_completo.value, 10) || 0,
                        cantCamisas = parseInt(camisas.value, 10) || 0,
                        cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

                    var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletosCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

                    var listadoProductos = [];

                    if (boletosDia >= 1) {
                        listadoProductos.push(boletosDia + ' Pases por día');
                    }
                    if (boletos2Dias >= 1) {
                        listadoProductos.push(boletos2Dias + ' Pases por 2 dias');
                    }
                    if (boletosCompleto >= 1) {
                        listadoProductos.push(boletosCompleto + ' Pase Completo');
                    }
                    if (cantCamisas >= 1) {
                        listadoProductos.push(cantCamisas + ' Camisas');
                    }
                    if (cantEtiquetas >= 1) {
                        listadoProductos.push(cantEtiquetas + ' Etiquetas');
                    }
                    lista_productos.style.display = 'block';
                    lista_productos.innerHTML = '';

                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                    }

                    suma.innerHTML = "$ " + totalPagar.toFixed(2);

                    btnRegistro.disabled = false;
                    document.getElementById('total_pedido').value = totalPagar;
                }
            }

    }); //DOM content loaded

})();

$(function() {

    //lettering
    $('.nombre-sitio').lettering();

    //menu fijo
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraAltura + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    });


    //Menu responsive
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    })

    //Talleres-conferencias-seminarios tabs
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(800);
        return false;
    });

    //animaciones para numeros de eventos
    var resumenLista = jQuery('.resumen-evento');
    if (resumenLista.length > 0) {
        $('.resumen-evento').waypoint(function() {
            $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500);
            $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9 }, 1500);
        }, {
            offset: '60%'
        });
    }

    // enlace menu menu activo
    $(".navegacion-principal a").each(function() {
        if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
            $(this).addClass('activoMenu');
        }
    });

    //animaciones para el countdown
    $('.cuenta-regresiva').countdown('2021/12/10 09:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    //colorbox - invitados
    $('.invitado-info').colorbox({ inline: true, width: "50%" });
    $('.boton_newsletter').colorbox({ inline: true, width: "50%" });
});