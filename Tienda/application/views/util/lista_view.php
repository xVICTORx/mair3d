<select>
    <option value="">...</option>
    <?php foreach($options as $key => $option): ?>
    <option value="<?php echo $option->value ?>"><?php echo $option->label ?></option>
    <?php endforeach; ?>
</select>
