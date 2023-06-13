<?php 
include('functions/userFunctions.php') ;
include('includes/header.php');
include('config/dbcon.php');
include('authenticator.php');

if(isset($_GET['date']))
{
    $date = $_GET['date'];
}

?>

<div class="container">
    <h1 class="text-center">Book for Date:<br><?php echo date('d F Y', strtotime($date));?></h1><hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST" autocomplete="off">
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group mb-3">
                    <input type="time">
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary submitBookingTime" type="submit" name="submitBookingTime">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php')
?>