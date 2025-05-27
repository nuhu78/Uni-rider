<?php
$con = mysqli_connect("127.0.0.1:3306", "root", "", "aqi");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
        $user_name = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_dob = $_POST['dob'];
        $user_country = $_POST['country'];
        $user_color = $_POST['color'];
        $user_gender = $_POST['gender'];
    $con = mysqli_connect("127.0.0.1:3306", "root", "", "aqi");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO user (username, email, password, dob, country, gender, color) VALUES
            ('$user_name', '$user_email', '$user_password', '$user_dob', '$user_country', '$user_gender', '$user_color');";
            $obj = mysqli_query($con, $sql);
            if ($obj) {
               // echo "alert('Data inserted successfully');";
                header("Location: admin.php");
                exit();
            } else {
                echo "alert('Error inserting data');";
            }

}

?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return valid()">
            <table style="margin-left: 30px;" class="reg-form">
                <input type="hidden" name="id" value='<?php echo "$id"?>'>
                <tr>
                    <td> <label for="">User Name</label></td>
                    <td>:</td>
                    <td> <input type="text" placeholder="User Name " id="username" name="username"></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td>:</td>
                    <td><input type="text" placeholder="Email " id="email" name="email" ></td>
                </tr>
                <tr>
                    <td><label for="">Password </label></td>
                    <td>:</td>
                    <td><input type="text" placeholder="Password" id="password" name="password" ></td>
                </tr>
                <tr>
                    <td> <label for="">Confirm Password </label></td>
                    <td>:</td>
                    <td> <input type="password" placeholder="Confirm Password " id="confirm_password" name="confirm_pass"></td>
                </tr>
                <tr>
                    <td><label for="">Date of Birth </label></td>
                    <td>:</td>
                    <td><input type="date" name="dob" id="dob" value='<?php echo "$dob" ?>'></td>
                </tr>
                <tr>
                    <td><label for="">Country : </label></td>
                    <td>:</td>
                    <td> <select name="country" id="country" name="country" >
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                        <option value="UAE">UAE</option>
                        <option value="India">India</option>
                        <option value="Japan">Japan</option>
                    </select></td>
                </tr>
                
                <tr>
                    <td><label for="">Gender</label></td>
                    <td>:</td>
                    <td><input type="radio" name="gender" id="" value="male">
                        <label for=""> Male</label>
                        <input type="radio" name="gender" id="" value="female">
                        <label for=""> female</label>
                        <input type="radio" name="gender" id="" value="other">
                        <label for=""> other</label></td>
                </tr>
                <tr>
                    <td><label for=""> Color</label></td>
                    <td>:</td>
                    <td><input type="color" name="color" ></td>
                </tr>
                <tr>
                    <td></td>
                     <td><input type="hidden" value="Confirm" name="confirm"></td>
                    <td style="width: 100px;"> <input type="submit" style="margin: 20px;align-self: center;" value="submit"></input>
                       
                </tr>
                
            </table>
            <label  for="" id="error"></label>
            <input type="hidden" name="form_name" value="f1">
             </form>
             <script>
        
       
        function is_name(name){
            //alert(name[0]);
            name = name.trim();
            for(var i =0 ;i<name.length;i++){
                
                if((name[i]>='a' && name[i]<='z') || (name[i]>='A' && name[i]<='Z') || name[i]==" "){
                    
                }else{
                    return false ;
                    break
                }
            }
            return true ;
        }
        function is_date(dob){
            var today = new Date();
            var birthDate = new Date(dob);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
            }
            return age;
        }
        function valid(){
        var gender = document.querySelector('input[name="gender"]:checked');
        var user_name  = document.getElementById("username").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value;
        var confirm_pass = document.getElementById("confirm_password").value;
        var dob = document.getElementById("dob").value;
        var country = document.getElementById("country").value;
        var err = document.getElementById("error");

        

        var msg = "";

        if (user_name === "") {
            msg = "User name cannot be empty.";
        }else if(is_name(user_name)===false){
            msg ="Invalid name";
        }


        else if (email === "") {
            msg = "Email cannot be empty.";
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            msg = "Enter a valid email.";
        }

        else if (password === "") {
            msg = "Password cannot be empty.";
        }else if(password.length<8){
            msg ="Password length must be minimum 8."
        }

        else if (confirm_pass === "") {
            msg = "Confirm Password cannot be empty.";
        } else if (password !== confirm_pass) {
            msg = "Passwords do not match.";
        }

        else if (dob === "") {
            msg = "Date of birth is required.";
        }else if(is_date(dob)<18){
            msg ="Age Must be 18 ";
        }

        else if (country === "") {
            msg = "Please select a country.";
        }


        else if (!gender) {
            msg = "Please select a gender.";
        }


        else {
            msg = "Form submitted successfully!";
            alert(msg);
            err.style.color = "green";
            err.innerText = msg;
           // return;
           return true;
        }

        err.style.color = "red";
        err.innerText = msg;   
        //alert(msg);
        if(msg===""){
            return true;
        }else{
            return false;
        }  
         
    }

    </script>