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
                            ADD STUDENT RECORD
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add Student Information
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
        $phonenumber = mysqli_escape_string($conn, $_POST['phonenumber']);
        $regNumber = mysqli_escape_string($conn, $_POST['regNumber']);
        $cause = mysqli_escape_string($conn, $_POST['couse']);
        $stu_class = mysqli_escape_string($conn, $_POST['stu_class']);
        $expdate = mysqli_escape_string($conn, $_POST['expdate']);

        $created_date = date('Y-m-d');

        $firstnameErr = $lastnameErr = $genderErr = $causeErr = $phonenumberErr = $stu_classErr = $imgErr = $stu_picErr = "";

        $post_image_name  = trim($_FILES['stu_pic']['name']);
        $post_image_type  = $_FILES['stu_pic']['type'];
        $post_image_size  = $_FILES['stu_pic']['size'];
        $post_tmp_name    = $_FILES["stu_pic"]["tmp_name"];

        $maximumSize = 1 * 1024 * 1024;
        if($post_image_size > $maximumSize){

        $stu_picErr = "image file size is large it should only be 1MB";
        }
        if (is_uploaded_file($post_tmp_name)) {
    
        move_uploaded_file($post_tmp_name, 'img/'.$post_image_name);
        }else{
    
        $stu_picErr = "unsupported image file please choice correct file format";
        }


        if (empty($firstname)) {

            $firstnameErr = "Please enter firstname";

        }else{
            $firstname = filterName($firstname);
            if ($firstname == false) {
                $usernameErr = "Enter Valid firstname";
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

        $pattern = '/^(\+234\s?\d{8}|\d{11})$/';
        
        if(!$match = preg_match($pattern, $phonenumber)) {

            $phonenumberErr = 'Enter a valid phone number';
        }

    if (empty($cause)) {

            $causeErr = "Please select cause of study";
        }

        if (empty($stu_class)) {

            $stu_classErr = "Please select student class";
        }

        // if (empty($stu_pic)) {
        //     $stu_picErr = 'please select student image';
        // }
   
    //     $pattern = '/^.{8,}$/';
    //     if(empty($password)){

    //     $passErr = "Please enter password";
    //     } else if(!preg_match($pattern, $password)) {
    //     $passErr = "Password must at least 8 characters";
    //     }

    //     if(empty($conf_password)){

    //     $confPassErr = "Please enter confirm password";
    //     } else if($password != $conf_password) {
 
        // $confPassErr = "Password must match confirm password";

        // }else{

    
          if (empty($firstnameErr) && empty($lastnameErr) && empty($genderErr) && empty($causeErr) && empty($phonenumberErr) && empty($imgErr) && empty($stu_picErr)) { 

            $query = "INSERT INTO `tblstudents` (`user_id`, `firstname`, `lastname`, `othername`, `gender`, `phonenumber`, `reg_number`, `couse`, `stu_class`, `stu_img`, `exp_date`, `created_date`) VALUES (1, '$firstname', '$lastname', '$othername', '$gender ', '$phonenumber', '$regNumber', '$cause', '$stu_class', '$post_image_name', '$expdate', '$created_date') ";

           $insert_record = query($query);

           if (!$insert_record) {

            $globalError = "<p class='text-warning text-center'>Record not inserted check for error!</p>";

           }else {

            $globalMessage = "<h2 class='text-success text-center'>Student Record Inserted Succesfully!</h2>";
           }

            //check if non empty result was return
            // if (mysqli_num_rows( $select_from_user) > 0) {
            //     $row = mysqli_fetch_assoc($select_from_user);
            //         $exist_username = $row['username'];
            //     }

            //     //test if user already exist
            //     if ($userName != $exist_username) {
                   
            //         $hash_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

            //         $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
            //         $query .= "VALUES ('$userName', '$userEmail', '$hash_password', 'subscriber') ";
       
            //         $create_user_query = mysqli_query($conn, $query);
       
            //         confirmQueryExc($create_user_query);

                   
            //     }else{

                   
            //     }

            }
        }
    ?>                              <?php if(isset($globalMessage)){echo $globalMessage;} ?>
                    <div class="form-wrap">
                    <form action="" method="post" id="register-form" autocomplete="on" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstname" class="">First Name: <span style="color: red;">*</span></label>
                                <input type="text" name="firstname" id="firstname" value="" class="form-control" placeholder="first name">
                                <span class="error text-danger" ><?php echo $firstnameErr = (!empty($firstnameErr)) ? $firstnameErr : ""; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="">Last Name:<span style="color: red;">*</span></label>
                                <input type="text" name="lastname" id="lastname" value="" class="form-control" placeholder="last name">
                                <span class="error text-danger" ><?php echo $lastnameErr = (!empty($lastnameErr)) ? $lastnameErr : ""; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="">Other Name:</label>
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
                                <label for="phonenumber" class="">Phone:<span style="color: red;">*</span></label>
                                <input type="number" name="phonenumber" id="phonenumber" value="" class="form-control" placeholder="08011111111">
                                <span class="error text-danger" ><?php echo $phonenumberErr = (!empty($phonenumberErr)) ? $phonenumberErr : ""; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="phonenumber" class="">Addmi No:<span style="color: red;">*</span></label>
                                <input type="number" name="regNumber" id="regNumber" value="" class="form-control" placeholder="1232">
                            </div>

                            <div class="form-group">
                                <label for="expdate" class="">Expired Date:<span style="color: red;">*</span></label>
                                <input type="date" name="expdate" id="expdate" value="" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                            <label for="class">Cause:<span style="color: red;">*</span></label>
                             <select name="couse" id="" class="form-control" id="cause">
                                <option value="">--select--</option>
                                <option value="science">Science</option>
                                <option value="art">Art</option>
                            </select>
                            <span class="error text-danger" ><?php echo $causeErr = (!empty($causeErr)) ? $causeErr : ""; ?></span><br>
                            </div>

                            <div class="form-group">
                            <label for="class">Student Class:<span style="color: red;">*</span></label>
                             <select name="stu_class" id="" class="form-control" id="stu_class">
                                <option value="">--select--</option>
                                <option value="SS_ONE_A">SS ONE A</option>
                                <option value="SS_ONE_B">SS ONE B</option>
                                <option value="SS_TWO_A">SS TWO A</option>
                                <option value="SS_TWO_B">SS TWO B</option>
                                <option value="SS_THREE_A">SS THREE A</option>
                                <option value="SS_THREE_B">SS THREE B</option>
                            </select>
                            <span class="error text-danger" ><?php echo $stu_classErr = (!empty($stu_classErr)) ? $stu_classErr : ""; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="stu_pic" class="">Upload Passport<span style="color: red;">*</span></label>
                                <input type="file" name="stu_pic" id="stu_pic" value="" class="form-control" placeholder="">
                                <span class="error text-danger" ><?php echo $stu_picErr = (!empty($stu_picErr)) ? $stu_picErr : ""; ?></span>
                            </div>
                            <input type="submit" value="SAVE" name="submit" id="btn-register" class="btn btn-custom btnlg btn-block btn-primary">
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
