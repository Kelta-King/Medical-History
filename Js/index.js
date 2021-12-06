
document.getElementById("login_form").addEventListener("keydown", function(evt){
    if(evt.keyCode == 13){
        console.log("here");
        // login();
    }
});

let login = () => {
	
	let email = document.getElementById("email").value;
	let pass = document.getElementById("password").value;
	let form = document.getElementById("login_form");

    startLoader();

	if(email == ""){
		
		showError("Email field is empty");
		endLoader()
		return false;
		
	}
	
	if(pass == ""){
		
		showError("Password field is empty");
		endLoader();
		return false;
		
	}
	
	if(!email_check(email, error)){
	
        showError("Invalid email");
		endLoader();
		return false;
		
	}
	
	let str = "email="+email+"&password="+pass;
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function (){
			
		if(this.readyState == 4 && this.status == 200){
			
			endLoader();
			
			if(this.responseText == ""){
				form.method = "post";
				form.action = "login_action";
				form.submit();		
			}
			else{
				showError(this.responseText);
			}
			
		}
		
	}
	
	xhttp.open("POST", "Action/login", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}
