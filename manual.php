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
    <p>Figure 3</p>
    <!-- <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;"></p> -->
    <h5 style="text-align: justify; padding-left: 10rem;">3.1 Forget password: Enter your username</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">If you have forgotten your password, initiate the password recovery process by entering your username in the provided field. This is the first step to verify your identity and recover access to your account.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">3.2 Forget password: Enter your user id from the administrator</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">To further verify your identity, enter the user ID provided to you by the system administrator. This step ensures that the password recovery request is legitimate and authorized.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">3.3 Forget password: Search for the user</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">After entering your username and user ID, click the "Search" button to locate your account information. This step is crucial in confirming the details associated with your account and proceeding with the password recovery process.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">3.4 Forget password: Cancel the process</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">If you decide to cancel the password recovery process at any point, you can click the "Cancel" button. This will abort the current operation, and you will remain on the login screen.</p>
</div>
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/change password in forget.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 4</p>
    <!-- <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;"></p> -->
    <h5 style="text-align: justify; padding-left: 10rem;">4.1 New password in forget process: enter your new password</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">In the password recovery process, it's time to set a new password. Enter your chosen new password in the field provided. Choose a strong and secure password</p>
    <h5 style="text-align: justify; padding-left: 10rem;">4.2 New password in forget process: enter the new password for confirmation</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">To ensure accuracy and prevent errors, re-enter your new password in the confirmation field. This step confirms that the new password is correctly typed, helping you avoid any mistakes during the password-setting process.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">4.3 New password in forget process: Submit</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">After entering and confirming your new password, click the "Submit" button to save the changes. Your password has now been successfully updated, and you can use the new credentials to log in to your account.</p>
</div>
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/dash.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 5</p>
    <!-- <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;"></p> -->
    <h5 style="text-align: justify; padding-left: 10rem;">5.1 Inventory: Back up and restore database, Log out, Manage Account to change credentials, usermanual </h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Back Up and Restore Database: Perform essential database operations to ensure data integrity and security.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Log Out: Safely log out of the system to protect your account and data.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Manage Account to Change Credentials: Access account settings to modify login credentials for enhanced security.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">User Manual: Refer to the user manual for detailed instructions and assistance.</p>

    <h5 style="text-align: justify; padding-left: 10rem;">5.2 Inventory: Dashboard, Inventory data, User Management to add users</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Dashboard: Gain insights and overview of the inventory system.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Inventory Data: Access and manage detailed information related to inventory items.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">User Management to Add Users: Administer user roles and permissions, including the addition of new users.</p>

    <h5 style="text-align: justify; padding-left: 10rem;">5.3 Inventory: Asset, Item Category, Fund Code</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Asset: Manage and track individual assets within the inventory.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Item Category: Organize items based on predefined categories.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Fund Code: Categorize and allocate funds for effective financial tracking.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">5.4 Inventory: Reports and Forms</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Reports: Generate and view detailed reports for informed decision-making.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Forms: Access necessary forms for various inventory-related processes.</p>

    <h5 style="text-align: justify; padding-left: 10rem;">5.5 Inventory: Locator, BSC Campus and Dorm</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Locator: Define and track specific locations for inventory items.</p>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">BSC Campus and Dorm: Organize inventory based on campus and dormitory specifications.</p>

    <h5 style="text-align: justify; padding-left: 10rem;">5.6 Inventory: Transfer</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Initiate and manage inventory transfers seamlessly within the system.</p>
    <h5 style="text-align: justify; padding-left: 10rem;">5.7 Inventory: Archive</h5>
    <p style="text-align: justify; padding-left: 15rem;padding-right: 10rem;">Archive historical data and information for reference or compliance purposes.

</p>

</div>



<?php
include('partials/footer.php')
?>