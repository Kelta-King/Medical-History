
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

}