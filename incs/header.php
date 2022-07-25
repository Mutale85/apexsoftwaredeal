<?php 
    include 'includes/db.php';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dist/css/humber.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link rel="icon" type="images/rocketLogo.png" href="images/rocketLogo.png">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link rel="stylesheet" type="text/css" href="dist/js/toastr.min.css">
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="dist/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<!-- Primary Meta Tags -->
<title>Find the best discounted software for your business growth</title>
<meta name="title" content="Find the best discounted software for your business growth">
<meta name="description" content="We bring you validated discounted softwares and other tools that will save you lots of money and help your business grow.">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://apexsoftwaredeals.com/">
<meta property="og:title" content="Find the best discounted software for your business growth">
<meta property="og:description" content="We bring you validated discounted softwares and other tools that will save you lots of money and help your business grow.">
<meta property="og:image" content="images/metaImage.png">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://apexsoftwaredeals.com/">
<meta property="twitter:title" content="Find the best discounted software for your business growth">
<meta property="twitter:description" content="We bring you validated discounted softwares and other tools that will save you lots of money and help your business grow.">
<meta property="twitter:image" content="images/metaImage.png">
<script defer data-domain="apexsoftwaredeals.com" src="https://plausible.io/js/plausible.js"></script>

<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(this).toggleClass("is-active");
        });
    });
    function successNow(msg){
        toastr.success(msg);
        toastr.options.progressBar = true;
        toastr.options.positionClass = "toast-top-center";
        toastr.options.showDuration = 1000;
    }

    function errorNow(msg){
        toastr.error(msg);
        toastr.options.progressBar = true;
        toastr.options.positionClass = "toast-top-center";
        toastr.options.showDuration = 1000;
    }
</script>