
const removeVisit = (patient_id, visit_id) => {
    
    startLoader();

    if(!confirm("Do you really want to remove this visit?")){
        endLoader();
        return false;
    }

    let obj = {
        'patient_id': patient_id,
        'visit_id': visit_id,
    }
    console.log(obj);

    obj = window.btoa(JSON.stringify(obj));

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);
            if (!errorCheck(this.responseText)) {
                
                alert(this.responseText);
                
                if(this.responseText == "Visit removed"){
                    location.reload();
                }

            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/removeVisitAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);

}


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

const updatePatient = (patient_id) => {

    startLoader();

    if(!confirm("Do you really want to update this patient?")){
        endLoader();
        return false;
    }

    const name = document.getElementById("patient_name");
    const age = document.getElementById("patient_age");
    const gender = document.getElementById("patient_gender");
    const address = document.getElementById("address");
    const mobile_no = document.getElementById("mobile_number");

    startLoader();

    if(name.value.trim() == ""){
        name.focus();
        showError("Patient name is empty");
		endLoader();
		return false;
    }

    if(age.value.trim() == ""){
        age.focus();
        showError("Patient age is empty");
		endLoader();
		return false;
    }

    let obj = {
        'patient_id': patient_id,
        'name':name.value,
        'age':age.value,
        'gender':gender.value,
        'address':address.value,
        'mobile_number':mobile_no.value.replace(/\s/g,''),
    }

    console.log(obj);

    obj = window.btoa(JSON.stringify(obj));

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);
            if (!errorCheck(this.responseText)) {
                
                alert(this.responseText);
                
                if(this.responseText == "Patient updated"){
                    location.reload();
                }

            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/updatePatientAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);

}
