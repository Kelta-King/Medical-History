
document.getElementById("search_field").addEventListener("keydown", function(evt){
    if(evt.key == "Enter"){
        searchBoth();
    }
});

const searchBoth = () => {

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
                    // console.log(this.responseText);
                    let data = JSON.parse(this.responseText);
                    entries = data['families'].concat(data['patients']);
                    autocomplete(document.getElementById("search_field"), entries);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/getFamiliesAndPatients"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/json");
        xhttp.send(obj);
    }
    catch (error) {
        console.log(error);
        endLoader();
    }

}