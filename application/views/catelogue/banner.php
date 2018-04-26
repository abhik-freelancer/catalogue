<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
           
            <ol class="carousel-indicators">
            <?php 
                $i= 0;
                foreach ($banners as $banner){ 
             ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo($i); ?>" <?php if($i==0){echo('class="active"');} ?>></li>
             <?php 
                $i = $i +1;
                }
              ?>
              
            </ol>
            <div class="carousel-inner" role="listbox">
               <?php 
               $i =0;
               foreach($banners as $banner){?>
                
                <div class="carousel-item  <?php if($i==0){echo('active');}?> ">
                    <img class="d-block img-fluid" src="<?php echo(base_url()); ?>application/assets/images/bannerimages/<?php echo($banner['bannerimage']); ?>" alt="First slide">
                </div>
                
               <?php 
               $i= $i+1;
               } ?>  
                
<!--              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>-->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
             
</div>