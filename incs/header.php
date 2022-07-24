<?php 
    include 'includes/db.php';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dist/css/humber.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link rel="icon" type="images/logo.png" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link rel="stylesheet" type="text/css" href="dist/js/toastr.min.css">
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="dist/js/toastr.min.js"></script>

<title>ApexSoftwaredeals - Earning From Your Hard Works</title>

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