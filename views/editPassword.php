<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/registerBoxStyle.css">
    <script language="JavaScript" type="text/javascript" src="../views/validator.js"></script>
    <style>
        body {
            overflow-y: scroll;
        }
    </style>
    <title>Register</title>
</head>

<body>
    <form class="form" id="form-1" action="../controllers/editPassword_processing.php" method="post">
        <h1 class="register-content">Edit Password</h1>
        <span class="form-message" id="response" href="javascript: reload()"></span>
        <div class="account-info">
            <div class="form-group">
                <input type="hidden" name="username" placeholder="*Username" id="Username" class="TextField form-control" value=<?php echo $_SESSION['username']; ?> />
                <span class="form-message" id="uname"></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="*Password" id="Password" class="PasswordField form-control" />
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <input type="password" name="newPassword" placeholder="*New Password" id="newPassword" class="PasswordField form-control" />
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <input type="password" name="password3" placeholder="*Re-type New Password" id="RetypePassword" class="PasswordField form-control" />
                <span class="form-message"></span>
            </div>
            <input id="sign-up-button" type="submit" name="signup_submit" value="Edit" />
            <?php if (isset($_GET['userid'])) { ?>
                <input id="back-to-login" value="Back to Profile" onclick="location.href='<?php echo './profile?userid=' . $_GET['userid']; ?>'" />
            <?php } ?>
    </form>
    <script language="JavaScript" type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Mong muốn của chúng ta
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#Password', 'Password must be filled'),
                    Validator.minLength('#Password', 8, 'Password is at least 8 characters'),
                    Validator.passwordCheck('#Password'),
                    Validator.passwordCheck('#newPassword'),
                    Validator.isRequired('#newPassword', 'New Password must be filled'),
                    Validator.isRequired('#RetypePassword', 'Retype Password must be filled'),
                    Validator.isConfirmed('#RetypePassword', function() {
                        return document.querySelector('#newPassword').value
                    }, "New Passowrd is not correct"),
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