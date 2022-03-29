
<div class="layout-top-spacing mx-0 op-hidden" id="toremovebooks" style="width:100%">
 
    <div class="statbox widget box box-shadow pt-1 py-4">

        <form id="msform">
            
            <div class="col-md-12 col-12">
                <div class="csvf_table" class="col-md-12 col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th style="width:160px">Class</th>
                                    <th>Books Recived</th>
                                    <th>Book Distributed</th>
                                    <th>Left Over</th>
                                    <th>Physical Count</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <tr>
                                    <td>Pre-Nursery</td>
                                    <td><input type="number" name="BooksRecived_PreNursery" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="BooksDistributed_PreNursery" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="LeftOver_PreNursery" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="PhysicalCount_PreNursery" class="form-control"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td>Nursery</td>
                                    <td><input type="number" name="BooksRecived_Nursery" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="BooksDistributed_Nursery" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="LeftOver_Nursery" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="PhysicalCount_Nursery" class="form-control"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td>One</td>
                                    <td><input type="number" name="BooksRecived_One" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="BooksDistributed_One" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="LeftOver_One" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="PhysicalCount_One" class="form-control"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td>Two</td>
                                    <td><input type="number" name="BooksRecived_Two" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="BooksDistributed_Two" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="LeftOver_Two" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="PhysicalCount_Two" class="form-control"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td>Three</td>
                                    <td><input type="number" name="BooksRecived_Three" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="BooksDistributed_Three" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="LeftOver_Three" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="PhysicalCount_Three" class="form-control"
                                            required=""></td>
                                </tr>
                                <tr>
                                    <td>Four</td>
                                    <td><input type="number" name="BooksRecived_Four" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="BooksDistributed_Four" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="LeftOver_Four" class="form-control"
                                            required=""></td>
                                    <td><input type="number" name="PhysicalCount_Four" class="form-control"
                                            required=""></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="col-12 text-right">
                                <input type="hidden" name="ReportType" value="Books">
                            <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
                    
        </form>  
        
    </div>
   
</div>
<script>
$("#msform").on("submit", function(event) {
    event.preventDefault();
    let datee = "<?php echo htmlspecialchars($_GET['date']);?>";
    let SchoolCode = <?php echo htmlspecialchars($_GET['SchoolCode']);?>;
    $(':input[type="submit"]').prop('disabled', true);
    $.ajax({
        type: "POST",
        url: "./includes/process.php",
        data: "MODE=report&SchoolCode="+SchoolCode+"&date="+datee+"&"+$("#msform").serialize(),
        success: function(data) {
                if (data === '1') {
                alert("Report Added SuccessFully");
                window.location.reload(); 
            }else{
                    alert("Something Went Wrong!");
            }
        }
    });
})
</script>