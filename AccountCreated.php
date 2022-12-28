<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file is alerts user of newly created account for TravelSlate.
 ---------------------------------------------------------------------->

 <html>

    <!-- CSS color settings -->
    <head>
    <style>
        body{
            background-color: rgb(245, 237, 223);
        }
    </style>
    </head>

    <body>
        <!-- Header Title -->
        <h1 style="font-family: Chalkduster"> Travel Slate </h1>
        <hr>

        <!-- Connect to Database -->
        <?php
            // connection params
            $config = parse_ini_file ("../project-dgiacobbi/config.ini");
            $server = $config ["servername"];
            $username = $config ["username"];
            $password = $config ["password"];
            $database = "dgiacobbi_DB";
            
            // connect to db
            $cn = mysqli_connect ($server, $username, $password, $database);

            // check connection
            if (!$cn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        ?>

        <?php
            // Get all user input from form
            $username = $_POST["username"];
            $password = $_POST["password"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];

            $submit_b = $_POST['submit'];

            // Validate that user input is completely filled
            if($submit_b){
                if (empty($username) || empty($password) || empty($first_name) || empty($last_name) || empty($email)){
                    header("Location: Error.php");
                }
            }
        ?>

        <?php
            // Get the new user information from the form and store in variables
            $username = $_POST["username"];
            $password = $_POST["password"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];

            // Perform query to check if user already exists
            $q = "SELECT * FROM Account WHERE user = ?";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("s", $username);

            $st->execute();

            if ($st->fetch() != NULL)
                header("Location: Error.php");
        ?>


        <?php
            // Passes validation, welcome user and enter info into DB    
            echo "Welcome " . $first_name . " " . $last_name . "! Return to the login page to access your new account.";

            $q = "INSERT INTO Account Values (?, ?, ?, ?, ?)";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("sssss", $username, $password, $first_name, $last_name, $email);

            $st->execute();

            $st->close();
            $cn->close();
        ?>

        <!-- Button to return to login screen -->
        <p><button onclick="window.location='Login.php';">Return to Login</button></p>

    </body>
</html>