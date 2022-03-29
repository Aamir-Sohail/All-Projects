<?php include('./includes/header.php'); ?>
<div id="loader_screen"></div>
<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">

        <form id="contactsus"  class="section work-platforms">
            <div class="info">
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <p><b>From *</b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="from" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">To</label>
                                    <select class="form-control" id="country" name="to">
                                        <option>--SELECT--</option>
                                        <option value="0">District Office</option>
                                        <option value="1">Head Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="platform-title">Subject</label>
                                    <input type="text" class="form-control mb-4" id="platform-title" name="subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="platform-description">Description</label>
                                    <textarea class="form-control mb-4" id="platform-description"
                                        placeholder="Enter Message" rows="10" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="platform-title">Contact</label>
                                    <input type="number" class="form-control mb-4" id="platform-title" name="contact">
                                </div>
                            </div>
                            <div class="col-6 my-auto">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Attach</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="attachment">
                                    <input type="hidden" name="contactus">
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <input type="submit" value="Submit" name="contactus" class="btn btn-primary">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

$("#contactsus").submit(function(event) {
        event.preventDefault();
  


        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: new FormData($('#contactsus')[0]),
            processData: false,
            contentType: false,
            beforeSend : function(){
            $("#loader_screen").html(`<div id="load_screen"><div class="loader"><div class="loader-content"><div class="spinner-grow align-self-center"></div></div></div></div`);
            },
            success: function(data) {
                 $("#loader_screen").html("");
                
                if(data === '11'){
                    alert("Message Sent SuccessFully!");
                    window.location.replace("contact.php");
                }else{
                    alert("Please Fill All Input Correctly");
                }
            }
        });
});

</script>
<?php include('./includes/footer.php'); ?>