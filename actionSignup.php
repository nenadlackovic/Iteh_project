<script>
    var name = "<?php echo $_GET['name']?>";
    var email = "<?php echo $_GET['email']?>";
    var pass = "<?php echo $_GET['pass']?>";
    var pass2 = "<?php echo $_GET['re_pass']?>";

    if (pass != pass2) {
        alert("Password don't match!");
        window.location.href = "singup.php";
        throw new Error("Password don't match!");
    }

    fetch("http://localhost:3000/users", {
        method: "GET",
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (json) {
            var userStr = JSON.stringify(json);

            JSON.parse(userStr, (key, value) => {
                if (key == "Username") {
                    if (value == name) {
                        alert("Username already exists!");
                        window.location.href = "singup.php";
                        return;
                    }
                }
                if (key == "Email") {
                    if (value == email) {
                        alert("Email already exists!");
                        window.location.href = "singup.php";
                        return;
                    }
                }
            });
        });

    fetch(`http://localhost:3000/users`, {
        method: "post",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify({ Username: name, Password: pass, Email: email, Uloga: "Korisnik" }),
    })
        .then((res) => res.json())
        .then((data) => (obj = data))
        .then(function asd() {
            if (obj.statusCode) {
                alert("Error!");
                window.location.href = "singup.php";
            } else {
                alert("Registration successful!");
                window.location.href = "singin.php";
            }
        });
</script>
