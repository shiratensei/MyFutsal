<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" >
        <title>MyFutsal Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css"> 
    </head>
    
    <body>
        <h1>Login Page</h1>
        <p>Please enter your username and Password. Your username is your staff ID.</p>
        <form method="post" action = "loginfile.php" autocomplete = "on">
            <input type ="hidden" name ="subject" value ="login">
            <p>
                <label>
                    Username: <input type ="text" name ="ID" size ="30" maxlength ="10" placeholder ="1234" autofocus required> 
                </label>
            </p>
            <p>
                <label>
                    Password: <input type="password" name ="Password" size="30" maxlength="50" required>
                </label>
            </p>
            
            <p> 
                <input type="submit" value="Log In" > 
                <input type ="RESET" value="Clear">
            </p

        </form>
		
		<br>
		<p> <strong> I'm system admin and I want to register a staff. </strong> <br>
			<a href ="register.php">
				<button type="button"> Register Here </button>
			</a>
        </p>
		
		
		
		
    </body>



</html>