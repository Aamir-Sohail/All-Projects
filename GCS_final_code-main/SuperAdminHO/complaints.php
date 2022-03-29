<?php include('./includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <!-- <div class="statbox widget box box-shadow"> -->
    <div class="widget-header">
        <div class="row">

            <style>
                .card_data {
                    transform: translate(80px, 100px);
                }

                #multi-column-ordering_filter {
                    float: right;
                }
            </style>
            <!--  BEGIN CONTENT PART  -->
            <!--<div id="content" class="main-content">-->
            <!--<div class="layout-px-spacing">-->
            <div class="row mx-0 widget-content-area br-4 w-100">
            


<?php 
        if(isset($_GET['alert'])){
            $alert = $_GET['alert'] ;
            if($alert == "No_data"){
                echo '<div class="col-12"><div class="alert alert-light-primary border-0 mb-4" role="alert">
No School Registerd on this date
</div> </div>';
            }
        }
        ?>
        <div class="col-12">
            <div class="dt--top-section">
                <div class="row">
                    <div class="col-6 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                        <div class="dataTables_length" id="multi-column-ordering_length">
                            <h5>Complaints</h5>
                        </div>
                    </div>
                    <?php
                            $today=date('Y-m-d')
                            ?>
                    <div class="col-6 col-sm-6 d-flex justify-content-sm-end justify-content-right">
                    <div class="dataTables_length" id="multi-column-ordering_length">
                    
                    <div class="dataTables_length" id="multi-column-ordering_length">
                        <input type="hidden" name="export" value="basic">
                            <!-- <a href="excelExport.php?export=basic" class="btn btn-primary">Export To Excel</a> -->
                            <
                        </div>
                    </div>
                </div>
            </div>
</form>
            <div class="table-responsive">
                <div class="col-sm-12">
                    <table id="multi-column-ordering" class="table table-hover dataTable no-footer" role="grid"
                        aria-describedby="multi-column-ordering_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    SNo.
                                </th>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    From User
                                </th>
                               
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    Subject
                                </th>
                                <!-- <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    Message
                                </th> -->
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    Contact
                                </th>
                                <!-- <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    Attachment
                                </th> -->
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    Date
                                </th>
                                
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                    rowspan="1" colspan="1" aria-sort="ascending" style="width: 66.625px;">
                                    Action
                                </th>
                                
                             
                                <!--<th class="sorting text-center" tabindex="0" aria-controls="multi-column-ordering"-->
                                <!--    rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"-->
                                <!--    style="width: 163.078px;">Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                             $data = $data->fetchComplaints();
                            // print_r($data_output);
                            $no = 1;
                            
                            foreach ($data as $row) {
                                ?>
                            <tr role="row" class="odd">
                                <td><?php echo $no;?></td>
                                    <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['from_user'] ?></td>
                                   
                                <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['subject'] ?></td>
                                <!-- <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['msg'] ?></td> -->
                                <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['contact'] ?></td>
                                <!-- <td class="sorting_1 sorting_2" style="width:200px">
                                <img src="../uploads/<?php //echo $row['attachment'] ?>" alt="" srcset="">    
                                 -->
                                
                                
                                </td>
                                <td class="sorting_1 sorting_2" style="width:200px">
                                    <?php echo $row['created_on'] ?></td>
                                <td class="sorting_1 sorting_2" style="width:200px">
                                    <div class="btn-group">
                                        <button onclick ="viewComplaints(<?php echo $row['AutoId'];?>)" type="button" class=" btn btn-primary mr-1"  data-toggle="modal" data-target="#myViewModal">View</button>
                                        <button onclick ="deleteComplaints(<?php echo $row['AutoId'];?>)" type="button" class=" btn btn-danger">Delete</button>
                                    </div>
                                </td>
                              
                                <!--<td class="text-center">-->
                                <!--    <a href="javascript:void(0)" class="btn btn-info" onclick="saveNext('116')"><i-->
                                <!--            class="fas fa-eye"></i></a>-->
                                <!--</td>-->
                            </tr>
                            <?php
                            $no++;} ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


            </div>

        </div>
<div class="modal" id="myViewModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="flex-direction: column;">
                <h6 class="text-sm" id="from"></h6>
                <h6 class="modal-title" id="subject"></h6>
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="msg">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
        </div>



    </div>
</div>
<!-- </div> -->

</div>

<?php include('includes/footer.php'); ?>

<script>
    // $(document).ready(function() {
    //     $('#multi-column-ordering').DataTable();
    // });
    

    function deleteComplaints(id){
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=deleteComplaint&complaintId=" +id,
            success: function(data) {
            $( "#multi-column-ordering" ).load(window.location.href + " #multi-column-ordering" );
           
            }
        });
    }

    function viewComplaints(id){
        $.ajax({
            type: "POST",
            url: "includes/process.php",
            data: "MODE=viewComplaint&complaintId=" +id,
            success: function(data) {
                
                var result = jQuery.parseJSON(data);
                console.log(result);
                $( "#from").html("From: "+result.from_user);
                $( "#subject").html("Subject: "+result.subject);
                $("#msg").html("<h6>Message:</h6> <br>"+result.msg+"<br><br><br><h6>Attachment:</h6><img style='height: 100px;width: 100px;' src='http://gcs.esef.org.pk//uploads/"+result.attachment+"'>");
            }
        });
    }
</script>