
const searchPatient = () => {

    try 
    {
        startLoader();

        const value = document.getElementById("search_field");

        if(value.value.trim() == ""){
            endLoader();
            alert("Please write something to search.");
            value.focus();
            return false;
        }

        let obj = {
            'value': value.value,
        }
    
        obj = window.btoa(JSON.stringify(obj));
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function (){
                
            if(this.readyState == 4 && this.status == 200){
                
                endLoader();
                
                if(!errorCheck(this.responseText)){
                    let data = JSON.parse(this.responseText);
                    console.log(data);
                    // entries = data['families'].concat();
                    autocomplete(document.getElementById("search_field"), data['patients']);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/getPatients"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(obj);
    }
    catch (error) {
        console.log(error);
        endLoader();
    }

}

document.getElementById("search_field").addEventListener("keydown", function(evt){
    if(evt.key == "Enter"){
        searchPatient();
    }
});

const removePatient = (patient_id) => {
    
    startLoader();

    if(!confirm("Do you really want to remove this patient?")){
        endLoader();
        return false;
    }

    let obj = {
        'patient_id': patient_id,
    }
    console.log(obj);

    obj = window.btoa(JSON.stringify(obj));

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);
            if (!errorCheck(this.responseText)) {
                
                alert(this.responseText);
                
                if(this.responseText == "Patient removed"){
                    location.reload();
                }

            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/removePatientAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);

}
