<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Shop.co | Sign In</title>

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
                var username = document.getElementsByName("email-user")[0];
                var pass = document.getElementsByName("pass")[0];
                var only_email_error = document.getElementsByClassName("only-email-error")[0];
                var only_pass_error = document.getElementsByClassName("only-pass-error")[0];
                if (only_email_error.innerHTML != null) { username.classList.remove("is-invalid"); }
                only_email_error.innerHTML = "";
                if (only_pass_error.innerHTML != null) { pass.classList.remove("is-invalid"); }
                only_pass_error.innerHTML = "";
                var username_value = username.value;
                var pass_value = pass.value;

                var check = false;
                /*var email-pass-error = document.getElementsByClassName("email-pass-error")[0];
                if (email-pass-error.innerHTML != null) {
                    pass.classList.remove("is-invalid");
                    username.classList.remove("is-invalid");
                }
                email-pass-error.innerHTML = "";*/
                if (username_value.length === 0) {
                    username.classList.add("is-invalid");
                    only_email_error.innerHTML = "Please enter your email / username";
                    check = true;
                }
                if (pass_value.length === 0) {
                    pass.classList.add("is-invalid");
                    only_pass_error.innerHTML = "Please enter your password";
                    check = true;
                }

                if (check === true) { return check; }
                else {
                    /*$.get("phphphp", function(status){
                        if (status === 500) {
                            username.classList.add("is-invalid");
                            pass.classList.add("is-invalid");
                            email-pass-error = "Wrong email/username or password";
                        }
                        else {
                            window.location.replace("link to redirect to main page");
                        }
                    });*/
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

    <div class="row px-3 m-0">
        <div class="col-lg-6 m-2 text-start">
            <div class="fw-bolder text-dark" style="font-size: 5rem;">Sign in</div>
            <div class="text-secondary py-3 fs-6">
                Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
            </div>
            <form>
                <input name="email-user" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                       type="text" placeholder="Email / username">
                <span class="invalid-feedback only-email-error"></span>
                <input name="pass" class="my-3 form-control text-secondary border border-0  rounded-pill form-control"
                       type="password" placeholder="Password">
                <span class="invalid-feedback only-pass-error"></span>
                <span class="invalid-feedback email-pass-error"></span>

            </form>
            <!--Sign in / Sign up btn-->
            <div class="d-flex flex-row text-center">
                <button type="button" class="btn btn-dark rounded-pill signin-btn" style="width: 15rem; margin-right: 2rem;">
                    Sign in
                </button>
                <a href="./viewsignup.php" type="button" class="btn btn-light rounded-pill signin-btn border border-2 border-dark" style="width: 15rem;">
                    Sign up
                </a>
            </div>
            <div class="row py-4">
                <div class="col-5 col-lg-4 m-2">
                    <h2 class="fw-bolder text-dark">200+</h2>
                    <div class="text-secondary" style="font-size: 0.8rem;">International Brands</div>
                </div>
                <div class="col-5 col-lg-4 m-2 border-start border-3">
                    <h2 class="fw-bolder text-dark">2,000+</h2>
                    <div class="text-secondary" style="font-size: 0.8rem;">High-Quality Products</div>
                </div>
                <div class="d-flex justify-content-center col-lg-3 m-2 border-start border-3">
                    <div class="p-0 m-0">
                        <h2 class="fw-bolder text-dark">30,000+</h2>
                        <div class="text-secondary" style="font-size: 0.8rem;">Happy Customers</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 p-0 text-center">
            <img alt="background" style="object-fit: contain;" height="100%" src="./view/img/background/background.png">
        </div>
    </div>


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

    <script src="./script/signin.js"></script>

</body>
</html>