<!DOCTYPE HTML>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php echo $data['vendor']['firstName']; ?>'s sales</title>

    </head>

    <body>

        Vendor <?php echo $data['vendor']['firstName'] . ' ' . $data['vendor']['lastName']; ?>
        has made <?php echo $data['vendor']['sales']; ?> sales this month.

    </body>
</html> 