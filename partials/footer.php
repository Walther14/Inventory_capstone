<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Transfer Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        $transfer_db = "SELECT * FROM transfer_db";
        $transfer_db_query = mysqli_query($data, $transfer_db);

        if ($transfer_db_query->num_rows > 0) {
            // output data of each row
            while ($row = $transfer_db_query->fetch_assoc()) {
        ?>

                <h1><?php echo $row['user_id'] ?></h1>
                <p><?php echo $row['message'] ?></p>
        <?php
            }
        }
        ?>




    </div>
</div>

<script>
    let sidebuttons = document.querySelectorAll("#gyatt")

    console.log(sidebuttons)


    general.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")



        sidenav1.style.display = "block"
        sidenav2.style.display = "none"
        sidenav3.style.display = "none"
        sidenav4.style.display = "none"
        sidenav5.style.display = "none"

    })

    dropdown.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")



        sidenav1.style.display = "none"
        sidenav2.style.display = "block"
        sidenav3.style.display = "none"
        sidenav4.style.display = "none"
        sidenav5.style.display = "none"


    })

    something.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")



        sidenav1.style.display = "none"
        sidenav2.style.display = "none"
        sidenav3.style.display = "block"
        sidenav4.style.display = "none"
        sidenav5.style.display = "none"
    })

    d.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")



        sidenav1.style.display = "none"
        sidenav2.style.display = "none"
        sidenav3.style.display = "none"
        sidenav4.style.display = "block"
        sidenav5.style.display = "none"


    })



    archives.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")



        sidenav1.style.display = "none"
        sidenav2.style.display = "none"
        sidenav3.style.display = "none"
        sidenav4.style.display = "none"
        sidenav5.style.display = "block"


    })


    // JavaScript to handle the active state
    document.querySelectorAll('.icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            // Remove "active" class from all icons
            document.querySelectorAll('.icon').forEach(function(icon) {
                icon.classList.remove('active');
            });

            // Add "active" class to the clicked icon
            icon.classList.add('active');
        });
    });
</script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>