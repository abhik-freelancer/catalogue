<?php if(!empty($items)) { ?>
<div class="row itemcontainer">
    
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-3">&nbsp;</div>
        
        <div class="col-md-3" style="padding-bottom: 1px;">
            <select class="form-control catgorder" id="<?php echo($categoryId);?>">
                <option value="DESC" <?php if($orderby=="DESC"){echo('selected=selected');} ?> >Price high to low</option>
                <option value="ASC" <?php if($orderby=="ASC"){echo('selected=selected');} ?>>Price low to high</option>
            </select>
        </div>
        
   
            <?php foreach ($items as $item) {?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <a href="<?php echo(base_url());?>catelogue/getItemDetails/<?php echo($item["item_id"]) ?>">
                        <img class="card-img-top" src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php echo($item["item_image_1"]==""?"no-image.png":$item["item_image_1"]) ?>" alt="">
                    </a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="<?php echo(base_url());?>catelogue/getItemDetails/<?php echo($item["item_id"]) ?>"><?php echo($item["item_name"]) ?></a>
                      </h4>
                      <h5>$<?php echo($item["item_price"])?></h5>
                      <p class="card-text"><?php echo ($item["item_desc"]); ?></p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                  </div>
                </div>
            <?php } ?>
</div>
<?php }else{ ?>
<div class="row itemcontainer">
     
     <div class="col-lg-12">
         <div class="alert alert-warning">
             <strong>Sorry!!</strong> No item found.
         </div>
     </div>
    
</div>

<?php } ?>
