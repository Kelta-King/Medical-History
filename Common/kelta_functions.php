<?php
	function logout_modal($header = "Are you sure?"){
?>
	<div id="kelta_alert_box" class="w3-modal" onclick="this.style.display='none'">
		<div class="w3-modal-content w3-animate-top w3-round w3-card-4 w3-text-black">
			<header class="w3-container w3-round w3-border-bottom"> 
				<span onclick="document.getElementById('kelta_alert_box').style.display='none'" 
				class="w3-button w3-round w3-display-topright">&times;</span>
				<h2> <?php echo $header ?> </h2>
			</header>
			<div class="w3-container w3-padding-16">
				Do you want to logout?
			</div>
			<footer class="w3-container w3-round w3-border-top">
				<div class='w3-padding-16 w3-round w3-bar'>
					<a href="<?php echo $GLOBALS['url_request'].$GLOBALS['url_domain_name']."logout".$GLOBALS['url_extension'] ?>">
					<button class='w3-bar-item w3-right w3-button kel-hover w3-hover-light-gray w3-border w3-round'>
						Yes
					</button>
					</a>
					<button class='w3-bar-item w3-right w3-margin-right w3-button kel-hover w3-hover-light-gray w3-border w3-round'
					onclick="document.getElementById('kelta_alert_box').style.display='none'">
						No
					</button>
				</div>
			</footer>
		</div>
	</div>
	<script>
		
	</script>
<?php
	}
?>