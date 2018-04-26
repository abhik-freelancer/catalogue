
<style>
    .file {
  visibility: hidden;
  position: absolute;
}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Product
                    </li>
                </ol>  
                
            </div>
        </div>
       <div class="row">
            <div class="col-lg-12">
                
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            
                            <div class="panel panel-warning">
                                <div class="panel-heading">Item Add/Edit</div>
                                <div class="panel-body">
                                    <div class="alert alert-danger validation-item-msg" style="display: none;">
                                         <button type="button" class="close valid-alert-close">&times;</button>
                                            <strong>*</strong> Indicates a mandatory fields.
                                    </div>
<!--                                  <div class="alert alert-danger emailvalidation-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                             Enter a valid email address.
                                    </div>-->
                                   <div class="alert alert-danger itemimage-upld-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                         <div id="fileerrmsg"></div>
                                    </div>
                                    
                                    <form role="form"  id="frmitem" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="hditemid" name="hditemid" 
                                               value="<?php echo($bodycontent["item"]["item_id"]);?>"/>
                                        <div class="form-group">
                                            <label>Item *</label>
                                            <input class="form-control" placeholder="Product" id="product" name="product" 
                                                   value="<?php echo($bodycontent["item"]["item_name"]);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Item Desc</label>
                                            <textarea class="form-control" placeholder="Product Description" id="proddesc" name="proddesc"><?php echo($bodycontent["item"]["item_desc"]);?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <select id="category" name="category" class="form-control">
                                                <option value="">--Select--</option>
                                                <?php if($bodycontent["category"]){
                                                    foreach ($bodycontent["category"] as $category){
                                                    ?>
                                                        <option value="<?php echo($category["category_id"])?>"
                                                                <?php if($category["category_id"]==$bodycontent["item"]["item_catg_id"]){echo("selected='selected'");}?>
                                                                ><?php echo($category["category_name"]); ?></option>

                                                    <?php } } ?>
                                                       </select>
                                        </div>
                                        
                                        <div class="form-group subcatg">
                                            <label>Subcategory </label>
                                            <select id="subcategory" name="subcategory" class="form-control">
                                                <option value="">--Select--</option>
                                                <?php if($bodycontent["subcategory"]){
                                                    foreach ($bodycontent["subcategory"] as $subcategory){
                                                    ?>
                                                        <option value="<?php echo($subcategory["subcategory_id"])?>"
                                                                <?php if($subcategory["subcategory_id"]==$bodycontent["item"]["item_sub_catg"]){echo("selected='selected'");}?>
                                                                ><?php echo($subcategory["sub_cat_desc"]); ?></option>

                                                    <?php } } ?>
                                            </select>
                                        </div>
                                        
                                        <!--file upload-->
                                        
                                        <div class="form-group">
                                            <input type="file" name="img_1" class="file">
                                            <div class="input-group col-xs-12">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                <input type="text" class="form-control input-sm" disabled placeholder="Upload Image">
                                                <span class="input-group-btn">
                                                    <button class="browse btn btn-primary input-sm" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                             <img src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php  echo($bodycontent["item"]["item_image_1"]==""?'no-image.png':$bodycontent["item"]["item_image_1"]);   ?>" class="img-rounded" alt="Cinque Terre"> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="file" name="img_2" class="file">
                                            <div class="input-group col-xs-12">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                <input type="text" class="form-control input-sm" disabled placeholder="Upload Image">
                                                <span class="input-group-btn">
                                                    <button class="browse btn btn-primary input-sm" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                             <img src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php  echo($bodycontent["item"]["item_image_2"]==""?'no-image.png':$bodycontent["item"]["item_image_2"]);   ?>" class="img-rounded" alt="Cinque Terre"> 
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                            <input type="file" name="img_3" class="file">
                                            <div class="input-group col-xs-12">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                <input type="text" class="form-control input-sm" disabled placeholder="Upload Image">
                                                <span class="input-group-btn">
                                                    <button class="browse btn btn-primary input-sm" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                             <img src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php  echo($bodycontent["item"]["item_image_3"]==""?'no-image.png':$bodycontent["item"]["item_image_3"]);   ?>" class="img-rounded" alt="Cinque Terre"> 
                                        </div>
                                        
                                        
                                        <!--file upload-->
                                        
                                        
                                        
                                        <div class="form-group">
                                            <label>Price </label>
                                            <input class="form-control" placeholder="Price" id="itemprice" name="itemprice" 
                                                   value="<?php echo($bodycontent["item"]["item_price"]);?>">
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-primary" id="itemsave">Save</button>
                                        <button type="button" class="btn btn-primary" id="itemcancel">Cancel</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3"></div>
                </div>
                    
            </div>
        </div>
        
        <!--message modal --->
        <div class="modal fade" id="item_opt_msg" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close xcrossitem" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Messages</h4>
                </div>
                <div class="modal-body">
                    <div id="successmsgText"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default mdclose-item" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
    </div>
</div>


