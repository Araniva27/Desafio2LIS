<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar docentes-Colegio Cristobal Colón</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Colegio Cristobal Colón</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Registrar estudiante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="docentes.php">Registrar docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="personalAdm.php">Registrar personal administrativo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body style="background-color: #FFFDFB;">
    <?php
        session_start();
        require_once '../helpers/validator.php';
        require_once '../helpers/persona.php';
        require_once '../helpers/docentes.php';

        if(!isset($_SESSION['docentes'])){
            $_SESSION['docentes'] = array();
        }

        if(isset($_POST['ingresar'])){
            $docente = new Docentes();
            if($docente->setNombre($_POST['nombre'])){
                if($docente->setApellido($_POST['apellidos'])){
						if($docente->setFechaNacimiento($_POST['fecha'])){
							$edad = $docente->calcularEdad($docente->getFechaNacimiento());
							if($edad >= 18){
								$docente->setDui($_POST['dui']);
								$docente->setMayorEdad(1);
							}else{
								$docente->setDui('00000000-0');
								$docente->setMayorEdad(0);
							}
							if($docente->setNit($_POST['nit'])){
								if($docente->setDireccion($_POST['direccion'])){
									if($docente->setTelefonoMovil($_POST['movil'])){
										if($docente->setCorreo($_POST['correo'])){
											if($docente->setSexo($_POST['sexo'])){
												if($docente->setTelefonoFijo($_POST['fijo'])){
													$materia1 = $_POST['materia1'];
													$materia2 = $_POST['materia2'];
													$materia3 = $_POST['materia3'];
													$materias = array($materia1,$materia2,$materia3);
													if($docente->setPagoHora($_POST['pagoHora'])){
														if($docente->setHorasTrabajadas($_POST['horasTrabajadas'])){
															$salario = $docente->calcularSalario($docente->getHorasTrabajadas(),$docente->getPagoHora());
															$codigoDocente = $docente->generarCodigo();
															if($docente->setCodigoDocente($codigoDocente)){
																$docenteArray = array(
																	"nombre"=>$docente->getNombre(),
																	"apellido"=>$docente->getApellido(),
																	"dui"=>$docente->getDui(),
																	"nit"=>$docente->getNit(),
																	"direccion"=>$docente->getDireccion(),
																	"correo"=>$docente->getCorreo(),
																	"movil"=>$docente->getTelefonoMovil(),
																	"fijo"=>$docente->getTelefonoFijo(),
																	"sexo"=>$docente->getSexo(),
																	"nacimiento"=>$docente->getFechaNacimiento(),
																	"edad"=>$edad,
																	"salario"=>$salario,
																	"pagoHora"=>$docente->getPagoHora(),
																	"horasTrabajadas"=>$docente->getHorasTrabajadas(),
																	"codigo"=>$codigoDocente,
																	"materias"=>array($materia1,$materia2,$materia3),
																	"mayor"=>$docente->getmMayorEdad()
															  );
															  $docente->agregarDocente($docenteArray);
															 // var_dump($_SESSION['docentes']);
															}else{
																echo "
																	<div class='container'>
																		<div class='row'>
																			<div class='alert alert-warning' role='alert'>
																				Error al asignar código de docente
																			</div>
																		</div>
																	</div>
																";
															}
														}else{
															echo "
																<div class='container'>
																	<div class='row'>
																		<div class='alert alert-warning' role='alert'>
																			Error al asignar horas trabajadas
																		</div>
																	</div>
																</div>
															"; 
														}
													}else{
														echo "
															<div class='container'>
																<div class='row'>
																	<div class='alert alert-warning' role='alert'>
																		Error al asignar paho por hora
																	</div>
																</div>
															</div>
														"; 
													}
												}else{
													echo "
														<div class='container'>
															<div class='row'>
																<div class='alert alert-warning' role='alert'>
																	Error al asignar teléfono fijo
																</div>
															</div>
														</div>
													"; 
												}
											}else{
												echo "
												<div class='container'>
													<div class='row'>
														<div class='alert alert-warning' role='alert'>
															Error al asignar sexo
														</div>
													</div>
												</div>
											"; 
											}
										}else{
											echo "
												<div class='container'>
													<div class='row'>
														<div class='alert alert-warning' role='alert'>
															Error al asignar correo
														</div>
													</div>
												</div>
											";  
										}
									}
								}else{
									echo "
										<div class='container'>
											<div class='row'>
												<div class='alert alert-warning' role='alert'>
													Error al asignar dirección
												</div>
											</div>
										</div>
									";  
								}
							}else{
								echo "
									<div class='container'>
										<div class='row'>
											<div class='alert alert-warning' role='alert'>
												Error al asignar nit
											</div>
										</div>
									</div>
								";  
							}
						}else{
							echo "
                     <div class='container'>
                        <div class='row'>
                            <div class='alert alert-warning' role='alert'>
                                Error al asignar fecha de nacimiento
                            </div>
                        </div>
                     </div>
                 ";  
						}
                }else{
                    echo "
                     <div class='container'>
                        <div class='row'>
                            <div class='alert alert-warning' role='alert'>
                                Error al asignar apellido del docente
                            </div>
                        </div>
                     </div>
                 ";  
                }
            }else{
                echo "
                    <div class='container'>
                        <div class='row'>
                            <div class='alert alert-warning' role='alert'>
                                Error al asignar nombre del docente
                            </div>
                        </div>
                    </div>
                ";          
            }
        }
    
    
    
    ?>
    <div class="container-fluid" style="margin-top:16px">
        <div class="card">
            <div class="card-header text-center" style="font-size: 19px; font-weight: bold;">
                Registro de docentes
            </div>
            <div class="card-body">
                <div class="container-fluid" style="margin-top:10px">
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nombres:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellido" name="apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">DUI:</label>
                                    <input type="text" class="form-control" id="dui" name="dui">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NIT:</label>
                                    <input type="text" class="form-control" id="nit" name="nit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Dirección:</label>
                                    <textarea class="form-control" placeholder="Ingrese su dirección" id="direccion" name="direccion"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Teléfono móvil:</label>
                                    <input type="text" class="form-control" id="movil" name="movil">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Correo electrónico:</label>
                                    <input type="text" class="form-control" id="correo" name="correo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Sexo</label>
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectDisabled" name="sexo" aria-label="Floating label disabled select example">
                                            <option>Seleccionar sexo</option>
                                            <option value="M">Maculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Teléfono fijo:</label>
                                    <input type="text" class="form-control" id="fijo" name="fijo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <label for="exampleInputPassword1" class="form-label">Fecha de nacimiento:</label>
                                <div class="col-sm-12" style="align-items: center;">
                                    <input type="date" name="fecha" class="form-control">
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Asignatura 1:</label>
                                    <input type="text" class="form-control" id="materia1" name="materia1">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Asignatura 2:</label>
                                    <input type="text" class="form-control" id="materia2" name="materia2">
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Asignatura 3:</label>
                                    <input type="text" class="form-control" id="materia3" name="materia3">
                                </div>
                            </div>                           
                        </div>
								<div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Pago por hora:</label>
                                    <input type="text" class="form-control" id="pagoHora" name="pagoHora">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Horas trabajadas:</label>
                                    <input type="text" class="form-control" id="horasTrabajadas" name="horasTrabajadas">
                                </div>
                            </div>
                                                        
                        </div>
								<div class="d-grid gap-2 col-6 mx-auto">
                           <button class="btn btn-primary" type="submit" name="ingresar">Ingresar</button>
                        </div>
								<div class="d-grid gap-2 col-6 mx-auto" style = "margin-top:10px">
                            <a href="docentesDatos.php" class="btn btn-success" type="submit" name="listado">Listado de docentes</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>