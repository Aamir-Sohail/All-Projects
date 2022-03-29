<?php include('../includes/header.php');?>

<div class="layout-px-spacing">

    <!--  END SIDEBAR  -->

    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="form-card">

                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="csvf_table">
                                <div class="table-responsive">
                                    <form id="improvement_plane">
                                    <table class="table table-bordered mb-4">
                                        <thead>

                                            <tr>
                                                <th>Date</th>
                                                <th style="width: 250px;">Activity / Task</th>
                                                <th style="width: 100px;">Responsibilty</th>
                                                <th style="width: 100px;">Cost</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody" id="tbody_element">
                                            <tr>
                                                <td><input style="width: 90px;" name="date" id="date" type="date" class="form-control"
                                                        required=""></td>
                                                <td><input type="text" name="task" id="task" class="form-control" required=""></td>
                                                <td><input type="text" name="responsibilty" id="responsibilty" class="form-control" required=""></td>
                                                <td><input type="text" name="cost" id="cost" class="form-control" required=""></td>
                                                <td><input style="width: 90px;" name="deadline" id="deadline" type="date" class="form-control"
                                                        required="">
                                                    <input type="hidden" name="MODE" value="improvement_plan">
                                                    </td>
                                                <td>
                                                    <select name="status" id="status" class="form-control">
                                                        <option>--SELECT--</option>
                                                        <option value="0">Completed</option>
                                                        <option value="1">In Progress</option>
                                                        <option value="2">Not Started</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <div style="float:right">
                                        <button type="submit" id="Save_button" class="btn btn-info"> Submit
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        
    </div>
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="form-card">

                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="csvf_table">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-4">
                                        <thead>

                                            <tr>
                                                <th>Date</th>
                                                <th style="width: 250px;">Activity / Task</th>
                                                <th style="width: 100px;">Responsibilty</th>
                                                <th style="width: 100px;">Cost</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody" id="tbody_element">
                                            <?php 

                                            $Fetch_improvement_plane = $datafetch->Fetch_improvement_plane($SchoolCode);
                                            foreach($Fetch_improvement_plane as $fp){
                                            ?>
                                            <tr>
                                                <td><?php echo $fp['datee'] ?></td>
                                                <td><?php echo $fp['task'] ?></td>
                                                <td><?php echo $fp['responsibilty'] ?></td>
                                                <td><?php echo $fp['cost'] ?></td>
                                                <td><?php echo $fp['deadline'] ?></td>
                                                <td><?php echo $fp['status'] ?></td>
                                                <td><button onclick="del_plan(<?php echo $fp['Plan_id'] ?>)" class="btn p-1 btn-danger" style="width: 30px;"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        
    </div>
</div>



<?php include('../includes/footer.php');?>
<script>
    $("#improvement_plane").on("submit", function (event) {
        event.preventDefault();
        if($("#date").val()==''){
            $("#date").css("border","7px solid red")
        }else if($("#task").val()==''){
            $("#task").css("border","7px solid red")
        }
        else if($("#responsibilty").val()==''){
            $("#responsibilty").css("border","7px solid red")
        }
        else if($("#cost").val()==''){
            $("#cost").css("border","7px solid red")
        }
        else if($("#deadline").val()==''){
            $("#deadline").css("border","7px solid red")
        }
        else if($("#status").val()==''){
            $("#status").css("border","7px solid red")
        }else{
            $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: new FormData($('#improvement_plane')[0]) ,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#Save_button").attr("disabled");
            },

            success: function(data) {
                if(data === '1'){
                    alert("Improvement Plan Added SuccessFully!");
                    window.location.reload();
                    $("#Save_button").removeAttr("disabled",true);
                }else{
                    alert("Something Went Wrong. Please try again");
                    $("#Save_button").removeAttr("disabled",true);
                    console.log(data)
                }
            }
        });
        }
      
    });

    function del_plan(id){
        if (confirm('Are You Sure to Delete School Improvement plan?')) {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=delete_School_Improvement_plan&School_Improvement_plan_id=" + id,
            success: function(data) {
                if(data === '1'){
                    window.location.reload();
                }else{
                    alert("Something Went Wrong!");
                }
            }
        })
        }
        
    }
</script>