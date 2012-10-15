<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1">
        <title>買うものリスト</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
        <script src="http://code.jquery.com/ui/1.8.16/jquery-ui.min.js"></script>
        <?php echo Asset::js('jquery.ui.touch-punch.js'); ?>
    </head>
    <body>
        <ul data-role="listview" data-filter="true" data-inset="true" data-split-icon="check" class="sortable">
            <li data-role="list-divider">これ買ってきて</li>
<?php foreach ($kaumonos as $kaumono): ?>
    <li>
        <a href="#"><?php echo $kaumono->name; ?></a>
        <a href="#">買った！</a>
    </li>
<?php endforeach; ?>
        </ul>
        <script>
            $(".sortable").sortable();
        </script>
    </body>
</html>
