<script>
    function change_eye() {
        var eye = document.querySelector(".fa-eye");
        var eyeSlash = document.querySelector(".fa-eye-slash");
        var pass = document.querySelector("#pass");

        if (pass.type === "password") {
            pass.type = "text";
            eye.style.display = "block";
            eyeSlash.style.display = "none";

        } else {
            pass.type = "password";
            eye.style.display = "none";
            eyeSlash.style.display = "block";
        }

    }
</script>
</body>

</html>