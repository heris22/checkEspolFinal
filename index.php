<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="homepage">
        <?php include_once('menuCentral.php');?> 
	<!-- Features 1 -->
	<div class="wrapper">
            <div class="container">
                <div class="row">
                    <section class="6u feature">
                        <p>CheckEspol es el medio por el cual podrás leer opiniones de todos los profesores de tu universidad, hechas por sus propios alumnos, podrás también escribir reseñas sobre la forma de enseñanza de los diferentes docentes, así como sus formas de calificación, con el propósito de que puedas tener una visión más realista sobre cuál sería tu mejor elección al momento de registrarte con algún profesor. Únete a la comunidad y ayúdanos a ayudar.</p>
                    </section>
                    <section class="6u feature">
                        <div class="image-wrapper">
                            <a href="#" class="image full"><img src="images/responsive.jpg" alt="" /></a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
			
        <!-- Footer Wrapper -->
        <div id="footer-wrapper">
            <!-- Footer -->
            <div id="footer" class="container">
                <header class="major">
                    <h2>Contáctanos</h2>
                    <span>Para mayor información escríbenos o búscanos en las redes sociales.</span>
                </header>
                <div class="row">
                    <section class="8u">
                        <form method="post" action="#">
                            <div class="row half">
                                <div class="6u">
                                    <input name="name" placeholder="Nombre" type="text" class="text" />
                                </div>
                                <div class="6u">
                                    <input name="email" placeholder="Email" type="text" class="text" />
                                </div>
                            </div>
                            <div class="row half">
                                <div class="12u">
                                    <textarea name="message" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="row half">
                                <div class="12u">
                                    <ul class="actions">
                                        <li><a href="#" class="button">Enviar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </section>
                    <section class="4u">
                        <div class="row no-collapse-1">
                            <ul class="divided icons 6u">
                                <li class="fa fa-twitter"><a href="#"><span class="extra">twitter.com/</span>checkespol</a></li>
                                <li class="fa fa-facebook"><a href="#"><span class="extra">facebook.com/</span>checkespol</a></li>
                                <li class="fa fa-youtube"><a href="#"><span class="extra">youtube.com/</span>checkespol</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            
        <?php include_once('footer.php');?>         
        </div>
    </body>
</html>

