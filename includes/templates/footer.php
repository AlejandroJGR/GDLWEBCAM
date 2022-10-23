<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>GDLWEBCAMP</span></h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur recusandae molestiae excepturi ullam. Sint ex sapiente fugiat nulla cum ducimus numquam quae ipsam mollitia iure, eveniet eius quia fuga ut.</p>
            </div>
            <div class="ultimos-twt">
                <h3>Ultimos <span>TWEETS</span></h3>
                <ul>
                    <li>sit amet consectetur adipisicing elit. Consequatur recusandae molestiae excepturi ullam.</li>
                    <li>Lorem ipsum dolor Nulla quo, sint placeat quam blanditiis recusandae commodi saepe sim perspiciatis iste soluta quod!</li>
                    <li>Lorem ab voluptas architecto libero nihil odit voluptatibus inventore cumque repudiandae nisi eius nam?</li>
                </ul>
            </div>
            <div class="menu">
                <h3>Redes <span>SOCIALES</span></h3>
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </nav>
            </div>
        </div>

        <p class="copyright">Todos los Derechos Reservados &copy; GDLWEBCAMP 2020</p>
        <!-- Begin Mailchimp Signup Form -->
        <link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:500px;}
            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
        </style>
        <div id="color-box_mailchimp" style="display: none;">
            <div id="mc_embed_signup">
                <form action="https://gmail.us10.list-manage.com/subscribe/post?u=18fecd3d80ea86d494c2f214d&amp;id=29f450c3ce" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                    <label for="mce-EMAIL">Subscribe to our Newsletter!</label>
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email" required>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_18fecd3d80ea86d494c2f214d_29f450c3ce" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                    </div>
                </form>
            </div>
        </div>
        <!--End mc_embed_signup-->
        
    </footer>

    <script src="js/vendor/modernizr-3.8.0.min.js "></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js " integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin=" anonymous "></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js "><\/script>')
    </script>
    <script src="js/plugins.js "></script>
    <script src="js/jquery.animateNumber.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <script src="js/jquery.waypoints.js"></script>

    <script src="js/main2.js "></script>
    <?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados'){
            echo '<script src="js/jquery.colorbox.js"></script>';
        }else if($pagina == 'conferencias'){
            echo '<script src="js/lightbox.js"></script>';
        }else if($pagina == 'index'){
            echo '<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="crossorigin=""></script>';
            echo '<script src="js/mapa.js"></script>';
            echo '<script src="js/main.js"></script>';
            echo '<script src="js/jquery.colorbox.js"></script>';
        }
    ?>


    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js " async></script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/18fecd3d80ea86d494c2f214d/60c937ff96a52a5b469a6e8b9.js");</script>
</body>

</html>