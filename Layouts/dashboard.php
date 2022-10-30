<?php use Core\Flash\Flash;?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KGB | Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	
	<!-- Datatable -->
    <link href="<?php echo assets('/ressources/base/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">

    <!-- Custom Stylesheet -->

    <link href="<?php echo  assets('/ressources/base/bootstrap-select/dist/css/bootstrap-select.min.css');?>"  rel="stylesheet">
    <link href="<?php echo assets('/ressources/css/style.css');?>"  rel="stylesheet">

    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

	<link href="<?php echo assets('/style.css');?>"  rel="stylesheet">


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header color-scheme-7">
            <a href="index.html" class="brand-logo">
				<div class="d-flex flex-column">               
                <img class="logo-compact d-flex" src="<?php echo assets('/images/logos/KGB.png');?>" alt="logo-compact">
				</div>
				
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->


		
		
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header color-scheme-3">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                       
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>Привет, <?php echo UpercaseFirst($user['nom']) ; ?></span>
									</div>
                                    <img src="<?php echo assets('/images/logos/profile-logo.png');?>" width="50" alt="image de profile"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="profile" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="Logout" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav color-scheme-3">
            <div class="deznav-scroll mm-active ps ps--active-y">
				<ul class="metismenu mm-show" id="menu">
                    <li class="mm-active"><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="true">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse mm-show">
							<li><a href="/">Home</a></li>
							<li><a href="agent-add">Ajouter un agent</a></li>
							<li><a href="agent-show">Liste des agents</a></li>
							<li><a href="cible-add">Ajouter une cible</a></li>
							<li><a href="cible-show">Liste des cibles</a></li>
							<li><a href="contact-add">Ajouter un contact</a></li>
							<li><a href="contact-show">Liste des contacts</a></li>
							<li><a href="mission-add">Ajouter une mission</a></li>
							<li><a href="mission-show">Liste des missions</a></li>
							<li><a href="planque-add">Ajouter une planque</a></li>
							<li><a href="planque-show">Liste des planques</a></li>

						</ul>
                    </li>
					<li>
						<ul aria-expanded="false" class="mm-collapse mm-show">
						<li>
						<a  href="lock-screen">
						<button type="button" class="btn btn-light">
							<i class="lni lni-lock-alt"></i> verrouiller
						</button>	
						</a>
						</li>									
						</ul>
					</li>

				</ul>
			
				<div class="copyright">
					<p><strong>KGB - Admin Dashboard</strong></p>
				</div>
				<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
				<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
				</div>
				<div class="ps__rail-y" style="top: 0px; height: 884px; right: 0px;">
				<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 773px;"></div>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
	
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body  color-scheme-2">     
            <div class="container-fluid">    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
							<h3>Управление миссией</h3>
                            <h4> Привет<i>(Bienvenue)</i>, <?php echo UpercaseFirst($user['nom']) ; ?></h4>

                            <?php get_flash_message_error(); ?>
							<?php get_flash_message_success(); ?>


							
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Service</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">opération secrète</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                <?php echo $content; ?>
					
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required bases -->
    <script src="<?php echo assets('/ressources/base/global/global.min.js' );?>"></script>
	<script src="<?php echo assets('/ressources/base/bootstrap-select/dist/js/bootstrap-select.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/custom.min.js' );?>"></script>
	<script src="<?php echo assets('/ressources/js/formulaire.js' );?>"></script>
	<script src="<?php echo assets('/ressources/js/deznav-init.js' );?>"></script>
	<script src="<?php echo assets('/ressources/base/sweetalert2/dist/sweetalert2.min.js' );?>"></script>
    <!-- Datatable -->
    <script src="<?php echo assets('/ressources/base/datatables/js/jquery.dataTables.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/plugins-init/datatables.init.js');?>"></script>
	
	



</body>
</html>