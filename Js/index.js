
document.getElementById("login_form").addEventListener("keydown", function(evt){
    if(evt.keyCode == 13){
        login();
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
	
	if(!email_check(email)){
	
        showError("Invalid email");
		endLoader();
		return false;
		
	}
	
	let str = "email="+email+"&password="+pass;
	let xhttp = new XMLHttpRequest();
    try 
    {
        xhttp.onreadystatechange = function (){
                
            if(this.readyState == 4 && this.status == 200){
                
                endLoader();
                
                if(this.responseText == "Valid"){
                    form.method = "post";
                    form.action = "login_action";
                    form.submit();		
                }
                else{
                    showError(this.responseText);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/checkAdmin"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(str);
    }
    catch (error) {
        console.log(error);
        endLoader();
    }
	
}
