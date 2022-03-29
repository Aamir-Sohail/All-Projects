<?php include('./includes/header.php');
    $row = $datafetch->loggedInUser($AutoID);
?>
<div class="row layout-top-spacing">

<div id="basic" class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow p-0">
        <div class="widget-content widget-content-area">
            <form id="profile" action="includes/process.php" method="POST" enctype="multipart/form-data">     
                <div class="col-4 mb-2">
                    <p><b>Name</b></p>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['TeacherName']; ?>">
                </div>

                <div class="col-4 mb-2">
                    <p><b>Designation:</b></p>
                    <input type="text" name="designation" class="form-control"  value="<?php if($row['role'] == '1'){echo "DPO";} ?>">
                </div>

                <div class="col-4 mb-2">
                    <p><b>Contact</b></p>
                    <input type="text" name="contact" class="form-control" value="<?php echo $row['Contact']; ?>">
                </div>

                <div class="col-4 mb-2">
                    <p><b>Whatsapp</b></p>
                    <input type="text" name="whatsapp" class="form-control" value="<?php echo $row['Whatsapp']; ?>">
                </div>

               

                <?php
                    if($row['Image'] != ""){
                ?>
                <div class="col-4">
                <p><b>Profile Image</b></p>
                    <img src="../uploads/<?php echo $row['Image'] ?>" alt="" height="100" width="100" name="old_image">
                </div>
                <?php
                    }
                ?>

                <div class="col-4">
                    <p><b>Change Profile Image</b></p>
                    <input type="file" name="image" class="form-control">
                </div>


                <div class="col-4 mt-4">
                    <button class="btn btn-primary btn-block" name="userProfile" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    // $("#profile").on("submit", function(event){
    //     event.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "includes/process.php",
    //         data: "MODE=userProfile&" +new FormData($('#profile')),
    //         processData: false,
    //         contentType: false,
    //         success: function(data) {
    //             console.log(data);
    //             if(data === '1'){
    //                 alert(data);
    //             }else{
    //                 alert("Please Fill All Input Correctly");
    //                 console.log(data);
    //             }
    //         }
    //     });
    // });
</script>
<?php
include('./includes/footer.php');
?>
