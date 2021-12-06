
const timeinput = () => {
    const checkbox = document.getElementById("current_timing_check");
    const time_box = document.getElementById("time_box");
    if(checkbox.checked){
        time_box.style.display = "none";
    }
    else{
        time_box.style.display = "block";
    }
}

const addPatient = () => {

    // Personal details
    const name = document.getElementById("patient_name");
    const age = document.getElementById("patient_age");
    const gender = document.getElementById("patient_gender");
    const address = document.getElementById("address");
    const mobile_no = document.getElementById("mobile_number");
    const family = document.getElementById("family");

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

    if(gender.value.trim() == ""){
        gender.focus();
        showError("Patient gender is empty");
		endLoader();
		return false;
    }

    // Visit details
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

    // If new family is yes then add new family according to patient name
    // otherwise add the id of family
    // else add none
    let new_family = "";
    if(document.getElementById("new_family_check").checked){
        new_family = "Yes";
    }
    else{
        new_family = family.value;
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
        'name':name.value,
        'age':age.value,
        'gender':gender.value,
        'address':address.value,
        'mobile_number':mobile_no.value,
        'new_family':new_family,
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
                alert(this.responseText);
                location.reload();
            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/addPatientAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);

}