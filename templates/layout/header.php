<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Iconos de fontawesome -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plataforma desarrollada por el equipo de Learn programmers para ACCESEO">
    <meta name="title" content="Pin Pong, campeonatos.">
    <meta name="keywords" content="ping pong, ACCESEO, TELEFONICA, PHP, Learn Programmers">
    <meta name="author" content="Beatriz Zarzo, Emilio Satorre, Miguel Cano, Adrián Sánchez">
    <title>Bienvenido a Ping Pong At Work</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="/proyectoPingPong/public/img/icono_login.png" />
    <link rel="stylesheet" href="/proyectoPingPong/public/css/custom.css">
</head>

<body>
    <div class="row pdT-15px">
        <div class="col-xs-6 col-md-4 col-md-offset-2 socialIcons">
            <ul>
                <a href="www.facebook.com/acceseo">
                    <i class="fa fa-2x fa-facebook-official " aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-2x fa-linkedin-square" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/acceseo?lang=es">
                    <i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i>
                </a>
               <a href="https://www.youtube.com/user/acceseo">
                    <i class="fa fa-2x fa-youtube-square" aria-hidden="true"></i>
               </a>
            </ul>
        </div>
        <div class="col-xs-6 col-md-6 divLoginHeader">
            <ul>
                <?php if(isset($_SESSION['username']) ):?>
                    <li>Hola <?= $_SESSION['username']?></li> |
                    <li><a href="/proyectoPingPong/player/logout">Cerrar sesión </a></li> 
                <?php else:?>   
                    <li><img src="/proyectoPingPong/public/img/icono_login.png" alt="Logo login"></li>
                    <li><a href="">Login Empresa </a></li>                |
                    <li><a href="/proyectoPingPong/player/login">Login Jugador</a></li>
                <?php endif ?>    
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-9 col-xs-offset-3 col-md-4 col-md-offset-4">
            <div class="banner">
            </div>
        </div>
    </div>
    <main> 
        <div class="container">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 0.571429px;">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">CLASIFICACION</a></li>
                            <li><a href="##">CAMPEONATOS</a></li>
                            <li><a href="#">ESTADISTICAS</a></li>
                            <li><a href="#">REGISTRO</a></li>
                            </ul>
                            </li>
                        </ul>

                    </div><!--/.nav-collapse <-->   </-->
                </div><!--/.container-fluid -->
            </nav>