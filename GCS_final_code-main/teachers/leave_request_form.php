<?php include('../includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
<div id="alert"></div>
        <form id="work-platforms"  enctype="multipart/form-data"  class="section work-platforms">
            <div class="info">
                <div class="row">
                    <!-- <div class="widget-header w-100 p-0 mb-3">
                        <h4>Teachers Information</h4>
                    </div> -->
<?php $teacher=$datafetch->fetchTeacherBySchoolCode($_SESSION['SchoolCode']);

?>
                    <div class="col-md-11 mx-auto">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Teacher Name</label>
                                    <select class="form-control" name="teacherID" id="country">
                                        <option>--SELECT--</option>
                                        <?php foreach($teacher as $row){
                                            ?>
                                        <option value="<?php echo $row['AutoID']?>"><?php echo $row['Teacher_Name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Leave From</label>
                                    <input type="date" name="leaveForm" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Leave To</label>
                                    <input type="date" name="leaveTo" class="form-control" required="">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">Leave Type</label>
                                    <select class="form-control" name="leaveType" id="country">
                                        <option>--SELECT--</option>
                                        <option value="0">Casual</option>
                                        <option value="1">Sick</option>
                                        <option value="2">Maternity</option>
                                        <option value="3">Education</option>
                                        <option value="4">Annual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-auto">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Attach</label>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </form>
    </div>
</div>


<?php include('../includes/footer.php'); ?>

<script>
$("#work-platforms").submit(function(event){
    event.preventDefault();
    var form=$("#work-platforms")[0];
    
    var data = new FormData(form);
    data.append("MODE", "leaveFormSubmit");
    console.log(data);
    $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "../includes/process.php",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,
                    success: function (res) {
                      if(res=="hi"){
                        $("#alert").html('<div class="alert alert-success" role="alert"> Leave is successfully submitted!</div>')
                    }else{
                        $("#alert").html('<div class="alert alert-danger" role="alert">Please fill all fields!</div>')
                    }
                    }
    })
})

</script>