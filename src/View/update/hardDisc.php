<div class="form-group">
        <label for="discCapacity">discCapacity</label>
        <input type="text" class="form-control" name="discCapacity" id="discCapacity" value="<?= $updateResult->getDiscCapacity(); ?>">
    </div>
    <div class="form-group">
        <label for="ssd">Ssd</label>
        <input type="text" class="form-control" name="ssd" id="ssd"<?php if ($updateResult->getSsd() == 0) {
        ?>value="0" <?php
    } else {
        ?> value="1" <?php } ?>>
    </div>