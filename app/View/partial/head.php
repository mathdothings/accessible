<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessible</title>
    <?php
    $styles = listAllStylesPath(STYLE_ROOT);
    foreach ($styles as $style) { ?>
        <link rel="stylesheet" href="<?= '/style' . $style . '?v=' . time(); ?>">
    <?php } ?>
</head>

<body>