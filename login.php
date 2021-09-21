<?php
session_start();

    if ( isset($_SESSION['role']) && ( $_SESSION['role'] == "admin" || $_SESSION['role'] == "super-admin") ) {
	header("Location: home.php");
	exit;
    }elseif(isset($_SESSION['role']) && $_SESSION['role'] == "candidat"){
		header("Location: candidathome.php");
		exit;
	}elseif(isset($_SESSION['role']) && $_SESSION['role'] == "membre"){
		header("Location: membrehome.php");
		exit;
	}

	$error = false;
	if( isset($_POST['btn-login']) )
            {

            if ($_POST['email'] != '' && $_POST['password'] != '')
                {
					//include_once 'connexion/Connexion.php';
                    include_once 'beans/Utilisateur.php';
					include_once 'service/UtilisateurService.php';
					include_once 'beans/Admin.php';
                    include_once 'service/AdminService.php';
                    include_once 'beans/Candidat.php';
					include_once 'service/CandidatService.php';
					include_once 'beans/Membre.php';
					include_once 'service/MembreService.php';
          			include_once 'beans/Etablissement.php';
          			include_once 'service/EtablissementService.php';

					$us = new UtilisateurService();
					$as = new AdminService();
					$cs = new CandidatService();
					$ms = new MembreService();
          $et = new EtablissementService();
                    $id = $us->findByEmail($_POST['email']);

                    $password = $_POST['password'];
                    $pass = strip_tags($password);
                    $pass = htmlspecialchars($pass);

                    if ( $id != -1 )
                        {
						$utilisateur = $us->findById($id);

						//$candidat = $cs->findByCin($utilisateur->getIdCandidat());
                        if($utilisateur->getPassword() == md5($pass))
                            {
								if($utilisateur->getRole() === 'admin' || $utilisateur->getRole() === 'super-admin')
								{
                  	$admin = $as->findByCin($utilisateur->getIdAdmin());
                            		$_SESSION['utilisateur'] = $admin->getCin();
                            		$_SESSION['photo'] = $admin->getPhoto();
                            		$_SESSION['nom'] = $admin->getNom().' '.$admin->getPrenom();
                            		$_SESSION['role'] = $utilisateur->getRole();
									$_SESSION['email'] = $utilisateur->getEmail();
									$_SESSION['etablissement'] = $admin->getEtablissement();
                  $Etablissement=$et->findById($admin->getEtablissement());
                  $_SESSION['abrEtab']=$Etablissement->getAbr();
									header('Location:./home.php');
								}
								elseif($utilisateur->getRole() === 'candidat')
								{
                  $candidat = $cs->findByCin($utilisateur->getIdCandidat());
									$_SESSION['utilisateur'] = $candidat->getCin();
                            		$_SESSION['photo'] = $candidat->getPhoto();
                            		$_SESSION['nom'] = $candidat->getNomfr().' '.$candidat->getPrenomfr();
                            		$_SESSION['role'] = $utilisateur->getRole();
									$_SESSION['email'] = $utilisateur->getEmail();
									header('Location:./candidathome.php');
								}elseif($utilisateur->getRole() === 'membre')
								{
                  $membre = $ms->findByCin($utilisateur->getIdMembre());
									$_SESSION['utilisateur'] = $membre->getCin();
                            		$_SESSION['photo'] = $membre->getPhoto();
                            		$_SESSION['nom'] = $membre->getNomfr().' '.$membre->getPrenomfr();
                            		$_SESSION['role'] = $utilisateur->getRole();
									$_SESSION['email'] = $utilisateur->getEmail();
                  $_SESSION['etablissement']=$membre->getEtablissement();
									header('Location:./membrehome.php');
								}

                            }else
                                {
                                    $errMSG = "Invalid Mot De Passe ...";
                                }

                        }else {
                            $errMSG = "Invalid informations ...";
                                }

                    }
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-recrutement Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/loginUtil.css">
	<link rel="stylesheet" type="text/css" href="css/loginMain.css">
<!--===============================================================================================-->
</head>
<style media="screen">
.logo{
	height: 100px;
	border-radius: 50%;
	background: url('img/universite%cc%81_CD_logo.jpg') no-repeat center;
}
	.log-btn {
		width: 190px;
		padding: 9px;
		background-color: rgb(0,174,235);
		border-radius: 25px;
		color: white;
		font-size: x-large;
		font-weight: bold;
	}
.log-btn:hover{
	background-color: rgb(236, 240, 241);
	color: rgb(0,174,235);
}
*{
  font-family:Arial, Helvetica, sans-serif;
}

</style>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bgTest.jpeg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style='font-family:Arial'>
					Authentification
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

					<?php
		if ( isset($errMSG) ) {

			?>
			<div class="form-group">
						<div class="alert alert-danger">
			<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
							</div>
						</div>
							<?php
		}
		?>
		<div class="wrap-input100 logo">

		</div>

					<div class="wrap-input100" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="log-btn" name="btn-login">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="script/loginMain.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
