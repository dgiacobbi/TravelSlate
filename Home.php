<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file is the user unique home page for TravelSlate.
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

        <?php
            // set variables
            $username = $_POST["username"];
            $password = $_POST["password"];
            $submit_b = $_POST['submit'];

            // check if the admin is logging in
            if (strcmp($username, "admin") == 0 && strcmp($password, "travelSlate") == 0)
                header("Location: Admin.php");

            // check if username or password box was left empty
            if($submit_b){

                if (empty($username) || empty($password)){
                    header("Location: Error.php");
                }
            }
        ?>

        <?php
            // create a prepared statement to get username's full name
            $q = "SELECT first_name, last_name FROM Account WHERE user = ? AND password = ?";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("ss", $username, $password);

            $st->execute();
            $st->store_result();

            // check is username and password entered is in current database
            if($st->num_rows > 0) {

                $st->bind_result($f_name, $l_name);

                while($st->fetch())
                    echo "<h2> Welcome home, ". $f_name . " " . $l_name . "! </h2>"; 

            } else {
                header("Location: Error.php");
            }       
        ?>

        <h3> My Travel Plans </h3>
        <?php
            // create a prepared statement to query saved plan information
            $q = "SELECT l.city, l.country, p.price_package, p.rating, s.plan_id, s.user 
                  FROM SavedPlan s JOIN Plan p USING (plan_id)
                                   JOIN Location l USING (location_id) 
                  WHERE s.user = ?
                  ORDER BY l.city";
            $st = $cn->stmt_init();
            $st->prepare($q);
            $st->bind_param("s", $username);

            $st->execute();
            $st->store_result();

            // check if user has any saved plans and display them in formatted table
            if($st->num_rows > 0) {

                $st->bind_result($city, $country, $package, $rating, $plan_id, $user);

                echo("<table>
                        <tr>
                            <th> Location </th>
                            <th> Price Package </th>
                            <th> Rating </th>
                        </tr>");
                 while($st->fetch()){

                    echo("<tr>
                            <td> <a href='Plan.php?plan_id=$plan_id&user=$username'>$city, $country</a> </td>
                            <td> $package </td>
                            <td> $rating </td>
                        </form>
                        </tr>");            
                 }
                 echo("</table>");
                

            } else {
                echo "<hr3> No Plans Saved in Your Library. </hr3>";
            } 
        ?>

        <h3> My Reviews </h3>
        <?php
             // create a prepared statement to query review information
             $q = "SELECT l.city, l.country, p.price_package, r.title, r.rating, r.review_id
                   FROM  Plan p JOIN Location l USING (location_id)
                                JOIN Review r USING (plan_id) 
                   WHERE r.user = ?
                   ORDER BY l.city";
             $st = $cn->stmt_init();
             $st->prepare($q);
             $st->bind_param("s", $username);
 
             $st->execute();
             $st->store_result();
 
             // check if user has written any reviews and display them in formatted table
             if($st->num_rows > 0) {
 
                 $st->bind_result($city, $country, $package, $title, $rating, $review_id);
        
                 echo("<table>
                         <tr>
                            <th> Title </th>
                            <th> Location </th>
                            <th> Price Package </th>
                            <th> Rating </th>
                         </tr>");
                 while($st->fetch()){

                    echo("<tr>
                            <td> <a href='Review.php?review_id=$review_id&user=$username'>'$title'</a>  </td>
                            <td> $city, $country </td>
                            <td> $package </td>
                            <td> $rating </td>
                        </tr>");            
                 }
                 echo("</table>");
 
             } else {
                 echo "<hr3> No Reviews Written. </hr3>";
             }

             // Button to search other plans
             echo "<br><br><form action='SearchEngine.php?user=$username' method='POST'>";
             echo "<input type='submit' value = 'Search Plans'>";
             echo "</form>";

             $st->close();
             $cn->close();
        ?>
        
        <!-- Button to return to login screen -->
        <p><button onclick="window.location='Login.php';">Log Out</button></p>

    </body>
</html>