<?php include('../includes/header.php'); ?>
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div id="multi-column-ordering_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="dt--top-section">
                    <div class="row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <div class="dataTables_length" id="multi-column-ordering_length">
                                <h5>Total Teachers </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="multi-column-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="multi-column-ordering_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc px-0" style="width: 80px;">SNo</th>
                                <th class="sorting" style="width: 200px;">Name</th>
                                <th class="sorting" style="width: 200px;">Father Name / Husband Name</th>
                                <th class="sorting">Contact #</th>
                                <th class="sorting">CNIC</th>
                                <th class="sorting" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $teachers  = $datafetch->teacher_fetch($SchoolCode);
                     
                                foreach ($teachers as $r) {
                            ?>
                            <tr role="row">
                                <td><?php echo $r['AutoID'];?></td>
                                <td><?php echo $r['Teacher_Name'];?></td>
                                <td><?php echo $r['Father_Name'];?></td>
                                <td><?php echo $r['Contact'];?></td>
                                <td><?php echo $r['CNIC'];?></td>
                                <td>
                                <button class="btn btn-primary p-1" style="width: 30px;"  onclick="saveNext('<?php echo $r['AutoID']?>')"><i class="far fa-eye"></i></button>
                                <a href="editTeacher.php?teacherId=<?php echo $r['AutoID'];?>" class="btn p-1 btn-info" style="width: 30px;"><i class="fas fa-edit"></i></a>
                                <button onclick="delete_teacher(<?php echo $r['AutoID'];?>)" class="btn p-1 btn-danger" style="width: 30px;"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                           <?php
                                }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="view_awr_std" tabindex="-1" aria-labelledby="view_awr_std"
    aria-hidden="true">
    <div class="modal-dialog awr-modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Teacher Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="content_here" class="modal-body px-3">
                
                
            </div>

        </div>
    </div>
</div>
<script>
    function saveNext(id) {
        let user_id = id;
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=teacher_profile_model&user_id=" +id,
            success: function(data) {
                $("#content_here").html(data);
                $("#view_awr_std").modal('show');
            }
        });
    }
    $(document).ready( function () {
    $('#multi-column-ordering').DataTable();
} );
    function delete_teacher(id){
        let student_id = id;
        if (confirm('Are You Sure to Delete Student?')) {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=delete_teacher&Teacher_id=" + id,
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
<?php include('../includes/footer.php'); ?>

<script>
    function delete_student(id){
        let student_id = id;
        if (confirm('Are You Sure to Delete Teacher?')) {
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=delete_student&Student_id=" + id,
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