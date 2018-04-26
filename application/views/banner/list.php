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


        <div class="row" >
            <div class="col-md-12">
                <div class="header-panel-info">
                    <a href="<?php echo base_url(); ?>banner/addEdit" class="btn btn-mantra">
                        <span class="glyphicon glyphicon-plus"></span> Add banner</a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-asterisk fa-fw"></i> Banner</h3>
                    </div>
		<div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
<!--                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood test</h3>
                                </div>-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="banner_list">
                                            <thead>
                                                <tr>
                                                    <th>Banner Text</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($bodycontent["bannerlist"]) {
                                                    foreach ($bodycontent["bannerlist"] as $content) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo($content["bannertext"]); ?></td>
                                                            <td>
                                                                <?php if($content["bannerimage"]!="") {?>
<!--                                                                        <button type="button" class="btn btn-primary btn-xs">Image</button>-->

                                                               <img id="myImg" class="bannerimage" data-toggle="modal" data-target="#imgmodal"
                                                                    src="<?php echo(base_url()); ?>application/assets/images/bannerimages/<?php echo($content["bannerimage"]); ?>" 
                                                                    alt="<?php echo($content["bannertext"]); ?>" width="100" height="75">
                                                                
                                                                        
                                                                <?php }?>
                                                               
                                                               
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>banner/addEdit/id/<?php echo($content["id"]);?>" 
                                                                   class="btn btn-warning btn-sm" role="button">Edit</a>
                                                                
                                                                <?php if($content["is_active"]=='Y'){?>
                                                                    <a href="<?php echo base_url(); ?>banner/status/id/<?php echo($content["id"].'/stat/Y');?>" class="btn btn-success btn-sm" role="button">Active</a>
                                                                <?php 
                                                                   }
                                                                   else{
                                                                       ?>
                                                                       <a href="<?php echo base_url(); ?>banner/status/id/<?php echo($content["id"].'/stat/N');?>" class="btn btn-danger btn-sm" role="button">Inactive</a>
                                                                <?php } ?>
                                                            </td>
                                                            
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!--One Repeatation Max Test-->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
<div id="delconfmodal-prdcatg" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are your sure to delete ?</p>
        <input type="hidden" id="prodcatgtmpid" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default del-prodctg-yes" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
        
<div id="imgmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="caption"></h4>
      </div>
      <div  class="modal-body">
          <img class="modalimg-content" id="img01" width="850" height="350">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>  
</div>
</div>





