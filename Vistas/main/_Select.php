<?php // echo "<pre>";print_r($columnas);echo $columnas[0];?>
<select name="<?php echo $name; ?>" id="<?php echo $id; ?>" <?php echo $disabled; ?>  class="text ui-widget-content ui-corner-all <?php echo $class; ?>" style="width: 160px;"  data-placeholder="Seleccione ..." >
    <option value="">......</option>
    <?php foreach ($rows as $key => $data) { ?>
        <?php if ($code != $data[$value] ) { ?>
    <option value="<?php echo $data[$value]; ?>"> <?php echo strtoupper($data[$option]) ?> </option>
        <?php } else { ?>
            <option selected="selected" value="<?php echo $data[$value]; ?>"> <?php echo $data[$option]; ?> </option>
        <?php }  ?>
    <?php } ?>
</select>