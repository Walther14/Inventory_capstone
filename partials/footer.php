    <script>
   

        let sidebuttons =  document.querySelectorAll("#gyatt")

        console.log(sidebuttons)

   
            general.addEventListener("click", function(){
                let sidenav1 = document.querySelector("#sidenav1")
                let sidenav2 = document.querySelector("#sidenav2")
                let sidenav3 = document.querySelector("#sidenav3")

                sidenav1.style.display = "block"
                sidenav2.style.display = "none"
                sidenav3.style.display = "none"
            })

            dropdown.addEventListener("click", function(){
                let sidenav1 = document.querySelector("#sidenav1")
                let sidenav2 = document.querySelector("#sidenav2")
                let sidenav3 = document.querySelector("#sidenav3")

                sidenav1.style.display = "none"
                sidenav2.style.display = "block"  
                sidenav3.style.display = "none"

            })

            something.addEventListener("click", function(){
                let sidenav1 = document.querySelector("#sidenav1")
                let sidenav2 = document.querySelector("#sidenav2")
                let sidenav3 = document.querySelector("#sidenav3")

                sidenav1.style.display = "none"
                sidenav2.style.display = "none" 
                sidenav3.style.display = "block"
            })

            

    

    </script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
 

</body>
</html>