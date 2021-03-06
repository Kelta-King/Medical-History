
var server_name = "localhost";
var extension = "";
var protocol_server = "http://";

let inputEmptyCheck = (id, error) => {

    let value = document.getElementById(id).value;
    
    if(value == ""){

        error.innerText = id + ' is missing';
		document.getElementById(id).focus();
        return true;

	}
    
    return false;

}


const showError = (msg = '', id = 'err') => {
	alert(msg);
    document.getElementById(id).innerHTML = `
    <div class='w3-padding w3-center w3-text-red'>
        ${msg}
    </div>
    `;
}

let startLoader = () => {
    
    let divP = document.createElement("DIV");
    divP.className = 'w3-modal';
    divP.style.display = 'block';
    divP.id = 'loader-modal';

    divC = document.createElement("DIV");
    divC.className = 'w3-modal-content';
    divC.style = 'width:60px; height:60px; padding-top:10px;';

    let c = document.createElement('CENTER');

    let divL = document.createElement("DIV");
    divL.className = 'loader';

    c.appendChild(divL);
    divC.appendChild(c);
    divP.appendChild(divC);
    document.body.appendChild(divP);

}

let endLoader = () => {

    let loader = document.getElementById('loader-modal');
    while (loader.hasChildNodes()) {
        loader.removeChild(loader.firstChild);
    }
    loader.remove();

}

let errorCheck = (value, error = '') => {

    if(value.includes("Error:")){
        vals = value.split('Error:');
        console.log(vals[1]);
        alert(vals[1]);
		
        if(error != ''){
            error.innerText = vals[1];
        }
		else{
			document.getElementById('err').innerHTML = `
			<div class='w3-padding w3-center w3-text-red'>
				${vals[1]}
			</div>
			`;
		}

        return true;
    }

    return false;

}

let check_pass = (val, error) => {
	
	
	let errors = [];
	if (val.length < 8) {
		errors.push("Your password must be at least 8 characters"); 
	}
	if (val.search(/[a-z]/i) < 0) {
		errors.push("Your password must contain at least one letter.");
	}
	if (val.search(/[0-9]/) < 0) {
		errors.push("Your password must contain at least one digit."); 
	}
	if (errors.length > 0) {
		error.innerHTML = errors.join("<br>");
		return false;
	}
    //correct password format
	return true;

}

let email_check = (email, error) => {
	
	let s1 = email.split("@");
	let s3 = email.split(" ");
	if(s3.length > 1)
	{
		error.innerHTML = "Incorrect email";
		return false;
	}
	if(s1.length == 2)
	{
		var s2 = s1[1].split(".");
		if(s2[0] != "gmail"){
			error.innerHTML = "Only gmail can be used";
			return false;
		}
		if(s2.length == 2 || s2.length == 3)
		{
			if(s1[0].length < 6 || s2[0].length < 4 || s2[1].length > 4 || s2[1].length < 2)
			{
				error.innerHTML = "Incorrect email";
				return false;
			}
			
            //correct format of email
			return true;
		
		}
		else
		{
			error.innerHTML = "Incorrect email";
			return false;
		}
	}
	else
	{
		error.innerHTML = "Incorrect email";
		return false;
	}
	
}

let emptyCheck = (id, error) => {

	let element = document.getElementById(id);
	if(element.value == ""){
		error.innerText = id + ' is missing';
		document.getElementById(id).focus();
        return true;
	}

}

let getHeight = () => {

	if(window.innerWidth >= 900){
		return 500;
	}
	else{
		return 400;
	}

}

let getWidth = () => {

	let width = 600;

	if(window.innerWidth < 900){
		width = window.innerWidth-100;
	}
	else{
		width = (window.innerWidth/3)*2;
	}

	return width;

}

let showNotifications = () => {

	document.getElementById('notifications').style.display = 'block';
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			if(errorCheck(this.responseText)){
				document.getElementById('notification_datas').innerHTML = '<div class=\' w3-center w3-large w3-padding w3-text-red \'> Something went wrong </div>'
				return false;
			}
			/*
			<div class='w3-border-bottom w3-padding'>
                <div class='w3-large'>
                    This is a nootification message.
                </div>
                <div class='w3-small'>
                    <i> 19, March 2016 </i>
                </div>
            </div>
			*/
			let vals = JSON.parse(this.responseText);
			let area = document.getElementById('notification_datas');
			area.innerHTML = '';
			console.log(vals);

			if(vals.length <= 0){
				area.innerHTML = '<div class="w3-center"> There is no new notification </div>'
			}

			vals.forEach(value => {
				
				let divP = document.createElement('DIV');
				let divC1 = document.createElement('DIV');
				let divC2 = document.createElement('DIV');

				divP.className = 'w3-border-bottom w3-padding kel-hover w3-hover-light-gray';
				if(value['seen'] == 'No'){
					divP.className += ' w3-light-gray';
				}
				console.log(value['category']);
				if(value['category'] == "blog"){
					const reference_id = value['reference_id'];
					divP.addEventListener('click', (evt) => {
						hasSeen(value['id'], "viewBlog.php?id="+reference_id);
					});
				}
				else if(value['category'] == "comment"){
					divP.addEventListener('click', (evt) => {
						hasSeen(value['id'], "comments.php");
					});	
				}
				divC1.className = 'w3-large';
				divC2.className = 'w3-small';

				let i = document.createElement("I");
				divC1.innerText = value['message'];
				i.innerText = value['time'];


				divC2.appendChild(i);
				divP.appendChild(divC1);
				divP.appendChild(divC2);
				

				area.appendChild(divP);

			});
			

		}

	}
	xhttp.open('POST', 'Actions/getNotifications.php', true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.send();

}

const hasSeen = async(id, url) => {

	let obj = {
        id:id,
    }

	obj = JSON.stringify(obj);
    obj = window.btoa(obj);

	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			// Do nothing
			window.open(url, "_self");

		}

	}
	xhttp.open('POST', 'Actions/updateNotifications.php', true);
	xhttp.setRequestHeader("Content-type", "application/json");
	xhttp.send(obj);
	// console.log("One");

}

let mobileCheck = (number) => {

	let a = /^\d{10}$/;

    if (a.test(number)){
        return true;
    }
    else{
        return false;
    }
	
}

const getCurrentFile = () => {
    let url = window.location.href;
    let objs = url.split("/");
    return (objs[objs.length-1]);
}

const audioToTextInInput = (input_id, element = "") => {


	if ('speechSynthesis' in window) {
            
		var srec = window.SpeechRecognition || window.webkitSpeechRecognition;;
		var recognition = new srec();

		recognition.onstart = function() {
			element.innerHTML = " listening...";
			console.log("Voice recognition started");
		};
		
		recognition.onresult = function(event) {
			var transcript = event.results[0][0].transcript;
			console.log(transcript);
			document.getElementById(input_id).value += transcript + " ";
			element.innerHTML = "";
			if(getCurrentFile() == ("searchFamily" + extension)){
				searchFamily();
			}
			else if(getCurrentFile() == "searchPatient" + extension){
				searchPatient();
			}
			else if(getCurrentFile() == "dashboard" + extension){
				console.log("Here");
				searchBoth();
			}
		};
		
		// start recognition
		recognition.start();
	} 
	else {
		alert("Speech recognition not supported in your browser");
		console.log('Speech recognition not supported');
	}

	// var speech = true;
	// window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

	// element.innerHTML = "listning...";
	// const recognition = new SpeechRecognition();
	// recognition.interimResults = true;

	// recognition.addEventListener('result', e => {
	// 	const transcript = Array.from(e.results)
	// 		.map(result => result[0])
	// 		.map(result => result.transcript)
	// 		.join('')

	// 	document.getElementById(input_id).value = transcript;

	// });
		
	// if (speech == true) {
	// 	recognition.start();
	// 	recognition.addEventListener('end', console.log("Done"));
	// 	element.innerHTML = "";
	// }

}

