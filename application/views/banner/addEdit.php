<div id="page-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Banner
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
                                    <?php if($this->session->flashdata('bannertxtempty')){?>
                                        <div class="alert alert-danger validation-msg" >
                                             <button type="button" class="close valid-alert-close">&times;</button>
                                                <strong>*</strong><?php echo($this->session->flashdata('bannertxtempty')); ?> 
                                        </div>
                                     <?php } ?>
                               
                                    <?php if($this->session->flashdata('fatalerror')){?>
                                     <div class="alert alert-danger emailvalidation-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                             <?php echo($this->session->flashdata('fatalerror')); ?> 
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if($this->session->flashdata('banneruploaderr')){?>
                                    <div class="alert alert-danger uploaderror-msg" style="display: none;">
                                         <button type="button" class="close email-alert-close">&times;</button>
                                        <?php echo($this->session->flashdata('banneruploaderr')); ?>
                                    </div>
                                    <?php } ?>
                                    
                                    <form role="form"  id="" method="post" action="<?php echo(base_url().'banner/savebanner')?>" enctype="multipart/form-data">
                                        <input type="hidden" id="hdbannerid" name="hdbannerid"  value="<?php echo($bodycontent["banner"]["id"]);?>"/>
                                        <div class="form-group">
                                            <label>Banner *</label>
                                            <input class="form-control" placeholder="Banner" id="bannertext" name="bannertext"  value="<?php echo($bodycontent["banner"]["bannertext"]);?>">
                                        </div>
                                       
                                        <div class="form-group">
                                            <span style="font-size: 14px; color: red;float: right;">*[Allowed type 'jpeg', 'jpg', 'png', 'gif'][900 X 350]</span>
                                             <input type="file" name="banner_image" id="banner_image" accept="image/*" onchange=""/>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" id="banner_save">Save</button>
                                        <a href="<?php echo base_url().'banner'; ?>" class="btn btn-primary" role="button">Cancel</a>

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




