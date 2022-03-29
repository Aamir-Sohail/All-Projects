<?php include('../includes/header.php');?>

<div class="statbox widget box box-shadow layout-top-spacing">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Certificate Form</h4>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area layout-top-spacing">

        <div class="row" id="printableArea">

            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <p><b>Admission Class</b></p>
                    <label for="Admission class" class="sr-only">Admission Class</label>
                    <select class="form-control" id="PrintAdmCls" name="AdmiClass">
                        <option value="">--SELECT--</option>
                        <option value="1">PlayGroup</option>
                        <option value="2">Nursery</option>
                        <option value="3">Prep</option>
                        <option value="4">One</option>
                        <option value="5">Two</option>
                        <option value="6">Three</option>
                        <option value="7">Four</option>
                        <option value="8">Five</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <p><b>Section</b></p>
                    <label for="Section" class="sr-only">Section</label>
                    <select class="form-control" id="PrintAdmSection" name="Section">
                        <option value="">--SELECT--</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <p><b>Name</b></p>
                    <label for="Name" class="sr-only">Name</label>
                    <select class="form-control" id="PrintAdmName">
                        <option value="">--SELECT--</option>
                        <option value="1">Mazhar Hussain</option>
                        <option value="2">Muhammad Aqib</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="text-right">
            <!-- <input type="submit" value="Print" onclick="printDiv('printableArea')" class="mt-4 btn btn-primary"> -->
            <button class="mt-4 btn btn-primary" onclick="ShowValue()"><i class="fa fa-print" aria-hidden="true">
                    Print</i></button>
        </div>

        <!-- <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br> -->



    </div>
</div>





<!-- dont remove this is for generating pdf -->
<div class="row" style="opacity:0">
    <div class="PrintBirthCertificate">

    <!-- dont remove style -->
        <style>
            .pdf {
                /* border: 1px solid red; */
                background-color: white;
                padding: 0.9em 0em;
                width: 100%;
                margin: 0 auto;
                /* width: 28cm; */
                height: 29.7cm;
                /* margin: 30mm 45mm 30mm 45mm; */
                color: #000;
            }

            .row {
                margin: 0;
            }

            .padding {
                padding: 0 5em 0.5em;
            }

            .border-btm {
                border-bottom: 2px solid dodgerblue;
            }

            .pdf p {
                color: #000;
            }
        </style>

        <div class="pdf px-0" id="certificate">

            <div class="mb-5 padding border-btm">
                <div class="row align-items-center">
                    <img src="http://localhost:8000/./assets/img/ESEFlogosmall3.png" class="navbar-logo " alt="logo">
                    <div class="col-10  text-center">
                        <h2>Govt. GCS School, Malakand</h2>
                    </div>
                </div>
                <div class="text-center col-10">
                    <span class="display-6">ph: +923139265304</span>
                    <span class="display-6">ph: +923139265304</span>
                    <span class="display-6">ph: +923139265304</span>
                </div>
            </div>

            <div class="text-right mb-5 padding pb-0">
                <span class="pr-5">
                    Date: <?php echo date("d-m-Y"); ?>
                </span>
            </div>

            <h1 class="h2 text-center fw-bold mb-5"><u>To whom it May Concern</u></h1>

            <div class="pdfdetail padding">
                <p class="mb-5">
                    This is to certify that
                    <strong>Mr/Mrs <span id="name"></span> </strong>
                    is a regular student of Govt. GCS School, Malakand . Currently 
                    he/she is a student of Class <strong id="class"> </strong> section 
                    <strong id="section">  </strong> . <br>
                    This certificate is issued for the purpose of Birth Certificate for Nadra.
                </p>

                <div class="pr-5 text-right">

                    <strong>Principal </strong> <br>
                    (Signature & Stamp)
                </div>
            </div>
        </div>
    </div>

</div>

<!-- footer -->
<?php include('../includes/footer.php');?>

<!-- js for generating pdf and accessing html content of upper row  -->
<script>
    // return select option value function
    function getSelectedOption(sel) {
        let select = document.getElementById(sel);
        let opt;
        for (var i = 0, len = select.options.length; i < len; i++) {
            opt = select.options[i];
            if (opt.selected === true) {
                break;
            }
        }
        
        if(opt.text == '--SELECT--')
            return "empty";
        else
            return opt.text;
        // let opt = select.options[select.selectedIndex].textContent;
    }



    function ShowValue() {
        let cls = getSelectedOption('PrintAdmCls');
        let section = getSelectedOption('PrintAdmSection');
        let name = getSelectedOption('PrintAdmName');
        $('#name').html(name);
        $('#class').html(cls);
        $('#section').html(section);

        var printContents = document.querySelector('.PrintBirthCertificate').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>