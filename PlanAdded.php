<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file adds a plan to user library.
 ---------------------------------------------------------------------->

 <html>

    <!-- CSS Color Details -->
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
            // set variables
            $plan_id = $_GET["plan_id"];
            $user = $_GET["user"];

            // create a prepared statement to insert plan into user's library
            $q = "INSERT INTO SavedPlan VALUES (?,?)";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("si", $user, $plan_id);

            $st->execute();

            echo "Saved Plan has successfully been added to your library. <br><br>";

            // button to return to home page
            echo "<form action='GetHome.php?user=$user' method='POST'>";
            echo "<input type='submit' value = 'Return Home'>";
            echo "</form>";

            $st->close();
            $cn->close();
        ?>
        
    </body>
</html>