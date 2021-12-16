
const assignMember = (id) => {

    try 
    {
        startLoader();

        if(!confirm("Do you really want to assign this patient to this family?")){
            endLoader();
            return false;
        }

        const p_id = document.getElementById("patient_id");
        const f_id = document.getElementById("family_id");
        
        if(p_id.value.trim() == ""){
            p_id.focus();
            showError("Patient id is empty");
            endLoader();
            return false;
        }

        if(f_id.value.trim() == ""){
            f_id.focus();
            showError("Family id is empty");
            endLoader();
            return false;
        }

        if(f_id.value.split(".")[1] != id){
            f_id.focus();
            showError("Something went wrong");
            endLoader();
            return false;
        }

        let obj = {
            'p_id':p_id.value,
            'f_id':f_id.value,
        }

        console.log(obj);
    
        obj = window.btoa(JSON.stringify(obj));
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function (){
                
            if(this.readyState == 4 && this.status == 200){
                
                endLoader();
                
                if(!errorCheck(this.responseText)){
                    alert(this.responseText);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/assignMemberAction"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(obj);
    }
    catch (error) {
        console.log(error);
        endLoader();
    }

}