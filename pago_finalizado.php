<?php include_once 'includes/templates/header.php'; 

use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
use PayPal\Rest\ApiContext;

require 'includes/paypal.php';
?>

<section class="seccion contenedor">
  <h2>Resumen Registro</h2>
      <?php
          $paymentId=$_GET['paymentId'];
          $id_pago=$_GET['id_pago'];
          $pago= Payment::get($paymentId, $apiContext);
          $execution = new PaymentExecution();
          $execution->setPayerId($_GET['PayerID']);
          $resultado=$pago->execute($execution, $apiContext);

          $respuesta=$resultado->transactions[0]->related_resources[0]->sale->state;

          if($respuesta == "completed"):
            require_once('includes/funciones/bd_conexion.php');
            $pagado=1;
            $stmt=$conn->prepare("UPDATE registrados SET pagado = ? where id_registrado = ?");
            $stmt->bind_param("ii", $pagado, $id_pago);
            $stmt->execute();
            $stmt->close();
            $conn->close();
      ?>


      <div class='resultado correcto'>
        <h4>El pago fue realizado con exito</h4>
          <span>ID <?php echo $paymentId;?></span>
      </div>
            <?php else:
              echo"<div class='resultado error'>";
                echo"El pago no fue realizado</br>";
              echo"</div>";
            endif;
        ?>

</section>
<?php include_once 'includes/templates/footer.php'; ?>
