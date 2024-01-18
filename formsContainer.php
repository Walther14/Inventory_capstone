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
@include('partials/forms-topbar.php')
?>


<div style="margin: 5rem;">
    <div class="container" id="formContainer" style="display: flex; justify-content: center; align-items: center;">
        <img src="./img/FORMS.png" style="height: 500px; margin-top: 90px;" alt="Description of the image">
    </div>




</div>



<script>
    function logSelectedOption(selectElement) {
        var selectedOption = selectElement.value;

        if (selectedOption !== "select form") {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('formContainer').innerHTML = xhr.responseText;
                    let semiIssuedPrint = document.querySelector("#semiIssuedProperty")
                    let unserviceableProp = document.querySelector("#propertyUnservice")
                    



                     // Make sure elements are not null before adding event listeners
                if (semiIssuedPrint) {
                    semiIssuedPrint.addEventListener("change", function () {
                        loadDataSemiIssued(semiIssuedPrint.value);
                    });
                }

                if (unserviceableProp) {
                    unserviceableProp.addEventListener("change", function () {
                        loadData(unserviceableProp.value);
                    });
                }



                    // Semi issued

                    const loadDataSemiIssued = (id) => {
                        var xhr2 = new XMLHttpRequest();

                        xhr2.open('GET', `./Controller/semiIssuedPropertyNumber.php?id=${id}`, true);

                        xhr2.onreadystatechange = function() {
                            if (xhr2.readyState == 4 && xhr2.status == 200) {
                                var data = JSON.parse(xhr2.responseText);

                                let propertyDescriptionSemi = document.querySelectorAll("#ATitle");

                                propertyDescriptionSemi.value = data && data.Property_Description ? data.Property_Description : null

                            }
                        };

                        xhr2.send();
                    }


                    const loadData = (id) => {
                        var xhr3 = new XMLHttpRequest();

                        xhr3.open('GET', `./Controller/unserviceablePropertyNumber.php?id=${id}`, true);

                        xhr3.onreadystatechange = function() {
                            if (xhr3.readyState == 4 && xhr3.status == 200) {
                                var data = JSON.parse(xhr3.responseText);

                                let dateAcquiredUnservice = document.querySelector("#dateAcquiredUnservice")
                                let particularsUnserviceable = document.querySelector("#particularsUnserviceable")
                                let unitValueUnserviceable = document.querySelector("#unitValueUnserviceable")
                                let classificationUnserviceable = document.querySelector("#classificationUnserviceable")

                                let quantity = document.querySelector("#quantity")
                                let totalCostUnserviceable = document.querySelector("#totalCostUnserviceable")

                                quantity.addEventListener("change", () => {
                                    multiply(quantity.value, data.Unit_Value.replace(",",''))
                                })

                                const multiply = (quantity, unitValue) => {
                                    totalCostUnserviceable.value = toPeso(quantity * unitValue)
                                }

                                function toPeso(number) {
                                    const pesoFormatter = new Intl.NumberFormat('en-PH', {
                                        style: 'currency',
                                        currency: "PHP"
                                    })

                                    return pesoFormatter.format(number)
                                }

                                particularsUnserviceable.value = data && data.Property_Description ? data.Property_Description : null;
                                classificationUnserviceable.value = data && data.Asset_Title ? data.Asset_Title : null;
                                dateAcquiredUnservice.value = data && data.Date_Acquired ? data.Date_Acquired : null;
                                unitValueUnserviceable.value = data && data.Unit_Value ? data.Unit_Value : null;

                            }
                        };

                        xhr3.send();
                    }



































                }
            };
            xhr.open('GET', selectedOption, true);
            xhr.send()
        }
    }
</script>


<script defer>
    function onChange(event) {
        console.log(this)
        var accountNumber = event.target.value;
        fetch('./forms/getAT.php?accountNumber=' + encodeURIComponent(accountNumber))
            .then(response => response.json())
            .then(data => {

                document.getElementById('ATitle').value = data.account_title;
            })
            .catch(error => console.error('Error:', error));

    }
</script>

<?php
include('partials/footer.php')
?>