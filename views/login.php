<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link rel="stylesheet" href="../assets/css/loginBoxStyle.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../views/validator.js"></script>
    <title>Login Page</title>
</head>

<body style="background-color: #F2F0F1;">
    <nav class="navbar sticky-top" style="background-color: #FFFFFF;">
        <div class="align-item-start container-fluid">
            <a class="navbar-brand fs-3 fw-bolder px-5" href="#">SHOP.CO</a>

            <!--Account-->
            <div class="mr-auto nav-item px-5">
                <a class="nav-link" href="#">
                    <i class="fa fa-question" aria-hidden="true"></i> Need help
                </a>
            </div>
        </div>
    </nav>

    <div class="row px-3 m-0">
        <div class="col-lg-6 m-2 text-start">
            <div class="fw-bolder text-dark" style="font-size: 5rem;">Log in</div>
            <div class="text-secondary py-3 fs-6">
                Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
            </div>
            <form class="form-group" id="login" action="../controllers/login_processing.php" method="post">

                <span class="form-message" id="response" href="javascript: reload()"></span>

                <input name="username" class="my-3 form-control text-secondary border border-0  rounded-pill form-control" id="username-input" type="text" placeholder="Email / username">
                <span class="form-message" id="uname"></span>

                <input name="password" class="my-3 form-control text-secondary border border-0  rounded-pill form-control" id="password-input" type="password" placeholder="Password">
                <span class="form-message" id="uname"></span>
                <span class="invalid-feedback email-pass-error"></span>

                <div class="d-flex flex-row text-center">
                    <input type="submit" name="login_submit" value="Login" id="login-btn" class="btn btn-dark rounded-pill signin-btn" style="width: 15rem; margin-right: 2rem;">
                    </input>
                    <a href="./register" type="button" class="btn btn-light rounded-pill signin-btn border border-2 border-dark" style="width: 15rem;">
                        Sign up
                    </a>
                </div>
                <br>
                <div id="forgotPassword">
                    Forgot password?
                </div>
                <!-- error container -->
                <div class="form-message">
                    <span></span>
                </div>



            </form>

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
            <img alt="background" style="object-fit: contain;" height="100%" src="../assets/background.png">
        </div>
    </div>
    <?php include "footer.php" ?>


    <script language="JavaScript" type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Mong muốn của chúng ta
            Validator({
                form: '#login',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#username-input', 'Username must be filled'),
                    Validator.usernameCheck('#username-input'),
                    Validator.isRequired('#password-input', 'Password must be filled'),
                    Validator.minLength('#password-input', 8, 'Password is at least 8 characters'),
                ],
            });
        });

        var baseURL = window.location.href.split("?")[0];
        var error = getParameter('error');
        var element = document.getElementById('response');
        if (error) {
            element.innerHTML = error;
            element.classList.remove("success");
            element.classList.add("error");
            window.history.pushState('name', '', baseURL);
        }
    </script>
</body>

</html>