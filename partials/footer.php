

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


    trans.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")
        let sidenav6 = document.querySelector("#sidenav6")



        sidenav1.style.display = "none"
        sidenav2.style.display = "none"
        sidenav3.style.display = "none"
        sidenav4.style.display = "none"
        sidenav5.style.display = "block"
        sidenav6.style.display = "none"


    })



    archives.addEventListener("click", function() {
        let sidenav1 = document.querySelector("#sidenav1")
        let sidenav2 = document.querySelector("#sidenav2")
        let sidenav3 = document.querySelector("#sidenav3")
        let sidenav4 = document.querySelector("#sidenav4")
        let sidenav5 = document.querySelector("#sidenav5")
        let sidenav6 = document.querySelector("#sidenav6")



        sidenav1.style.display = "none"
        sidenav2.style.display = "none"
        sidenav3.style.display = "none"
        sidenav4.style.display = "none"
        sidenav5.style.display = "none"
        sidenav6.style.display = "block"


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