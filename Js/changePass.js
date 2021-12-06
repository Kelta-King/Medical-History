
document.getElementById("change_pass_form").addEventListener("keydown", function(evt){
    if(evt.keyCode == 13){
        changePass();
    }
});

const changePass = () => {

    const new_pass = document.getElementById("new_pass").value;
    const old_pass = document.getElementById("old_pass").value;

    startLoader();

    if(old_pass.trim() == ""){
		
		showError("Old password is empty");
		endLoader()
		return false;
		
	}
	
	if(new_pass.trim() == ""){
		
		showError("New password is empty");
		endLoader();
		return false;
		
	}

    let str = "old_pass="+old_pass+"&new_pass="+new_pass;
	let xhttp = new XMLHttpRequest();
    try 
    {
        xhttp.onreadystatechange = function (){
                
            if(this.readyState == 4 && this.status == 200){
                
                endLoader();
                
                if(this.responseText == ""){
                    alert("Password changed successfully");
                    location.reload();
                }
                else{
                    showError(this.responseText);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/changePass"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(str);
    }
    catch (error) {
        console.log(error);
        endLoader();
    }

}