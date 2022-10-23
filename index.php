<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
        <h2>La mejor Conferencia de Diseño web en Español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus esse sed possimus consectetur nihil debitis quasi vitae, cupiditate fugiat dicta. Molestias, eum fugit voluptatem incidunt inventore magni nam ullam voluptate!</p>
    </section>

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
            <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                    <source src="video/video.ogv" type="video/ogv">
            </video>
        </div>

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del evento</h2>
                    <?php
                        try{
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = " SELECT * FROM `categoria_evento`; ";
                            $resultado=$conn->query($sql);
                        } catch(\Exception $e){
                            echo $e->getMessage();
                        }
                    ?>
                    <nav class="menu-programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)): ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                             <a href="#<?php echo strtolower($categoria); ?>">
                             <i class="fa <?php echo $cat['icono']; ?>" aria-hidden="true"> </i><?php echo $cat['cat_evento']; ?></a>
                        <?php endwhile; ?>
                    </nav>

                    <!--Talleres, seminarios y eso-->
                    <?php
                        try{
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql.= "FROM eventos ";
                            $sql.= "INNER JOIN categoria_evento ";
                            $sql.= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql.= "INNER JOIN invitados ";
                            $sql.= "ON eventos.id_inv = invitados.invitado_id ";
                            $sql.= "And eventos.id_cat_evento = 1 ";
                            $sql.= "ORDER BY evento_id LIMIT 2; ";
                            $sql.= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql.= "FROM eventos ";
                            $sql.= "INNER JOIN categoria_evento ";
                            $sql.= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql.= "INNER JOIN invitados ";
                            $sql.= "ON eventos.id_inv = invitados.invitado_id ";
                            $sql.= "And eventos.id_cat_evento = 2 ";
                            $sql.= "ORDER BY evento_id LIMIT 2; ";
                            $sql.= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                            $sql.= "FROM eventos ";
                            $sql.= "INNER JOIN categoria_evento ";
                            $sql.= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql.= "INNER JOIN invitados ";
                            $sql.= "ON eventos.id_inv = invitados.invitado_id ";
                            $sql.= "And eventos.id_cat_evento = 3 ";
                            $sql.= "ORDER BY evento_id LIMIT 2; ";
                            $resultado=$conn->query($sql);
                        } catch(\Exception $e){
                            echo $e->getMessage();
                        }
                    ?>

                    <?php $conn->multi_query($sql); ?>

                    <?php do {
                        $resultado=$conn->store_result();
                        $row=$resultado->fetch_all(MYSQLI_ASSOC); ?>

                        <?php $i=0; ?>
                        <?php foreach ($row as $evento): ?>
                           <?php if ($i % 2 == 0) { ?>
                            <div id="<?php echo strtolower($evento['cat_evento']);?>" class="info-curso ocultar clearfix">
                           <?php } ?>
                                <div class="detalle-evento">
                                    <h3><?php echo utf8_encode($evento['nombre_evento']); ?></h3>
                                    <p> <i class="fa fa-clock" aria-hidden="true"> </i> <?php echo $evento['hora_evento']; ?> hrs</p>
                                    <p> <i class="fa fa-calendar-alt" aria-hidden="true"> </i> <?php echo $evento['fecha_evento']; ?></p>
                                    <p> <i class="fa fa-user" aria-hidden="true"> </i> <?php echo $evento['nombre_invitado']." ".$evento['apellido_invitado']; ?></p>
                                </div>
                                <?php  if($i % 2 == 1): ?>
                                <a href="calendario.php" class="button float-right">Ver todo</a>
                            </div>
                                <?php  endif;  ?>
                            <?php $i++; ?>
                        <?php endforeach;?>
                        <?php $resultado->free();?>
                   <?php } while ($conn->more_results() && $conn->next_result()); ?>

                </div>
                <!--Programa evento-->
            </div>
        </div>
        <!--contenido programa-->
    </section>
    <!--Invitados-->
     <?php include_once 'includes/templates/invitados.php'; ?>
    <!--Contador-->
    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero">0</p> Invitados
                </li>
                <li>
                    <p class="numero">0</p> Talleres
                </li>
                <li>
                    <p class="numero">0</p> Dias
                </li>
                <li>
                    <p class="numero">0</p> Conferencias
                </li>
            </ul>
        </div>
    </div>
    <!--Lista de Precios-->
    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por Día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las Coferencias</li>
                            <li>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Todos los Dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las Coferencias</li>
                            <li>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 Días</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las Coferencias</li>
                            <li>Todos los Talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>

    </section>

    <div id="mapa" class="mapa"></div>

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem veritatis porro dicta pariatur nostrum facere esse, architecto quis velit laboriosam, unde perferendis, saepe iste! Sit quae praesentium tempore nesciunt dolorum?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="testimonial">
                        <cite>Min Yoongi <span>Músico</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">

                <blockquote>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem veritatis porro dicta pariatur nostrum facere esse, architecto quis velit laboriosam, unde perferendis, saepe iste! Sit quae praesentium tempore nesciunt dolorum?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="testimonial">
                        <cite>Jung Hoseok <span>Músico</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem veritatis porro dicta pariatur nostrum facere esse, architecto quis velit laboriosam, unde perferendis, saepe iste! Sit quae praesentium tempore nesciunt dolorum?</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="testimonial">
                        <cite>Grecia Rodriguez <span>Vendedora de Nudes</span></cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Registrate al Newsletter: </p>
            <h3>GDLWEBCAMP</h3>
            <a href="#mc_embed_signup" class="boton_newsletter button transparent">Registro</a>
        </div>
    </div>

    <section cclass="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p class="numero" id="dias"></p> Días</li>
                <li>
                    <p class="numero" id="horas"></p> Horas</li>
                <li>
                    <p class="numero" id="minutos"></p> Minutos</li>
                <li>
                    <p class="numero" id="segundos"></p> Segundos</li>
            </ul>
        </div>
    </section>

    <?php include_once 'includes/templates/footer.php'; ?>