<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" >
        <title>DeScheduler Registration</title>
		<link rel="stylesheet" type="text/css" href="styles.css"> 
    </head>
    
    <body>
        <h1>Registration Page</h1>
        <p> <h2> Please insert your details. </h2> </p>
        <form method="post" action = "registerfile.php" autocomplete = "on">
            <input type ="hidden" name ="subject" value ="registration">
            <p>
				<strong>Please insert your staff ID as the username.</strong> <br> <br>
                <label>
                    Username: <input type ="text" name ="ID" size ="30" maxlength ="10" placeholder ="1234567890" autofocus required> 
                </label>
            </p>
            <p>
                <label>
                    Password: <input type="password" name ="Password" size="30" maxlength="50" required>
                </label>
            </p>
			<p>
				<label>
					Full Name: <input type="text" name="Name" size="30" maxlength="100" placeholder="John David" required">
				</label>
			</p>
			<p>
				<label>
					E-mail: <input type="email" name="Email" size="30" maxlength="50" placeholder="john@example.com" required">
				</label>
			</p>
            
            <p> 
                <input type="submit" value="Register" > 
                <input type ="reset" value="Clear">
            </p>
			
        </form>
		
		<br> 
		<p> <strong> Already registered? </strong> <br>
			<a href ="index.php">
				<button type="button"> Login Here </button>
			</a>
        </p>
		
        
    </body>



</html>