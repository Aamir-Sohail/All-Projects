<?php include('../includes/header.php');?>
    <div class="layout-px-spacing">

        <!--  END SIDEBAR  --><div class="row layout-top-spacing">

    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow p-0">

    <div class="widget-content widget-content-area">
    <div class="tab-pane active show fade " id="rounded-pills-icon-near" role="tabpanel" aria-labelledby="rounded-pills-icon-profile-tab">
        
            <div class="form-card">
                <div class="row mx-0">
                    <style>

                        .csvf_table th {
                            text-align: center;
                        }
                        
                        
                        
                    @media screen and (max-width: 768px) {
                        .csvf_table table{
                            width: 768px;
                        }
                    }
                
                    </style>
                    <div class="csvf_table col-11 mx-auto">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th style="width:26%">School</th>
                                        <th style="width:20%">Level</th>
                                        <th style="width:20%">Gender</th>
                                        <th style="width:17%">EMIS Code</th>
                                        <th style="width:17%">Distance (In KM)</th>
                                        <th style="width:17%">Action </th>
                                    </tr>
                                </thead>
                                <tbody class="tbody" id="Acknowledgment">
                                    <?php

                                    $result = $datafetch->Fetch_data('esef_school_nearest_institutions', $SchoolCode);  
                                    foreach ($result as $row) {
                                    ?>
                                        <tr>
                                            <td >
                                                <?php echo $row['SchoolName'] ?>
                                            </td>
                                            <td >
                                                <?php if ($row['SchoolLevel'] == '0') {
                                                                            echo "Primary";
                                                                        }elseif($row['SchoolLevel'] == '1'){
                                                                            echo "Middle";
                                                                        }elseif($row['SchoolLevel'] == '2'){
                                                                            echo "High";
                                                                        }  
                                                                        
                                                                        else {
                                                                            echo "Higher Secondary";
                                                                        } ?>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <?php if ($row['SchoolGender'] == '0') {
                                                                    echo "Boys";
                                                                } elseif ($row['SchoolGender'] == '1') {
                                                                    echo "Girls";
                                                                } else {
                                                                    echo "Co-ed";
                                                                }
                                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $row['emisCode'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['distance'] ?>
                                            </td>
                                            <td>
                                               <button  onclick="delete_school('<?php echo $row['AutoID']; ?>')" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                            <!--<div id="button-here" class="text-right"><button class="btn btn-info mr-2" onclick="add_tr()">+</button><button class="btn btn-danger" onclick="remove_tr()">-</button>-->
                            <!--</div>-->

                        </div>
                    </div>
                    <div class="text-right col-12">
                        <a href="http://gcs.esef.org.pk/dashboard.php?step=3" class="mt-4 btn btn-primary py-2">Next</a>
                        <input type="button" value="Add New School" name="txt" class="mt-4 btn btn-primary py-2" data-toggle="modal" data-target="#show_enrollment_form">
                    </div>
                </div>
            </div>

    </div>
</form>

<div class="modal fade" id="show_enrollment_form" tabindex="-1" role="dialog" aria-labelledby="show_enrollment_form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
               <form id="Nearest_Institutions">
      <div class="modal-body">
          <div class="row mx-2">
              <p><b>School *</b></p>
            <div class="col-12">
                <input type="text" name="school" class="form-control" required>
            </div>
            <p><b>Level*</b></p>
            <div class="col-12">
                <select class="form-control" id="level" name="level" required>
                    <option value="">--SELECT--
                    </option>
                    <option value="0">Primary
                    </option>
                    <option value="1">Middle
                    </option>
                    <option value="2">High
                    </option>
                    <option value="3">Higher
                        Secondary</option>
                </select>
            </div>
            <p><b>Gender *</b></p>
            <div class="col-12">
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">--SELECT--
                    </option>
                    <option value="0">Boys
                    </option>
                    <option value="1">Girls
                    </option>
                    <option value="2">Co-ed
                    </option>
                </select>
            </div>
            <p><b>EMIS Code# *</b></p>
            <div class="col-12">
                <input type="text" name="emis" class="form-control" required>
            </div>
            <p><b>Distance (In KM) *</b></p>
            <div class="col-12">
                <input type="number" name="distance" class="form-control" required>
            </div>
            </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" type="submit">Save changes</button>-->
        <input class="btn btn-primary" type="submit" value="Save changes">
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="delete_school" tabindex="-1" role="dialog" aria-labelledby="show_enrollment_form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h5>Do You Want to Delete This School?</h5>
          
      </div>
      <div class="modal-footer">
          <form id="delete_school">
              <input type="hidden" id="delete_btn" >
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="del_school()" class="btn btn-danger" >Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php');?>
<script>
       
     $("#delete_school").submit(function(event) {
        event.preventDefault();
    });
    
function delete_school(id){
    var id_val = id;
    $("#delete_btn").attr("value",id_val)
    $("#delete_school").modal("show");
    
    
}
function del_school() {
    let delete_btn = $("#delete_btn").val();
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=delete_school&delete_id="+delete_btn,
            success: function(data) {
                if(data === '1'){
                    window.location.reload();
                }else{
                    alert("Please Fill All Input Correctly");
                    console.log(data);
                }
            }
        });
    }
    $("#Nearest_Institutions").on("submit", function (event) {
                event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=Nearest_Institutions&"+ $('#Nearest_Institutions').serialize(),
            success: function(data) {
                if(data === '1'){
                    window.location.reload();
                }else{
                    alert("Please Fill All Input Correctly");
                    console.log(data);
                }
            }
        });
    });
</script>

