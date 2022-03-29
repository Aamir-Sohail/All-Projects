<?php include('../includes/header.php'); ?>
<style>
    .loading_icon img{
            height: 32px;
            width: auto;
            margin-left: -10px;
            margin-top: 35px;
    }
</style>
<div id="loader_screen"></div>
<div class="col-lg-12 col-12 layout-top-spacing">

<div class="row layout-top-spacing" id="cancel-row">        
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
<div class="widget-content widget-content-area ms-2">
            <div class="row">

                <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b>Class</b></p>
                    <select class="form-control form-control-sm" id="classs" name="class">
                    <option >--SELECT--</option>
                     <?php 
                   $class= $datafetch->getClass();
                   foreach($class as $row){
                       echo '<option value="'.$row['ClassID'].'">'.$row['ClassName'].'</option>';
                   }
                    
                    ?>
                    </select>
                </div>
                <div class="col-xl-3 mb-xl-0 mb-2 loading_icon"  id="loading_icon_div">
                    <img src="loadingAnimation.gif" id="loading_icon" style="display:none;">
                </div>
                <!-- <div class="col-xl-3 mb-xl-0 mb-2">
                    <p><b></b></p>
                    <input type="submit" name="txt" value="Search" class="mt-4 btn btn-primary">
                </div> -->

            </div>

        </div>
    </div>
</div>
</div>
        <div id="classlist">
        <div class="col-lg-12 col-12 layout-top-spacing">

<div class="row layout-top-spacing" id="cancel-row">        
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="dt--top-section">
                    <div class="row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <div class="dataTables_length" id="zero-config_length"><label> <h4>Attendance of : <?php echo date("d-m-Y"); ?></h4> : </label></div>
                        </div>
                    </div>
                </div>
                <form id="studentAttendenceform">
                <div class="table-responsive">
                    <table id="zero-config" class="table table-striped dataTable" style="width: 100%;" role="grid" aria-describedby="zero-config_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 132px;">SNo</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 18px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 18px;">Class</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 96px;">Father Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        
                            <tbody  id="datahere">
                            </tbody">
                                
                            </table>
                            <div style="float: right;">
                            <input type="button" name="studentattenencebutton" onclick="sendStudentattendence(event)" value="Add Attendence" class="mt-4 btn btn-primary">
                            </div>
                        
                        </div>
                    </div>
                </div>
                </form>
            </div>
    
        </div>
    </div>
        </div>


<?php include('../includes/footer.php'); ?>

<script>


    
    function sendStudentattendence (event) {
    //   var studentId= $("input[name=StudentId]").val();
    //    console.log(studentId);
        event.preventDefault();
       
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=addStudentAttendence&" +$('#studentAttendenceform').serialize(),
            beforeSend : function(){
            $("#loader_screen").html(`<div id="load_screen"><div class="loader"><div class="loader-content"><div class="spinner-grow align-self-center"></div></div></div></div`);
            },
            success: function(data) {
                $("#loader_screen").html("");
                if(data === '1'){
                    $('#studentAttendenceform').trigger("reset");
                    alert("Attendence Added SuccessFully");
                }else{
                    alert("Attendece Already Marked");
                    console.log(data);
                }
            }
        });
    };


    $('#classs').on('change', function(){
        data=this.value;
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=fetchstudentwithclass" + "&class=" + data,
            beforeSend: function() {
            $("#loading_icon").css({display: 'block'});
            },

            success: function(data) {
            if(data == ''){
            $("#loading_icon_div").html("<p>No Student Found</p>");
            $("#datahere").html("");
            }else{
                $("#datahere").html(data);
                $("#loading_icon").css({display: 'none'});
                $("#loading_icon_div").html("<p></p>");
                }
            }
        });
    })
</script>