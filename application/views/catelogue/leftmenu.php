<div class="list-group">
<?php
foreach ($catloguemenu as $category)
{
?>
<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo($category["category_id"]."_collapse"); ?>" class="list-group-item itemcatg" 
   value="<?php echo($category["category_id"]);?>">
    <img class="img-responsive" src="<?php echo(base_url()); ?>application/assets/images/categoryimages/thumbnail/<?php echo($category["image_thumnail"]==""?"no-image.png":$category["image_thumnail"]);  ?>" alt="..." style="width: 35%">
    <?php echo($category["category_name"]); ?>
</a>    
    
  <?php
  if(!empty($category["subcategory"]))
    {
  ?>
      <div  class="collapse" id="<?php echo($category["category_id"]."_collapse");?>">
      <div class="list-group collapse" >
               <?php
               foreach($category["subcategory"] as $sub_cat)
                {
                ?>
                    <a href="#" class="list-group-item subcatg" style="background: #DDD" value="<?php echo($sub_cat["subcategory_id"]);?>">
                        <img class="img-responsive" 
                             src="<?php echo(base_url()); ?>application/assets/images/subcategoryimages/thumbnail/<?php echo($sub_cat["thumnail_image"]==""?"no-image.png":$sub_cat["thumnail_image"]);  ?>" 
                             alt="..." style="width: 28%">
                          <?php echo($sub_cat["sub_cat_desc"]); ?>
                    </a>
                    
                <?php
                }
                ?>
      </div>
      </div>
  <?php 
    } 
  ?>
<?php
}
?>
</div>    
<!--<div class="list-group">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour1" class="list-group-item">
                  <img class="img-responsive" src="<?php echo(base_url()); ?>application/assets/images/itemimages/c00625586032310ff5e13f0700922373.png" alt="..." style="width: 35%">
                  Category 1
              </a>
              <div  class="collapse" id="collapseFour1">
                      <div class="list-group collapse" >
                        <a href="#" class="list-group-item active">
                          Cras justo odio
                        </a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                      </div>
               </div>
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour2" class="list-group-item">
                  <img class="img-responsive" src="<?php echo(base_url()); ?>application/assets/images/itemimages/c00625586032310ff5e13f0700922373.png" alt="..." style="width: 35%">
                  Category 2
              </a>
              <div  class="collapse" id="collapseFour2">
                      <div class="list-group collapse" >
                        <a href="#" class="list-group-item active">
                          Cras justo odio
                        </a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                      </div>
               </div>  
               <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour3" class="list-group-item">
                  <img class="img-responsive" src="<?php echo(base_url()); ?>application/assets/images/itemimages/c00625586032310ff5e13f0700922373.png" alt="..." style="width: 35%">
                  Category 3
              </a>
              <div  class="collapse" id="collapseFour3">
                      <div class="list-group collapse" >
                        <a href="#" class="list-group-item active">
                          Cras justo odio
                        </a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                      </div>
               </div>  
            </div>-->