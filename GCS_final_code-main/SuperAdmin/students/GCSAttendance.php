<?php include('../includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>Monitor Attendance By Date:</h3>
                        <?php 
                        date_default_timezone_set("Asia/Karachi");
                        $max_date = date("Y-m-d");
                        $date = date("d-m-Y");
                        $date = strtotime($date);
                        $date = strtotime("-7 day", $date);
                        $new_date = date('Y-m-d', $date);
                        ?>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area " style="justify-content: space-between">
                <div class="col-4 ">
                    <label for="Tehsil">Date</label>
                    <input type="date" class="form-control" min="<?php echo $new_date;?>" max="<?php echo $max_date;?>"
                        placeholder="district">
                </div>



                <div class="col-12 text-right">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-header">
                <div class="row">
                    <div class="col-12">
                        <h3>Monitor Students Attendance of : <?php echo date("d-m-Y");?></h3>
                    </div>
                </div>
            </div>

            <div class="widget-content widget-content-area d-flex flex-wrap" style="justify-content: space-between">

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                    <div class="widget widget-account-invoice-three">

                        <div class="widget-heading"
                            style="background-image: url(../assets/img/student1.jpg);background-size: cover;background-repeat: no-repeat;">
                            <div class="wallet-usr-info">

                                <div class="add">

                                </div>
                            </div>

                        </div>

                        <div class="widget-amount">

                            <div class="w-a-info funds-received">
                                <span>Present</span>
                                <p>70</p>
                            </div>

                            <div class="w-a-info funds-spent">
                                <span>Absent</span>
                                <p>21</p>
                            </div>
                        </div>

                        <div class="widget-content" style="padding: 8px 20px">

                            <div class="text-center"><label for="validate">Validate</label></div>
                            <div class="bills-stats text-center">
                                <span style="width: 100%;" class="py-2" data-toggle="modal"
                                    data-target="#exampleModal1">GCS Katlang</span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                    <div class="widget widget-account-invoice-three">

                        <div class="widget-heading"
                            style="background-image: url(../assets/img/student2.jpg);background-size: cover;background-repeat: no-repeat;">
                            <div class="wallet-usr-info">

                                <div class="add">

                                </div>
                            </div>

                        </div>

                        <div class="widget-amount">

                            <div class="w-a-info funds-received">
                                <span>Present</span>
                                <p>70</p>
                            </div>

                            <div class="w-a-info funds-spent">
                                <span>Absent</span>
                                <p>21</p>
                            </div>
                        </div>

                        <div class="widget-content" style="padding: 8px 20px">
                            <style>
                                .bills-stats span:hover{cursor:pointer}
                            </style>
                            <div class="text-center"><label for="validate">Validate</label></div>
                            <div class="bills-stats text-center">
                                <span style="width: 100%;" class="py-2" data-toggle="modal"
                                    data-target="#exampleModal1">GCS Katlang</span>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

                    <div class="widget widget-account-invoice-three">

                        <div class="widget-heading"
                            style="background-image: url(../assets/img/student1.jpg);background-size: cover;background-repeat: no-repeat;">
                            <div class="wallet-usr-info">

                                <div class="add">

                                </div>
                            </div>

                        </div>

                        <div class="widget-amount">

                            <div class="w-a-info funds-received">
                                <span>Present</span>
                                <p>70</p>
                            </div>

                            <div class="w-a-info funds-spent">
                                <span>Absent</span>
                                <p>21</p>
                            </div>
                        </div>

                        <div class="widget-content" style="padding: 8px 20px">

                            <div class="text-center"><label for="validate">Validate</label></div>
                            <div class="bills-stats text-center">
                                <span style="width: 100%;" class="py-2" data-toggle="modal"
                                    data-target="#exampleModal1">GCS Katlang</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row mx-0">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <p><b>Present</b></p><label for="village" class="sr-only">Village</label><input
                                type="number" name="Village" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <p><b>Absent</b></p><label for="village" class="sr-only">Village</label><input type="number"
                                name="Village" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <p><b>Comment</b></p><label for="village" class="sr-only">Village</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" style="height: 100px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger px-5" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                    Discard</button>
                <button type="button" class="btn btn-primary px-5">Submit</button>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>