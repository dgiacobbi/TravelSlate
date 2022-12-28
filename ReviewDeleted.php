<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file alerts user that a review has been deleted.
 ---------------------------------------------------------------------->

 <html>

    <!-- CSS Color and Table Details -->
    <head>
    <style>
        table, th, td {
            border: 1px solid black;
            text-align: left;
            background-color: rgb(244, 230, 250);
        }

        th, td {
            padding-top: 20px;
            padding-bottom: 10px;
            padding-right: 20px;
        }

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
            $review_id = $_GET["review_id"];
            $user = $_GET["user"];

            // create a prepared statement to delete specific review from DB
            $q = "DELETE FROM Review WHERE review_id = ?";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("i", $review_id);

            $st->execute();

            echo "Review has successfully been deleted. <br><br>";

            // button to return home
            echo "<form action='GetHome.php?user=$user' method='POST'>";
            echo "<input type='submit' value = 'Return Home'>";
            echo "</form>";

            $st->close();
            $cn->close();
        ?>   

    </body>
</html>