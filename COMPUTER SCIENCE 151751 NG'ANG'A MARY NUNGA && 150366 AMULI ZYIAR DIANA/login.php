<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			font-family: 'Poppins';
			user-select: none;
			overflow-y: hidden;
			display: flex;
			justify-content: center;
			align-items: center;
			background: hsl(218deg 50% 91%);
			height: 100vh;
		}

		.screen-1 {
			background: hsl(213deg 85% 97%);
			padding: 2em;
			display: flex;
			flex-direction: column;
			border-radius: 30px;
			box-shadow: 0 0 2em hsl(231deg 62% 94%);
			gap: 2em;
			margin-top: -3em;
		}

		.login-input {
			background: hsl(0deg 0% 100%);
			box-shadow: 0 0 2em hsl(231deg 62% 94%);
			padding: 1em;
			display: flex;
			flex-direction: column;
			gap: 0.5em;
			border-radius: 30px;
			color: hsl(0deg 0% 30%);
		}

		.login-input input {
			outline: none;
			border: none;
			border-radius: 10px;
			height: 40px; /* Increased height value */
			padding: 0.5em; /* Added padding */
			font-size: 0.9em; /* Adjusted font size */
		}

		.login-input input::placeholder {
			color: #808080;
		}

		.login-button {
			padding: 1em;
			background: hsl(233deg 36% 38%);
			color: hsl(0 0 100);
			border: none;
			border-radius: 30px;
			font-weight: 600;
		}

		.footer {
			display: flex;
			font-size: 0.7em;
			color: hsl(0deg 0% 37%);
			gap: 14em;
			padding-bottom: 10em;
		}

		button {
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="screen-1">
		<h1>Login</h1>
		<form action="loginPr.php" method="post">
			<label for="userEmail">Email</label>
			<div class="login-input">
				<input type="text" name="userEmail" id="userEmail" style="border-radius: 20px; height: 15px; padding: 0.5em; font-size: 0.9em;" placeholder="Username@gmail.com">
			</div>
			<br><br>
			<label for="userPassword">Password</label>
			<div class="login-input">
				<input type="password" name="userPassword" id="userPassword" style="border-radius: 20px; height: 15px; padding: 0.5em; font-size: 0.9em;" placeholder="................">
			</div>
			<br><br>
			<input type="submit" value="Done" class="login-button">
		</form>
	</div>
</body>
</html>
