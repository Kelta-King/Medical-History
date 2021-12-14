
const updateVisit = (patient_id, visit_id) => {

    startLoader();

    if(!confirm("Do you really want to update this visit?")){
        endLoader();
        return false;
    }

    const complain = document.getElementById("complain");
    const diagnose = document.getElementById("diagnose");
    const treatment = document.getElementById("treatment");
    const paid = document.getElementById("paid");
    const unpaid = document.getElementById("unpaid");

    if(complain.value.trim() == ""){
        complain.focus();
        showError("Patient Complain is empty");
		endLoader();
		return false;
    }

    if(diagnose.value.trim() == ""){
        diagnose.focus();
        showError("Patient Diagnose is empty");
		endLoader();
		return false;
    }

    if(treatment.value.trim() == ""){
        treatment.focus();
        showError("Patient Treatment is empty");
		endLoader();
		return false;
    }

    if(paid.value.trim() == ""){
        paid.focus();
        showError("Patient Paid amount is empty");
		endLoader();
		return false;
    }

    if(unpaid.value.trim() == ""){
        unpaid.focus();
        showError("Patient Unpaid amount is empty");
		endLoader();
		return false;
    }


    let obj = {
        'patient_id': patient_id,
        'visit_id': visit_id,
        'v_complain': complain.value,
        'v_diagnose': diagnose.value,
        'treatment':treatment.value,
        'paid':paid.value,
        'unpaid':unpaid.value,
    }
    console.log(obj);

    obj = window.btoa(JSON.stringify(obj));

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);
            if (!errorCheck(this.responseText)) {
                
                alert(this.responseText);
                
                if(this.responseText == "Visit updated"){
                    window.location.href = "visit"+extension+"?patient="+patient_id+"&visit="+visit_id;
                }

            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/updateVisitAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);

}