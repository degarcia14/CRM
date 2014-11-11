<html>
<head>
    <link type="text/css" rel="stylesheet" href="menu.css" />
    <link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>CRM</title>
</head>

<body>

	<div id='header'><!--Encabezado-->
		<h1>CUSTOMER REALTIONSHIP MANAGEMENT</h1><BR>
        <div id="topnav">
            <!--<?php //echo $_SESSION['usuario'] ?><a href="login.php"><?php //session_destroy() ?><h6>Salir</h6></a>-->
        </div>
	</div><!-- FinEncabezado-->

    <div id="nav"><!--MenuDesplegable-->
        
            <ul class="padre">
                <li><a href="#">Recepción</a>
                    <ul class="hijo">
                        <li><a href="" id="ficha" target="content">Ficha Técnica EU</a></li>
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                            <script type="text/javascript">
                            $(document).ready(function(){
                                $("#ficha").click(function(){
                                    $("#content").load('FichaTecnica.php');
                                    return false;
                                });
                            });
                            </script>
                    </ul>
                </li> <!-- Fin Recepcion -->
                <li><a href="#">Selección</a>
                    <ul class="hijo">
                        <li><a href="" id="perfil" target="content">Perfil T.M.</a>
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#perfil").click(function(){
                                        $("#content").load('PerfilTMNuevo.php');
                                            return false;
                                    });
                                });
                            </script>
                            <ul class="hijo">
                                <li><a href="" id="perfil1" target="content">Nuevo</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#perfil1").click(function(){
                                                $("#content").load('PerfilTMNuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                                <li><a href="" id="perfil2" target="content">Existente</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#perfil2").click(function(){
                                                $("#content").load('PerfilTMExistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                            </ul>
                        </li> <!-- Fin PerfilTM -->
                        <li><a href="" id="solicitud1" target="content">Solicitud de Personal</a>
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#solicitud1").click(function(){
                                        $("#content").load('SolicitudPersonalSeleccionEmpresa.php');
                                        return false;
                                    });
                                });
                            </script>
                            <ul class="hijo">
                                <li><a href="" id="solicitud2" target="content">Nueva</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#solicitud2").click(function(){
                                                $("#content").load('SolicitudPersonalSeleccionEmpresa.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                                <li><a href="" id="solicitud3" target="content">Existente</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#solicitud3").click(function(){
                                                $("#content").load('SolicitudPersonalExistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                                <li><a href="" id="solicitud4" target="content">Modificar</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#solicitud4").click(function(){
                                                $("#content").load('SolicitudPersonalExistenteModificar.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                            </ul>
                        </li> <!-- Fn Solicitud de Personal -->
                    </ul>
                </li> <!-- Fin Seleccion -->
                <li><a href="#">Contratación</a>
                    <ul class="hijo">
                        <li><a href="bajoConstruccion.php">Formatos</a></li>
                        <li><a href="bajoConstruccion.php">Inducción</a></li>
                        <li><a href="bajoConstruccion.php">Portadas de Historiales</a></li><!--crear y consultar -->
                    </ul>
                </li> <!-- Fin Contrataacion -->
                <li><a href="#">Comercial</a>
                    <ul class="hijo">
                        <li><a href="" id="oferta1" target="content">Oferta Comercial</a>
                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#oferta1").click(function(){
                                            $("#content").load('ofertacomercialnueva.php');
                                                return false;
                                        });
                                    });
                            </script>
                            <ul class="hijo">
                                <li><a href="" id="oferta2" target="content">Nueva</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#oferta2").click(function(){
                                                $("#content").load('ofertacomercialnueva.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                                <li><a href="" id="oferta3" target="content">Existete</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#oferta3").click(function(){
                                                $("#content").load('ofertacomercialexistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>
                                <li><a href="" id="oferta4" target="content">Seguimiento</a>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#oferta4").click(function(){
                                                $("#content").load('ofertacomercialseguimientoempresa.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                </li>                                
                            </ul>
                        </li> <!-- Fin Oferta Comercial -->
                        <li><a href="" id="contrato1" target="content">Contrato</a>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#contrato1").click(function(){
                                                $("#content").load('contratonuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                            <ul class="hijo">
                                <li><a href="" id="contrato2" target="content">Nuevo</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                $("#contrato2").click(function(){
                                                    $("#content").load('contratonuevo.php');
                                                    return false;
                                                });
                                            });
                                    </script>
                                <li><a href="" id="contrato3" target="content">Existente</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#contrato3").click(function(){
                                                $("#content").load('contratoexistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                <li><a href="" id="contrato4" target="content">Seguimiento</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#contrato4").click(function(){
                                                $("#content").load('ContratoSeguimientoEmpresa.php');
                                                return false;
                                            });
                                        });
                                    </script>
                            </ul>
                        </li> <!-- Fin Contrato -->
                        <li><a href="" id="potencial1" target="content">Cliente Potencial</a>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#potencial1").click(function(){
                                                $("#content").load('PotencialNuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                            <ul class="hijo">
                                <li><a href="" id="potencial2" target="content">Nuevo</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#potencial2").click(function(){
                                                $("#content").load('PotencialNuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                <li><a href="" id="potencial3" target="content">Existente</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#potencial3").click(function(){
                                                $("#content").load('PotencialExistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                            </ul>
                        </li> <!-- Fin Cliente Potencial -->
                        <li><a href="" id="contacto1" target="content">Contacto</a>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#contacto1").click(function(){
                                                $("#content").load('contactonuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                            <ul class="hijo">
                                <li><a href="" id="contacto2" target="content">Nuevo Contacto</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#contacto2").click(function(){
                                                $("#content").load('contactonuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                <li><a href="" id="contacto3" target="content">Buscar Contacto</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#contacto3").click(function(){
                                                $("#content").load('contactoexistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                <li><a href="" id="Area" target="Area">Nueva Area</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#Area").click(function(){
                                                $("#content").load('AreaContactoNuevo.php');
                                                return false;
                                            });
                                        });
                                    </script>
                                <li><a href="" id="Area2" target="Area2">Consultar Area</a></li>
                                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#Area2").click(function(){
                                                $("#content").load('AreaContactoExistente.php');
                                                return false;
                                            });
                                        });
                                    </script>
                            </ul>
                        </li> <!-- Fin Contactos -->
                    </ul>
                </li> <!-- Fin Comercial -->
                <li><a href="#">Buzón de Sugerencias</a>
                    <ul class="hijo">
                        <li><a href="bajoConstruccion.php">Recibidas</a></li>
                        <li><a href="bajoConstruccion.php">Asiganadas</a></li>
                        <li><a href="bajoConstruccion.php">Tramitadas</a></li>
                    </ul>
                </li> <!-- Fin Buzon Sugerencias -->
                <li><a href="SAdmin/saLogin.php">Administración</a>
                </li> <!-- Fin Administracion -->
                <li><a href="Login.php">Salir</a>
                </li> <!-- Fin Salir -->
            </ul> <!--FinMenudesplegable-->
    </div>

    <div id="content" name="content" class="content" align="center"></div><!--Contenido-->

    <!-- <div id='footer'><h4>(Mensajes del sistema)</h4></div> -->
</body>

</html>