<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> <?php echo TITLE ?> | <?php echo CLINIC_NAME ?> </title>
<link rel="stylesheet" href="<?php echo $url_request.$url_domain_name ?>Style/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>

var mySidebar = document.getElementById("mySidebar");
var overlayBg = document.getElementById("myOverlay");

function nav_open() {
    if(mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } 
    else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

function nav_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>