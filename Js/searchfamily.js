
document.getElementById("search_field").addEventListener("keydown", function(evt){
    if(evt.key == "Enter"){
        searchFamily();
    }
});

const searchFamily = () => {

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
                    autocomplete(document.getElementById("search_field"), data['families']);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/getFamily"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(obj);
    }
    catch (error) {
        console.log(error);
        endLoader();
    }

}

const removeFamily = (family_id) => {

    startLoader();

    if(!confirm("Do you really want to remove family?")){
        endLoader();
        return false;
    }

    let obj = {
        'family_id': family_id,
    }

    obj = window.btoa(JSON.stringify(obj));

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);
            if (!errorCheck(this.responseText)) {
                
                alert(this.responseText);
                
                if(this.responseText == "Family removed"){
                    location.reload();
                }

            }
            endLoader();
        }

    }

    xhttp.open("POST", "Action/removeFamilyAction" + extension, true)
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(obj);

}