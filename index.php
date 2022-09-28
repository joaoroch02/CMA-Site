<?php
header('Content-Type: text/html; charset=UTF-8');
echo '<html>';

$subjectPrefix = '[Contato via Site]';
$emailTo = '<cma@ufpa.br>';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['nome']));
    $email   = stripslashes(trim($_POST['email']));
    $subject = stripslashes(trim($_POST['assunto']));
    $message = stripslashes(trim($_POST['mensagem']));
    $pattern  = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }

    $emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);

    if($name && $email && $emailIsValid && $subject && $message){
        $subject = "$subjectPrefix $subject";
        $body = "Nome: $name <br /> Email: $email <br /> Mensagem: $message";

        $headers  = 'MIME-Version: 1.1' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
        $headers .= "De: $name <$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Responder Para: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?><!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>

   <!--- Basic Page Needs
   ================================================== -->
   <!-- Favicons
   ================================================== -->    
   <link href="favicon.png" type="image/png" rel="icon">
   <link href="favicon-apple.png" sizes="128x128" type="image/png" rel="apple-touch-icon">

   <meta charset="utf-8">
    <title>Centro de Memória da Amazônia</title>
	<meta name="description" content="Site do Centro de Memória da Amazônia-UFPA. Centro de pesquisa e restauração de Obras da Nossa Amazônia">  
	<meta name="author" content="Edinaldo Luis dos Santos">
   <meta name="keywords" content="Centro de Memória da Amazônia, centro de memoria da amazonia UFPA, memoria da amazonia UFPA, memória da amazônia, centro, memoria, memória, amazonia, amazônia, CMA, belém, belem, Pará, Para, PA, Brasil, história, Século XIX">
   <meta name="robots" content="index, follow">
   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="css/default.css">
	<link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/media-queries.css">
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" href="css/prettyPhoto.css">
   <link rel="stylesheet" href="css/slide.css">

   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyCDGR2tLb7vVve8iHbLC-m4fNbM4_XWaiY" type="text/javascript"></script>
	
	
	 
	 
</head>



<body>

   <!-- Header
   ================================================== -->
      <header>

      <nav id="nav-wrap">         
         
         <a class="mobile-btn" href="#nav-wrap" title="Mostrar menu">Mostrar Menu</a>
         <a class="mobile-btn" href="#" title="Esconder menu">Esconder Menu</a>         

         <ul id="nav" class="nav">
           <li><a href="index.php" title="Página inicial">Home</a></li>
            <li><a href="acervo.html" title="Catálogos e documentos digitalizados">Acervo</a></li>
           
        <!-- <li><a href="projetos.html" title="Demais projetos do Centro de Memória da Amazônia">Projetos</a></li> -->
            <li><a href="pesquisador.php" title="Página Área Pesquisador">Pesquisador</a></li>
            <li><a href="agenda.html" title="Agenda de eventos">Agenda</a></li>
			<li><a href="mapoteca.html" title="Mapoteca.">Mapoteca Virtual</a></li>
            <li><a href="jornais.html" title="Hemeroteca">Hemeroteca</a></li>
            <li><a href="galeriarighini.html" title="Imagens do acervo">Galeria</a></li>
			<li><a href="acervospessoais.html" title="Fundo de Acervos Pessoais do CMA">Acervos pessoais</a></li>
            <li><a href="memoriasdealemmar.php" title="Projeto Memórias de Além Mar">Memórias de Além-Mar</a></li>
 
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
     <ul class="header-social">
        <!--  <li><a href="#" title="Blog CMA" target="_blank" style="font:14px'montserrat', sans-serif;text-transform: uppercase;">Blog</a></li>-->
         <li><a href="https://www.facebook.com/amazonia.centrodememoria" target="_blank"><i class="fa fa-facebook" title="CMA no Facebook"></i></a></li>
         <li><a href="https://twitter.com/cma_ufpa" target="_blank"><i class="fa fa-twitter" title="CMA no Twitter"></i></a></li>
      </ul>

   </header> <!-- Header End -->

 <!-- Homepage Hero
   ================================================== -->
   <section id="hero">
   <br>
   
	   <div class="row">

		   <div class="twelve columns">

            <div class="hero-image">
               <img src="images/cmaufpa.png" alt="Imagem do logo do Centro de Memória da Amazônia" id="centro"/>
            </div>
			
                
		   </div>

	   </div>
       <br/>
	               
       </section> <!-- Homepage Hero end -->
    
	
		<section id="testimonials">

          <div class="row content">

              <span><i class="chevron-left fa fa-chevron-left"></i></span>

             <div class="text-container">

                <div class="twelve columns">

                   <h2>NOTÍCIAS</h2>

                </div>

                <div class="twelve columns flex-container">

                   <div class="flexslider">

                      <ul class="slides">

						 
                        <li>
                           <figure><a href="/noticias/informativo10mar21.php"><img src="/noticias/imagens/Notas sobre o funcionamento do CMA fevereiro 2022.jpg"></a></figure>
                         </li> 
						
						<li>
                           <figure><a href="rothe/rothe.php"><img src="images/slide/rothe.png"></a></figure>
                         </li> 
						
						<li>
                           <figure><a href="noticias/bancomundial.php"><img src="images/slide/bancomundial.png"></a></figure>
                         </li> 
                          
						<li>
                           <figure><a href="pag_lauro.html"><img src="images/slide/laurosodre.png"></a></figure>
                        </li> <!-- slide ends -->
						 <li>
                           <figure><a href="noticias/autorização 2.php"><img src="images/slide/cma tj.jpg"></a></figure>
                         </li>
                      </ul>

                   </div> <!-- div.flexslider ends -->

                </div> <!-- div.flex-container ends -->

             </div>  <!-- text-container ends -->

              <span>
                <i class="chevron-right fa fa-chevron-right"></i>
              </span>
              <span>
                <i class="chevron-left fa fa-chevron-keft"></i>
              </span>
              

          </div> <!-- row ends -->

        </section> <!-- Testimonials Section End-->

   <!-- Features Section
   ================================================== -->
   <section id='features'>

       
                  

         <div class="row section-head">
		 
		 
		 
		 
<h2>APRESENTAÇÃO</h2>
<br>


<div style="text-align:justify">
                 
                  <font size="4">
                  <title>text-indent</title>
                  <style type="text/css">
                  p { text-indent: 100px; }
                  </style>   
               
<p> <h2>QUEM SOMOS</h2> - 
O Centro de Memória da Amazônia é um órgão suplementar subordinado à Reitoria da Universidade Federal do Pará (UFPA), instituído através da resolução do Conselho Universitário (CONSUN) No 662/2009 datada de 31 de março de 2009 https://sege.ufpa.br/boletim_interno/downloads/resolucoes/consun/2009/Microsoft%20Word%20-%20662%20Regimento%20da%20Reitoria.pdf, que aprova o Regimento dos órgãos executivos da Administração Superior na Universidade Federal do Pará (UFPA).
</p> 
<p> <h2>ONDE NOS LOCALIZAMOS</h2> -
Desde sua criação o CMA funciona na Travessa Rui Barbosa, 491, bairro do Reduto na cidade de Belém do Pará. Estamos instados em um prédio histórico que abrigou – entre 1980 e 2007 – a antiga gráfica pertencente à Imprensa Universitária da UFPA. Trata-se de um edifício com arquitetura de estilo neoclássico com um pé direito alto e estrutura em ferro trabalhado, o qual ainda hoje abriga algum maquinário deste seu passado como casa editorial.
</p>
<p> <h2>COMO NASCEMOS</h2> - 
Caracterizado como uma instituição patrimonial, o CMA-UFPA foi criado em 31 de janeiro de 2007 através do Convênio N. 005/2007 entre a Universidade Federal do Pará (UFPA) e o Tribunal de Justiça do Estado do Pará (TJE-PA) https://www.tjpa.jus.br/CMSPortal/VisualizarArquivo?idArquivo=828806 com o intuito de guardar, melhor acondicionar e tornar mais acessível a rica documentação “inativa” formada por processos cíveis e criminais pertencentes à justiça do Pará em seu acervo histórico com datas limites entre 1785 e 1970 e assim possibilitar a construção da história das relações sociais e culturais da Amazônia.
</p>
<p> <h2>NOSSA FUNÇÃO PÚBLICA</h2> 
O CMA-UFPA tem como política pública a preservação, organização e divulgação de documentos – em especial os de origem judiciária – que auxiliem a compreensão da história da região Amazônica, com ênfase na história do Pará. Neste sentido, objetiva-se atender a um público diverso, tanto acadêmico/escolar nos níveis fundamental, médio e superior, quanto aquele mais amplo que vise construir mecanismos de acesso a uma cidadania mais plena e justa. 
 </p>


                   </font>
               </div>
         </div>	
       
      <hr />

   </section> <!-- Homepage Hero end -->
   <!--========================================================================================================-->
   <!-- Pricing Section -->
      <section id="pricing">

         <div class="row section-head">

            <h2></h2>
         </div>

         <br />

         <div class="row">

            <div class="six columns">

               <i class="fa fa-folder-open fa-3x"></i><h3 class="plan-title">Certificados para Impressão</h3>
			   
               <p class="plan-price">Acesso a todos os <strong>certificados</strong>, e fotos, dos <strong>cursos</strong>, <strong>oficinas</strong> e <strong>palestras</strong>, ofertados pelo CMA. Os certificados estão organizados por Curso, Palestra ou Oficina.</p>

               <footer class="plan-sign-up">
                  <a class="button" href="certificados.html" title="Acesse a página de Certificados">Acesse seu Certificado</a>
               </footer>

   			</div> <!-- End Column -->  

                 
      </section> 
 
    <?php if(isset($emailSent) && $emailSent): ?>
        <section id="subscribe">

      <div class="row section-head">

         <div class="twelve columns">

             <h5 class="enviado">Sua mensagem foi enviada com SUCESSO!<br/>Logo estaremos entrando em contato com você.</h5>
             
             <br/>
             <br/>
            <!-- <h3>Você já visitou o blog do CMA?</h3>
             <br/><a class="button white" href="#" title="Acesse o Blog CMA">Blog CMA</a> -->

         </div>

      </div>
   </section>
    
    <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">         

         <div class="six columns info">

            <div class="footer-logo">
                  <img src="images/slide/cma.jpg" alt="Imagem do logo do centro de memória da Amazônia."/>
            </div>

            <p>O Centro de Memória da Amazônia é um centro cultural, criado em 31 de janeiro de 2007, em parceria oom o Tribunal de Justiça do Estado do Pará (TJE/PA) e a Universidade Federal do Pará (UFPA), e reformado em 13 de Abril de 2012.</p>

         </div>

         <div class="six columns right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Venha nos Visitar</h3>
                  <p>
                  Travessa Rui Barbosa, 491<br/>
                  66053-260 - Reduto <br/>
                  Belém, PA - BRASIL<br/>
                  </p>
               </div>

               <div class="columns">
                  <h3 class="social">Redes Sociais</h3>
                  <ul>
                     <li><a href="https://www.facebook.com/amazonia.centrodememoria" target="_blank" title="CMA no Facebook">Facebook</a></li>
                     <li><a href="https://twitter.com/CMA_UFPA" target="_blank" title="CMA no Twitter">Twitter</a></li>
                    <!-- <li><a href="#" title="Blog CMA">Blog do CMA</a></li> -->
                  </ul>
               </div>

               <div class="columns last">
                  <h3 class="contact">Contatos</h3>
                  <ul>
                    <li>(91) 3252-2843</li>
                    <li><a href="">cma@ufpa.com</a></li>
                  </ul>
               </div>

            </div> <!-- Nested Row End -->

         </div>

         <p class="copyright">&copy; 2014 Centro de Memória da Amazônia | Template by: <a href="http://www.styleshout.com/">Styleshout</a></p>
         <br />

      </div> <!-- Row End -->

   </footer> <!-- Footer End-->
    
    <?php else: ?>
        <?php if(isset($hasError) && $hasError): ?>
        <section id="subscribe">

      <div class="row section-head">

         <div class="twelve columns">

		 <p class="nenviado">Houve um ERRO ao enviar sua mensagem!<br/>Tente refazer o processo mais tarde, ou entre em contato conosco pelo nosso telefone: <strong>(91) 3252-2843</strong>.</p>
            
              <br/>
             <br/>
            <!-- <h3>Você já visitou o blog do CMA?</h3>
             <br/><a class="button white" href="#" title="Acesse o Blog CMA">Blog CMA</a> -->

         </div>

      </div>
   </section>
    
    <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">         

         <div class="six columns info">

            <div class="footer-logo">
                  <img src="images/slide/cma.jpg" alt="Imagem do logo do centro de memória da Amazônia."/>
            </div>

            <p>O Centro de Memória da Amazônia é um centro cultural, criado em 31 de janeiro de 2007, em parceria do Tribunal de Justiça do Estado do Pará (TJE/PA) e a Universidade Federal do Pará (UFPA), e reformado em 13 de Abril de 2012.</p>

         </div>

         <div class="six columns right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Venha nos Visitar</h3>
                  
                  Travessa Rui Barbosa, 491<br/>
                  66053-260 - Reduto <br/>
                  Belém, PA - BRASIL<br/>
                  
               </div>

               <div class="columns">
                  <h3 class="social">Redes Sociais</h3>
                  <ul>
                     <li><a href="https://www.facebook.com/amazonia.centrodememoria" target="_blank" title="CMA no Facebook">Facebook</a></li>
                     <li><a href="https://twitter.com/CMA_UFPA" target="_blank" title="CMA no Twitter">Twitter</a></li>
                     <!-- <li><a href="#" title="Blog CMA">Blog do CMA</a></li> -->
                  </ul>
               </div>

               <div class="columns last">
                  <h3 class="contact">Contatos</h3>
                  <ul>
                    <li>(91) 3252-2843</li>
                    <li><a href="">cma@ufpa.com</a></li>
                  </ul>
               </div>

            </div> <!-- Nested Row End -->

         </div>

         <p>class="copyright">&copy; 2014 Centro de Memória da Amazônia</p>
         <br />

      </div> <!-- Row End -->

   </footer> <!-- Footer End-->
    
    <?php endif; ?>

   <!-- Section
   ================================================== -->
   <section id="subscribe">
   
    <div class="row section-head">

    

         <div class="twelve columns">

            <h2>Formulário para contato</h2>
			
			<div>
                  <font size="4">

          <p style="text-align:justify"; "text-indent: 3em"; "line-height: 1.0"; "margin: 0"> O formulário de contato serve para sabermos como podemos ajudar você. Quanto mais dados você preencher, melhor. Você poderá enviar sugestões, dicas, críticas, pedir informações, etc.<strong>Na parte direita você verá o mapa com a localização do CMA</strong>. Preencha o formulário de acordo com o que se pede, e não se procupe, <strong>nós nunca compartilharemos seus dados pessoais</strong>.</p>
         </font>
		  
               </div>
		</div>
      </div>

      <div class="row">

        <div class="seven columns">
          <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact-form" method="post">
            <label for="name" class="nomeLabel">Nome (Obrigatório)</label>
            <input id="nome" type="text" name="nome" placeholder="Entre com seu Nome" required>
            <label for="email" class="emailLabel">Email  (Obrigatório)</label>
            <input id="email" type="text" name="email" placeholder="Entre com seu Email" required>
            <label for="subject" class="assuntoLabel">Assunto</label>
            <input id="assunto" type="text" name="assunto" placeholder="Entre com seu Assunto" required>
            <label for="message" class="mensagemLabel">Mensagem  (Obrigatório)</label>
            <textarea id="mensagem" name="mensagem" placeholder="Digite sua Mensgem" required></textarea>
            <button type="submit" title="Clique para Enviar">Enviar</button>
          </form>
        </div>
        <div class="five columns"> 
<h4 class="h4_contato">Onde Estamos</h4>
<div id="mapa" title="Mapa do Centro de Memória"></div>
    


    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -1.44717098, lng: ,-48.49182735},
          zoom: 18
        });
      }
    </script>
	
	<script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyCDGR2tLb7vVve8iHbLC-m4fNbM4_XWaiY" type="text/javascript"></script>
	
  
	
    
	 </script>
          <br />
        </div>
      </div>
	  </div>
  
   <!-- Footer -1.4472039,-48.4918028,3a
   ================================================== -->
  <footer>

      <div class="row">         

         <div class="six columns info">

            <div class="footer-logo">
                  <img src="images/slide/cma.jpg" alt="Imagem do logo do Centro de Memória da Amazônia."/>
            </div>

            <p>O Centro de Memória da Amazônia é um centro cultural, criado em 31 de janeiro de 2007, em parceria do Tribunal de Justiça do Estado do Pará (TJE/PA) e a Universidade Federal do Pará (UFPA), e reformado em 13 de Abril de 2012.</p>

         </div>

         <div class="six columns right-cols">

            <div class="row">

               <div class="columns">
                  <h3 class="address">Venha nos visitar</h3>
                  
                  Travessa Rui Barbosa, 491<br/>
                  66053-260 - Reduto <br/>
                  Belém, PA - BRASIL<br/>
                  
               </div>

               <div class="columns">
                  <h3 class="social">Redes sociais</h3>
                  <ul>
                     <li><a href="https://www.facebook.com/centrodememoriaufpa" target="_blank" title="CMA no Facebook">Facebook</a></li>
                     <li><a href="https://twitter.com/CMA_UFPA" target="_blank" title="CMA no Twitter">Twitter</a></li>
					 <li><a href="https://www.instagram.com/cmaufpa" target="_blank" title="CMA no Instagram">Instagram</a></li>
					
		
					</ul>
               </div>

               <div class="columns last">
                  <h3 class="contact">Contatos</h3>
                  <ul>
                    <li>(91) 3201-8981</li>
                    
                    <li><a href="">cma@ufpa.br</a></li>
					
                  </ul>
               </div>

            </div> <!-- Nested Row End -->
Numero de visitantes 
<div align="center"><a title='Contador de Visitas do MegaContador' href='https://megacontador.com.br/' ><img src='https://megacontador.com.br/img-SBFXzWuZjiYhhYGZ-1.gif' border='0' alt='Contador de visitas'></a></div>






         </div>

         <p class="copyright">&copy; 2020 Centro de Memória da Amazônia</p>
         <br />
		 <br>
          <div id="go-top">
            <a class="smoothscroll" title="Voltar para Topo" href="#hero"><i class="icon-up-open"></i></a>
         </div>


      </div> <!-- Row End -->

   </footer> <!-- Footer End-->
    
    <?php endif; ?>
	  <script type="text/javascript">
    if (GBrowserIsCompatible()) {
  var map = new GMap2(document.getElementById("mapa"));
  var lat = -1.446396; // Latitude do marcador
  var lon = -48.492547; // Longitude do marcador
  var zoom = 18; // Zoom

  map.addControl(new GMapTypeControl());
  map.addControl(new GLargeMapControl());
  map.setCenter(new GLatLng(lat, lon), zoom);

  var marker = new GMarker(new GLatLng(lat,lon));

  GEvent.addListener(marker, "click", function() {
    marker.openInfoWindowHtml("<h2>centro de Memória</h2><p>CMA</p>");
  });

  map.addOverlay(marker);
  map.setCenter(point, zoom);
}
   </script>


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    
	<script src="js/contact-form.js"></script>
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/jquery.fitvids.js"></script>
   <script src="js/imagelightbox.js"></script>
   <script src="js/jquery.prettyPhoto.js"></script>   
   <script src="js/main.js"></script>

</body>

</html>