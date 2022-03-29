<?php include('../includes/header.php');?>
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%
    }

    p {
        color: grey
    }

    #heading {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }


    #msform .action-button {
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #673AB7;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 16.6%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #673AB7
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }

    td {
        padding: 0 5px;
    }
</style>
<?php      
$count=$datafetch->checkenrollment($SchoolCode);
if ($count==0) {
    ?>
<div class="row layout-top-spacing mx-0 " style="width:100%">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow pt-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="enrollment">
                                <div class="tab-pane active show fade" id="rounded-pills-icon-enroll" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-contact-tab">
                                    <div class="col-11 mx-auto">
                                        <style>
                                            @media screen and (max-width: 768px) {
                                                .csvf_table table {
                                                    width: 800px;
                                                }

                                                .csvf_table table td {
                                                    padding: 0;
                                                }

                                                .csvf_table table td input {
                                                    border: 0;
                                                }
                                            }
                                        </style>



                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="csvf_table" class="col-md-12 col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-4">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:150px">Class</th>
                                                                        <th style="width:150px">Girls</th>
                                                                        <th style="width:150px">Boys</th>
                                                                        <th style="width:150px">Total</th>
                                                                        <th style="width:150px">Class</th>
                                                                        <th style="width:150px">Girls</th>
                                                                        <th style="width:150px">Boys</th>
                                                                        <th style="width:150px">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody text-center">
                                                                    <tr>
                                                                        <td>Nursery</td>
                                                                        <td><input type="number" name="Nursery_Girls"
                                                                                id="Nursery_Girls"
                                                                                class="form-control girls" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Nursery_Boys"
                                                                                id="Nursery_Boys"
                                                                                class="form-control boys" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Nursery_total"
                                                                                disabled id="Nursery_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                        <td>FOUR </td>
                                                                        <td><input type="number" name="Four_Girls"
                                                                                id="Four_Girls"
                                                                                class="form-control girls" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Four_Boys"
                                                                                id="Four_Boys" class="form-control boys"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Four_total"
                                                                                disabled id="Four_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>KG/PREP</td>
                                                                        <td><input type="number" name="KG_Girls"
                                                                                id="KG_Girls" class="form-control girls"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="KG_Boys"
                                                                                id="KG_Boys" class="form-control boys"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="KG_total"
                                                                                disabled id="KG_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                        <td>FIVE </td>
                                                                        <td><input type="number" name="Five_Girls"
                                                                                id="Five_Girls"
                                                                                class="form-control girls" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Five_Boys"
                                                                                id="Five_Boys" class="form-control boys"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Five_total"
                                                                                disabled id="Five_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ONE</td>
                                                                        <td><input type="number" name="One_Girls"
                                                                                id="One_Girls"
                                                                                class="form-control girls" required="">
                                                                        </td>
                                                                        <td><input type="number" name="One_Boys"
                                                                                id="One_Boys" class="form-control boys"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="One_total"
                                                                                disabled id="One_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                        <td>TOTAL </td>
                                                                        <td><input type="number" name="total_Girls"
                                                                                id="total_Girls" class="form-control"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="total_Boys"
                                                                                id="total_Boys" class="form-control"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="total_total"
                                                                                disabled id="total_total"
                                                                                class="form-control" required="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TWO</td>
                                                                        <td><input type="number" name="Two_Girls"
                                                                                id="Two_Girls"
                                                                                class="form-control girls" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Two_Boys"
                                                                                id="Two_Boys" class="form-control boys"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Two_total"
                                                                                disabled id="Two_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                        <td>AFGHAN </td>
                                                                        <td><input type="number" name="Afghan_Girls"
                                                                                id="Afghan_Girls" class="form-control"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Afghan_Boys"
                                                                                id="Afghan_Boys" class="form-control"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Afghan_total"
                                                                                disabled id="Afghan_total"
                                                                                class="form-control" required="">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>THREE</td>
                                                                        <td><input type="number" name="Three_Girls"
                                                                                id="Three_Girls"
                                                                                class="form-control girls" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Three_Boys"
                                                                                id="Three_Boys"
                                                                                class="form-control boys" required="">
                                                                        </td>
                                                                        <td><input type="number" name="Three_total"
                                                                                disabled id="Three_total"
                                                                                class="form-control totals" required="">
                                                                        </td>
                                                                        <td>DISABLE </td>
                                                                        <td><input type="number" name="Disable_Girls"
                                                                                id="Disable_Girls" class="form-control"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Disable_Boys"
                                                                                id="Disable_Boys" class="form-control"
                                                                                required="">
                                                                        </td>
                                                                        <td><input type="number" name="Disable_total"
                                                                                disabled id="Disable_total"
                                                                                class="form-control" required="">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <input type="submit" value="Save and Next" name="txt"
                                                class="mt-4 btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>

<script>
    function add_tr() {
        $(".tbody").append(
            ` <tr> <td> <div class=""> <input type="text"class="form-control"required=""> </div> </td> <td> <div class=""> <select class="form-control"id="District"name="District"required=""> <option value="">--SELECT--</option> <option value="1">Primary</option> <option value="1">Middle</option> <option value="1">High</option> <option value="1">Higher Secondary</option> </select> </div> </td> <td> <div class=""> <select class="form-control"id="District"name="District"required=""> <option value="">--SELECT--</option> <option value="1">Boys</option> <option value="1">Girls</option> <option value="1">Co-ed</option> </select> </div> </td> <td> <div class=""> <input type="text"class="form-control"required=""> </div> </td> <td> <div class=""> <input type="number"class="form-control"required=""> </div> </td> </tr> `
        );
    }

    function remove_tr() {
        $(".tbody  tr:last").remove();
    }

    function data_add() {
        $("#data_here").append(` <div style="height:30px; background:#f1f2f3; width:100%;"class="my-2"></div> <div class="row mx-0"> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Teacher Name *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>D / S / H *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Gender *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Date Of Birth *</b></p> <label for="village"class="sr-only">Village</label> <input type="date"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Last Degree / Certificate *</b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">--SELECT--</option> <option value="1">SSC</option> <option value="1">FA/Fsc</option> <option value="1">BA/Bsc</option> <option value="1">BS</option> <option value="1">MA/Msc</option> <option value="1">MS</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Subject *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Professional Qualification *</b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">--SELECT--</option> <option value="1">PTC</option> <option value="1">CT</option> <option value="1">ADE</option> <option value="1">B.ED</option> <option value="1">M.ED</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Teaching Experience *</b></p> <label for="village"class="sr-only">Village</label> <input type="date"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>CNIC# *</b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Bank Name *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Branch Code *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Account# *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Disability# *</b></p> <label for="village"class="sr-only">Village</label> <input type="text"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Marital Status *</b></p> <label for="village"class="sr-only">Village</label> <select class="form-control"id="District"
        name="District"required=""> <option value="">--SELECT--</option> <option value="1">Single</option> <option value="1">Married</option> <option value="1">Widow</option> <option value="1">Divorced</option> </select> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Contact# *</b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> <div class="col-md-3 col-12"> <div class="form-group"> <p><b>Whatsapp# *</b></p> <label for="village"class="sr-only">Village</label> <input type="number"name="Village"class="form-control"
        required=""> </div> </div> </div>`);
    }
</script>

<script>
    $('#Nursery_Boys').on('keyup', function () {

        let a = $('#Nursery_Girls').val();
        let b = $('#Nursery_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Nursery_total").attr("value", c);
    });
    $('#Four_Boys').on('keyup', function () {
        let a = $('#Four_Girls').val();
        let b = $('#Four_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Four_total").attr("value", c);
    });
    $('#KG_Boys').on('keyup', function () {
        let a = $('#KG_Girls').val();
        let b = $('#KG_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#KG_total").attr("value", c);
    });
    $('#Five_Boys').on('keyup', function () {
        let a = $('#Five_Girls').val();
        let b = $('#Five_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Five_total").attr("value", c);
    });
    $('#One_Boys').on('keyup', function () {
        let a = $('#One_Girls').val();
        let b = $('#One_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#One_total").attr("value", c);
    });
    $('#total_Boys').on('keyup', function () {
        let a = $('#total_Girls').val();
        let b = $('#total_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#total_total").attr("value", c);
    });
    $('#Two_Boys').on('keyup', function () {
        let a = $('#Two_Girls').val();
        let b = $('#Two_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Two_total").attr("value", c);
    });
    $('#Afghan_Boys').on('keyup', function () {
        let a = $('#Afghan_Girls').val();
        let b = $('#Afghan_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Afghan_total").attr("value", c);
    });
    $('#Three_Boys').on('keyup', function () {
        let a = $('#Three_Girls').val();
        let b = $('#Three_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Three_total").attr("value", c);
    });
    $('#Disable_Boys').on('keyup', function () {
        let a = $('#Disable_Girls').val();
        let b = $('#Disable_Boys').val();
        let c = parseInt(a) + parseInt(b);
        $("#Disable_total").attr("value", c);
    });

    $("#enrollment").submit(function (event) {
        event.preventDefault();
    });



    // Boys events 
    $('.girls').on('keyup', function () {
        let _girls = 0;
        $('.girls').each(function (index) {
            _girls += +$('.girls')[index].value;
        })
        $('#total_Girls')[0].value = _girls;
        total();
    })
    $('.boys').on('keyup', function () {
        let _Boys = 0;
        $('.boys').each(function (index) {
            _Boys += +$('input.boys')[index].value;
        })
        $('#total_Boys')[0].value = _Boys;
        total();
    })


    function total() {
        // alert()
        let val = +$('#total_Girls')[0].value + +$('#total_Boys')[0].value;
        $('#total_total').attr('value', val);
    }

    // Total events 
    // $("input.totals").each(function (index) {
    //     $('input.totals')[index].addEventListener('keyup', () => {
    //         let total = $('#total_total')[0].value;
    //         $('#total_total')[0].value = +total + +this.value;
    //     })
    // });


    $("#enrollment").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "../includes/process.php",
            data: "MODE=enrollment&" + $('#enrollment').serialize(),
            success: function (data) {
                if (data === '1') {
                    $('#enrollment').trigger('reset');
                    // console.log(data);
                } else {
                    alert("Please Fill All Input Correctly");
                    // console.log(data);
                }
            }
        });
    });
</script>




<?php
}else{?>





<?php 

$result=$datafetch->enrollment_fetch($SchoolCode);
?>
<div class="row layout-top-spacing mx-0 " style="width:100%">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow pt-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            
                                <div class="tab-pane active show fade" id="rounded-pills-icon-enroll" role="tabpanel"
                                    aria-labelledby="rounded-pills-icon-contact-tab">
                                    <div class="col-11 mx-auto">
                                        <style>
                                            @media screen and (max-width: 768px) {
                                                .csvf_table table {
                                                    width: 800px;
                                                }

                                                .csvf_table table td {
                                                    padding: 0;
                                                }

                                                .csvf_table table td input {
                                                    border: 0;
                                                }
                                            }
                                        </style>
                                        <form id="enrollment">
                                            <div class="tab-pane active show fade" id="rounded-pills-icon-enroll"
                                                role="tabpanel" aria-labelledby="rounded-pills-icon-contact-tab">
                                                <div class="col-11 mx-auto">
                                                    <style>
                                                        @media screen and (max-width: 768px) {
                                                            .csvf_table table {
                                                                width: 800px;
                                                            }

                                                            .csvf_table table td {
                                                                padding: 0;
                                                            }

                                                            .csvf_table table td input {
                                                                border: 0;
                                                            }
                                                        }
                                                    </style>

                                                    <div class="form-card">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="csvf_table" class="col-md-12 col-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered mb-4">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width:150px">Class</th>
                                                                                    <th style="width:150px">Girls</th>
                                                                                    <th style="width:150px">Boys</th>
                                                                                    <th style="width:150px">Total</th>
                                                                                    <th style="width:150px">Class</th>
                                                                                    <th style="width:150px">Girls</th>
                                                                                    <th style="width:150px">Boys</th>
                                                                                    <th style="width:150px">Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="tbody text-center">
                                                                                <tr>
                                                                                    <td>Nursery</td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Nursery_Girls'];?>"
                                                                                            name="Nursery_Girls"
                                                                                            id="Nursery_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Nursery_Boys'];?>"
                                                                                            name="Nursery_Boys"
                                                                                            id="Nursery_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Nursery_Boys'] + $result['Nursery_Girls'];?>"
                                                                                            name="Nursery_total"
                                                                                            id="Nursery_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                    <td>FOUR </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Four_Girls']?>"
                                                                                            name="Four_Girls"
                                                                                            id="Four_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Four_Boys']?>"
                                                                                            name="Four_Boys"
                                                                                            id="Four_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Four_Boys'] + $result['Four_Girls']?>"
                                                                                            name="Four_total"
                                                                                            id="Four_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>KG/PREP</td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['KG_Girls']?>"
                                                                                            name="KG_Girls"
                                                                                            id="KG_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['KG_Boys']?>"
                                                                                            name="KG_Boys" id="KG_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['KG_Boys'] +  $result['KG_Girls']?>"
                                                                                            name="KG_total"
                                                                                            id="KG_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                    <td>FIVE </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Five_Girls']?>"
                                                                                            name="Five_Girls"
                                                                                            id="Five_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Five_Boys']?>"
                                                                                            name="Five_Boys"
                                                                                            id="Five_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Five_Girls'] + $result['Five_Boys']?>"
                                                                                            name="Five_total"
                                                                                            id="Five_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>ONE</td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['One_Girls']?>"
                                                                                            name="One_Girls"
                                                                                            id="One_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['One_Boys']?>"
                                                                                            name="One_Boys"
                                                                                            id="One_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['One_Girls'] + $result['One_Boys']?>"
                                                                                            name="One_total"
                                                                                            id="One_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                    <td>TOTAL </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Total_Girls']?>"
                                                                                            name="total_Girls"
                                                                                            id="total_Girls"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Total_Boys']?>"
                                                                                            name="total_Boys"
                                                                                            id="total_Boys"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Total_Girls'] + $result['Total_Boys']?>"
                                                                                            name="total_total"
                                                                                            id="total_total"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>TWO</td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Two_Girls']?>"
                                                                                            name="Two_Girls"
                                                                                            id="Two_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Two_Boys']?>"
                                                                                            name="Two_Boys"
                                                                                            id="Two_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Two_Girls'] + $result['Two_Boys']?>"
                                                                                            name="Two_total"
                                                                                            id="Two_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                    <td>AFGHAN </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Afghan_Girls']?>"
                                                                                            name="Afghan_Girls"
                                                                                            id="Afghan_Girls"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Afghan_Boys']?>"
                                                                                            name="Afghan_Boys"
                                                                                            id="Afghan_Boys"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Afghan_Girls'] + $result['Afghan_Boys']?>"
                                                                                            name="Afghan_total"
                                                                                            id="Afghan_total"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>THREE</td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Three_Girls']?>"
                                                                                            name="Three_Girls"
                                                                                            id="Three_Girls"
                                                                                            class="form-control girls"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Three_Boys']?>"
                                                                                            name="Three_Boys"
                                                                                            id="Three_Boys"
                                                                                            class="form-control boys"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Three_Girls'] + $result['Three_Boys']?>"
                                                                                            name="Three_total"
                                                                                            id="Three_total"
                                                                                            class="form-control totals"
                                                                                            required>
                                                                                    </td>
                                                                                    <td>DISABLE </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Disable_Girls']?>"
                                                                                            name="Disable_Girls"
                                                                                            id="Disable_Girls"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Disable_Boys']?>"
                                                                                            name="Disable_Boys"
                                                                                            id="Disable_Boys"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                    <td><input type="number"
                                                                                            value="<?php echo $result['Disable_Girls'] + $result['Disable_Boys']?>"
                                                                                            name="Disable_total"
                                                                                            id="Disable_total"
                                                                                            class="form-control"
                                                                                            required>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 col-sm-3 col-md-2 ml-auto">
                                                        <input type="button" value="Update" onclick="saveNext();"
                                                            name="txt" class="mt-4 btn btn-primary w-100 d-block py-2">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../includes/footer.php'); ?>
      


        <script>
            $('#Nursery_Boys').on('change', function () {
                let a = $('#Nursery_Girls').val();
                let b = $('#Nursery_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Nursery_total").attr("value", c);
            });
            $('#Four_Boys').on('change', function () {
                let a = $('#Four_Girls').val();
                let b = $('#Four_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Four_total").attr("value", c);
            });
            $('#KG_Boys').on('change', function () {
                let a = $('#KG_Girls').val();
                let b = $('#KG_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#KG_total").attr("value", c);
            });
            $('#Five_Boys').on('change', function () {
                let a = $('#Five_Girls').val();
                let b = $('#Five_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Five_total").attr("value", c);
            });
            $('#One_Boys').on('change', function () {
                let a = $('#One_Girls').val();
                let b = $('#One_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#One_total").attr("value", c);
            });
            $('#total_Boys').on('change', function () {
                let a = $('#total_Girls').val();
                let b = $('#total_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#total_total").attr("value", c);
            });
            $('#Two_Boys').on('change', function () {
                let a = $('#Two_Girls').val();
                let b = $('#Two_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Two_total").attr("value", c);
            });
            $('#Afghan_Boys').on('change', function () {
                let a = $('#Afghan_Girls').val();
                let b = $('#Afghan_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Afghan_total").attr("value", c);
            });
            $('#Three_Boys').on('change', function () {
                let a = $('#Three_Girls').val();
                let b = $('#Three_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Three_total").attr("value", c);
            });
            $('#Disable_Boys').on('change', function () {
                let a = $('#Disable_Girls').val();
                let b = $('#Disable_Boys').val();
                let c = parseInt(a) + parseInt(b);
                $("#Disable_total").attr("value", c);
            });

            $("#enrollment").submit(function (event) {
                event.preventDefault();
            });




            // girls events 
            $("input.girls").each(function (index) {
                $('input.girls')[index].addEventListener('change', () => {
                    let _Girls = $('#total_Girls')[0].value;
                    $('#total_Girls')[0].value = +_Girls + +this.value;
                    total();
                })
            });

            // Boys events 
            $("input.boys").each(function (index) {
                $('input.boys')[index].addEventListener('change', () => {
                    let _Boys = $('#total_Boys')[0].value;
                    $('#total_Boys')[0].value = +_Boys + +this.value;
                    total();
                })
            });

            function total() {
                // alert()
                let val = +$('#total_Girls')[0].value + +$('#total_Boys')[0].value;
                $('#total_total').attr('value', val);
            }

            // Total events 
            // $("input.totals" ).each(function(index){ 
            //     $('input.totals')[index].addEventListener('change', ()=>{
            //         let total = $('#total_total')[0].value;
            //         $('#total_total')[0].value = +total + +this.value;
            //     })
            // });



            $('#enrollment').on('submit',function(e){
                e.preventDefault();
            });

            function saveNext() {
                $.ajax({
                    type: "POST",
                    url: "../includes/process.php",
                    data: "MODE=enrollment_update&" + $('#enrollment').serialize(),
                    success: function (data) {
                        if (data === '1') {
                            $("#enrollment").load(location.href + " #enrollment");
                        } else {
                            alert("Please Fill All Input Correctly");
                        }
                    }
                });
            } 

            </script>
            <?php
            } 
            
            
            
            ?>