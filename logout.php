<?php
        
	require_once("Common/url_details.php");
    
	header("location:".$url_request.$url_domain_name);
	session_start();
	session_unset();
	session_destroy();
	
?>