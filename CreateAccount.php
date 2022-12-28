<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file creates accounts for new users for TravelSlate.
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

        <!-- Get Login Information from user -->
        <h4> Enter the following required information below: </h4>
        <form action="AccountCreated.php" method="POST">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
            </table>
            <input type='submit' name='submit' value='Create Account'/>
        </form>

    </body>
</html>