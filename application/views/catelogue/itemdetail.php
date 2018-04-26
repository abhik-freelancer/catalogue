<style>
.imgitem {
    border: 1px solid #ddd; /* Gray border */
    border-radius: 4px;  /* Rounded border */
    padding: 5px; /* Some padding */
    width: 250px; /* Set a small width */
}

/* Add a hover effect (blue shadow) */
.imgitem:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>

<div class="row itemcontainer">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    <a target="_blank" href="#">
                        <img class="imgitem" src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php echo($bodydata["item_image_1"]==""?"no-image.png":$bodydata["item_image_1"]) ?>" alt="Forest">
                    </a>
                </div>
                <div class="col-md-4">
                    <a target="_blank" href="#">
                        <img class="imgitem" src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php echo($bodydata["item_image_2"]==""?"no-image.png":$bodydata["item_image_2"]) ?>" alt="Forest">
                    </a>
                </div>
                <div class="col-md-4">
                    <a target="_blank" href="#">
                        <img class="imgitem" src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php echo($bodydata["item_image_3"]==""?"no-image.png":$bodydata["item_image_3"]) ?>" alt="Forest">
                    </a>
                </div>
            </div>
        </div>
        
        
    </div>
    <div class="row">
        <div class="well well-lg">&nbsp;</div>
        <div class="col-lg-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <h4 class="card-title">
                        <?php echo($bodydata["item_name"]) ?>
                      </h4>
                      <h5>$<?php echo($bodydata["item_price"]);?></h5>
                      <p class="card-text"><?php echo($bodydata["item_desc"]) ?></p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">
                          <input type="hidden" name="hditemid" id="hditemid" value="<?php echo($bodydata["item_id"]);?>"/>
                          <button type="button" class="btn btn-primary btn-sm" id="addtocart">Add to cart</button>
                          <input type="text" style="width:10%" placeholder="Qty" class="input-sm" id="qtyorder">
                      </small>
                       
                      
                    </div>
                  </div>
         </div>
        
        
        
        
        <div class="well well-lg">&nbsp;</div>
    </div>
    
</div>

