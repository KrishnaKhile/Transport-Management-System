<?php $page_session = \config\Services::session(); ?>

<?php $this->extend('trpview/layout/index');
$this->Section('title');
?>
New Bilty
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
        <h1>Add Bilty</h1>

        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a tabindex="-1" href="dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Bilty</li>
            <li class="breadcrumb-item active">New Bilty</li>
          </ol>
        </nav>

      </div><!-- End Page Title -->
      <?php if (isset($validation)) : ?>
        <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
      <?php endif; ?>
      <section class="section dashboard">
        <div class="row">

          <div class="col-lg-12" style="padding: 0px !important; ">

            <div class="col-12">
              <div class="card mb-4" style="border: 2px solid #012970 ;">
                <div class="card-header" style="background-color:#012970; color: #fff;">

                  Add New Bilty
                </div>
                <!-- <form  id="biltyform" style="padding: 0px 8px 0px 8px !important;"> -->
                <div id="fbilty" style="padding: 0px 8px 0px 8px !important;">
                  <div class="row mt-3">
                    <div class="col-lg-4">
                      <div class="row ">
                        <label for="inputText" class="col-sm-4 col-form-label"><b>Bilty Number :</b></label>
                        <div class="col-sm-8">
                          <h3 style="color:red;"><b id="biltynumber"> <?= $biltynumber; ?></b></h3>
                        </div>

                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="row ">
                        <label for="inputText" class="col-sm-4 col-form-label"><b>Date :</b></label>
                        <div class="col-sm-8">
                          <input tabindex="0" type="date" id="cdate" class="form-control fw-semibold" disabled>
                        </div>

                      </div>
                    </div>
                    <div class="col-lg-4">
                      <!-- <div class="row ">
                        <label for="inputText" class="col-sm-4 col-form-label"><b>GSTIN :</b></label>
                        <div class="col-sm-8">
                          <input tabindex="-1" type="text" class="form-control fw-semibold">
                        </div>

                      </div> -->
                    </div>
                  </div>
                  <hr style="opacity: 1; margin: 7px;">
                  <div style="background-color:#f0f0f0">
                    <div class="row">
                      <!--Bilty Form -->
                      <div class="col-lg-4">
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label" style="padding-right: 0px !important;"><b>Consignor : </b><a type="button"  style="padding: 0px !important;" data-bs-toggle="modal" data-bs-target="#myModal"><img height="30px" src='<?php echo base_url() ?>/assets/img/icons8-add-96.png' alt='Profile' class='rounded-circle'></a></label>
                          <div class="col-sm-8">
                            <!-- <div class="mb-3"> -->
                            <select id="idd9" name="idd9" class="form-select form-control fw-semibold norlist" aria-label="Default select example" autofocus>
                              <option value="0" selected>Select Consignor</option>

                            </select>
                            <b><span id="error_nor" class="text-danger ms-3"></span></b>
                            <!-- </div> -->
                          </div>

                        </div>
                        <hr>
                        <!-- <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>C/O :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="text" class="form-control fw-semibold norco">
                          </div>

                        </div> -->
                        <!-- <hr> -->
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>GSTIN :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="text" id="gstinnor" class="form-control fw-semibold" disabled>
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Mobile No. :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" id="mobilenor" min="0" class="form-control fw-semibold" disabled>
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>PinCode :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" id="pinnor" min="0" class="form-control fw-semibold" disabled>
                          </div>

                        </div>

                      </div>
                      <div class="col-lg-4">
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label" style="padding-right: 0px !important;"><b>Consignee:</b><a type="button"  style="padding: 0px !important;" data-bs-toggle="modal" data-bs-target="#mModal"><img height="30px" src='<?php echo base_url() ?>/assets/img/icons8-add-96.png' alt='Profile' class='rounded-circle'></a></label>
                          <div class="col-sm-8">
                            <select id="id8" class="form-select form-control fw-semibold neelist" aria-label="Default select example">
                              <option value="0" selected>Select Consignee</option>

                            </select>
                            <b><span id="error_nee" class="text-danger ms-3"></span></b>
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>C/O :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="text" class="form-control fw-semibold neeco">
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>GSTIN :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="text" id="gstinnee" class="form-control fw-semibold" disabled>
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Mobile No. :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" id="mobilenee" min="0" class="form-control fw-semibold" disabled>
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>PinCode :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" id="pinnee" min="0" class="form-control fw-semibold" disabled>
                          </div>

                        </div>

                      </div>

                      <div class="col-lg-4">
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Invoice No. :</b></label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control fw-semibold invno" placeholder="Enter Invoice Number">
                          </div>
                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Invoice Date :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="date" class="form-control fw-semibold invdt">
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>E-Way Bill :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold ewb" placeholder="Enter E-way Bill Number">
                          </div>

                        </div>
                        <hr>
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Invoice Amount :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold invamt" placeholder="Enter Invoice Amount">
                          </div>

                        </div>
                        <hr>
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Distance :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold distance">
                          </div>

                        </div>
                        <hr>
                      </div>
                    </div>
                    <hr style="opacity: 1;margin: 7px;">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>From. :</b></label>
                          <div class="col-sm-8">
                            <select id="citynor" class="form-select form-control fw-semibold fromcity" aria-label="Default select example">
                              <option value="0">Select City</option>
                              <?php if (!empty($destlist)) : ?>
                                <?php foreach ($destlist as $user) : ?>
                                  <option value="<?= $user->d_id; ?>"><?= $user->city; ?></option>
                                <?php endforeach; ?>
                              <?php else : ?>
                                <h1>Sorry! No records found</h1>
                              <?php endif; ?>
                            </select>
                            <b><span id="error_fromcity" class="text-danger ms-3"></span></b>
                          </div>
                        </div>
                        <hr>
                      </div>
                      <div class="col-lg-4">
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>To.. :</b></label>
                          <div class="col-sm-8">
                            <select id="citynee" class="form-select form-control fw-semibold tocity" aria-label="Default select example">
                              <option value="0">Select City</option>
                              <?php if (!empty($destlist)) : ?>
                                <?php foreach ($destlist as $user) : ?>
                                  <option value="<?= $user->d_id; ?>"><?= $user->city; ?></option>
                                <?php endforeach; ?>
                              <?php else : ?>
                                <h1>Sorry! No records found</h1>
                              <?php endif; ?>
                            </select>
                            <b><span id="error_tocity" class="text-danger ms-3"></span></b>
                          </div>
                        </div>
                        <hr>
                      </div>
                      <div class="col-lg-4">
                        <div class="row ">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Mode of Payment :</b></label>
                          <div class="col-sm-8">
                            <select id="mopnor" class="form-select form-control fw-semibold mop" aria-label="Default select example">
                              <option value="0">Select Mode of Payment</option>
                              <?php if (!empty($moplist)) : ?>
                                <?php foreach ($moplist as $user) : ?>
                                  <option value="<?= $user->id; ?>"><?= $user->mode; ?></option>
                                <?php endforeach; ?>
                              <?php else : ?>
                                <h1>Sorry! No records found</h1>
                              <?php endif; ?>
                            </select>
                            <b><span id="error_mop" class="text-danger ms-3"></span></b>
                          </div>
                        </div>
                        <hr>
                      </div>
                    </div>
                  </div>
                  <hr style="opacity: 1;margin: 7px;">
                  <div style="background-color:#f0f0f0">
                    <div class="col-lg-8">
                      <div class="row ">
                        <label for="inputText" class="col-sm-4 col-form-label"><b>Delivery Office :</b></label>
                        <div class="col-sm-8">
                          <select tabindex="-1" class="form-select form-control fw-semibold dlyoffice" aria-label="Default select example">
                            <option selected>Select Delivery Office</option>
                            <?php if (!empty($dlyofficelist)) : ?>
                              <?php foreach ($dlyofficelist as $user) : ?>
                                <option value="<?= $user->id; ?>"><?= $user->name; ?></option>
                              <?php endforeach; ?>
                            <?php else : ?>
                              <option></option>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr style="opacity: 1;margin: 7px;">
                  <h1 class="fw-bold"><u> Goods</u></h1>


                  <b><span id="error_row" class="text-danger ms-3"></span></b>
                  <div class="table-responsive">
                    <table width="100%" id="tbl1">
                      <thead class="ctr">
                        <tr class="cth">
                          <th>S.N</th>
                          <th>QTY.</th>
                          <th>Package.Type </th>
                          <th>PKG Category</th>
                          <th>Freight Type</th>
                          <th>Pkg/Weight</th>
                          <th>Rate/Unit</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <hr style="opacity: 1;margin: 7px;">
                  <div style="background-color:#f0f0f0">
                    <h1 class="fw-bold"><u> Cost Head</u></h1>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Freight Charges :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold frcharges">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Hamali :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold hamali">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Docs Charges :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold doccharges" value="10">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Total QTY. :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Door Delivery Charges :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold ddcharges">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Other Charges :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold othercharges">
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>GST :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Total Freight :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="number" min="0" class="form-control fw-semibold totalfr" disabled>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="row">
                          <label for="inputText" class="col-sm-4 col-form-label"><b>Remark :</b></label>
                          <div class="col-sm-8">
                            <input tabindex="-1" type="text" class="form-control fw-semibold remark">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                  </div>
                  <center>
                    <input class="form-check-input" tabindex="-1" type="checkbox" value="" id="printChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Print
                    </label>
                    <input type="button" class="btn btn-primary addbilty fw-bold" id="btnSave" style="height:48px; width:120px;" onclick="saveData();" value="Save">
                    <button type="reset" class="btn btn-secondary" style="height:48px; width:120px;" onclick="blankControls();">Reset</button>
                  </center>
                  <hr>
                </div>
                <!-- </form> -->

              </div>
            </div>
          </div><!-- End Reports -->
        </div>
        </div>
      </section>

      <div class="modal fade" id="mModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Consignee Details</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>Consignee Name :</b></label><span id="error_neename" class="text-danger ms-3"></span>
                <input type="text" class="form-control fw-semibold neename" placeholder="Enter Consignor Name">
              </div>

              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>Short Code :</b></label>
                <input type="text" class="form-control fw-semibold neeshort" placeholder="Enter  Short Code">
              </div>
              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>Email :</b></label>
                <input type="email" class="form-control fw-semibold neeemail" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>Contact No. :</b></label><span id="error_neemobile" class="text-danger ms-3"></span>
                <input type="text" class="form-control fw-semibold neemobile" placeholder="Enter  Contact No.">
              </div>
              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>City :</b></label>
                <select id="id2" name="name2" class="form-select fw-semibold neecity" aria-label="Default select example">
                  <option value="0">Select City</option>
                  <?php if (!empty($destlist)) : ?>
                    <?php foreach ($destlist as $user) : ?>
                      <option value="<?= $user->d_id; ?>"><?= $user->city; ?></option>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <h1>Sorry! No records found</h1>
                  <?php endif; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>State :</b></label>
                <input type="text" class="form-control fw-semibold neestate" placeholder="Enter  State">
              </div>
              <div class="form-group">
                <label for="inputText" class="col-form-label"><b>PinCode :</b></label>
                <input type="number" min="0" class="form-control fw-semibold neepin" placeholder="Enter Pincode">
              </div>


            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary neesave">Save</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

    </main><!-- End #main -->

    <?php $this->endsection(); ?>
    <?php
    $this->section('scripts');
    ?>
    <script>
      $(document).ready(function() {
        $('.norlist').change(function() {
          var nor = $(this).val();
          // console.log(nor);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/quotation/conData",
            data: {
              'norid': nor,
            },
            success: function(response) {
              $('#mobilenor').val(response.nordata['nor_mobile']);
              $('#citynor').val(response.nordata['nor_city']);
              $('#pinnor').val(response.nordata['nor_pincode']);
              $('#mopnor').val(response.nordata['nor_payment_type']);
              $('#biltynumber').html(response.biltynumber);
              console.log(response.biltynumber);
            }
          });
        })
      });


      $(document).ready(function() {

        $('.neelist').change(function() {
          let nee = $(this).val();

          console.log(nee);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/quotation/neeData",
            data: {
              'neeid': nee,
            },
            success: function(response) {
              $('#mobilenee').val(response.needata['nee_mobile']);
              $('#citynee').val(response.needata['nee_city']);
              $('#pinnee').val(response.needata['nee_pincode']);
              $('#biltynumber').html(response.biltynumber);
              console.log(response.biltynumber);
            }
          });
        })

        $('.qty1').change(function() {
          let nor = $('.norlist').val();
          let pickup = $('#citynor').val();
          let citynee = $(this).val();

          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/quotation/getQuotdata",
            data: {
              'nor': nor,
              'pickup': pickup,
              'citynee': citynee,
            },
            success: function(response) {
              console.log(response);
            }
          });

        })
      });

      // $('body').on('keydown', 'input, select', function(e) {
      //     if (e.key === "Enter") {
      //         var self = $(this), main = self.parents('main:eq(0)'), focusable, next;
      //         focusable = main.find('input,a,select,button,textarea').filter(':visible');
      //         next = focusable.eq(focusable.index(this)+1);
      //         if (next.length) {
      //             next.focus();
      //         } else {
      //           main.submit();
      //         }
      //         return false;
      //     }
      // });
      $(document).on('click', '.row-add', function() {
        $("#tbl1").find("tr:last").find('.qty1').focus();
      });


      $("button.table-add").on("click", addRow);
      var sn = 1;

    

      function addRow() {
        var table = document.getElementById("tbl1");
        newRowIndex = table.rows.length;
        row = table.insertRow(newRowIndex);

        var cell = row.insertCell(0);
        cell.innerHTML = parseInt(sn++);
        // cell.innerHTML = "<input type='number' value=''>";
        cell.style.backgroundColor = "#F0F0F0";
        cell.className = "fw-bold rowindex";

        // var cell = row.insertCell(1);
        // cell.innerHTML = "";
        // cell.style.display = "none1";

        var cell = row.insertCell(1);
        cell.innerHTML = "<input type='number' min='0' id='myTextField' class='qty1 form-control fw-semibold'>";
        cell.contentEditable = "false";
        // cell.className = "qty1";

        var cell = row.insertCell(2);
        cell.innerHTML = "<select class='form-select form-control pkg1' onchange='quot()' aria-label='Default select example'>\
                                  <option value='0'>Select PKG</option>\
                                      <?php if (!empty($pkglist)) : ?>\
                                        <?php foreach ($pkglist as $user) :  ?>\
                                          <option value='<?= $user->pkg_id; ?>'><?= $user->pkg_type; ?></option>\
                                         <?php endforeach;  ?>\
                                      <?php else : ?>\
                                         <option value='0'>No package found</option>\
                                       <?php endif; ?>'</select>";
        // cell.contentEditable = "false";
        // cell.className = "pkg1";

        var cell = row.insertCell(3);
        cell.innerHTML = "<input type='text' min='0'  class='form-control fw-semibold pkgc'>";
        // cell.contentEditable = "true";
        // cell.className = "pkgc";

        var cell = row.insertCell(4);
        cell.innerHTML = "<select name='ftype[]' class='form-select form-control frtype' aria-label='Default select example'>\
        <option value='0'>Select Freight Type</option>\
                                                   <?php if (!empty($freighttypelist)) : ?>\
                                     <?php foreach ($freighttypelist as $user) : ?>\
                                        <option value='<?= $user->id; ?>'><?= $user->fr_type; ?></option>\
                                      <?php endforeach; ?>\
                                         <?php else : ?>\
                                      <option value='0'>No Freight type found</option>\
                                     <?php endif; ?>\
                                          </select>";
        // cell.className = "frtype";
        // cell.contentEditable = "true";

        var cell = row.insertCell(5);
        cell.innerHTML = "<input type='number' min='0' class='form-control fw-semibold pkgweight'>";
        // cell.className = "pkgweight";
        // cell.contentEditable = "true";

        var cell = row.insertCell(6);
        cell.innerHTML = "<input type='number' min='0' class='form-control fw-semibold rate1'>";
        // cell.className = "rate1";
        // cell.contentEditable = "true";

       

       

        var cell = row.insertCell(7);
        cell.innerHTML = "<button tabindex='0' class='btn row-add' style='color:lightgray;' onclick='addRow();'> <i class='bi bi-file-plus h1'></i></button>";
        cell.style.textAlign = "center";

        var cell = row.insertCell(8);
        cell.innerHTML = "<a class='row-remove' style='color:lightgray;'> <i class='bi bi-file-minus h1'></i></a>";
        cell.style.textAlign = "center";
        // cell.textAlign="center";
        if (sn == 2) ///remove row not required in first row
        {
          cell.innerHTML = "";
        }



        $(".row-add").off();
        $(".row-add").on('mouseover focus', function() {
          $(this).css("color", "green");
        });
        $(".row-add").on('mouseout blur', function() {
          $(this).css("color", "lightgrey");
        });

        $(".row-remove").off();
        $(".row-remove").on('mouseover focus', function() {
          $(this).css("color", "red");
        });
        $(".row-remove").on('mouseout blur', function() {
          $(this).css("color", "lightgrey");
        });

        //$(".row-pp").off();
        // $(".row-pp").on('mouseover focus', function() {
        //   $(this).css("color", "blue");
        // });
        // $(".row-pp").on('mouseout blur', function() {
        //   $(this).css("color", "lightgrey");
        // });

        // $(".clsQty, .clsRate").off();
        // $('.clsQty, .clsRate').on('keyup', doRowTotal);


        $('.row-remove').on('click', removeRow);
        // $('.row-pp').on('click', checkQuotation);

        $("#tbl1").scrollLeft(0);
        $("#tbl1").scrollTop($("#tbl1").prop("scrollHeight"));
        // $("#tbl1").find("tr:last").find('.qty1').focus();

        // $( ".clsItem" ).unbind();
        // bindItem();

        ///////Following function to add select TD text on FOCUS
        $("#tbl1 tr td").on("focus", function() {
          // alert($(this).text());
          // var range, selection;
          // if (document.body.createTextRange) {
          //   range = document.body.createTextRange();
          //   range.moveToElementText(this);
          //   range.select();
          // } else if (window.getSelection) {
          //   selection = window.getSelection();
          //   range = document.createRange();
          //   range.selectNodeContents(this);
          //   selection.removeAllRanges();
          //   selection.addRange(range);
          // }
        });

        resetSerialNo();

      }

       function quot(){
        var rowIndex = $(tr).parent().closest('tr');
        var col1=rowIndex.find('td').find(".qty1").val();
					// rowIndex.find(".qty1").val("56");
					// rowIndex.find(".pkgc").val("Hello");
          console.log(col1);
          console.log(rowIndex);
      }

      function removeRow() {
        var rowIndex = $(this).parent().parent().index();
        $("#tbl1").find("tr:eq(" + rowIndex + ")").remove();
        resetSerialNo();
        // doAmtTotal();
        // calcBalNow();
      }

      function resetSerialNo() {
        $("#tbl1 tr").each(function(i) {
          $(this).find("td:eq(0)").text(i);
        });
      }

      function doAmtTotal() {
        var amtTotal = 0;
        // var discountTotal=0;
        // var pretaxTotal=0;

        $("#tbl1").find(".qty1").each(function(i) {
          if (isNaN(parseFloat($(this).find("td:eq(5)").text())) == false) {
            amtTotal += parseFloat($(this).find("td:eq(5)").text());
            // discountTotal += parseFloat( $(this).find("td:eq(7)").text() );
            // pretaxTotal += parseFloat( $(this).find("td:eq(8)").text() );

            netTotal += parseFloat($(this).find("td:eq(15)").text());

          }
        });
        $("#txtNetAmt").val(Math.round(netTotal).toFixed(2));

      }

      function calcBalNow() {
        if ($("#txtAmtPaid").val() !== "") {
          $("#txtBalance").val((parseFloat($("#txtNetAmt").val()) - parseFloat($("#txtAmtPaid").val())).toFixed(2));
        } else {
          $("#txtBalance").val(parseFloat($("#txtNetAmt").val()) - 0);
        }
      }

      // $(Document).ready(function() {
      var tblRowsCount = 0;

      function storeTblValuesItems() {
        var TableData = new Array();
        var i = 0;
        $('#tbl1 tr').each(function(row, tr) {
          // alert($(tr).find('.qty1').val());
          if ($(tr).find('.qty1').val() > 0) {

            TableData[i] = {
              
              "qty1": $(tr).find('.qty1').val(),
              "pkg1": $(tr).find('.pkg1').val(),
              "pkgc": $(tr).find('.pkgc').val(),
              "rate1": $(tr).find('.rate1').val(),
              "pkgweight": $(tr).find('.pkgweight').val(),
              "frtype": $(tr).find('.frtype').val(),
            }
            i++;

          }
          else{
            iziToast.warning({
                    position: 'topRight',
                    title: 'Warning',
                    message: 'Please enter Qtantity'
                  });
          }
        });
        tblRowsCount = i;

        return TableData;
      }


      function saveData() {

        var TableDataItems;
        TableDataItems = storeTblValuesItems();
        TableDataItems = JSON.stringify(TableDataItems);
        nor = parseFloat($(".norlist").val());
        if (nor == 0) {
          error_nor = "Please enter Consignor";
          $('#error_nor').text(error_nor);
          $('.norlist').focus();
          return;
        } else {
          error_nor = "";
          $('#error_nor').text(error_nor);
        }

        nee = parseFloat($(".neelist").val());
        if (nee == 0) {
          error_nee = "Please enter Consignor";
          $('#error_nee').text(error_nee);
          $('.neelist').focus();
          return;
        } else {
          error_nee = "";
          $('#error_nee').text(error_nee);
        }

        fromcity = parseFloat($(".fromcity").val());
        if (fromcity == 0) {
          error_fromcity = "Please enter Consignor";
          $('#error_fromcity').text(error_fromcity);
          $('.fromcity').focus();
          return;
        } else {
          error_fromcity = "";
          $('#error_fromcity').text(error_fromcity);
        }
        tocity = parseFloat($(".tocity").val());
        if (tocity == 0) {
          error_tocity = "Please enter Consignor";
          $('#error_tocity').text(error_tocity);
          $('.tocity').focus();
          return;
        } else {
          error_tocity = "";
          $('#error_tocity').text(error_tocity);
        }
        mop = parseFloat($(".mop").val());
        if (mop == 0) {
          error_mop = "Please enter Consignor";
          $('#error_mop').text(error_mop);
          $('.mop').focus();
          return;
        } else {
          error_mop = "";
          $('#error_mop').text(error_mop);
        }

        if (tblRowsCount == 0) {
          error_row = "Please Enter Goods.";
          $('#error_row').text(error_row);
          $('.dlyoffice').focus();
          return;
        } else {
          error_row = "";
          $('#error_row').text(error_row);
        }

        biltydate = $("#cdate").val().trim();


        // norco = $(".norco").val().trim();
        neeco = $(".neeco").val().trim();
        invno = parseFloat($(".invno").val());
        invdt = $(".invdt").val().trim();
        ewb = $(".ewb").val().trim();
        invamt = parseFloat($(".invamt").val());
        distance = parseFloat($(".distance").val());
        dlyoffice = parseFloat($(".dlyoffice").val());
        frcharges = parseFloat($(".frcharges").val());
        hamali = parseFloat($(".hamali").val());
        doccharges = parseFloat($(".doccharges").val());
        ddcharges = parseFloat($(".ddcharges").val());
        // entby = $(".entby").val().trim();
        othercharges = parseFloat($(".othercharges").val());
        totalfr = parseFloat($(".totalfr").val());
        remark = parseFloat($(".remark").val());

        biltyprint = $("#printChecked").is(':checked');


        if ($("#btnSave").val() == "Save") {

          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/addBilty",
            data: {
              'biltydate': biltydate,
              'nor': nor,
              // 'norco': norco,
              'nee': nee,
              'neeco': neeco,
              'invno': invno,
              'invdt': invdt,
              'ewb': ewb,
              'invamt': invamt,
              'distance': distance,
              'fromcity': fromcity,
              'tocity': tocity,
              'mop': mop,
              'dlyoffice': dlyoffice,
              'frcharges': frcharges,
              'hamali': hamali,
              'doccharges': doccharges,
              'ddcharges': ddcharges,
              // 'entby': entby,
              'othercharges': othercharges,
              'totalfr': totalfr,
              'remark': remark,
              'TableDataItems': TableDataItems,
              'biltyprint': biltyprint,
            },

            success: function(response) {
              console.log(response.biltyprint);
              console.log(response.status);
              if (response) {
                if (response.biltyprint == 'true') {

                  blankControls();
                  $("#tbl1").find("tr:gt(0)").remove();
                  addRow();
                  $("#idd9").focus();
                  iziToast.success({
                    position: 'topRight',
                    title: 'OK',
                    message: response.status
                  });
                  $('#biltynumber').html(response.biltynumber);
                  $(".doccharges").val(10);
                } else if (response.biltyprint == 'false') {

                  blankControls();
                  $("#tbl1").find("tr:gt(0)").remove();
                  addRow();
                  $("#idd9").focus();

                  iziToast.warning({
                    position: 'topRight',
                    title: 'false',
                    message: response.status
                  });
                  $(".doccharges").val(10);
                }

              }



            },
          });
          // }

        }

      }
      // });

      $(Document).ready(function() {


        $("#biltya").removeClass("collapsed");
        $("#components-nav").toggleClass('show');
        $("#nbilty").toggleClass('active');

        var now = new Date();
        var month = (now.getMonth() + 1);
        var day = now.getDate();
        if (month < 10)
          month = "0" + month;
        if (day < 10)
          day = "0" + day;
        var today = now.getFullYear() + '-' + month + '-' + day;
        $('#cdate').val(today);




        $(".addbilty").off();
        $(".addbilty").on('mouseover focus', function() {
          $(this).css("background-color", "green");
        });
        $(".addbilty").on('mouseout blur', function() {
          $(this).css("background-color", "#0d6efd");
        });

        // $("#idd9").focus();
        loadnor();
        loadnee();
        $("#tbl1").find("tr:gt(0)").remove();
        addRow();
        $('#fbilty').css('zoom', '85%'); /* Webkit browsers */
        $('#fbilty').css('zoom', '0.85'); /* Other non-webkit browsers */
        // $('#fbilty').css('-moz-transform', scale(0.8, 0.8));




      });

      function loadnor() {

        $.ajax({
          method: "GET",
          url: "<?php echo base_url() ?>/norfetch",
          success: function(response) {
            $('#idd9').html("<option value='0'>Select consignor</option>")
            $.each(response.norlist, function(key, value) {
              //  console.log(value['nee_name']);
              $('#idd9').append(
                '<option value=' + value['nor_id'] + '>' + value['nor_name'] + '</option>'
              );
            });

            $('#idd9').focus()


          }
        });
      }

      function loadnee() {
        $.ajax({
          method: "GET",
          url: "<?php echo base_url() ?>/neefetch",
          success: function(response) {
            // let needata = [{
            //   label: 'Select Consignee',
            //   value: 0,
            //   selected: true

            // }]
            //  console.log(response.neelist);
            $.each(response.neelist, function(key, value) {
              //  console.log(value['nee_name']);
              $('#id8').append(
                '<option value=' + value['nee_id'] + '>' + value['nee_name'] + '</option>'
                // needata.push({
                //   label: value.nee_name,
                //   value: value.nee_id
                // })
              );
            });

            // const element2 = document.querySelector('#id8');
            // const choices = new Choices(element2, {
            //   choices: needata,
            //   shouldSort: false,
            // });
            $(".norlist").focus();


          }
        });
      }


      function addNor() {
        // alert('hello');
        norname = $('.norname').val();
        if (norname == 0) {
          error_name = "Please enter name";
          $('#error_name').text(error_name);
          $('.norname').focus();
          return;
        } else {
          error_name = "";
          $('#error_name').text(error_name);
        }
        norcity = $('.norcity').val();
        if (norcity == 0) {
          error_city = "Please select City";
          $('#error_city').text(error_city);
          $('.norcity').focus();
          return;
        } else {
          error_city = "";
          $('#error_city').text(error_city);
        }
        norpayment = $('.norpayment').val();
        if (norpayment == 0) {
          error_payment = "Please select mode of payment";
          $('#error_payment').text(error_payment);
          $('.norpayment').focus();
          return;
        } else {
          error_payment = "";
          $('#error_payment').text(error_payment);
        }

        norshort = $('.norshort').val();
        noremail = $('.noremail').val();
        normobile = $('.normobile').val();
        norgstin = $('.norgstin').val();

        if ($(".norsave").val() == "Save") {
          // alert('hello');
          var data = {
            'norname': norname,
            'norshort': norshort,
            'noremail': noremail,
            'normobile': normobile,
            'norcity': norcity,
            'norgstin': norgstin,
            'norpayment': norpayment,

          };
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/BE45KL",
            data: data,
            success: function(response) {
              console.log(response);
              if (response) {
                if (response.status == 'Duplicate record found..') {
                  iziToast.warning({
                    position: 'topCenter',
                    title: 'Warning',
                    message: response.status,
                  });
                  $(".norname").focus();
                } else {
                  iziToast.success({
                    position: 'topRight',
                    title: 'OK',
                    message: response.status
                  });
                  $('.norlist').html("");
                  loadnor();
                  blankControls();
                  $('#myModal').modal('hide');

                }
              }
            }
          });

        }

      }



      // function bindItem(){

      //   $.ajax({
      //     method: "GET",
      //     url: "<?php echo base_url() ?>/getQuotdata",
      //     success: function (response) {
      //       console.table(response.quotdata);
      //     }
      //   });

      // }



      $(Document).ready(function() {

        $(document).on('click', '.neesave', function() {
          //alert("hello");
          if ($.trim($('.neename').val()).length == 0) {
            error_neename = "Please enter name";
            $('#error_neename').text(error_neename);

          } else {
            error_neename = "";
            $('#error_neename').text(error_neename);
          }
          if ($.trim($('.neemobile').val()).length == 0) {
            error_neemobile = "Please Contact number";
            $('#error_neemobile').text(error_neemobile);

          } else {
            error_neemobile = "";
            $('#error_neemobile').text(error_neemobile);
          }

          if (error_neename != '' || error_neemobile != '') {
            return false;
          } else {

            var data = {
              'neename': $('.neename').val(),
              'neeshort': $('.neeshort').val(),
              'neeemail': $('.neeemail').val(),
              'neemobile': $('.neemobile').val(),
              'neecity': $('.neecity').val(),
              'neestate': $('.neestate').val(),
              'neepin': $('.neepin').val(),

            };

            $.ajax({
              method: "POST",
              url: "<?php echo base_url() ?>/BE45NE",
              data: data,
              success: function(response) {
                //console.log(data);
                $('#mModal').modal('hide');
                $('#mModal').find('input').val('');
                $('#mModal').find('select').val('');
                // setInterval('location.reload()', 1000);
                $('.neelist').html("");
                loadnee();
              }
            });
          }
        });
      });



      $(document).ready(function() {
    $('#idd9').select2();
    $('#id8').select2();
});

    </script>
    <?php $this->endsection(); ?>