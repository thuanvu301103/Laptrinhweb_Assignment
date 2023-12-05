<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Shop.co | Sign Up</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="./css/main.css" rel="stylesheet">
</head>
<body class="container-fluid p-0" style="background-color: #F2F0F1;">
    <!--Script for sign in validation-->
    <script>
        $(document).ready(function () {
            $(".signin-btn").click(function () {
                var fail = false;
                // Username check
                {
                    var username = document.getElementsByName("username")[0];
                    var username_error = document.getElementsByClassName("username-error")[0];
                    if (username_error.innerHTML != null) { username.classList.remove("is-invalid"); }
                    username_error.innerHTML = "";
                    username_value = username.value;
                    if (username_value.length < 5 || username_value.length > 30) {
                        username.classList.add("is-invalid");
                        if (username_value.length === 0) {
                            username_error.innerHTML = "Please enter your username";
                        }
                        else { username_error.innerHTML = "Username's length should be between 5 to 30 characters"; }
                        fail = true;
                    }
                }
                // Email check
                {
                    var email = document.getElementsByName("email")[0];
                    var email_error = document.getElementsByClassName("email-error")[0];
                    if (email_error.innerHTML != null) { email.classList.remove("is-invalid"); }
                    email_error.innerHTML = "";
                    email_value = email.value;
                    if (email_value.length === 0) {
                        email.classList.add("is-invalid");
                        email_error.innerHTML = "Please enter your email address";
                        fail = true;
                    }
                    else {
                        var reg = /^[a-zA-Z0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*/;
                        if (!email_value.match(reg)) {
                            email.classList.add("is-invalid");
                            email_error.innerHTML = "Please enter valid email address";
                            fail = true;
                        }
                    }
                }
                // Passwork check
                {
                    var pass = document.getElementsByName("pass")[0];
                    var pass_error = document.getElementsByClassName("pass-error")[0];
                    if (pass_error.innerHTML != null) { pass.classList.remove("is-invalid"); }
                    pass_error.innerHTML = "";
                    pass_value = pass.value;
                    if (pass_value.length < 5 || pass_value.length > 50) {
                        pass.classList.add("is-invalid");
                        if (pass_value.length === 0) {
                            pass_error.innerHTML = "Please enter password";
                        }
                        else { pass_error.innerHTML = "Password's length should be between 5 to 50 characters"; }
                        fail = true;
                    }

                    var conpass = document.getElementsByName("conpass")[0];
                    var conpass_error = document.getElementsByClassName("conpass-error")[0];
                    if (conpass_error.innerHTML != null) { conpass.classList.remove("is-invalid"); }
                    conpass_error.innerHTML = "";
                    conpass_value = conpass.value;
                    if (conpass_value.length === 0) {
                        conpass.classList.add("is-invalid");
                        conpass_error.innerHTML = "Please confirm your pasword";
                        fail = true;
                    }
                    else {
                        if (conpass_value != pass_value) {
                            conpass.classList.add("is-invalid");
                            conpass_error.innerHTML = "Not match your password!";
                            fail = true;
                        }
                    }
                }
                // Date of birth check
                {
                    var date = document.getElementsByName("date")[0];
                    var date_error = document.getElementsByClassName("date-error")[0];
                    if (date_error.innerHTML != null) { date.classList.remove("is-invalid"); }
                    date_error.innerHTML = "";
                    date_value = date.value;
                    if (date_value === "") {
                        date.classList.add("is-invalid");
                        date_error.innerHTML = "Please choose your birthday";
                        fail = true;
                    }
                }
                // Gender check
                {
                    var gender_error = document.getElementsByClassName("gender-error")[0];
                    gender_error.innerHTML = "";
                    var genderele = document.getElementsByName("gender");
                    var flag = false;
                    for (var i = 0; i < genderele.length; i++) {
                        if (genderele[i].checked) {
                            flag = true;
                        }
                    }
                    if (flag === false) {
                        gender_error.innerHTML = "Please choose your gender";
                        fail = true;
                    }
                }
                // Phone number check
                {
                    var tel = document.getElementsByName("tel")[0];
                    var tel_error = document.getElementsByClassName("tel-error")[0];
                    if (tel_error.innerHTML != null) { tel.classList.remove("is-invalid"); }
                    tel_error.innerHTML = "";
                    tel_value = tel.value;
                    if (tel_value.length === 0) {
                        tel.classList.add("is-invalid");
                        tel_error.innerHTML = "Please enter your Phone number";
                        fail = true;
                    }
                    else {
                        var reg = /0.[0-9]+/;
                        if (!tel_value.match(reg) || tel_value.length < 7 || tel_value.length > 13) {
                            tel.classList.add("is-invalid");
                            tel_error.innerHTML = "Invalid phone number";
                            fail = true;
                        }
                    }
                }
                // Name check
                {
                    var fname = document.getElementsByName("fname")[0];
                    var fname_error = document.getElementsByClassName("fname-error")[0];
                    if (fname_error.innerHTML != null) { fname.classList.remove("is-invalid"); }
                    fname_error.innerHTML = "";
                    fname_value = fname.value;
                    var reg = /^[A-Za-z ]*$/;
                    if (!fname_value.match(reg)) {
                        fname.classList.add("is-invalid");
                        fname_error.innerHTML = "Invalid name. Your name cannot contain any numbers or special chracters like (./?}{...)";
                        fail = true;
                    }
                    else if (fname_value.length === 0) {
                        fname.classList.add("is-invalid");
                        fname_error.innerHTML = "Please enter your first name";
                        fail = true;
                    }
                    else if (fname_value.length < 2) {
                        fname.classList.add("is-invalid");
                        fname_error.innerHTML = "First name's length should be longer than 2 characters";
                        fail = true;
                    }

                    var lname = document.getElementsByName("lname")[0];
                    var lname_error = document.getElementsByClassName("lname-error")[0];
                    if (lname_error.innerHTML != null) { lname.classList.remove("is-invalid"); }
                    lname_error.innerHTML = "";
                    lname_value = lname.value;
                    var reg = /^[A-Za-z ]*$/;
                    if (!lname_value.match(reg)) {
                        lname.classList.add("is-invalid");
                        lname_error.innerHTML = "Invalid name. Your name cannot contain any numbers or special chracters like (./?}{...)";
                        fail = true;
                    }
                    else if (lname_value.length === 0) {
                        lname.classList.add("is-invalid");
                        lname_error.innerHTML = "Please enter your last name";
                        fail = true;
                    }
                    else if (lname_value.length < 2) {
                        lname.classList.add("is-invalid");
                        lname_error.innerHTML = "First name's length should be longer than 2 characters";
                        fail = true;
                    }
                }
                // Address check (no need)
                if (fail === true) { return fail; }
                else {
                    //....// wait for server to check existed account
                }
            });

        });
    </script>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #FFFFFF;">
        <div class="align-item-start container-fluid">
            <button class="navbar-toggler border border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fs-3 fw-bolder px-3" href="#">SHOP.CO</a>
            <div class="collapse navbar-collapse text-dark" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
                    <li class="nav-item dropdown">
                        <button class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Shop <img style="height: 0.25rem;" alt="dropdown icon" src="./img/nav/dropdown.png">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Casual</a></li>
                            <li><a class="dropdown-item" href="#">Formal</a></li>
                            <li><a class="dropdown-item" href="#">Party</a></li>
                            <li><a class="dropdown-item" href="#">Gym</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">On Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">New Arrivals</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true">Brands</a>
                    </li>
                </ul>
            </div>
            <button class="ms-auto navbar-toggler border border-0 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#Searchbar" aria-controls="navbarScroll" aria-expanded="false">
                <img class="navicon" alt="search icon" src="./img/nav/search(1).png">
            </button>
            <!--Search bar-->
            <form class="input-group flex-fill px-2 collapse navbar-collapse" style="width: 30%;" role="search" id="Searchbar">
                <span class="input-group-text border border-0 rounded-start-pill" style="background-color: #F0F0F0;">
                    <img alt="search icon" style="height: 1.5rem;" src="./img/nav/search.png">
                </span>
                <input class="form-control me-2 text-tertiary border border-0  rounded-end-pill" type="search" placeholder="Search for products..."
                       style="background-color: #F0F0F0;" aria-label="Search">
            </form>
            <!--Cart and Account-->
            <!--Cart-->
            <div class="mr-auto nav-item">
                <a class="nav-link" href="#">
                    <img class="navicon" alt="cart icon" src="./img/nav/cart.png">
                </a>
            </div>
            <!--Account-->
            <div class="mr-auto nav-item px-3">
                <a class="nav-link" href="#">
                    <img class="navicon" alt="account icon" src="./img/nav/account.png">
                </a>
            </div>
        </div>
    </nav>

    <form class="row p-3 m-0 justify-content-around">
        <div class="fw-bolder text-dark" style="font-size: 5rem;">Sign up</div>
        <div class="col-lg-5 m-2 text-start">
            <label>Username:</label>
            <input name="username" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                   type="text" placeholder="Username">
            <span class="invalid-feedback username-error"></span>
            <label>Email address:</label>
            <input name="email" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                   type="text" placeholder="Email address">
            <span class="invalid-feedback email-error"></span>
            <label>Password:</label>
            <input name="pass" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                   type="password" placeholder="Password">
            <span class="invalid-feedback pass-error"></span>
            <label>Confirm Password:</label>
            <input name="conpass" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                   type="password" placeholder="Confirm your Password">
            <span class="invalid-feedback conpass-error"></span>
        </div>
        <div class="col-lg-5 m-2 text-start">
            <div class="row justify-content-between p-0">
                <div class="col-lg-6 text-start">
                    <label>First name:</label>
                    <input name="fname" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                           type="text" placeholder="First name">
                    <span class="invalid-feedback fname-error"></span>
                </div>
                <div class="col-lg-6 text-start">
                    <label>Last name:</label>
                    <input name="lname" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                           type="text" placeholder="Last name">
                    <span class="invalid-feedback lname-error"></span>
                </div>
            </div>
            <label>Date of birth:</label>
            <input name="date" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                   type="date">
            <span class="invalid-feedback date-error"></span>
            <label>Gender:</label>
            <div class="px-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="male">
                    <label class="form-check-label" for="gender1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                    <label class="form-check-label" for="gender2">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender3" vale="none">
                    <label class="form-check-label" for="gender3">
                        Don't want to tell
                    </label>
                </div>
            </div>
            <span class="invalid-feedback gender-error"></span>
            <label>Phone number:</label>
            <input name="tel" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                   type="tel" placeholder="Phone number">
            <span class="invalid-feedback tel-error"></span>
            <label>Address:</label>
            <div class="px-3">
                <div class="row justify-content-between p-0">
                    <div class="col-lg-6 text-start">
                        <label>Country:</label>
                        <input name="country" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                               type="text" placeholder="Country">
                        <span class="invalid-feedback country-error"></span>
                    </div>
                    <div class="col-lg-6 text-start">
                        <label>Province, city:</label>
                        <input name="province" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                               type="text" placeholder="Province, city">
                        <span class="invalid-feedback province-error"></span>
                    </div>
                </div>
                <div class="row justify-content-between p-0">
                    <div class="col-lg-6 text-start">
                        <label>District:</label>
                        <input name="district" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                               type="text" placeholder="District">
                        <span class="invalid-feedback district-error"></span>
                    </div>
                    <div class="col-lg-6 text-start">
                        <label>Ward:</label>
                        <input name="ward" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                               type="text" placeholder="Ward">
                        <span class="invalid-feedback ward-error"></span>
                    </div>
                    <div class="row justify-content-between p-0">
                    <label class="p-0" >Detailed Address:</label>
                    <input name="detailedaddr" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                           type="text" placeholder="Detailed Address">
                    <span class="invalid-feedback detailedaddr-error"></span>
                    </div>
                </div>
            </div>
            <!--Sign up btn-->
            <div class="text-center py-4">
                <button type="button" class="btn btn-dark rounded-pill signin-btn" style="width: 15rem;">
                    Sign up
                </button>
            </div>
        </div>

    </form>


    <!--Newsletter-->
    <div class="row bg-dark p-3 mx-3 rounded-3">
        <div class="col-lg-6 m-2 text-white fs-3 fw-bolder text-start">
            STAY UPTO DATE ABOUT OUR LATEST OFFERS
        </div>
        <div class="col-lg-5 p-0 text-end">
            <form action="actionvd.php" method="post">
                <div class="input-group py-2" id="reg-email">
                    <span class="input-group-text border border-0 rounded-start-pill">
                        <img alt="email icon" style="height: 1.5rem;" src="./img/nav/email.png">
                    </span>
                    <input name="email" class="form-control text-secondary border border-0  rounded-end-pill form-control"
                           type="text" placeholder="Enter your email address" value="">
                    <span class="invalid-feedback email-error"></span>
                </div>
                <button style="width: 90%;" type="submit" class="btn btn-light rounded-pill w-100 reg-btn" onclick="return emailvalidate()">
                    Subscribe to Newsletter
                </button>
            </form>
        </div>
    </div>



    <footer class="px-4">
        <div class="row border-bottom border-3 my-5">
            <div class="col-lg-3 mb-3">
                <a class="navbar-brand fs-3 fw-bolder" href="#">SHOP.CO</a>
                <div class="text-secondary py-3">
                    We have clothes that suits your style and which you’re proud to wear. From women to men.
                </div>
                <div>
                    <a class="link-underline link-underline-opacity-0" href="#">
                        <img class="socialmedia" alt="twitter" src="./img/footer/tw.png">
                    </a>
                    <a class="link-underline link-underline-opacity-0" href="#">
                        <img class="socialmedia" alt="facebook" src="./img/footer/fb.png">
                    </a>
                    <a class="link-underline link-underline-opacity-0" href="#">
                        <img class="socialmedia" alt="github" src="./img/footer/gh.png">
                    </a>
                    <a class="link-underline link-underline-opacity-0" href="#">
                        <img class="socialmedia" alt="instargram" src="./img/footer/in.png">
                    </a>
                </div>
            </div>

            <div class="col-6 col-lg-2 offset-lg-1 mb-3" bis_skin_checked="1">
                <h5 class="text-uppercase py-3">Company</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">About</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Features</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Works</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Career</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3" bis_skin_checked="1">
                <h5 class="text-uppercase py-3">Help</h5>
                <ul class="list-unstyled fs-6">
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Customer Support</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Delivery Details</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Terms & Conditions</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3" bis_skin_checked="1">
                <h5 class="text-uppercase py-3">faq</h5>
                <ul class="list-unstyled fs-6">
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Account</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Manage Deliveries</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Orders</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Payments</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3" bis_skin_checked="1">
                <h5 class="text-uppercase py-3">Resources</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Free eBooks</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Tutorial</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">How to - Blog</a></li>
                    <li class="mb-2"><a class="text-secondary link-underline link-underline-opacity-0" href="#">Youtube Playlist</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-3 text-secondary text-center text-lg-start">
                Shop.co © 2000-2023, All Rights Reserved
            </div>
            <div class="col-lg-6 mb-3 text-center text-lg-end">
                <img class="payment p-0" alt="payment" src="./img/payment/visa.png">
                <img class="payment p-0" alt="payment" src="./img/payment/master.png">
                <img class="payment p-0" alt="payment" src="./img/payment/paypal.png">
                <img class="payment p-0" alt="payment" src="./img/payment/applepay.png">
                <img class="payment p-0" alt="payment" src="./img/payment/googlepay.png">
            </div>
        </div>
    </footer>

    <script src="./script/signup.js"></script>

</body>
</html>