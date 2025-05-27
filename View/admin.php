<?php 
session_start();

 if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin']==false){
    echo "<script>alert('Please Login First')</script>";
    exit();
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../aqi.css">
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header-bar {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .header-bar a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        .Container {
            padding: 20px;
        }
        h1 {
            margin-top: 0;
            text-align: center;
            color: #444;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
            color: #333;
        }
        td form {
            margin: 2px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .val{
            margin : 10px;
        }
        a{
            text-decoration :none;
        }
    </style>
</head>

<body>
    <div class="Container">
        <h1> Admin </h1>
        <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']==true){
            $user_name =  $_SESSION['admin_name'];
           echo "<div style='text-align: right; margin-right: 20px;'>
        <a class='val' href='../Control/logout.php' style='margin-left: 10px;'>Logout</a>
        <h4 class='val' style='display: inline;'>$user_name</h4>
      </div>";
        }
        ?>
        <table class="">
            <tr>
                <th>id</th>
                <th>Full Name</th>
                <th>user name</th>
                <th>email</th>
                <th>Phone</th>
                <th>University ID</th>
                   <th>Gender</th>
                   <th>Password</th>
                   <th>Address</th>
                <th>date of birth</th>
                <th>Transport</th>
                <th> Action</th>
            </tr>
            <?php 
            $con = mysqli_connect("127.0.0.1:3306", "root", "", "unirider_db");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM users";
            $obj = mysqli_query($con, $sql);

            while ($entry = mysqli_fetch_assoc($obj)) {
                $id = $entry['id'];
                $fullname =$entry['fullname'];
                $username = $entry['username'];
                $email = $entry['email'];
                $phone = $entry['phone'];
                $university_id = $entry['university_id'];
                $gender = $entry['gender'];
                $password = $entry['password'];
                $address = $entry['address'];
                $dob = $entry['dob'];
                $transport = $entry['transport'];
               
                
                
                echo "<tr>
                        <td>$id</td>
                        <td>$fullname</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$university_id</td>
                        <td>$gender</td>
                        <td>$password</td>
                         <td>$address</td>
                        <td>$dob</td>
                        <td>$transport</td>
                       <td style='white-space: nowrap;'>
                        <form action='../Control/delete.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' value='delete'>
                        </form> 

                        <form action='edit.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' value='Edit'>
                        </form> 

        
                    




                        </td>
                
                      </tr>";
            }

            mysqli_close($con);
            ?>
        </table>
    </div>
    

</body>
</html>