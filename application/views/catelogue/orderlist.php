<div class="row itemcontainer">
<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        
        <table class="table table-bordered ">

            <tr>
                <th>Qty</th>
                <th>Product</th>
                <th style="text-align:right">Unit price</th>
                <th style="text-align:right">Sub total</th>
            </tr>

            <?php $i = 1; ?>

            <?php foreach ($this->cart->contents() as $items): ?>

                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                <tr class="<?php echo ($i % 2 == 0 ? "table-success" : "table-warning"); ?> ">
                    <td>
                        <?php echo($items['qty']); ?>
                    </td>
                    
                    <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                            <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                    <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                <?php endforeach; ?>
                            </p>

                        <?php endif; ?>

                    </td>
                    <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

                <?php $i++; ?>

            <?php endforeach; ?>

            <tr>
                <td colspan="2"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="right">
                    $<?php echo $this->cart->format_number($this->cart->total()); ?>
                    <input type="hidden" name="totalamount" id="totalamount" value="<?php echo $this->cart->format_number($this->cart->total()); ?>"/>
                </td>
            </tr>

        </table>
    </div>
    <div class="col-lg-1">
        
    </div>  
  </div>
    <div class="row">
        <div class="col-lg-6">
            
            
        </div>        
        <div class="col-lg-6">
<!--            <a class="btn btn-circle btn-primary" href="<?php echo (base_url()); ?>catelogue/payform" role="button">Payment</a>-->
            <?php echo form_open('catelogue/payform'); ?>
                    
                     <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_Yp1tTy6qkhzzyysstaYmv12o"
                        data-amount="<?php echo(round($this->cart->total())* 100); ?>"
                        data-name="Demo catalogue"
                        data-description="ecomcatlogue stripe test mode payment."
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto"
                        data-label="Payment"
                        data-panel-label="Pay {{amount}} in Stripe test mode"
                        >
                   </script>
        </div>
    </div>
      
  </div>  
</div>
