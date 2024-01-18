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
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/backup.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 6</p>
    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">6.1 Back up: Click the "Back Up" button</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
        To initiate the backup process, click on the "Back Up" button. This action will prompt the system to download an SQL file, which will be required for the restoration process.
    </p>

    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">6.2 Restore: Recover the system in the event of a crash</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
        To restore the system after a crash, select the option to restore and choose the SQL file previously downloaded during the backup process. This file contains the necessary data for system recovery.
    </p>

</div>


<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/log out.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 7</p>
    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">7.1 Log Out</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
        To exit the system, click the "Log Out" button. It is essential to log out to secure your account and sensitive information. Logging out prevents unauthorized access and ensures the privacy and security of your data.
    </p>
</div>

<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/manage1.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 8</p>
    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">8.1: Manage Account - Update First Name</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">Navigate to the "First Name" field and enter the updated information.</p>

    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">8.2: Manage Account - Update Last Name</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">Navigate to the "Last Name" field and enter the updated information.</p>

    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">8.3: Manage Account - Update Username</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">Navigate to the "Username" field and enter the updated information.</p>

    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">8.4: Manage Account - Update Password</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">Navigate to the "Password" field and enter the updated information.</p>

    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">8.5: Manage Account - Confirm Password Update</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">Navigate to the "Confirm Password" field and enter the updated information to confirm the password change.</p>

    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">8.6: Manage Account - Update Your Account</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">Click the "Update Your Account" button to save the changes based on the data you entered.</p>

    <img src="./manual/manage2.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 9</p>
    <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">9.1: Account Update Successful</h5>
    <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
        Upon successful account update, you will be redirected to this page. To apply the changes, log out and log back in using your updated credentials.
    </p>


</div>
<div style="text-align: center;  font-family: Century Gothic, sans-serif;">
    <img src="./manual/manual.png" style="height: 25rem; margin-top: 50px;">
    <p>Figure 10</p>
    <div>
        <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">10: System Manual</h5>
        <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
            Access the comprehensive manual for the system, providing detailed instructions and information on its functionalities.
        </p>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/dashboard.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 11</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">11.1: Dashboard Overview</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Explore the main dashboard interface of the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">11.2: Select Category</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Choose a category to apply filters and refine displayed data.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">11.3: Enter Description or Custodian Name</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Input either the description or the name of the custodian for targeted searches.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">11.4: Search Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the search button to initiate the filtering process and retrieve relevant data.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/inventory1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 12</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">12.1: Inventory Overview</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Explore the comprehensive inventory of the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">12.2: Enter Description</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Input the description of the item to perform targeted searches.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">12.3: Search Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the search button to initiate the filtering process and retrieve relevant data.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">12.4: Add New Item</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Add Inventory" button to input new data.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">12.5: View Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view detailed information about the selected item.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">12.6: Archive Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to move the selected item to the archive for storage.</p>
        </div>
    </div>
    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/inventory2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 13</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">13.1: View Item Details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view detailed information about the selected item.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">13.2: Edit Item Details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to edit the details of the selected item.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/inventory3.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 14</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">14.1: Add New Item</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to initiate the process of adding a new item.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">14.2: Input Fields</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the required data for the new item in the designated input fields.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">14.3: Add Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Add" button to confirm and add the new item to the inventory.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/userman1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 15</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">15.1: Add New Item</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to initiate the process of adding a new item.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">15.2: Input Fields</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the required data for the new item in the designated input fields.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">15.3: Add Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Add" button to confirm and add the new item to the inventory.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/userman2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 16</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">16.1: Enter New User Details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the required details of the new user and select their role for proper access management.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">16.2: Save Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Save" button to store the details of the new user and add them to the system.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/asset1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 17</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">17.1: Asset List</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                View the comprehensive list of assets stored in the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">17.2: Add New Asset</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to initiate the process of adding a new asset to the system.</p>
        </div>
    </div>


    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/asset2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 18</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">18.1: Enter New Asset Details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the required details of the new asset to be added to the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">18.2: Save Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Save" button to store the details of the new asset and integrate it into the system.</p>
        </div>
    </div>


    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/category1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 19</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">19.1: Item Category List</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                View the list of item categories stored in the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">19.2: Add New category</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to initiate the process of adding a new item category to the system.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/category2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 20</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">20.1: Enter new item category details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the required details of the new item category to be added to the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">20.2: Save Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Save" button to store the details of the new item category and integrate it into the system.</p>
        </div>
    </div>
    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/fund1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 21</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">21.1: Fund code and title List</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                View the list of fund code and title stored in the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">21.2: Add New code and title</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to initiate the process of adding a new Fund code and title to the system.</p>
        </div>
    </div>
    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/fund2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 22</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">22.1: Enter new fund code and title details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the required details of the new fund code and title to be added to the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">22.2: Save Button</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click the "Save" button to store the details of the new fund code and title and integrate it into the system.</p>
        </div>
    </div>
    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/form1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 23</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">23.1: Form List</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                View the comprehensive list of forms available in the system.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">23.2: Provide the Data</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Fill up the required fields with data for printing.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">23.3: Add Row</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to add a new row for additional items.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">23.4: Submit for Printing</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to submit the filled form for printing.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/form 2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 24</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">24.1: Back</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Navigate back to the previous page.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">24.2: Save as Image</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Save the generated report as an image.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">24.3: Print</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to print the filled form.</p>
        </div>
    </div>
    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/form3.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 25</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">25.1: Physical Count of Inventories</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Form for conducting the physical count of inventories.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">25.2: Physical Count of Semi-Expendable Property</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Form for the physical count of semi-expendable property.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">25.3: Physical Count of Property Plant and Equipment</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Form for the physical count of property, plant, and equipment.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">25.4: Fields</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the necessary data in the provided fields.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">25.5: Add Row</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to add a new row for additional items.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">25.6: Submit for Printing</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to submit the filled form for printing. Upon submission, it will appear similar to Figure 24.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/form4.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 26</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">26.1: Inventory Count Form</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Data entry for the Inventory Count Form.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">26.2: Category</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Select the category to be filtered.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">26.3: Asset Number</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Select the asset number or group to be filtered.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">26.4: Custodian</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Select the custodian's name to be filtered.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">26.5: Search</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to initiate the filtering process.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">26.6: Submit for Printing</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to submit the filled form for printing. Upon submission, it will appear similar to Figure 24.</p>
        </div>
    </div>
    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/locator.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 27</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">27.1: BSC Campus Map</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the map of the BSC campus and access corresponding locator codes for each area.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">27.2: BSC Dormitory Map</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the map of the BSC dormitory and access corresponding locator codes for each area.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/trans1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 28</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">28.1: Transfer Requests</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view transfer requests.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">28.2: List of Requests</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the list of transfer requests for issued items.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">28.3: List of Archived Requests</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the list of archived transfer requests.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">28.4: Request Details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the details of the requested transfer.</p>
        </div>
    </div>

    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/trans2.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 29</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">29.1: Cancel</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to decline or cancel the transfer of the item.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">29.2: Approve</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to approve the request.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">29.3: Cancel Transfer of the Item</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                If 29.2 is clicked, it will redirect to the transfer process, and you may still cancel it.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">29.4: Approve the Transfer and Move It to Supply</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                If 29.2 is clicked, you may transfer the item, edit the custodian to the supply office, then issue it again to another custodian if necessary through the edit function in Figure 13.2.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">29.5: Cancel the Decline of the Request</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                If 29.1 is clicked, it will redirect to the transfer process, and you may still cancel it.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">29.6: Confirm the Cancellation of the Transfer of the Item</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                If 29.2 is clicked, you may cancel the request and state the reason why you cancelled it.</p>
        </div>
    </div>


    <div style="text-align: center; font-family: Century Gothic, sans-serif;">
        <img src="./manual/archive1.png" style="height: 25rem; margin-top: 50px;">
        <p>Figure 30</p>
        <div>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">30.1: Archive</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the list of archived items.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">30.2: View Item Details</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Click to view the details of the item.</p>
            <h5 class="manual-step" style="text-align: justify; padding-left: 10rem;">30.3: Search</h5>
            <p class="manual-description" style="text-align: justify; padding-left: 15rem; padding-right: 10rem;">
                Enter the description of the item to be searched and then click the search button to start the filtering.</p>
        </div>
    </div>




    <?php
    include('partials/footer.php')
    ?>