<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file displays full details about a specific travel plan.
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
            $plan_id = $_GET["plan_id"];
            $user = $_GET["user"];

            // create a prepared statement to get full plan details
            $q = "SELECT pl.description, pl.rating, l.city, l.province, l.country, l.size, l.type, l.main_attraction, l.safety,
                         p.package_type, p.amount, p.trip_time, p.travel_time
                  FROM Plan pl JOIN Location l USING (location_id)
                               JOIN Price p ON (p.package_type = pl.price_package)
                  WHERE plan_id = ?";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("i", $plan_id);

            $st->execute();
            $st->store_result();

            // display plan info in formatted manner
            if($st->num_rows > 0) {

                $st->bind_result($description, $rating, $city, $province, $country, $size, $type, $main_attraction, $safety,
                                 $package_type, $amount, $trip_time, $travel_time);

                while($st->fetch()){

                    echo "<h2> $city, $country </h2>";

                    echo "<b>Rating:</b> $rating <br><br>";
                    echo "<b>Description:</b> <br>";
                    echo "$description";

                    echo "<h3> Location Details </h3>";
                    echo "<b>City:</b> $city <br>"; 
                    echo "<b>Province:</b> $province <br>";
                    echo "<b>Country:</b> $country <br>"; 
                    echo "<b>Population:</b> $size <br>";
                    echo "<b>Type:</b> $type <br>"; 
                    echo "<b>Main Attraction:</b> $main_attraction <br>";
                    echo "<b>Safety:</b> $safety <br>";

                    echo "<h3> Pricing Details </h3>";
                    echo "<b>Package Type:</b> $package_type <br>";
                    echo "<b>Amount:</b> $$amount <br>";
                    echo "<b>Trip Time:</b> $trip_time days <br>";
                    echo "<b>Travel Time:</b> $travel_time days <br><br>";
                }
            } else {
                header("Location: Error.php");
            }
        ?>

        <?php
            // create a prepared statement to get reviews about specific plan
            $q = "SELECT r.title, r.description, r.rating
                  FROM Review r JOIN Plan p USING (plan_id)
                  WHERE plan_id = ?";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("i", $plan_id);

            $st->execute();
            $st->store_result();

            // display reviews, if any, in a formatted table
            if($st->num_rows > 0) {

                $st->bind_result($title, $description, $rating);

                echo "<h3> Plan Reviews </h3>";
                echo("<table>
                         <tr>
                            <th> Title </th>
                            <th> Description </th>
                            <th> Rating </th>
                         </tr>");
                while($st->fetch()){

                    echo("<tr>
                            <td> $title </td>
                            <td> $description </td>
                            <td> $rating </td>
                        </tr>"); 
                }
                echo("</table><br><br>");

            } else {
                echo "There are no reviews currently written for this plan <br><br>";
            }

            // button to add review
            echo "<form action='AddReview.php?plan_id=$plan_id&user=$user' method='POST'>";
            echo "<input type='submit' value = 'Add Review'>";
            echo "</form>";
            
            // button to remove plan from library
            echo "<form action='PlanDeleted.php?plan_id=$plan_id&user=$user' method='POST'>";
            echo "<input type='submit' value = 'Remove Plan from Library'>";
            echo "</form>";

            // button to go back to home page
            echo "<form action='GetHome.php?user=$user' method='POST'>";
            echo "<input type='submit' value = 'Return Home'>";
            echo "</form>";

            $st->close();
            $cn->close();
        ?>

    </body>
</html>