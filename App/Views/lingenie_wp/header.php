<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : "Ecole" ?></title>
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php if (isset($should_map)) { ?>
        <link rel="stylesheet" type="text/css" href="https://openlayers.org/en/v3.20.1/css/ol.css">
        <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
        </script>
    <?php } ?>

    <link rel="icon" href="/<?= isset($ico) ? $ico : "images/1.png" ?>" />
</head>

<body>