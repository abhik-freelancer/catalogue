<div class="row itemcontainer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($message == 'succeeded') { ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo($messagedata); ?>.
                    </div>

                <?php }if ($message != "" && $message != 'succeeded') { ?>
                    <div class="alert alert-danger">
                        <strong>Info!</strong> Something internal error occur.
                    </div>

                <?php } ?>
            </div>
          </div>
            <div class="row">
                <div class="col-md-12">
                <a class="btn btn-circle btn-primary" href="<?php echo (base_url()); ?>catelogue" role="button">Go back to home -></a>
                </div>
            </div>
        
    </div>
</div>
