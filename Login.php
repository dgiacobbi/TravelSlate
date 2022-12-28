<!---------------------------------------------------------------------
 * NAME: David Giacobbi
 * CLASS: CPSC 321-01
 * DATE: 11/29/22
 * HOMEWORK: TravelSlate Project
 * DESCRIPTION: This file is the login page for TravelSlate.
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

        <h3> Enter your login credentials below: </h3>

        <!-- Get Login Information from user -->
        <form action="Home.php" method="POST">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <input type='submit' name='submit' value='Login'/>
        </form> 

        <!-- Create Account button for new users -->
        <h4> Don't have an account? <h4>
        <form action="CreateAccount.php" method="POST">
            <input type='submit' value = 'Create Account'>
        </form>
        
    </body>
</html>