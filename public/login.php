<?php
require_once ("../include/Database/UserDB.php");

if(isset($_POST["submit"]))
{
    $db = new UserDB();
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($db->validateLogin($username,$password))
        echo "<script>alert('Logged In Successfully!')</script>";
    else
        echo "<script>alert('Invalid Username and/or Password')</script>";

}
?>

<?php require_once ("../include/header.php");?>
<script type="text/javascript" src="javascript/jquery.validate.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-4 ml-auto mr-auto form_with_shadow">
            <h3>Login Now!</h3>

            <form name="login_form" action="login.php" method="post">
                <div class="form-group">
                    <label for="username-input">Username</label>
                    <input type="text" name="username" class="form-control" id="username-input">
                </div>
                <div class="form-group">
                    <label for="password-input">Password</label>
                    <input type="password" name="password" class="form-control" id="password-input">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {

    $.validator.addMethod("validUsername", function (value, element) {
        return /^[a-zA-Z0-9_.-]+$/.test(value);
    }, "The username can only contain letters, numbers, hyphen(-), period(.) and underscore(_)");

    $("form[name='login_form']").validate({
        rules: {
            username: {
                required: true,
                validUsername: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            username: {
                required: "Username is required field",
            },
            password: {
                required: "Password is required field",
                minlength: "Password must be of 6 characters or longer"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});
</script>

<?php require_once ("../include/footer.php");?>
