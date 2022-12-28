<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file provides admin analytics for company for TravelSlate.
 ---------------------------------------------------------------------->

<html>

    <!-- CSS Color Details -->
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

        <h2>Current Consumer Analytics</h2>

        <h3>Top 5 Cities with the Most Reviews</h3>
        <?php
            // create a query to city information with most reviews
            $q = "SELECT l.city, l.country, COUNT(review_id) AS total_reviews
                  FROM Review r JOIN Plan p USING (plan_id)
                                JOIN Location l USING (location_id)
                  GROUP BY l.city
                  ORDER BY total_reviews DESC
                  LIMIT 5";

            $st = $cn->stmt_init();
            $st->prepare($q);

            $st->execute();
            $st->store_result();

            // Display results in a table format
            if($st->num_rows > 0) {

                $st->bind_result($city, $country, $total_reviews);

                echo("<table>
                        <tr>
                            <th> Location </th>
                            <th> Total Reviews </th>
                        </tr>");

                 while($st->fetch()){

                    echo("<tr>
                            <td> $city, $country </td>
                            <td> $total_reviews </td>
                        </form>
                        </tr>");            
                 }
                 echo("</table> <br><br>");
             }
        ?>

        <h3>Consumers with the Lowest Average Review Ratings</h3>
        <?php
            // create a query to get consumer info with lowest review rating averages
            $q = "SELECT a.user, a.first_name, a.last_name, a.email, ROUND(AVG(r.rating), 2) AS avg_rating
                  FROM Review r JOIN Account a USING (user)
                  GROUP BY a.user
                  ORDER BY avg_rating
                  LIMIT 5";

            $st = $cn->stmt_init();
            $st->prepare($q);

            $st->execute();
            $st->store_result();

            // Display results in a formatted table
            if($st->num_rows > 0) {

                $st->bind_result($user, $f_name, $l_name, $email, $rating);

                echo("<table>
                        <tr>
                            <th> Username </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Average Rating </th>
                        </tr>");

                 while($st->fetch()){

                    echo("<tr>
                            <td> $user </td>
                            <td> $l_name, $f_name </td>
                            <td> $email </td>
                            <td> $rating </td>
                        </form>
                        </tr>");            
                 }
                 echo("</table> <br><br>");
             }
        ?>

        <h3>Plans with the Lowest Average Review Rating</h3>
        <?php
            // create a query to get plan info of plans with low average review ratings
            $q = "SELECT p.plan_id, l.city, l.country, p.price_package, ROUND(AVG(r.rating), 2) AS avg_rating
                  FROM Review r JOIN Plan p USING (plan_id)
                                JOIN Location l USING (location_id)
                  GROUP BY p.plan_id
                  ORDER BY avg_rating
                  LIMIT 5";

            $st = $cn->stmt_init();
            $st->prepare($q);

            $st->execute();
            $st->store_result();

            // Display results in formatted table
            if($st->num_rows > 0) {

                $st->bind_result($plan_id, $city, $country, $price_package, $rating);

                echo("<table>
                        <tr>
                            <th> Plan ID </th>
                            <th> Location </th>
                            <th> Price Package </th>
                            <th> Average Consumer Rating </th>
                        </tr>");

                 while($st->fetch()){

                    echo("<tr>
                            <td> $plan_id </td>
                            <td> $city, $country </td>
                            <td> $price_package </td>
                            <td> $rating </td>
                        </form>
                        </tr>");            
                 }
                 echo("</table> <br><br>");
             }
        ?>

        <!-- Button to return to login screen -->
        <p><button onclick="window.location='Login.php';">Log Out</button></p>

    </body>
</html>