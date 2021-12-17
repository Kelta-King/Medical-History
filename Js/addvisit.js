
const addVisit = (id) => {
    
    startLoader();

    if(!confirm("Do you want to add this visit?")){
        endLoader();
        return false;
    }

    const timings = document.getElementById("timings");
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

    // If current timings is yes then add current timing according to sql time
    // otherwise add the time from input
    // else add current timing
    let current_timings = "";
    if(document.getElementById("current_timing_check").checked){
        current_timings = "Yes";
    }
    else{

        if(document.getElementById("date_time").value.trim() == ""){
            document.getElementById("date_time").focus();
            showError("Date is empty");
            endLoader();
            return false;
        }
        else if(timings.value.trim() == ""){
            timings.focus();
            showError("Current timing is empty");
            endLoader();
            return false;
        }
        current_timings = document.getElementById("date_time").value + " " + timings.value;
    }

    let obj = {
        'patient_id':id,
        'timings':current_timings,
        'complain':complain.value,
        'diagnose':diagnose.value,
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
                
                if(this.responseText == "Visit added"){
                    alert(this.responseText);
                    window.location.href = "patient"+extension+"?id="+id;
                }
                else{
                    alert(this.responseText);
                }

            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/addVisitAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);
}