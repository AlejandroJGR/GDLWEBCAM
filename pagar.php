<?php 

if(!isset($_POST['submit'])){
    exit('Hubo un Error');
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

require 'includes/paypal.php';

if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');
    
    //pedidos
    $boletos= $_POST['boletos'];
    $numero_boletos=$boletos;

    $camisas = $_POST['pedido_extra']['camisas']['cantidad'];
    $precio_camisas=$_POST['pedido_extra']['camisas']['precio'];

    $etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
    $precio_etiquetas=$_POST['pedido_extra']['etiquetas']['precio'];

    $pedidosExtra= $_POST['pedido_extra'];

    include_once 'includes/funciones/funciones.php'; 
    $pedido= productos_json($boletos, $camisas, $etiquetas);

    //eventos
    $eventos=$_POST['registro'];
    $registro= eventos_json($eventos); 

    try{
        require_once('includes/funciones/bd_conexion.php');
        $stmt=$conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
        $stmt->execute();
        $id_registro=$stmt->insert_id;
        $stmt->close();
        $conn->close();
        //header('Location: validar_registro.php?exitoso=1');
    } catch(\Exception $e){
        echo $e->getMessage();
    }
}


$compra= new Payer();
$compra->setPaymentMethod('paypal');

$arreglo_pedido=array();
$i=0;
$totalBoletos=0;
$totalExtras=0;

foreach ($numero_boletos as $key => $value) {
    if ((int) $value['cantidad'] > 0) {
        ${"articulo$i"} = new Item();
        $arreglo_pedido[]=${"articulo$i"};
        ${"articulo$i"}->setName('Pase: '.$key)
                       ->setCurrency('USD')
                       ->setQuantity((int) $value['cantidad'])
                       ->setPrice( $value['precio']);
        $totalBoletos += (int) $value['cantidad'] * (int) $value['precio'];
       $i++;
    }
}

foreach ($pedidosExtra as $key => $value) {
    if ((int) $value['cantidad'] > 0) {
        if ($key=='camisas') {
            $precio=(int) $value['precio']*.93;
        }else{
            $precio= (int) $value['precio'];
        }
        ${"articulo$i"} = new Item();
        $arreglo_pedido[]=${"articulo$i"};
        ${"articulo$i"}->setName('Extras: '.$key)
                       ->setCurrency('USD')
                       ->setQuantity((int) $value['cantidad'])
                       ->setPrice($precio);
        $totalExtras += (int) $value['cantidad'] * $precio;
       $i++;
    }
}

$listaArticulos= new ItemList();
$listaArticulos->setItems($arreglo_pedido);
$total=$totalBoletos+$totalExtras;

$totalAmount = new Amount();
$totalAmount->setCurrency('USD')
->setTotal($total);

$transaccion=new Transaction();
$transaccion->setAmount($totalAmount)
->setItemList($listaArticulos)
->setDescription('Pago GDLWEBCAMP')
->setInvoiceNumber($id_registro);


$redireccionar=new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$id_registro}")
->setCancelUrl(URL_SITIO . "/pago_finalizado.php?&id_pago={$id_registro}");


$pago= new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));
   
     try {
         $pago->create($apiContext);
        } catch (PayPal\Exception\PayPalConnectionException $pce) {
            echo '<pre>';
            print_r(json_decode($pce->getData()));
            echo '</pre>';
            exit;
        }
        
        $aprobado = $pago->getApprovalLink();
    
header("Location: {$aprobado}");

?>