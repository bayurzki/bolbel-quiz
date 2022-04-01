<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CCMS</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="http://themekita.com/demo-atlantis-lite-bootstrap/livepreview/examples/assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="<?php echo base_url() ?>/backend/js/plugin/webfont/webfont.min.js"></script>
    

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/backend/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/backend/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/backend/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/backend/js/plugin/UI/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/plugin/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/plugin/font-awesome-4-6-3/font-awesome.min.css">
    <link href="<?php echo base_url() ?>/plugin/dropzone-5-7/dropzone.min.css" rel="stylesheet" media="screen">
	<!-- STYLES -->

</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">
                
                <a href="#" class="logo">
                    <img src="http://themekita.com/demo-atlantis-lite-bootstrap/livepreview/examples/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?php echo base_url() ?>assets/backend/img/icon-menu.png" style="width: 100%; max-width: 25px;">
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
                
                <div class="container-fluid">
                    <!-- <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div> -->
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <!-- <div class="avatar-lg"><img src="<?php //echo base_url('upload/'.$this->session->userdata('photo'));?>" alt="image profile" class="avatar-img rounded"></div> -->
                                            <div class="u-text">
                                                <h4><?php echo "username"?></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url('login/logout');?>">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-1" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="<?php echo base_url('upload/1584163412_rstar1.png')?>" alt="User Icon" class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <?php echo "admin";?>
                                    <span class="user-level">
                                    Master
                                    </span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item">
                            <a href="Dashboard" aria-expanded="false" title="Dashboard">
                                <i class="fa fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/dashboard/question" aria-expanded="false" title="Dashboard">
                                <i class="fa fa-list"></i>
                                <p>Questions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/dashboard/quiz" aria-expanded="false" title="Dashboard">
                                <i class="fa fa-list"></i>
                                <p>Quiz</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url()?>/dashboard/courses" aria-expanded="false" title="Dashboard">
                                <i class="fa fa-list"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <dic class="main-panel">
        	<div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Questions</h2>
                            </div>
                        </div>
                    </div>
                </div>