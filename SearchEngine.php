<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file is the search engine for travel plans for TravelSlate.
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

        <h3> Travel Plan Filter </h3>
        <?php
            // Get username from previous page
            $username = $_GET["user"];
            echo "<form action='FacetedSearch.php?user=$username' method='POST'>";
        ?>
        <!-- Table formatted filter form -->
            <table>
                <tr>
                    <td>Country:</td>
                    <td>
                        <select name='country'>
                            <option value = 'No Filter'>No Filter</option>;
                            <?php
                                // query countries that are a part of travel plans
                                $q = "SELECT DISTINCT country FROM Location";
                                $rs = mysqli_query($cn, $q);
            
                                if (mysqli_num_rows($rs) > 0) {

                                    while($row = mysqli_fetch_assoc($rs)) {
                                        echo "<option value = '". $row["country"]
                                            . "'>" . $row["country"] . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Price Package:</td>
                    <td>
                        <select name='package'>
                            <option value = 'No Filter'>No Filter</option>;
                            <?php
                                // query price packages that are a part of travel plans
                                $q = "SELECT DISTINCT package_type FROM Price";
                                $rs = mysqli_query($cn, $q);
            
                                if (mysqli_num_rows($rs) > 0) {

                                    while($row = mysqli_fetch_assoc($rs)) {
                                        echo "<option value = '". $row["package_type"]
                                            . "'>" . $row["package_type"] . "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table><br> 
            <input type='submit' name='submit' value='Apply Filter'/>
        </form><br>

        <h3> Available Travel Plans Library </h3>
        <?php
            // create a prepared statement to travel plan info
            $q = "SELECT l.city, l.country, p.price_package, p.rating, p.plan_id
                  FROM Plan p JOIN Location l USING (location_id)
                  ORDER BY l.city";
            $st = $cn->stmt_init();
            $st->prepare($q);

            $st->execute();
            $st->store_result();

            // display all plans in a formatted table
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
             }

             // button to return home
             echo "<form action='GetHome.php?user=$username' method='POST'>";
             echo "<input type='submit' value = 'Return Home'>";
             echo "</form>";

             $st->close();
             $cn->close();
            ?>
    </body>
</html>