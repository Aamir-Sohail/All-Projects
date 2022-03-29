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
<div class="row layout-top-spacing mx-0 " style="width:100%">
    <div class="layout-spacing col-12">
        <div class="statbox widget box box-shadow pt-1">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-10 col-md-10 col-lg-12 text-center p-0 mb-2">
                        <div class="card px-0 pb-0 mb-3">
                            <form id="msform">

                            <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            <style>
                                                .tbody td {
                                                    padding: 0 !important;
                                                    margin-bottom: 0px !important;
                                                }

                                                .tbody .form-control {
                                                    border-color: transparent;
                                                }

                                                .csvf_table th {
                                                    text-align: center;
                                                }
                                            </style>
                                            <div class="csvf_table" class="col-md-12 col-12">
                                                <div class="table-responsive ">
                                                    <div class="row mx-0" id="data_here">
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Teacher Name *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Father / Husband *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Gender *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Date Of Birth *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="date"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Last Degree / Certificate *</b>
                                                                </p><label for="village"
                                                                    class="sr-only">Village</label><select
                                                                    class="form-control" id="District" name="District"
                                                                    required="">
                                                                    <option value="">--SELECT--</option>
                                                                    <option value="1">SSC</option>
                                                                    <option value="1">FA/Fsc</option>
                                                                    <option value="1">BA/Bsc</option>
                                                                    <option value="1">BS</option>
                                                                    <option value="1">MA/Msc</option>
                                                                    <option value="1">MS</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Subject *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Professional Qualification *</b>
                                                                </p><label for="village"
                                                                    class="sr-only">Village</label><select
                                                                    class="form-control" id="District" name="District"
                                                                    required="">
                                                                    <option value="">--SELECT--</option>
                                                                    <option value="1">PTC</option>
                                                                    <option value="1">CT</option>
                                                                    <option value="1">ADE</option>
                                                                    <option value="1">B.ED</option>
                                                                    <option value="1">M.ED</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Teaching Experience *</b></p>
                                                                <label for="village"
                                                                    class="sr-only">Village</label><input type="number"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>CNIC# *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="number"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Bank Name *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Branch Code *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Account# *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Disability# *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="text"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Marital Status *</b></p><label for="village"
                                                                    class="sr-only">Village</label><select
                                                                    class="form-control" id="District" name="District"
                                                                    required="">
                                                                    <option value="">--SELECT--</option>
                                                                    <option value="1">Single</option>
                                                                    <option value="1">Married</option>
                                                                    <option value="1">Widow</option>
                                                                    <option value="1">Divorced</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Contact# *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="number"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-12">
                                                            <div class="form-group">
                                                                <p><b>Whatsapp# *</b></p><label for="village"
                                                                    class="sr-only">Village</label><input type="number"
                                                                    name="Village" class="form-control" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><input type="button" name="next" class="next action-button"
                                        value="Submit" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php');

?>
