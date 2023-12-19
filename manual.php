<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php"); // Replace 'login.php' with your actual login page
    exit();
}

@include('Controller/db.php');
@include('partials/header.php');
@include('partials/sidebar.php');
@include('partials/topbar.php');
?>

<!-- Add this portion to display the response message -->
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/log in.png" style="height: 30rem; margin-top: 50px;">
    <p>Figure 1</p>
    <h5 style="text-align: justify; padding-left: 10rem;">1.1 Log In: enter your default username</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">To access the system, begin by entering your default username in the designated field. The default username is provided by the administrator. Please ensure that you enter the correct username to proceed.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">1.2 Log In: enter your default password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Once you have entered your default username successfully, proceed to enter your default password in the corresponding field. The default password is also provided by the administrator.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">1.3 Log In: Sign in</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Once you have entered your default username successfully, proceed to enter your default password in the corresponding field. The default password is also provided by the administrator.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">1.4 Log In: Forget password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">In case of any issues with logging in, such as forgetting your password, follow the provided password recovery process.</p>
</div>
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/change default password.png" style="height: 30rem; margin-top: 50px;">
    <p>Figure 2</p>
    <!-- <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;"></p> -->
    <h5 style="text-align: justify; padding-left: 10rem;">2.1 Change default password: enter your default password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">To initiate the password change process, start by entering your current default password in the field provided. This ensures the security of the password change procedure and verifies your identity.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">2.2 Change default password: enter your new password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Once you have successfully entered your default password, proceed to input your new password in the designated field. Choose a strong and secure password.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">2.3 Change default password: confirm password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Confirm the new password by entering it again in the confirmation field. This step ensures that there are no typos or errors in the password entry and helps maintain the security of your account.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">2.4 Change default password: choose a random security question</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">As an additional layer of security, choose a random security question from the provided list. This question will be used in the event that you forget your password and need to recover your account.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">2.5 Change default password: enter your security answer to be used in forgetting your password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Provide an answer to the security question you selected in the previous step. This answer will be used to verify your identity during the password recovery process.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">2.6 Change default password: submit your data</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Once all the required information has been entered, click the "Submit" button to confirm the changes. Your password will be updated, and the new security settings will be applied to your account. You will now be redirected to log in using your new password.</p>
</div>
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/forget_pass.png" style="height: 15rem; margin-top: 50px;">
    <p>Figure 2</p>
    <!-- <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;"></p> -->
    <h5 style="text-align: justify; padding-left: 10rem;">2.1 Change default password: enter your default password</h5>
    <h5 style="text-align: justify; padding-left: 10rem;">2.2 Change default password: enter your new password</h5>
    <h5 style="text-align: justify; padding-left: 10rem;">2.3 Change default password: confirm password</h5>
    <h5 style="text-align: justify; padding-left: 10rem;">2.4 Change default password: choose a random security question</h5>
    <h5 style="text-align: justify; padding-left: 10rem;">2.5 Change default password: enter your security answer to be used in forgetting your password</h5>
    <h5 style="text-align: justify; padding-left: 10rem;">2.6 Change default password: submit your data</h5>
</div>



<?php
include('partials/footer.php')
?>