<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file returns faceted search results for user.
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
            // Set variables from faceted search form and last page
            $username = $_GET["user"];
            $country = $_POST["country"];
            $package = $_POST["package"];

            // Query if country has no filter
            if (strcmp($country, 'No Filter') == 0){

                // create a prepared statement with specific price package
                $q = "SELECT l.city, l.country, p.price_package, p.rating, p.plan_id
                      FROM Plan p JOIN Location l USING (location_id)
                      WHERE p.price_package = ?
                      ORDER BY l.city";
                $st = $cn->stmt_init();
                $st->prepare($q);
                $st->bind_param("s", $package);

                $st->execute();
                $st->store_result();

            // Query if price package has no filter
            } else if (strcmp($package, 'No Filter') == 0){

                // create a prepared statement with specific country
                $q = "SELECT l.city, l.country, p.price_package, p.rating, p.plan_id
                      FROM Plan p JOIN Location l USING (location_id)
                      WHERE l.country = ?
                      ORDER BY l.city";
                $st = $cn->stmt_init();
                $st->prepare($q);
                $st->bind_param("s", $country);

                $st->execute();
                $st->store_result();
            
            // Query if both have no filter
            } else if (strcmp($package, 'No Filter') == 0 and strcmp($country, 'No Filter') == 0){

                // query all results
                $q = "SELECT l.city, l.country, p.price_package, p.rating, p.plan_id
                      FROM Plan p JOIN Location l USING (location_id)
                      ORDER BY l.city";
                $st = $cn->stmt_init();
                $st->prepare($q);

                $st->execute();
                $st->store_result();

            // Query if both have a filter
            } else {

                // create a prepared statement with specific country and price package
                $q = "SELECT l.city, l.country, p.price_package, p.rating, p.plan_id
                      FROM Plan p JOIN Location l USING (location_id)
                      WHERE l.country = ? AND p.price_package = ?
                      ORDER BY l.city";

                $st = $cn->stmt_init();
                $st->prepare($q);
                $st->bind_param("ss", $country, $package);

                $st->execute();
                $st->store_result();
            }

             // check if query returns any rows and format into table if true
             if($st->num_rows > 0) {

                $st->bind_result($city, $country, $package, $rating, $plan_id);

                echo("<table>
                        <tr>
                            <th> Location </th>
                            <th> Price Package </th>
                            <th> Rating </th>
                        </tr>");

                while($st->fetch()){

                    echo("<tr>
                            <td> <a href='SearchPlan.php?plan_id=$plan_id&user=$username'>$city, $country</a> </td>
                            <td> $package </td>
                            <td> $rating </td>
                        </form>
                        </tr>");            
                }
                echo("</table> <br><br>");

             } else {
                // If the query returns 0 rows
                echo "There are no available travel plans currently in this grouping. <br><br>";
             }

             // Button to return to search engine
             echo "<form action='SearchEngine.php?user=$username' method='POST'>";
             echo "<input type='submit' value = 'Return to Search'>";
             echo "</form>";

             $st->close();
             $cn->close();
        ?>

    </body>
</html>