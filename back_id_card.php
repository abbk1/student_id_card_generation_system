<?php include 'includes/header.php' ?>
<?php //checkIfUserLogin(); ?>
    <div id="wrapper">
    <!-- Navigations -->
<?php include 'includes/nav.php'?>

<?php isUsreSignIn(); ?>

<style>
    .id-card{
        background-color: black;
    }
    .content{
        background-color: aliceblue;
        
    }
    </style>
    
<section>
<div class="id-card" id="id-card" style="background-color: white";>

<link rel="stylesheet" href="css/style.css">

    <!-- Header -->
    <div class="header">FEDERAL POLYTECHNIC MUBI</div>
    <div class="sub-header">P.M.B 35 MUBI ADAMAWA STATE</div>

    <!-- Content -->
    <div class="content">
        <p>This ID Card is the property of STAFF SCHOOL FED. POLY MUBI</p>
        <p>and relate only to the identity of the holder whose certified photograph is on the reverse side.</p>
        <p>Loss must be reported immediately to the Registrar.
            <p>Any person that finds this card is requested to return to</p>
            <p>the Staff Schoool, Federal Polytechnic, Mubi P.M.B 35, Mubi Adamawa State</p>
            
        <!-- Footer -->
    <div class="footer1"><p><strong> www.fpmubieportal.edu.ng</strong></p></div>
    </div>
</div><br>
<button onclick="printId()"><a href="" class="btn btn-success">Print</a></button>
</section>

<script>
    function printId(){
        // window.print();

        const originalContent = document.body.innerHTML;
        const printContent = document.getElementById('id-card').outerHTML;
        document.body.innerHTML = printContent; 
        window.print();
        document.body.innerHTML =originalContent
        Location.reload();
    }
</script>

<?php include 'includes/footer.php'; ?>
