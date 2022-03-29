</div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo ROOTURL ?>assets/js/libs/jquery-3.1.1.min.js"></script>
<!-- mask  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?php echo ROOTURL ?>bootstrap/js/popper.min.js"></script>
<script src="<?php echo ROOTURL ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo ROOTURL ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo ROOTURL ?>assets/js/app.js"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="<?php echo ROOTURL ?>assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
            <script>

                $(document).ready( function () {
                    $('#multi-column-ordering').DataTable();
                } );
            </script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?php echo ROOTURL ?>plugins/apex/apexcharts.min.js"></script>
<script src="<?php echo ROOTURL ?>assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<script>
    $(".t-text").mask("00-00-0000");
    $(".Form_B").mask("00000-0000000-0");
    $(".Mobile").mask("0000-0000000");
</script>

</body>

</html>