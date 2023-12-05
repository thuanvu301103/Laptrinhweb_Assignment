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
    <script src="../views/validator.js"></script>
    <title>Sign Up</title>
</head>
<body style="background-color: #F2F0F1;">
    <nav class="navbar sticky-top" style="background-color: #FFFFFF;">
        <div class="align-item-start container-fluid">
            <a class="navbar-brand fs-3 fw-bolder px-5" href="#">SHOP.CO</a>
           
            <!--Account-->
            <div class="mr-auto nav-item px-5">
                <a class="nav-link" href="#">
                    <i class="fa fa-question" aria-hidden="true"></i>   Need help
                </a>
            </div>
        </div>
    </nav>
    
    <div class="row px-3 m-0">
            <div class="fw-bolder text-dark" style="font-size: 5rem;">Register</div>
            <form class="form row p-3 m-0" id="form-1" action="../controllers/register_processing.php" method="post">
                <span class="form-message" id="response" href="javascript: reload()"></span>
                <div class="d-flex flex-row justify-content-around account-info ">
                    <div class="col-lg-5 m-2 text-start">
                        <label>Username/Email:</label>
                        <input type="text" name="username" placeholder="Username/Email" id="Username" 
                        class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        <span class="form-message" id="uname"></span>

                        <label>Password:</label>
                        <input type="password" name="password" placeholder="Password" id="Password" 
                        class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required|min:6" />
                        <span class="form-message"></span>

                        <label>Re-enter Password:</label>
                        <input type="password" name="password2" placeholder="Re-type password" id="RetypePassword" 
                        class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        <span class="form-message"></span>

                    </div>
                    
                    <div class="col-lg-5 m-2 text-start">
                        <label>First name:</label>
                        <input type="text" name="firstname" placeholder="First Name" id="Firstname" 
                        class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        <span class="form-message"></span>

                        <label>Last name:</label>
                        <input type="text" name="lastname" placeholder="Last Name" id="Lastname" 
                        class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        <span class="form-message"></span>

                        <label>Phone number:</label>
                        <input type="text" name="phone" placeholder="Phone" id="Phone" 
                        class="my-3 form-control text-secondary border border-0  rounded-pill form-control" rules="required" />
                        <span class="form-message"></span>
                        
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
                                        Other
                                    </label>
                                </div>
                            </div>

                        <div class="d-flex flex-row text-center py-3">
                            <input class="btn btn-dark rounded-pill signin-btn" style="width: 15rem; margin-right: 2rem;"
                                id="sign-up-button" type="submit" name="signup_submit" value="Sign me up" />
                            <input class="btn btn-light rounded-pill signin-btn border border-2 border-dark" style="width: 15rem;"
                                id="back-to-login" onclick="location.href='./login.php';" value="Back to Login"></button>
                        </div>
                    </div>
                </div>

               
        
            </form>
    </div>
    
    <?php include "footer.php" ?>

    <script language="JavaScript" type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Mong muốn của chúng ta
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#Username', 'Username must be filled'),
                    Validator.usernameCheck('#Username', 'Username must be in correct form'),
                    Validator.isRequired('#Firstname', 'Please fill your first name'),
                    Validator.isRequired('#Lastname', 'Please fill your last name'),
                    Validator.isRequired('#Phone', 'Please fill your phone number'),
                    Validator.phoneCheck('#Phone', 'Phone must be in correct form'),
                    Validator.isRequired('#Password', 'Password must be filled'),
                    Validator.minLength('#Password', 8, 'Password is at least 8 characters'),
                    Validator.isConfirmed('#RetypePassword', function() {
                        return document.querySelector('#Password').value;
                    }, 'Pasword is not match'),
                    Validator.passwordCheck('#Password')
                ],
            });
        });
        function getParameter(parameterName) {
            let parameter = new URLSearchParams(window.location.search);
            return parameter.get(parameterName);
        }
        var baseURL = window.location.href.split("?")[0];
        var success = getParameter('success');
        var error = getParameter('error');
        console.log(baseURL);
        console.log(success);
        console.log(error);
        var element = document.getElementById('response');
        if (success) {
            element.innerHTML = success;
            element.classList.remove('error');
            element.classList.add("success");
            window.history.pushState('name', '', baseURL);
        }
        if (error) {
            element.innerHTML = error;
            element.classList.remove("success");
            element.classList.add("error");
            window.history.pushState('name', '', baseURL);
        }
    </script>
</body>

</html>