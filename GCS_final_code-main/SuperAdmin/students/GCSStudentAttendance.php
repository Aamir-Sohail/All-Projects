<?php include('../includes/header.php'); ?>

<div class="col-lg-12 col-12 layout-top-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Report Attendance</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <div class="row">

                <div class="col-md-4">
                    <label for="School Code">School </label>
                    <select class="form-control">
                        <option>--SELECT--</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
                <div class="col-md-4 mb-xl-0 mb-2">
                    <p><b>From Date : </b></p>
                    <input type="date" name="txt" class="form-control" required="">
                </div>
                <div class="col-md-4 mb-xl-0 mb-2">
                    <p><b>To Date : </b></p>
                    <input type="date" name="txt" class="form-control" required="">
                </div>

                <div class="col-12 text-right">
                    <input type="submit" name="txt" class="mt-4 btn btn-primary">
                </div>

            </div>
</div>

</div>

<?php include('../includes/footer.php'); ?>