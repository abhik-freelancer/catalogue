<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Product category
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
                                <div class="panel-heading">Add/Edit</div>
                               
                                <div class="panel-body">
                                    <?php if($this->session->flashdata('catenameempty')){?>
                                        <div class="alert alert-danger validation-msg" >
                                             <button type="button" class="close valid-alert-close">&times;</button>
                                                <strong>*</strong><?php echo($this->session->flashdata('catenameempty')); ?> 
                                        </div>
                                     <?php } ?>
                               
                                    <?php if($this->session->flashdata('fatalerror')){?>
                                     <div class="alert alert-danger emailvalidation-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                             <?php echo($this->session->flashdata('fatalerror')); ?> 
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if($this->session->flashdata('fileuploaderror')){?>
                                    <div class="alert alert-danger uploaderror-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                        <?php echo($this->session->flashdata('fileuploaderror')); ?>
                                    </div>
                                    <?php } ?>
                                    <form role="form"  id="" method="post" action="<?php echo(base_url().'category/savecategory')?>" enctype="multipart/form-data">
                                        <input type="hidden" id="hdcategoryid" name="hdcategoryid" 
                                               value="<?php echo($bodycontent["category"]["category_id"]);?>"/>
                                        <div class="form-group">
                                            <label>Category *</label>
                                            <input class="form-control" placeholder="Category" id="category" name="category" 
                                                   value="<?php echo($bodycontent["category"]["category_name"]);?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Desc</label>
                                            <textarea class="form-control" placeholder="Category Description" id="catgdesc" name="categorydesc">
                                                <?php echo($bodycontent["category"]["category_desc"]);?>
                                            </textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <span style="font-size: 14px; color: red;float: right;">*[Allowed type 'jpeg', 'jpg', 'png', 'gif']</span>
                                             <input type="file" name="category_image" id="category_image" accept="image/*" onchange=""/>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" id="category_save">Save</button>
                                        <a href="<?php echo base_url().'category'; ?>" class="btn btn-primary" role="button">Cancel</a>

                                    </form>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3"></div>
                </div>
                    
            </div>
        </div>
        
        <!--message modal --->
        <div class="modal fade" id="msgdivsuccess" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close mdclose" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <div id="successmsgText"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default mdclose-prodcatg" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
        </div>
        
        
        <!--message modal--->
        
    </div>
</div>




