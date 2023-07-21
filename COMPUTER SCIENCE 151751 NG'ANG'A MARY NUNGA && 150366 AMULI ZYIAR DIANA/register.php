<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Register Page</title>
   <style type="text/css">
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

      .register-input {
         border-radius: 10px;
         height: 20px;
         padding: 0.5em;
         font-size: 0.9em;
      }

      .register-input label {
         margin-bottom: 0.5em;
      }

      .register-input input {
         outline: none;
         border: none;
         border-radius: 10px;
         width: 300px;
         height: 25px; 
         padding: 0.5em; 
         font-size: 0.9em;

      }

      .register-input select {
         outline: none;
         border: none;
         border-radius: 10px;
         width: 300px;
         height: 40px; 
         padding: 0.5em; 
         font-size: 0.9em;
      }

      .register-input input::placeholder {
         color: #808080;
      }

      .submit-button {
         padding: 1em;
         background: hsl(233deg 36% 38%);
         color: hsl(0 0 100);
         border: none;
         border-radius: 30px;
         font-weight: 600;
      }

      button {
         cursor: pointer;
      }
   </style>
</head>
<body>
   <div class="screen-1">
   <center>
      <h1>Register</h1>
      <form action=registerPr.php method="post">
         <p>
         <label for="name">Name:</label>
         <div class="register-input">
         <input type="text" name="name" required>
         </div></p>

         <p>
         <label for="userEmail">Email:</label>
         <div class="register-input">
         <input type="text" name="userEmail" required>
         </div></p>

         <p>
         <label for="userPassword">Password:</label>
         <div class="register-input">
         <input type="password" name="userPassword" required>
         </div></p>

         <p>
         <label for="userTel">Phone Number:</label>
         <div class="register-input">
         <input type="telephone" name="userTel" required>
         </div></p>

         <p>
         <label for="userType">User Type:</label>
         <div class="register-input">
            <select name="userType">
            <option value = "1">Doctor</option>
            <option value = "2">Patient</option>
            <option value = "3">Admin</option>
            <option value="4">Delivery person</option>
            <option value="5">Pharmacist</option>
         </select></div>
         </p>

         <input type="submit" value="Submit" class="submit-button">
      </form>
   </center>
   </div>
</body>
</html>