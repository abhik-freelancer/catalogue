<?php 
$counter = 1;
foreach($imgesdata as $img ){ 
?>
<?php if($counter==1){ ?>
    
<div class="item active thumbnail">
    <img class="img-responsive" src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php  echo($img==""?'no-image.png':$img);   ?>" alt="..." style="width: 35%">
        <div class="carousel-caption">
        One Image
        </div>
</div>
    <?php }else{
        
        ?>
<div class="item thumbnail">
      <img class="img-responsive" src="<?php echo(base_url()); ?>application/assets/images/itemimages/<?php echo($img==""?'no-image.png':$img);?>" alt="..." style="width: 35%">
      <div class="carousel-caption">
        Another Image
      </div>
</div>

        <?php }?>

<?php 
$counter++;
} 
?>

