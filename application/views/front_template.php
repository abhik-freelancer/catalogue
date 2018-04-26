<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Catelogue</title>
   <!-- Bootstrap core CSS -->
    <link href="<?php echo(base_url()); ?>application/assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo(base_url()); ?>application/assets/front/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo(base_url()); ?>application/assets/front/css/shop-homepage.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo (base_url()); ?>catelogue">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo(base_url()); ?>catelogue/displaycart">Cart 
                    <?php if(!empty($carttotal)){ ?>
                    <span id="carttot" style="font-size: 14px;background: #9fcdff">(<?php echo($carttotal); ?>)</span>
                    <?php } ?>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo(base_url()); ?>contact">Contact</a>
            </li>
            
            <li class="nav-item">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" id="srch-item">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="button" id="srch-btn">
                    Search
                  </button>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
            <input type="hidden" value="<?php echo base_url(); ?>" id="frontbasepath">
      <div class="row">
           <div class="col-lg-3">

            <h3 class="my-4">Catalogue</h3>
            <!--menu-->
            <?php $this->load->view($leftmenu); ?>
            <!--menu-->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-9">
              <?php $this->load->view($bannerpage); ?>  
                
              <?php $this->load->view($bodypage); ?>
          <!-- /.row -->
            </div>
        <!-- /.col-lg-9 -->
        </div>
      <!-- /.row -->


    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Pentabits Catelogue Demo</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo(base_url()); ?>application/assets/front/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo(base_url()); ?>application/assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo(base_url()); ?>application/assets/js/catalogue/frontcatg.js"></script>
    

  </body>

</html>


