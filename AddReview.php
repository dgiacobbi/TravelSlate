<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file provides space for user to enter new review for TravelSlate.
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

        <?php

         // Get plan_id and user from the last page
         $plan_id = $_GET["plan_id"];
         $user = $_GET["user"];

         // Prepare entry form for user to write a review
         echo "<h4> Enter the following required information below: </h4>";
         echo "<form action='ReviewAdded.php?user=$user&plan_id=$plan_id' method='POST'>";
         echo "   <table>
                    <tr>
                        <td>Title:</td>
                        <td><input type='text' name='title'></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea name='description' rows='10' cols='30'>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Rating:</td>
                        <td>
                        <select name='rating'>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                        </select>
                        </td>
                    </tr>
                  </table><br><br>
                <input type='submit' name='submit' value='Post Review'/>
               </form>";
         
         // Return home button
         echo "<form action='GetHome.php?user=$user&plan_id=$plan_id' method='POST'>";
         echo "<input type='submit' value = 'Return Home'>";
         echo "</form>";
        ?>

    </body>
</html>