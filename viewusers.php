<?php include "includes/header.php";?>
<?php //checkIfUserLogin(); ?>
    <div id="wrapper">

    <?php isUsreSignIn(); ?>

        <!-- Navigation -->
        <?php include "includes/nav.php";?>

        <?php
            if(isset($_GET["query-update"])){

                $message = "<h4 class='text-success'>Record Updated Successfully</h4>";
            }
        ?>
        
        <?php
        if (isset($_GET["id"])) {

            $user_id = mysqli_escape_string($conn, $_GET["id"]);
            
                $query = "DELETE FROM `tblusers` WHERE user_id = $user_id";

                $delete_user = mysqli_query($conn, $query);
            
                if ($delete_user) {

                    $message = "<p class='text-success'> Record Deleted Successfully! </p>";

                    header("Location: viewusers.php");
                }else{
                    $message = "Record did no deleted";
                }          
             }
        ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         USERS RECORDS
                            <small></small>
                        </h1>
                <?= $retVal = (isset($message)) ? $message : '' ; ?>
                        <div class="col-xs-12">
           
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>OTHER NAME</th>
                                    <th>GENDER</th>
                                    <th>EMAIL</th>
                                    <th>USER ROLE</th>
                                    <th>STATUS</th>
                                    <th>REGISTER DATE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                                </thead>
                                <tbody>
                    <?php 

                        $query = "SELECT * FROM tblusers ORDER BY user_id DESC";

                        $select_all_students = mysqli_query($conn, $query);

                        confirmQueryExc($select_all_students);

                        if(mysqli_num_rows($select_all_students) > 0){

                            while($row = mysqli_fetch_assoc($select_all_students)){
                                $user_id    = $row['user_id'];
                                $firstname  = $row['firstname'];
                                $lastname   = $row['lastname'];
                                $othername  = $row['othername'];
                                $gender     = $row['gender'];
                                $user_role  = $row['user_role'];
                                $email      = $row['email'];
                                $status     = ($row['status'] == 1) ? 'Active' : 'Not Active';
                                $created_date  = $row['registered_date'];
             
                                echo "<tr>";
                                echo "<td>{$user_id}</td>";

                                // display edited user

                                if (isset($_GET['u_id']) and $_GET['u_id'] === $user_id) {

                                echo "<td style='color: blue'>{$firstname}</td>";
                                }else{
                                    echo "<td>{$firstname}</td>";
                                }
                                
                                echo "<td>{$lastname}</td>";
                                echo "<td>{$othername}</td>";
                                echo "<td>{$gender}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$user_role}</td>";
                                // echo "<td><img width='100' height='50' src='../images/{$user_image}' alt='image'></td>";
                                echo "<td>{$status}</td>";
                                echo "<td>{$created_date}</td>";
                                echo "<td><a href='edituser.php?id={$user_id}' class='btn btn-warning'>Edit</a></td>";
                                echo "<td><a onClick='return confirm(\"Are you sure, you want to Delete!\")' href='viewusers.php?id={$user_id}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                        }

                    ?>
                        
                                </tbody>
                           </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- footer-->
    <?php include "includes/footer.php";?>
