function emailvalidate() {
    var email = document.getElementsByName("email")[0];
    var error = document.getElementsByClassName("email-error")[0];
    if (error.innerHTML != null) { email.classList.remove("is-invalid"); }
    error.innerHTML = "";
    var email_value = email.value;
      
    //alert(email_value.length);
    if (email_value.length === 0) {
        email.classList.add("is-invalid");
        //var reg_email = document.getElementById("reg-email");
        error.innerHTML = "Please enter your email address";
        //reg_email.appendChild(error);
        return false;
    }
    var reg = /^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*/;
    if (!email_value.match(reg)) {
        email.classList.add("is-invalid");
        //var reg_email = document.getElementById("reg-email");
        error.innerHTML = "Invalid email address!";
        //reg_email.appendChild(error);
        return false;
    }
    return true;
}