<?php

$levels = array();

if(isset($_SESSION['lvl1'])){
    array_push($levels, $_SESSION['lvl1']);
}

if(isset($_SESSION['lvl2'])){
    array_push($levels, $_SESSION['lvl2']);
}

if(isset($_SESSION['lvl3'])){
    array_push($levels, $_SESSION['lvl3']);
}

?>
<div class='w3-padding w3-text-dark-gray'>
    <?php
        for ($i=0; $i < $level; $i++) { 
    ?>
    <a href="<?php echo $levels[$i]['url'] ?>" style="text-decoration:none;"> 
        <span style='padding:0px 4px;' class='kel-hover'> <?php echo $levels[$i]['name'] ?> </span> 
    </a>
    <i class='fa fa-chevron-right '></i> 
    <?php
        }
    ?>
</div>