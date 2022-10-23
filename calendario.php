<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">

    <h2>Calendario de Eventos</h2>

    <?php
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
            $sql.= " FROM eventos ";
            $sql.= " INNER JOIN categoria_evento ";
            $sql.= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql.= " INNER JOIN invitados ";
            $sql.= " ON eventos.id_inv = invitados.invitado_id ";
            $sql.= " ORDER BY evento_id ";
            $resultado=$conn->query($sql);
        } catch(\Exception $e){
            echo $e->getMessage();
        }
    ?>

    <div class="calendario">
        <?php
            while( $eventos = $resultado->fetch_all(MYSQLI_ASSOC) ) {  ?>
                
                <?php $dias = array(); ?>
                <?php 
                foreach($eventos as $evento) {
                    $dias[] = $evento['fecha_evento'];
                } ?>

                <?php $dias = array_values(array_unique($dias)); ?>
                <?php $contador=0; ?>

                <?php 
                foreach($eventos as $evento) : ?>
                <?php $dia_actual = $evento['fecha_evento']; ?>
                <?php if($dia_actual == $dias[$contador]): ?>
                    <h3>
                        <i class="fa fa-calendar-alt" aria-hidden="true"></i>
                        <?php echo $evento['fecha_evento']; ?>
                    </h3>
                    <?php $contador++; ?>
                    <?php if($contador== count($dias)): ?>
                        <?php $contador =0; ?>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="dia">
                    <p class="titulo"><?php echo utf8_encode($evento['nombre_evento']); ?></p>
                    <p class="hora">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <?php echo $evento['fecha_evento']. " ".$evento['hora_evento']." hrs"; ?>
                    </p>
                     <p>
                         <?php $categoria_evento = $evento['cat_evento']; ?>
                         <?php 
                            switch ($categoria_evento) {
                                case 'Talleres':
                                    echo '<i class="fas fa-code" aria-hidden="true"></i> Taller';
                                    break;
                                case 'Conferencias':
                                    echo '<i class="fas fa-comment" aria-hidden="true"></i> Conferencia';
                                    break;
                                case 'Seminarios':
                                    echo '<i class="fas fa-university" aria-hidden="true"></i> Seminario';
                                    break;
                                default:
                                   echo "";
                                    break;
                            } 
                            ?>
                        </p>
                        <p><i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo $evento['nombre_invitado']. " ".$evento['apellido_invitado']; ?></p>
                    
                </div>

                <?php endforeach; ?> <!--end foreach evento-->
   </div> 

            <?php } ?>
        
 

    <?php $conn->close(); ?>

</section>

 <?php include_once 'includes/templates/footer.php'; ?>