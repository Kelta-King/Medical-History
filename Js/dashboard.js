
window.onload = function(){

    try 
    {
        startLoader();
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function (){
                
            if(this.readyState == 4 && this.status == 200){
                
                endLoader();
                
                if(!errorCheck(this.responseText)){
                    console.log(JSON.parse(this.responseText));
                    entries = ['yoman', 'no'];
                    autocomplete(document.getElementById("search_field"), entries);
                }
                
            }
            
        }
        
        xhttp.open("POST", "Action/getFamiliesAndPatients"+extension, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }
    catch (error) {
        console.log(error);
        endLoader();
    }

}