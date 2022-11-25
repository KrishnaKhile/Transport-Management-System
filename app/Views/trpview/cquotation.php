<?php $this->extend('trpview/layout/index');
$this->Section('title');
?>
quotation
<?php
$this->endSection(); ?>



<?php $this->section('profilename'); ?>

<?php if ($userdata->profile_pic != '') : ?>
    <img src='<?= $userdata->profile_pic; ?>' alt='Profile' class='rounded-circle'>
<?php else : ?>
    <img src='<?php echo base_url() ?>/assets/img/profile-preview.png' alt='Profile' class='rounded-circle'>
<?php endif; ?>
<span class="d-none d-md-block dropdown-toggle ps-2"><?= ucfirst($userdata->name); ?></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
        <h6><?= ucfirst($userdata->name); ?></h6>
        <span><?= $userdata->post; ?></span>
        <?php $this->endSection(); ?>








        <?php
        $this->section('content');
        ?>

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Quotation</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a tabindex="-1" href="<?php echo base_url() ?>/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item">Master</li>
                        <li class="breadcrumb-item">Quotation</li>
                    </ol>
                </nav>

            </div><!-- End Page Title -->
            <section class="section dashboard">


                <div class="col-lg-12" style="padding: 0px !important; ">


                    <div class="card mb-4">
                        <div class="card-header" style="background-color:#012970; color: #fff;">
                            <i class="fas fa-table me-1"></i>
                            -- Create Quotation --
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#f0f0f0; border:1px solid lightgray; padding: 10px; ">

                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 mt-3">
                                <label for="inputText" class="col-sm-8 col-form-label">Select Quotation Name:
                                    <a type="button" class="btn btn-light" style="padding: 0px !important;" onclick="$('.addquotname').focus();" data-bs-toggle="modal" data-bs-target="#quotname"><i class="bi bi-file-plus h1"></i></a>
                                </label>
                                <select class="form-select form-control fw-semibold quotselect" id="quotnamev" aria-label="Default select example">
                                    <option value="0">Select Quotation</option>

                                </select>
                                <b><span id="error_select" class="text-danger ms-3"></span></b>
                            </div>

                            <div class="row" style="margin-top:20px;">


                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <hr>

                                    <div class="table-responsive">
                                        <table id="tblquot" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:0px;display:none1;">Sr.No.</th>
                                                    <th>Destination</th>
                                                    <th>Taluka</th>
                                                    <th>Dist</th>
                                                    <th>Rs/Box</th>
                                                    <th>Rs/Kg</th>
                                                    <th style="display:none;">Flag</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <input type="button" id="quotSave" class="btn btn-primary" onclick="saveData();" value="Save Quotation" style="width:50%; float:right; border: 3px solid #0b5ed7;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
            <div class="modal fade" id="quotname">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Quotation Name</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputText" class="col-form-label"><b>Create Quotation Name :</b></label><span id="error_name" class="text-danger ms-3"></span>
                                <input type="text" class="form-control fw-semibold addquotname" placeholder="Enter Quotation Name">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary quotsave">Save</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>


                    </div>
                </div>
            </div>

            <!-- <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="bi bi-x-circle" style="color:red;"></i> delete City</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure <br /> delete this record..?</p>
            </div>
            <div class="modal-footer">
              <button type="button" id="yes" onclick="deleteRecord(globalrowid);" class="btn btn-danger" data-dismiss="modal">Yes</button>
              <button type="button" id="no" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div> -->

        </main><!-- End #main -->

        <?php $this->endsection(); ?>
        <?php
        $this->section('scripts');
        ?>
        <script>
            $(document).ready(function() {

                loadData();

                myDataTable = $('#tblquot').DataTable({

                });
                $("#master").removeClass("collapsed");
                $("#forms-nav").toggleClass('show');
                $("#cquot").toggleClass('active');

            });

            $(document).on('click', '.quotsave', function() {

                if ($.trim($('.addquotname').val()).length == 0) {
                    error_name = "Enter Quotation Name";
                    $('#error_name').text(error_name);
                    return;
                } else {
                    error_name = "";
                    $('#error_name').text(error_name);
                }

                quotName = $('.addquotname').val();

                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url() ?>/trpadmin/quotation/addQuotName",
                    data: {
                        'quot_name': quotName,
                    },
                    success: function(response) {
                        // console.log("hello");
                        if (response)
                        // alert(response.status);
                        {
                            if (response.status == 'Duplicate record found..') {
                                alertify.set('notifier', 'position', 'top-right');
                                alertify.error(response.status);
                            } else {

                                // setQoption(response['quotrecords']);
                                $('#quotname').modal('hide');
                                $('#quotname').find('input').val('');
                                alertify.set('notifier', 'position', 'top-right');
                                alertify.success(response.status);

                                $.each(response.quotrecords, function(key, value) {
                                    //  console.log(value['nee_name']);
                                    $('#quotnamev').append(
                                        '<option value="0">select Quotation</option>\
                                        <option value=' + value['id'] + '>' + value['quot_name'] + '</option>'


                                    );
                                    $("#quotnamev").destroy();
                                    $(".quotselect").focus();
                                });
                                blankControls();
                                // $("#ecity").focus();

                            }
                        }
                    }
                });
            });



            // function setQoption(quotrecords) {
            //     //  alert(JSON.stringify(records));

            //     //  setHeadings();
            //     //   $("#tblquot").find("tr:gt(0)").remove();
            //     $("#quotnamev").empty();
            //     var table = document.getElementById("quotnamev");
            //     // alert(noOfDays);
            //     for (i = 0; i < quotrecords.length; i++) {
            //         newRowIndex = table.element.length;
            //         row = table.insertRow(newRowIndex);


            //         var cell = row.insertCell(0);
            //         cell.innerHTML ="<option value="+ quotrecords[i].id +">"+ quotrecords[i].quot_name +"</option>";
            //         // cell.style.backgroundColor = "#F0F0F0";



            //     }

            //     $("#quotnamev").destroy();
            //     $(document).ready(function() {

            //     });
            // }

            function setTable(records) {
                //  alert(JSON.stringify(records));

                //  setHeadings();
                //   $("#tblquot").find("tr:gt(0)").remove();
                $("#tblquot").empty();
                var table = document.getElementById("tblquot");
                // alert(noOfDays);
                for (i = 0; i < records.length; i++) {
                    newRowIndex = table.rows.length;
                    row = table.insertRow(newRowIndex);


                    var cell = row.insertCell(0);
                    cell.innerHTML = i + 1;
                    // cell.style.backgroundColor = "#F0F0F0";

                    var cell = row.insertCell(1);
                    cell.innerHTML = records[i].city;
                    // cell.style.backgroundColor = "#F0F0F0";
                    // cell.style.display="none";
                    var cell = row.insertCell(2);
                    cell.innerHTML = records[i].taluka; //records[i].itemName;
                    //   cell.setAttribute("contentEditable", true);
                    // cell.style.backgroundColor = "#F0F0F0";

                    var cell = row.insertCell(3);
                    cell.innerHTML = records[i].dist;
                    // cell.style.backgroundColor = "#F0F0F0";
                    cell.setAttribute("type", "number");



                    var cell = row.insertCell(4);
                    cell.innerHTML = "<input type='number' min='0' placeholder='0.00' class='form-control fw-semibold rsbox'>";
                    //   cell.setAttribute("contentEditable", true);
                    // cell.setAttribute("contentEditable", true);
                    //   cell.style.display="none";

                    var cell = row.insertCell(5);
                    cell.innerHTML = "<input type='number' min='0' placeholder='0.00' class='form-control fw-semibold rskg'>";
                    //   cell.setAttribute("contentEditable", true);
                    //   cell.innerHTML = records[i].pp;
                    // cell.setAttribute("contentEditable", true); 
                    var cell = row.insertCell(6);
                    cell.innerHTML = records[i].d_id;
                    cell.style.display = "none";
                    //   var cell = row.insertCell(6);
                    //   cell.innerHTML = "<input type='checkbox' id='chkDelete' class='chk' style='width:20px;height:20px;' name='chkDelete'/>";

                }
                //   $(".clsBtnDelete").on('click', deleteKaro);

                myDataTable.destroy();
                $(document).ready(function() {
                    myDataTable = $('#tblquot').DataTable({
                        paging: false,
                        iDisplayLength: -1,
                        "tabIndex": -1,
                    });
                });
            }


            function loadData() {

                $.ajax({
                    method: "GET",
                    url: "<?php echo base_url() ?>/quotshowData",
                    success: function(response) {
                        // console.log(response.records);
                        if (response) {
                            // alert(JSON.stringify(data));
                            setTable(response['records']);
                            $.each(response.quotrecords, function(key, value) {
                                //  console.log(value['nee_name']);
                                $('#quotnamev').append(
                                    '<option value=' + value['id'] + '>' + value['quot_name'] + '</option>'


                                );
                                $(".quotselect").focus();

                            });
                            // console.log(response.quotrecords);
                            // alertPopup('Records loaded...', 4000);
                        }
                    }
                });
            }

            function storeTblValues() {
                var TableData = new Array();
                var i = 0;
                $('#tblquot tr').each(function(row, tr) {
                    if ($(tr).find('.rsbox').val() > 0 || $(tr).find('.rskg').val() > 0) {


                        TableData[i] = {
                            "rowid": $(tr).find('td:eq(6)').text(),
                            // "city":$(tr).find('td:eq(1)').text(),
                            "rsbox": $(tr).find('.rsbox').val(),
                            "rskg": $(tr).find('.rskg').val(),
                        }
                        i++;

                    }

                });
                // TableData.shift();  // NOT first row will be heading - so remove COZ its dataTable
                tblRowsCount = i;
                // alert(tblRowsCount);
                return TableData;
            }

            function saveData() {

                if ($.trim($('.quotselect').val()) == 0) {
                    error_select = "Please Select Quotation Name";
                    $('#error_select').text(error_select);
                    $(".quotselect").focus();
                    return;
                } else {
                    error_select = "";
                    $('#error_select').text(error_select);
                }
                var TableData;
                TableData = storeTblValues();
                TableData = JSON.stringify(TableData);
                alert(JSON.stringify(TableData));
                // return;
                quotid = parseFloat($(".quotselect").val());
                // alert(tblRowsCount);
                // return;
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url() ?>/trpadmin/quotation/saveQuotation",
                    data: {
                        'quotid': quotid,
                        'TableData': TableData,
                    },
                    success: function(response) {

                        blankControls();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                        $(".quotselect").empty();
                        $(".quotselect").focus();
                        loadData();

                    }
                });

            }
        </script>

        <!-- cell.setAttribute("data-toggle", "modal"); -->

        <?php $this->endsection(); ?>