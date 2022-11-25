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

      <div class="pagetitle position-relative row col-sm-12">
        <div class="col-md-6">
          <h1>Consignor</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item">Consignor</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 ">
          <a href="#" class="btn btn-primary float-center mb-3 position-absolute openaddnor" style="bottom:0px; right:0px;"><i class="bi bi-person-plus-fill mr-1"></i> Add Consignor</a>
        </div>

      </div><!-- End Page Title -->
      <section class="section dashboard">

        <div class="row">

          <!-- <center> <a href="#" class="btn btn-primary float-center mb-3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-person-plus-fill mr-1"></i> Add Consignor</a></center> -->


          <div class="col-lg-12" style="padding: 0px !important; ">

            <div class="col-12">

              <div class="card mb-4" style="border: 2px solid #012970;">
                <div class="card-header" style="background-color:#012970; color: #fff;">
                  <i class="fas fa-table me-1"></i>
                  -- Consignor List --
                </div>

                <div class="card-body dataTable-container table-responsive">
                  <table id="tbl" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Consignor Name</th>
                        <th>Short Code</th>
                        <th>Contact No.</th>
                        <th>City</th>
                        <th>Payment</th>
                        <th style="width: 13%;">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Consignor Name</th>
                        <th>Short Code</th>
                        <th>Contact No.</th>
                        <th>City</th>
                        <th>Payment</th>
                        <th style="width: 13%;">Action</th>
                      </tr>
                    </tfoot>

                    <tbody class="norlist">


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div><!-- End Reports -->

      </section>

      <div class="modal fade" id="deletemodal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Delete Consignor</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <input type="hidden" id="deleteid">
              <h4>Are you sure want to delete this data ?</h4>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger nordelete" onclick="deleteRecord(globalrowid);">Yes. Delete</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        loadnor();
        $("#master").removeClass("collapsed");
        $("#forms-nav").toggleClass('show');
        $("#noradd").toggleClass('active');
      });

      $(Document).ready(function() {
        // loadnor();

        $(document).on('click', '.openaddnor', function() {
          $('#myModal').modal('show');
          blankControls();
          $('#norhead').html('Add Consignor Details');
          $('.norsave').val("Save");
          $('.norsave').html('<i class="fa-solid fa-pencil"></i>Save');
        });


        $(document).on('click', '.edit_btn', function() {
          var nid = $(this).closest('tr').find('.nid').text();
          // alert(nid);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/noredit",
            data: {
              'nid': nid,
            },
            success: function(response) {
              //console.log(response);
              $.each(response, function(key, norval) {
                $('#editid').val(norval['nor_id']);
                $('.norname').val(norval['nor_name']);
                $('.norshort').val(norval['nor_shortcode']);
                $('.normobile').val(norval['nor_mobile']);
                $('.noremail').val(norval['nor_email']);
                $('.norcity').val(norval['nor_city']);
                $('.norgstin').val(norval['nor_gstin']);
                $('.norpayment').val(norval['nor_payment_type']);
                $('#myModal').modal('show');
                $('#norhead').html('Edit Consignor Details');
                $('.norsave').val("Update");
                $('.norsave').html('<i class="fa-solid fa-pencil"></i>Update');

              });

            }
          });
        });

        $(document).on('click', '.norupdate', function() {
          var data = {
            'nor_id': $('#editid').val(),
            'nor_name': $('#editname').val(),
            'nor_shortcode': $('#editshort').val(),
            'nor_mobile': $('#editmobile').val(),
            'nor_email': $('#editemail').val(),
            'nor_city': $('#editcity').val(),
            'nor_state': $('#editstate').val(),
            'nor_pincode': $('#editpin').val(),
            'nor_payment_type': $('#editpayment').val(),
          };
          //console.log(data);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/norupdate",
            data: data,
            success: function(response) {
              //console.log(response);
              $('#editmodal').modal('hide');
              $('.norlist').html("");
              loadnor();
              alertify.set('notifier', 'position', 'top-right');
              alertify.success(response.status);
            }
          });

        });

      });


      function loadnor() {

        $.ajax({
          method: "GET",
          url: "<?php echo base_url() ?>/norfetch",
          success: function(response) {
            // console.log(response.norlist);
            $.each(response.norlist, function(key, value) {
              //console.log(value['city']);
              $('.norlist').append('  <tr>\
                                            <td class="nid">' + value['nor_id'] + '</td>\
                                            <td>' + value['nor_name'] + '</td>\
                                            <td>' + value['nor_shortcode'] + '</td>\
                                            <td>' + value['nor_mobile'] + '</td>\
                                            <td>' + value['city'] + '</td>\
                                            <td>' + value['mode'] + '</td>\
                                            <td>\
                                                <a href="#" class="badge btn-primary edit_btn"><i class="fa-solid fa-pencil"></i> Edit</a>\
                                                <a href="#" class="badge btn-danger deletebtn" onclick="delrowid(' + value['nor_id'] + ');"><i class="fa-solid fa-trash-can"></i> Delete</a>\
                                            </td>\
                                       </tr>');
            });

            myDataTable = $('#tbl').DataTable({});

          }
        });


      }

      // function loadcity(){
      //   var cid =  $(this).closest('tr').find('.cid').text();
      //   alert(cid);
      //     $.ajax({
      //       method: "POST",
      //       url: "/fetchcity",
      //       data: {
      //         'cid':cid,
      //       },
      //       success: function (response) {
      //         console.log(response);
      //       }
      //     });
      // }
    </script>
    <script>
      var globalrowid;

      function delrowid(rowid) {

        globalrowid = rowid;
        // alert(globalrowid);
        $('#deletemodal').modal('show');
      }

      function deleteRecord(rowId) {
        // alert(rowId);

        $.ajax({
          method: "POST",
          url: "<?php echo base_url() ?>/delete_nor",
          data: {
            'globalrowid': globalrowid,
          },
          success: function(response) {
            // console.log(response.records);
            if (response) {
              if (response.status == 'Record can not be deleted..Dependent record found.') {
                iziToast.warning({
                  position: 'topRight',
                  title: 'Warning',
                  message: response.status,
                });
              } else {

                myDataTable.destroy();
                $('.norlist').html("");
                loadnor();
                // console.log(response.status);
                iziToast.success({
                  position: 'topRight',
                  title: 'OK',
                  message: response.status
                });
                // blankControls();
               
                // $("#btnSave").val("Save");
                // $("#ecity").focus();
              }
            }
          }
        });
        $('#deletemodal').modal('hide');
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
        norid = $('#editid').val(),
          norshort = $('.norshort').val();
        noremail = $('.noremail').val();
        normobile = $('.normobile').val();
        norgstin = $('.norgstin').val();

        var data = {
          'nid': norid,
          'norname': norname,
          'norshort': norshort,
          'noremail': noremail,
          'normobile': normobile,
          'norcity': norcity,
          'norgstin': norgstin,
          'norpayment': norpayment,
        };
        if ($(".norsave").val() == "Save") {
          // alert('hello');

          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/BE45KL",
            data: data,
            success: function(response) {
              // console.log(response);

              // setTable(response['records']);
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

                  myDataTable.destroy();
                  $('.norlist').html("");
                  loadnor();
                  blankControls();
                  $('#myModal').modal('hide');

                }
              }
            }
          });

        } else if ($(".norsave").val() == "Update") {
          // alert("hello");
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/norupdate",
            data: data,
            success: function(response) {
              if (response)
              // alert(response.status);
              {
                if (response.status == 'Duplicate record found..') {

                  iziToast.warning({
                    position: 'topRight',
                    title: 'Warning',
                    message: response.status,
                  });
                } else {

                  // console.log(response.status);

                  iziToast.success({
                    position: 'topRight',
                    title: 'Done',
                    message: response.status
                  });
                  myDataTable.destroy();
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
    </script>


    <?php $this->endsection(); ?>