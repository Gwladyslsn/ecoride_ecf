<?php 

require_once _ROOTPATH_.'/src/templates/header.php';?>

<?php if ($error){ ?>
<div class="alert alert-danger">
    <?=$error; ?>
</div>
<?php } ?>

<?php
require_once _ROOTPATH_.'/src/templates/footer.php';?>