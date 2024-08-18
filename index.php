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
                    <div class="col-lg-12">


                        <h1 class="page-header">
                          Admim Dashboad
                            <small>:Admin</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <!-- <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li> -->
                        </ol>

          
 <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php  
                    $query = "SELECT * FROM tblusers";
                    $select_all_users = query($query);
                    confirmQueryExc($select_all_users);
                    $count = mysqli_num_rows($select_all_users);
                    ?>

                     <div class='huge'><?=$count?></div>
                        <div>USERS</div>
                    </div>
                </div>
            </div>
            <a href="viewusers.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php  
                    $query = "SELECT * FROM tblstudents";
                    $select_all_students = query($query);
                    confirmQueryExc($select_all_students);
                    $count1 = mysqli_num_rows($select_all_students);
                    ?>
                 
                    <div class='huge'><?= $count1; ?></div>
                        <div>STUDENTS</div>
                    </div>
                </div>
            </div>
            <a href="viewstudents.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php  
                    $query = "SELECT * FROM tblusers WHERE user_role = 'admin'";
                    $select_all_admins = query($query);
                    confirmQueryExc($select_all_admins);
                    $count2 = mysqli_num_rows($select_all_admins);
                    ?>
                 
                         <div class='huge'><?= $count2;?></div>
                        <div>ADMINS</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php  
                    $query = "SELECT * FROM tblprint";
                    $select_all_print_card = query($query);
                    confirmQueryExc($select_all_print_card);
                    $count3= mysqli_num_rows($select_all_print_card);
                    ?>
            
                         <div class='huge'><?= $count3 ?></div>
                      <div>PRINTED ID</div>
                    </div>
                </div>
            </div>
            <a href="printed_id.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
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

   <?php include 'includes/footer.php' ?>