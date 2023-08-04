<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

// Retrieve registered users from the database or any other storage mechanism
// Example code: Select from a MySQL table
$selectSql = "SELECT id, name, email, user_type FROM user_form";
$result = mysqli_query($conn, $selectSql);

// Create an array to store all the users
$users = array();

// Loop through each row in the result set and add the user to the array
while ($row = mysqli_fetch_assoc($result)) {
   $users[] = $row;
}

// Check if the request to change roles has been made
if (isset($_POST['change_roles'])) {
   $userId = $_POST['user_id'];
   $currentUserType = $_POST['current_user_type'];
   $newUserType = ($currentUserType == 'admin') ? 'user' : 'admin';

   // Update the user's role in the database
   $updateSql = "UPDATE user_form SET user_type = '$newUserType' WHERE id = $userId";
   mysqli_query($conn, $updateSql);

   // Redirect to refresh the page after updating the roles
   header('location: admin_page.php');
   exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
       * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      outline: none;
      border: none;
      text-decoration: none;
   }

   .hahaha {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      padding-bottom: 60px;
   }

   .hehehe {
      text-align: center;
   }

   .hehehe h2 {
      font-size: 30px;
      color: #333;
      margin-bottom: 20px;
   }

   table {
      width: 100%;
      border-collapse: collapse;
   }

   th, td {
      padding: 10px;
   }

   th {
      background-color: #f2f2f2;
      text-transform: uppercase;
      font-weight: bold;
   }

   tbody tr:nth-child(even) {
      background-color: #f8f8f8;
   }

   tbody tr:hover {
      background-color: #e2e2e2;
   }

   td {
      border-bottom: 1px solid #ddd;
   }
      /* Additional CSS for the button */
      button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
   }

   button:hover {
      background-color: #45a049;
   }
   </style>

</head>

<body>

   <div class="container">
      <div class="content">
         <h3>Hi, <span>admin</span></h3>
         <h1>Welcome, <span><?php echo $_SESSION['admin_name']; ?></span></h1>
         <p>On this admin page, you can modify assigned roles and create new users with different roles.</p>
         <a href="logout.php" class="btn">Logout</a>
      </div>
   </div>
   <div class="hahaha">
      <div class="hehehe">
         <!-- Display registered users in a table -->
         <h2>Registered Users</h2>
         <table>
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Change Roles</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($users as $user) { ?>
                  <tr>
                     <td><?php echo $user['name']; ?></td>
                     <td><?php echo $user['email']; ?></td>
                     <td><?php echo $user['user_type']; ?></td>
                     <td>
                        <!-- Create a form for each user with a button to change roles -->
                        <form method="POST" action="">
                           <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                           <input type="hidden" name="current_user_type" value="<?php echo $user['user_type']; ?>">
                           <button type="submit" name="change_roles">Change</button>
                        </form>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
   <div class="hahaha">
    <div class="hehehe">
        <h2>
            <form method="POST" action="add_user.php">
                <button type="submit" name="add_user">Add user</button>
            </form>
        </h2>
    </div>
</div>

</body>

</html>
