<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flora-LMS</title>
    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/home.css">
    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/study.css">

    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/global.css">
    <link rel="stylesheet" href="<?= base_url()?>/public/assets/css/test.css">
    <script src="<?= base_url()?>/public/assets/js/index.js"></script>
    
     <!-- External Stylesheets -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- External JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

 

    <?php
    if (!empty($header_asset_link)) {
        foreach ($header_asset_link as $link) {
            echo "<link href='" . base_url() . 'public/' . $link . "' rel='stylesheet' type='text/css'>";
        }
    }

    if (!empty($header_link)) {
        foreach ($header_link as $link) {
            require_once ('css/' . $link);
        }
    }
    ?>