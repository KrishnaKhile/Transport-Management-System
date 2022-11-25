<?php $this->extend('trpview/layout/index');
$this->Section('title');
?>
Assign Quotation to Consignor
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
        <h1>Assign Quotation</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item">Assign Quotation</li>
          </ol>
        </nav>

      </div><!-- End Page Title -->
      <section class="section dashboard">


        <div class="col-lg-12" style="padding: 0px !important; ">


          <div class="card mb-4">
            <div class="card-header" style="background-color:#012970; color: #fff;">
              <i class="fas fa-table me-1"></i>
              -- Assign Quotation --
            </div>
            <div style="background-color:#f0f0f0;">
              <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" border:1px solid lightgray; padding: 10px; ">
                <div class="row">
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 mt-3">
                    <label for="inputText" class="col-sm-8 col-form-label">Select Consignor:</label>
                    <select class="form-select form-control fw-semibold " id="snor" aria-label="Default select example">
                      <option selected="" disabled>Select Consignor</option>
                    </select>
                    <span id="error_nor" class="text-danger ms-3"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 mt-3">
                    <label for="inputText" class="col-sm-8 col-form-label">Mobile:</label><input type="number" id="mobile" class="form-control" style="text-transform: capitalize;" disabled>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 mt-3">
                    <label for="inputText" class="col-sm-8 col-form-label">Address:</label><input type="text" id="add" class="form-control" style="text-transform: capitalize;" disabled>
                  </div>
                </div>
                <div class="row" style="margin-top:1px;">
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <label for="inputText" class="col-sm-8 col-form-label">Select Quotation :</label>
                    <select class="form-select form-control fw-semibold " id="squot" aria-label="Default select example">
                      <option selected="" disabled>Select Quotation</option>
                    </select>
                    <span id="error_quot" class="text-danger ms-3"></span>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <label for="inputText" class="col-sm-8 col-form-label"> &nbsp;</label>
                    <input type="button" id="btnSave" class="btn btn-primary " onclick="saveData();" value="Save" style="width:50%;">
                  </div>

                </div>
              </div>
            </div>
            <div class="row" style="margin-top:20px;">


              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <hr>
                <!-- <table id="tbl" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width:0px;display:none1;">ID</th>
                        <th>City</th>
                        <th>District</th>
                        <th width="50" class="editRecord text-center">Edit</th>
                        <th width="50" class="text-center">delete</th>
                      </tr>
                    </thead> -->
                <div class="table-responsive">
                  <table id="tbl" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th style="width:0px;display:none1;">ID</th>
                        <th>Consignor</th>
                        <th>City</th>
                        <th>Quotation name</th>
                        <th>Assign By</th>
                        <!-- <th width="50" class="text-center">Edit</th> -->
                        <!-- <th width="50" class="text-center">delete</th> -->
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th style="width:0px;display:none1;">ID</th>
                        <th>Consignor</th>
                        <th>City</th>
                        <th>Quotation name</th>
                        <th>Assign By</th>
                        <!-- <th width="50" class="text-center">Edit</th> -->
                        <!-- <th width="50" class="text-center">delete</th> -->
                      </tr>
                    </tfoot>
                    <tbody>

                      <?php if (!empty($records)) : ?>
                        <?php foreach ($records as $row) : ?>

                          <tr>
                            <td><?= $row->nor_id; ?></td>
                            <td><?= $row->nor_name; ?></td>
                            <td><?= $row->city; ?></td>
                            <td><?= $row->quot_name; ?></td>
                            <td><?= $row->name; ?></td>
                            <!-- <td class="editRecord text-center btn-edit "><i class="bi bi-pencil-square"></i></td> -->
                            <!-- <td class="text-center btn-delete" onclick="delrowid(<?= 1; //$row->d_id; ?>);"><i class="bi bi-archive-fill"></i></td> -->
                          </tr>

                        <?php endforeach; ?>
                      <?php else : ?>
                        <h1>Sorry! No records found</h1>
                      <?php endif; ?>


                    <tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>


      </section>
      
    </main><!-- End #main -->

    <?php $this->endsection(); ?>
    <?php
    $this->section('scripts');
    ?>
    <script>
      $(document).ready(function() {
        myDataTable = $('#tbl').DataTable({});
        $("#master").removeClass("collapsed");
        $("#forms-nav").toggleClass('show');
        $("#aquot").toggleClass('active');
        loadData();
        $("#snor").focus();
      });

      $(document).ready(function () {

        $('#snor').change(function(){
          var nor = $(this).val();
          // console.log(nor);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/quotation/conData",
            data: {
              'norid':nor,
            },
            success: function (response) {
              // console.log(response.nordata);
              $('#mobile').val(response.nordata['nor_mobile']);
                $('#add').val(response.nordata['city']);
            }
          });


        })
      });





      function saveData(){
        if ($.trim($('#snor').val()) == 0) {
          error_nor = "Please Select Consignor";
          $('#error_nor').text(error_nor);
          $('#snor').focus();
          return;
        } else {
          error_nor = "";
          $('#error_nor').text(error_nor);
        }

        if ($.trim($('#squot').val()) == 0) {
          error_quot = "Please Select Quotation";
          $('#error_quot').text(error_quot);
          $('#squot').focus();
          return;
        } else {
          error_quot = "";
          $('#error_quot').text(error_quot);
        }

        norname = $('#snor').val();
        quotname = $('#squot').val();
        // console.log(norname);
        // console.log(quotname);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/quotation/assignQuotation",
            data: {
              'norname':norname,
              'quotname':quotname,
            },
            success: function (response) {
              iziToast.success({
                    position: 'topRight',
                    title: 'OK',
                    message: response.status
                  });
                  // blankControls();
                  // $("#snor").empty();
                  // loadData();
                  setInterval('location.reload()', 500);
                  $("#snor").focus();
            }
          });
      }

//       $('.editRecord').bind('click', editThis);

// function editThis(jhanda) {
//   rowIndex = $(this).parent().index();
//   colIndex = $(this).index();
//   globalrowid = $(this).closest('tr').children('td:eq(0)').text();
//   consignor = $(this).closest('tr').children('td:eq(1)').text();
//   // taluka = $(this).closest('tr').children('td:eq(2)').text();
//   quot = $(this).closest('tr').children('td:eq(3)').text();
//   // pin = $(this).closest('tr').children('td:eq(4)').text();
//   // alert(taluka);
//   $("#snor").val(consignor);
//   $("#squot").val(quot);
//   // $("#edist").val(dist);
//   // $("#epin").val(pin);
//   $("#snor").focus();
//   $("#btnSave").val("Update");
// }

function loadData(){
  $.ajax({
    method: "GET",
    url: "<?php echo base_url() ?>/loadConQuot",
    success: function (response) {
            // console.log(response.consignor);
            if (response) {
              $.each(response.consignor, function(key, value) {
                $('#snor').append(
                  '<option value='+value['nor_id']+'>' + value['nor_name'] + '</option>'
                );
              });
              $.each(response.quotation, function(key, value) {
                $('#squot').append(
                  '<option value='+value['id']+'>' + value['quot_name'] + '</option>'
                );
              });
              // console.log(response.quotrecords);
              // alertPopup('Records loaded...', 4000);
            }
    }
  });
}



    </script>


    <?php $this->endsection(); ?>