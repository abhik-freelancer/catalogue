
<label>Subcategory </label>
<select id="subcategory" name="subcategory" class="form-control">
    <option value="">--Select--</option>
    <?php
    if ($catSub) {
        foreach ($catSub as $subcategory) {
            ?>
            <option value="<?php echo($subcategory["subcategory_id"]) ?>">
                <?php echo($subcategory["sub_cat_desc"]); ?>
            </option>

    <?php }
} ?>
</select>

