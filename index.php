<?php
require_once 'usuario/usuario.php';
require_once 'banco/banco.php';

$servicos = obterServicos(1);
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!--Favicon-->
    <link rel="shortcut icon" href="./assets/img/favicon.png">
    <meta charset="UTF-8" />
    <!--Fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>MR BARBER'S | Agendamento Para Barbearias</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="./assets/css/custom-styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body data-bs-spy="scroll" data-bs-target=".nav-bg">
    <!--Preloader-->
    <div id="preloader">
      <div class="inner">
        <div class="bolas">
          <div></div>
          <div></div>
          <div></div>                    
        </div>
      </div>
    </div>
    <!--Header-->
    <header class="header" id="home">
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
          <a href="index.php#home"><img src="./assets/img/logo.png" alt="logo mr barbers" class="nav-logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class = 'offcanvas offcanvas-start' data-bs-scroll="true"  tabindex = '-1' id = 'offcanvasExample' aria-labelledby = 'offcanvasExampleLabel'>
            <div class="offcanvas-header">
              <h5 class="offcanvas-title">Menu</h5>
              <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="navbarNav">
              <div class="mx-auto"></div>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-white" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#servicos">Serviços</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#sobre">Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#contato">Contato</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#agendamento">Agendamento</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    
    <!--Banner-->
    <section class="hero-section">
      <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6 align-items-center">
              <h1 class="titulo display-4">UMA NOVA EXPERIÊNCIA PARA UM ANTIGO HÁBITO</h1>
              <h2 class="subtitulo display-8">Faça um Agendamento Agora</h2>
              <a href="./dashboard/dashboard.php"><button class="btn"><i class="fa fa-calendar"></i> Agendar Agora</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--Services-->
    <section class="services-section" id="servicos">
      <div class="container d-flex flex-wrap gap-5 justify-content-center">
        <div class="container d-flex justify-content-center">
            <h2 class="display-6 title-services"><span style="opacity: 0.3;">NOSSOS</span>SERVIÇOS</h2>
        </div>
        <?php foreach($servicos as $row){ ?>
        <div class="card">
            <div class="card-img d-flex align-items-center justify-content-center" style="background-image: url(./assets/uploads/img/<?php echo $row['IMAGEM'];?>);">
                <div class="service">
                    <img src="./assets/uploads/icons/<?php echo $row['ICONE'];?>" alt="icone">
                    <p class="h2"><?php echo $row['DESCRICAO'];?></p>
                </div>
            </div>
        </div>
        <?php } ?>
      </div>
    </section>

    <!--Sobre-->
    <section class="about-section" id="sobre">
      <div class="container d-flex flex-wrap">
          <div class="container d-flex justify-content-center">
            <h2 class="display-6">SOBRE<span style="opacity: 0.3;">NÓS</span></h2>
          </div>
          <div class="row gx-5 justify-content-center">
              <div class="col-lg-7">
                <h3 class="title-about">Barba, Cabelo e Agendamento!</h3>
                <p class="text-about">
                  O MR. Barber é um sistema de agendamentos on-line para barbearias que permite gerenciar horários
                  com rapidez e flexibilidade, organizando a agenda e horários do estabelecimento. O usuário, por sua vez, poderá 
                  marcar seus horários, além de poder verificar serviços…
                </p>
                <ul class="item-about" style="list-style: none; padding: 0;"> 
                  <li><i class="item-about fa fa-check-circle"></i> AGENDE SEUS HORÁRIOS.</li>
                  <li><i class="item-about fa fa-check-circle"></i> TOTALMENTE ONLINE.</li>
                  <li><i class="item-about fa fa-check-circle"></i> RÁPIDO E PRÁTICO.</li>
                </ul>
              </div>
              <div class="img-about col-lg-5">
                <img src="assets/img/bg-03.jpg" class="img-fluid rounded mx-auto" alt="homem na barbearia">
            </div>
          </div>
          <div class="row justify-content-center gx-5 ">
            <div class="col-md-4">
              <div class="item">
                <h5 class="title"> <i class="fa fa-dollar"></i> Totalmente Grátis</h5>
                <p class="text-white">Você não precisa pagar para usar nossos serviços de agendamento.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item">
                <h5 class="title"> <i class="fa fa-map-marker"></i> Veja a Localização</h5>
                <p class="text-white">Confira a localização do estabelecimento e não se perca no caminho.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item">
                <h5 class="title"> <i class="fa fa-search"></i> Compare Preços</h5>
                <p class="text-white">Compare os preços das barbearias e veja a mais vantajosa econômicamente.</p>
              </div>

            </div>
          </div>
      </div>
  </section>

    <!--Contato-->
    <section class="contact-section" id="contato" >
      <div class="bg-contact">
        <div class="container-contact">
          <div class="wrap-contact">
            <form class="contact-form validate-form">
              <span class="contact-form-title">
                <h2 class="display-6"><span style="opacity: 0.3;">FALE</span>CONOSCO</h2>
              </span>
              <div class="wrap-input validate-input" data-validate="Preencha o Nome!">
                <input class="input" type="text" name="name">
                <span class="focus-input" data-placeholder="NOME"></span>
              </div>
              <div class="wrap-input validate-input" data-validate = "Preencha Um Email Válido!">
                <input class="input" type="text" name="email">
                <span class="focus-input" data-placeholder="EMAIL"></span>
              </div>
              <div class="wrap-input validate-input" data-validate = "Escreva Uma Mensagem!">
                <textarea class="input" name="message"></textarea>
                <span class="focus-input" data-placeholder="MESSAGEM"></span>
              </div>
              <div class="container-contact-form-btn d-flex justify-content-center">
                <button class="btn"><i class="fa fa-check"></i> ENVIAR MENSAGEM </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  
    <!--Call to Action-->
    <section class="cta-section" id="agendamento" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="cta-title display-6">Reserve Seu Horário!</h3>
            <p class="cta-text">
              Não perca tempo com incontáveis ligações para fazer uma reserva com o barbeiro, use MR. Barber!    
            </p>
            <a href="./dashboard/dashboard.php"class="btn"> <i class="fa fa-check"></i> Agendar Agora </a>
          </div>
        </div>
      </div>
    </section>
    
    <!--Footer-->
		<footer class="footer">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 text-center">
            <img class="logo" src="./assets/img/logo.png" alt="logo do rodapé" style="height: 80px;">  
						<p class="menu">
							<a href="#home">Home</a>
							<a href="#servicos">Serviços</a>
							<a href="#sobre">Sobre</a>
							<a href="#contato">Contato</a>
							<a href="#agendamento">Agendamento</a>
						</p>
						<ul class="ftco-footer-social p-0">
              <li class="social-icon"><a href="#" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="social-icon"><a href="#" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="social-icon"><a href="#" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-12 text-center">
						<p class="copyright">
					   Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Projeto Integrador <a href="https://www.ba.senac.br/" target="_blank">Senac</a>
					  </p>
					</div>
				</div>
			</div>
		</footer>
		
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Javascript-->
    <script src="./assets/js/main.js"></script>
  </body>
</html>
