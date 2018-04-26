<!DOCTYPE html>
<html lang="en">

     <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Demo panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>application/assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- data table css -->
        <link href="<?php echo base_url(); ?>application/assets/css/dataTables.bootstrap.min.css" rel="stylesheet">  

       

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>application/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom Style -->

        <link href="<?php echo base_url(); ?>application/assets/css/metisMenu.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/assets/css/sb-admin-2.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/assets/css/morris.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/assets/css/magic-check.css" rel="stylesheet">




        <link href="<?php echo base_url(); ?>application/assets/css/style.css" rel="stylesheet">
        <!-- Bootstrap datepicker -->
        <link href="<?php echo base_url(); ?>application/assets/css/bootstrap-datepicker.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/assets/css/bootstrap-timepicker.min.css" rel="stylesheet">
        <!-- Bootstrap datepicer end -->

       
        <link href="<?php echo base_url(); ?>application/assets/css/bootstrapselect.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>application/assets/css/jquery.bxslider.css" rel="stylesheet" />     
        <link href="<?php echo base_url(); ?>application/assets/css/jquery.fancybox.min.css" rel="stylesheet" />



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>application/assets/js/jquery.js"></script>
        <!--for temporary  add file from folder-->
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>application/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-confirmation.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/dataTbleBootstrap.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-timepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/bootstrapselect.min.js"></script>

    </head>

    <body>




        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>memberdashboard">Admin Panel</a>
                    <input type="hidden" value="<?php echo base_url(); ?>" id="basepath"></input>      
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $login; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
<!--                                <a href="<?php echo base_url(); ?>profile"><i class="fa fa-fw fa-user"></i> Profile</a>-->
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            
                            <li>
<!--                                <a href="<?php echo base_url(); ?>changepass"><i class="fa fa-fw fa-gear"></i> Change password</a>-->
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Change password</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url(); ?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>memberdashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" >
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>Catelogue<span class="glyphicon glyphicon-menu-down"></span>
                                </a>
                                <ul  class="collapse nav nav-third-level">
                                    <li><a href="<?php echo base_url(); ?>category"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Category</a></li>
                                    <li><a href="<?php echo base_url(); ?>subcategory"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sub Category</a></li>
                                    <li><a href="<?php echo base_url(); ?>item"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Product</a></li>
                                    
                                </ul>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>banner"><i class="fa fa-fw fa-dashboard"></i> Banner</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>contactlist"><i class="fa fa-fw fa-dashboard"></i> Contact List</a>
                            </li>
                            
                            
                          </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


            <!--content  inserted here--->

            <?php if ($bodyview) : ?>  


                <?php $this->load->view($bodyview); ?>


                <?php
            endif;
            ?>


        </div>
        <!-- /#wrapper -->
     <!--moment js-->
        
        <script src="<?php echo base_url(); ?>application/assets/js/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/datetime-moment.js"></script>
        <!--moment js-->

        <script src="<?php echo base_url(); ?>application/assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/sb-admin-2.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/jquery.bxslider.js"></script>      
        <script src="<?php echo base_url(); ?>application/assets/js/jquery.fancybox.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/category/categoryJS.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/subcategory/subcategory.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/item/item.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/banner/banner.js"></script>
        <!--Morris Charts JavaScript ---->
        <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/plugins/morris/morris-data.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/sidebar-menu.js"></script>
        <script src="<?php echo base_url(); ?>application/assets/js/metisMenu.js"></script> 



    </body>

</html>
