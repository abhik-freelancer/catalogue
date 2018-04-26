
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Logged user details
                    </li>
                </ol>  
                
            </div>
        </div>
<!--       <div class="row" >
            <div class="col-md-12">
                <div class="header-panel-info">
                    <a href="<?php echo base_url(); ?>item/addEdit" class="btn btn-mantra">
                        <span class="glyphicon glyphicon-plus"></span> Add item</a>
                </div>
            </div>
        </div>-->
        <div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-asterisk fa-fw"></i> Contact's List </h3>
                    </div>
		<div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
<!--                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood test</h3>
                                </div>-->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="itemlist">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                if ($bodycontent["contactlist"]) {
                                                    foreach ($bodycontent["contactlist"] as $content) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo($content["NAME"]); ?></td>
                                                            <td><?php echo($content["email_add"]); ?></td>
                                                            <td><?php echo(wordwrap($content["message"], 70, "<br/>") );  ?></td>
                                                            <td><?php echo($content["created_date"]); ?></td>
                                                            <td>
                                                                
                                                              <?php if($content["is_active"]=='Y'){?>
                                                                    <a href="<?php echo base_url(); ?>contactlist/status/id/<?php echo($content["id"].'/stat/Y');?>" class="btn btn-success btn-xs" role="button">Active</a>
                                                                <?php 
                                                                   }
                                                                   else{
                                                                       ?>
                                                                       <a href="<?php echo base_url(); ?>contactlist/status/id/<?php echo($content["id"].'/stat/N');?>" class="btn btn-danger btn-xs" role="button">Inactive</a>
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
<div id="delconfmodal-product" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are your sure to delete ?</p>
        <input type="hidden" id="hdproductid" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default del-product-yes" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
        
        
        
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Wrapper for slides -->
  <div class="carousel-inner cntimg">
      
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
    </div>
  </div>
</div 
</div>
    
    
</div>






