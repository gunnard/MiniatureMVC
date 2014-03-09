<?php if ($data['vendor']) : ?>
    Vendor <?php echo $data['vendor']['firstName'] . ' ' . $data['vendor']['lastName']; ?> has made <?php echo $data['vendor']['sales']; ?> sales this month.
<?php else: ?>
    There is no vendor found with the following id : <?php echo $data['vendorId']; ?>
<?php endif; ?>

