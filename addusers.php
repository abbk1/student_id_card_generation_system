<?php include 'includes/header.php' ?>
<?php //checkIfUserLogin(); ?>
    <div id="wrapper">

    <?php isUsreSignIn(); ?>

    <!-- Navigations -->
        <?php include 'includes/nav.php'?>
    <!-- end navigations -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">

                        <h1 class="page-header">
                            ADD USER/STAFF
                            <!-- <small>Subheading</small> -->
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> User Information
                            </li>
                        </ol>
    <?php 

    if (isset($_POST['submit'])) {

        $globalError = "";
        $globalMessage = "";

        $firstname = mysqli_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_escape_string($conn, $_POST['lastname']);
        $othername = mysqli_escape_string($conn, $_POST['othername']);
        $gender = mysqli_escape_string($conn, $_POST['gender']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $userole = mysqli_escape_string($conn, $_POST['userole']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $confirmpassword = mysqli_escape_string($conn, $_POST['confirmpassword']);
        $created_date = date('Y-m-d');

        $firstnameErr = $lastnameErr = $genderErr = $othernameErr = $emailErr = $useroleErr = $passwordErr = $confirmErr = "";


        if (empty($firstname)) {
            $firstnameErr = "Please enter firstname";

        }else{
            $firstname = filterName($firstname);
            if ($firstname == false) {
                $firstnameErr = "Enter Valid firstname";
            }
        }

        if (empty($lastname)) {
            $lastnameErr = "Please enter lastname";

        }else{
            $lastname = filterName($lastname);
            if ($lastname == false) {
                $lastnameErr = "Enter Valid firstname";
            }
        }

            if (!empty($othername)) {
            $othername = filterName($othername);
            if ($othername == false) {
                $othernameErr = "Enter Valid othername";
            }
        }

        if (empty($gender)) {
            $genderErr = "Please select gender";
        }

        if(empty($email)) {
            $emailErr = "please enter email";

        }else{
            $email = filterEmail($email);
            if ($email == false) {
                $emailErr = "Please enter a valid email address";
        }
    }
        
        if (empty($userole)) {
            $useroleErr = 'please select user role';
        }

        if(empty($password) || empty($confirmpassword)){
            $passwordErr = 'all password fields are required';
        }

        if($password != $confirmpassword){
            $passwordErr = 'Passwors must match';
        }

        // $pattern = '/^[a-zA-Z0-9]+$/';
        // if(preg_match($pattern, $password)) {
        //     $passwordErr = 'The password should contains letters and numbers';
        // }

        // if (isEmailExist($email, 'tblusers')===false) {

        //     $globalErr = "<h2 class='text-danger text-center'>User Record Exist!</h2>";

        // }

    


if (empty($firstnameErr) && empty($lastnameErr)  && empty($othernameErr) && empty($genderErr) && empty($emailErr) && empty($useroleErr) && empty($passwordErr) && empty($confirmErr)) { 



$query = "INSERT INTO `tblusers` (`firstname`, `lastname`, `othername`, `email`, `gender`, `password`, `user_role`, `status`, `registered_date`) VALUES ('$firstname', '$lastname', '$othername', ' $email', '$gender', '$password', '$userole', '1', ' $created_date') ";
$insert_new_user = query($query);

if (!$insert_new_user) {

$globalError = "<p class='text-warning text-center'>Record not inserted check for error!</p>";

}else {

$globalMessage = "<h2 class='text-success text-center'>User Record Inserted Succesfully!</h2>";
}

    }
}
?>      
<?php if(isset($globalMessage)){echo $globalMessage;} ?>
    <div class="form-wrap">
    <form action="addusers.php" method="post" id="register-form">
            <div class="form-group">
                <label for="firstname" class="">First Name: <span style="color: red;">*</span></label>
                <input type="text" name="firstname" id="firstname" value="" class="form-control" placeholder="first name">
                <span class="error text-danger" ><?php echo $firstnameErr = (!empty($firstnameErr)) ? $firstnameErr : ""; ?></span>
            </div>
            <div class="form-group">
                <label for="lastname" class="">Last Name:<span style="color: red;">*</span></label>
                <input type="text" name="lastname" id="lastname" value="" class="form-control" placeholder="lastname">
                <span class="error text-danger" ><?php echo $lastnameErr = (!empty($lastnameErr)) ? $lastnameErr : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="othername" class="">Other Name:</label>
                <input type="text" name="othername" id="othername" value="" class="form-control" placeholder="othername">
                <span class="error text-danger" ><?php echo $othernameErr = (!empty($othernameErr)) ? $othernameErr : ""; ?></span>
            </div>

            
            <label for="gender">Gender:<span style="color: red;">*</span></label>
            <select name="gender" id="" class="form-control" id="gender">
                <option value="">--select--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <span class="error text-danger" ><?php echo $genderErr = (!empty($genderErr)) ? $genderErr : ""; ?></span>
            
            <div class="form-group">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" value="" class="form-control" placeholder="johndoe@gmail.com">
                <span class="error text-danger" ><?php echo $emailErr = (!empty($emailErr)) ? $emailErr : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="class">User Role:<span style="color: red;">*</span></label>
                <select name="userole" id="" class="form-control" id="cause">
                <option value="">--select--</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <span class="error text-danger" ><?php echo $useroleErr = (!empty($useroleErr)) ? $useroleErr : ""; ?></span><br>

            <div class="form-group">
                <label for="password" class="">Password:<span style="color: red;">*</span></label>
                <input type="password" name="password" id="password" value="" class="form-control" placeholder="">
                <span class="error text-danger" ><?php echo $passwordErr = (!empty($passwordErr)) ? $passwordErr : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="confirmpassword" class="">Re-Enter Password:<span style="color: red;">*</span></label>
                <input type="password" name="confirmpassword" id="confirmpassword" value="" class="form-control" placeholder="">
            </div>


            <input type="submit" value="REGISTER" name="submit" id="btn-register" class="btn btn-custom btnlg btn-block btn-primary">
        </form>
    </div>

<hr>

   <!-- /.row -->
   </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


        <!-- Footer -->
 <?php include 'includes/footer.php'; ?>
