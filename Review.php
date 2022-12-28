<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file displays full details about a specific user review.
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
            $review_id = $_GET["review_id"];
            $user = $_GET["user"];

            // create a prepared statement to get review details
            $q = "SELECT r.title, r.description, r.rating
                  FROM Review r JOIN Plan p USING (plan_id)
                  WHERE review_id = ? AND user = ?";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("is", $review_id, $user);

            $st->execute();
            $st->store_result();

            // Display review details in a formatted table
            if($st->num_rows > 0) {

                $st->bind_result($title, $description, $rating);

                while($st->fetch()){

                    echo "<h2> $title </h2>";
                    echo "<b>Description:</b> <br>";
                    echo "$description <br><br>";
                    echo "<b>Rating:</b> $rating <br><br>";
                }
            } else {
                header("Location: Error.php");
            }   
            
            // button to delete review
            echo "<form action='ReviewDeleted.php?review_id=$review_id&user=$user' method='POST'>";
            echo "<input type='submit' value = 'Delete Review'>";
            echo "</form>";

            // button to return home
            echo "<form action='GetHome.php?user=$user' method='POST'>";
            echo "<input type='submit' value = 'Return Home'>";
            echo "</form>";

            $st->close();
            $cn->close();
        ?>

    </body>
</html>