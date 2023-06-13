<?php 

include('functions/userFunctions.php') ;
include('includes/header.php') ;
include('authenticator.php');

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php" class="text-white">
                Home /
            </a>
            <a class="text-white" href="checkout.php" class="text-white">
                Checkout /
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                    <div class="col-md-7">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" name="name" required placeholder="Enter your Full name " class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" name="email" required placeholder="Enter your email " class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone Number</label>
                                <input type="number" name="phone" required placeholder="Enter your phone number" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pin Code</label>
                                <input type="text" name="pincode" required placeholder="Enter your pin code " class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="fw-bold">Address (If you are collecting in store then type : "Collection")</label>
                                <textarea name="address" required class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Order details</h5>
                        <hr>


                        <?php 
                        $items = getCartItems();
                        $totalPrice = 0;

                        foreach ($items as $citem)
                        {
                            ?>
                        <div class="mb-2 border">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?=$citem['image']?>" alt="Image" width="60px">
                                </div>
                                <div class="col-md-5">
                                    <label><?=$citem['name']?></label>
                                </div>
                                <div class="col-md-3">
                                    <label><?=$citem['selling_price']?></label>
                                </div>
                                <div class="col-md-2">
                                    <label>x <?=$citem['prod_qty']?></label>
                                </div>

                            </div>
                        </div>
                        <?php
                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'] ;
                        }

                        ?>
                        <hr>
                        <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice ?></span> </h5>
                        <hr>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                        </div>
                        <button name="placeOrderBtn" type="submit" class="btn btn-primary w-100" >Confirm and Place order </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>