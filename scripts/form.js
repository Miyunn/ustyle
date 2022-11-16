function validateForm() {
	var firstName = document.forms["contact"]["fName"].value;
	var mail = document.forms["contact"]["email"].value;
	var txtBox= document.forms["contact"]["feedback"].value;  
	var atposition=mail.indexOf("@");  
	var dotposition=mail.lastIndexOf(".");  
	
	//must fill validator
	if (firstName == "") {
		alert("First Name cannot be left out");
		return false;
  }
	if (mail == "") {
		alert("Email cannot be left out");
		return false;
  }
	if (txtBox == "") {
		alert("Feeback cannot be left out");
		return false;
  }
	//email validator
	if (atposition<1 || dotposition<atposition+2 || dotposition+2>=mail.length){  
		alert("Please enter a valid e-mail address");  
		return false;  
  } 
	
}