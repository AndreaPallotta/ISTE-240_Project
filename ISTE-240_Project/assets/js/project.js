function show_selected() {
    "use strict";
    var select = document.getElementById('select_season');
    var value = select[select.selectedIndex].value;
    var winter = document.getElementById('winter');
    var spring = document.getElementById('spring');
    var summer = document.getElementById('summer');
    var autumn = document.getElementById('autumn');

    if (value == "winter") {
        winter.style.display = "block";
        spring.style.display = "none";
        summer.style.display = "none";
        autumn.style.display = "none";
    }

    else if (value == "spring") {
        winter.style.display = "none";
        spring.style.display = "block";
        summer.style.display = "none";
        autumn.style.display = "none";
    }

    else if (value == "summer") {
        winter.style.display = "none";
        spring.style.display = "none";
        summer.style.display = "block";
        autumn.style.display = "none";
    }

    else if (value == "autumn") {
        winter.style.display = "none";
        spring.style.display = "none";
        summer.style.display = "none";
        autumn.style.display = "block";
    }
}

function backTop() {
    document.body.scrollTop = 10;
    document.documentElement.scrollTop = 10;
}

// validation
function checkDate(){
    "use strict";
    var dateValid=true;
    var bday = document.getElementById('bday').value;

    // get todays date from the operating system
    var today = new Date();

    // grab the day number form the object today
    var dd = today.getDate();

    // grab the month number form the object today
    var mm = today.getMonth()+1;

    // grab the year number(4 digit format) form the object today
    var yyyy = today.getFullYear();

    //Must format todays day number to be two digits
    if (dd < 10) {
        dd = '0' + dd;
    }  // need this in case day number is one digit like 6

    //Must format todays month number to be two digits
    if (mm < 10) {
        mm = '0' + mm;
    }  // need this is month number is 1 digit like 2 for February

    // string concatenation
    // I want todays date (td) to be in the form of 2019-02-14
    //                                              yyyy-mm-dd
    // When I create (td)(today) it will now be in the exact same format as the bday (Birthdate)
    var td = "" + yyyy + "-" + mm + "-" + dd;

    var legalYear = parseInt(bday.substring(0,4)) + 18;

    //Remember bday is in the format yyyy-mm-dd for example 1995-11-22
    var legalMonth = bday.substring(5,7);
    var legalDay   = bday.substring(8);
    var legalDate = "" + legalYear + "-" + legalMonth + "-" + legalDay;

    console.log("Users birth date   = " +bday);
    console.log("Legal age to drink = " +legalDate);
    console.log("Todays date        = " +td);

    //check to see if today(td) is equal or greater than legalDate to drink
    if (td >= legalDate){
        document.getElementById('ageFeedback').innerHTML="";
        document.getElementById("bday").style.border = null;
        document.getElementById("ageFeedback").style = null;
        dateValid = true;
    }
    else {
        document.getElementById('ageFeedback').innerHTML = "  ** Warning: You need to be 18 to drink in Amsterdam **  ";
        document.getElementById("bday").style.borderColor = "red";
        document.getElementById("ageFeedback").style.backgroundColor = 'pink';

        document.getElementById('rld').checked=false;
        document.getElementById('hei').checked=false;
        document.getElementById('canal').checked=false;
        document.getElementById('museum').checked=false;
        document.getElementById('DePijp').checked=false;
        document.getElementById('market').checked=false;
        document.getElementById('bulldog').checked=false;
        dateValid = false;
    } // end of else path


    return (dateValid);
}//end of function to check if the users age is 21 or older

function validate() {
    name = document.getElementById("name");
    email = document.getElementById("email");
    state = document.getElementById("state");
    phone = document.getElementById("phone");
    var checkForm = false;

    if (name.value == "") {
        name.style.border = red;
        name.style.backgroundColor = red;
        checkForm = false;
    }

    else {
        checkForm = true;
    }

    return (checkForm);

}




function validateState(){
    ispicked = true;
    if (document.getElementById("state").value == "Select") {
        document.getElementById("state").style.borderColor = "red";
        document.getElementById("state").style.color = "red";
        document.getElementById("state").style.backgroundColor = 'pink';
        ispicked = false;
    } else {
        document.getElementById("state").style = null;
        document.getElementById("state").style="width : 5em";
        ispicked = true;
    }
    return (ispicked);
}

function validateForm() {
    isvalid = true;

    if (document.getElementById("name").value == "") {
        document.getElementById("name").style.borderColor = "red";
        document.getElementById("name").style.backgroundColor = 'pink';
        isvalid = false;
    } else {
        document.getElementById("name").style = null;
        isvalid = true;
    }

    statePicked = false;
    oldEnoughToDrink = false;

    statePicked = validateState();
    oldEnoughToDrink = checkDate();
    //alert("Please hold screen");
    return (isvalid && statePicked && oldEnoughToDrink);
}