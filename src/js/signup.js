function ValidateSignupForm(){
    // Validate some form fields
    validationResult = true;
    //--------------------------
    // 1. Check that the email belongs to a Tec account
    let email = document.forms['signupForm']['email'].value;
    if(email.split('@')[1] != 'tec.mx') {
        alert("Please, use a valid Tec de Monterrey account");
        validationResult = false;
    }
    // 2. Check that the value of both password fields is the same
    let p1 = document.forms['signupForm']['passwd1'].value;
    let p2 = document.forms['signupForm']['passwd2'].value;
    // console.log(p1, p2);
    if (p1 !== p2){
        alert("The two passwords must match");
        validationResult = false;
    }
    // 3. Check that there is a campus chosen
    let optionList = document.forms['signupForm']['campus'].options;
    let selectedCampus = optionList[optionList.selectedIndex].id;
    // console.log(selectedCampus);
    if (selectedCampus <= 0){
        alert("Please select a campus");
        validationResult = false;
    }
    return validationResult;
}