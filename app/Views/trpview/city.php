<?php $this->extend('trpview/layout/index');
$this->Section('title');
?>
Add City
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
        <h1>City</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item">City</li>
          </ol>
        </nav>

      </div><!-- End Page Title -->
      <section class="section dashboard">


        <div class="col-lg-12" style="padding: 0px !important; ">


          <div class="card mb-4" style="border: 2px solid #012970;">
            <div class="card-header" style="background-color:#012970; color: #fff;">
              <i class="fas fa-table me-1"></i>
              -- City List --
            </div>
            <div style="background-color:#f0f0f0;">
              <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12" style=" border:1px solid lightgray; padding: 10px; ">
                <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 mt-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Enter City:</label><span id="error_name" class="text-danger ms-3"></span><input type="text" name="ecity" value="" class="form-control" autofocus="" id="ecity" style="text-transform: capitalize;" maxlength="99" autocompvare="off">
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 mt-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Enter PinCode:</label><input type="number" maxlength="6" class="form-control" autofocus="" id="epin" style="text-transform: capitalize;" maxlength="99" autocompvare="off">
                  </div>
                </div>
                <div class="row" style="margin-top:1px;">
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <label for="inputText" class="col-sm-4 col-form-label">Select Taluka :</label><span id="error_taluka" class="text-danger ms-3"></span>
                    <select class="form-select form-control fw-semibold " id="etaluka" aria-label="Default select example">
                      <option value="0">Select Taluka</option>
                    </select>

                  </div>
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <label for="inputText" class="col-sm-4 col-form-label">Select Dist :</label><span id="error_dist" class="text-danger ms-3"></span>
                    <select class="form-select form-control fw-semibold " id="edist" aria-label="Default select example">
                      <option value="0">Select District</option>
                    </select>
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
                        <th>City</th>
                        <th>Taluka</th>
                        <th>District</th>
                        <th>Pincode</th>
                        <th width="50" class="text-center">Edit</th>
                        <th width="50" class="text-center">delete</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th style="width:0px;display:none1;">ID</th>
                        <th>City</th>
                        <th>Taluka</th>
                        <th>District</th>
                        <th>Pincode</th>
                        <th width="50" class="text-center">Edit</th>
                        <th width="50" class="text-center">delete</th>
                      </tr>
                    </tfoot>
                    <tbody>

                      <?php if (!empty($records)) : ?>
                        <?php foreach ($records as $row) : ?>

                          <tr>
                            <td><?= $row->d_id; ?></td>
                            <td><?= $row->city; ?></td>
                            <td><?= $row->taluka; ?></td>
                            <td><?= $row->dist; ?></td>
                            <td><?= $row->pin; ?></td>
                            <td class="editRecord text-center btn-edit "><i class="bi bi-pencil-square"></i></td>
                            <td class="text-center btn-delete" onclick="delrowid(<?= $row->d_id; ?>);"><i class="bi bi-archive-fill"></i></td>
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
      <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
              <h4 class="modal-title"><i class="bi bi-x-circle" style="color:red;"></i> delete City</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure <br /> delete this record..?</p>
            </div>
            <div class="modal-footer">
              <button type="button" id="yes" onclick="deleteRecord(globalrowid);" class="btn btn-danger" data-dismiss="modal">Yes</button>
              <button type="button" id="no" class="btn btn-default" data-bs-dismiss="modal">No</button>
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
        // $( "#master" ).removeClass( "collapsed" );
        // $( "#master" ).setAttribute("aria-expanded", "true");
        // $( "#forms-nav" ).addClass( "nav-content collapse show" );
        $('#epin').keyup(function() {
          var pin = $(this).val();
          if (pin.length == 6) {
            // console.log(pin);
            $.ajax({
              method: "POST",
              url: "<?php echo base_url() ?>/trpadmin/quotation/talDist",
              data: {
                'pin': pin,
              },
              success: function(response) {
                // console.log(response.pincode);
                // $('#edist').empty();
                // $('#etaluka').empty();
                $('#edist').val(response.pincode['dist']);
                $('#etaluka').val(response.pincode['taluka']);
                // $('#edist').attr('disabled', 'true');
              }
            });
          }

        })


      });
      // $(document).ready(function() {
      //   $('#tbl').DataTable();
      // });


      // $("#tbl tr").on("click", highlightRow);





      function highlightRow() {
        var tableObject = $(this).parent();
        // if($(this).index() > 0)
        {
          var selected = $(this).hasClass("highlight");
          tableObject.children().removeClass("highlight");
          if (!selected)
            $(this).addClass("highlight");
        }
      }

      function setTable(records) {
        //  alert(JSON.stringify(records));
        $("#tbl").empty();
        var table = document.getElementById("tbl");
        for (i = 0; i < records.length; i++) {
          newRowIndex = table.rows.length;
          row = table.insertRow(newRowIndex);



          var cell = row.insertCell(0);
          // cell.style.display="none";
          cell.innerHTML = records[i].d_id;
          var cell = row.insertCell(1);
          cell.innerHTML = records[i].city;
          var cell = row.insertCell(2);
          cell.innerHTML = records[i].taluka;

          var cell = row.insertCell(3);
          cell.innerHTML = records[i].dist;

          var cell = row.insertCell(4);
          cell.innerHTML = records[i].pin;

          var cell = row.insertCell(5);
          cell.innerHTML = "<i class='bi bi-pencil-square'></i></span>";
          cell.className = "editRecord text-center btn-edit";

          var cell = row.insertCell(6);
          cell.innerHTML = "<i class='bi bi-archive-fill'></i>";
          cell.className = "btn-delete";
          cell.setAttribute("onclick", "delrowid(" + records[i].d_id + ")");
          cell.setAttribute("data-toggle", "modal");
          cell.setAttribute("data-target", "#myModal");
        }


        $('.editRecord').bind('click', editThis);

        myDataTable.destroy();
        $(document).ready(function() {
          myDataTable = $('#tbl').DataTable({

          });
        });

        // $("#tbl tr").on("click", highlightRow);

      }





      function saveData() {
        cityName = $('#ecity').val();
        // alert(cityName);
        if ($.trim($('#ecity').val()).length == 0) {
          error_name = "Please enter City";
          $('#error_name').text(error_name);
          $('#ecity').focus();
          return;
        } else {
          error_name = "";
          $('#error_name').text(error_name);
        }
        // if ($.trim($('#etaluka').val()) == 0) {
        //   error_taluka = "Please Select Dist";
        //   $('#error_taluka').text(error_taluka);
        //   $('#etaluka').focus();
        //   return;
        // } else {
        //   error_taluka = "";
        //   $('#error_taluka').text(error_taluka);
        // }
        if ($.trim($('#edist').val()) == 0) {
          error_dist = "Please Select Dist";
          $('#error_dist').text(error_dist);
          $('#edist').focus();
          return;
        } else {
          error_dist = "";
          $('#error_dist').text(error_dist);
        }
        pincode = $('#epin').val();
        talukaName = $('#etaluka').val();
        distName = $('#edist').val();
        // console.log(talukaName);

        if ($("#btnSave").val() == "Save") {
          // alert("save");
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/trpadmin/insertCity",
            data: {
              'city': cityName,
              'pincode': pincode,
              'taluka': talukaName,
              'dist': distName,
            },
            success: function(response) {
              // console.log(response.status);
              // console.log(response['records']);
              if (response)
              // alert(response.status);
              {
                if (response.status == 'Duplicate record found..') {
                  // alertify.set('notifier', 'position', 'top-right');
                  // alertify.error(response.status);
                  iziToast.warning({
                    position: 'topRight',
                    title: 'Warning',
                    message: response.status,
                  });
                } else {

                  setTable(response['records']);
                  // alertify.set('notifier', 'position', 'top-right');
                  // alertify.success(response.status);
                  iziToast.success({
                    position: 'topRight',
                    title: 'OK',
                    message: response.status
                  });
                  blankControls();
                  $("#ecity").focus();

                }
              }


            }

          });



        } else if ($("#btnSave").val() == "Update") {
          // alert(globalrowid);
          $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>/trpadmin/trpadmin/updateCity",
            data: {
              'globalrowid': globalrowid,
              'pin': pincode,
              'taluka': talukaName,
              'city': cityName,
              'dist': distName
            },
            success: function(response) {
              if (response)
              // alert(response.status);
              {
                if (response.status == 'Duplicate record found..') {
                  // alertify.set('notifier', 'position', 'top-right');
                  // alertify.error(response.status);
                  iziToast.warning({
                    position: 'topRight',
                    title: 'Warning',
                    message: response.status,
                  });
                } else {

                  setTable(response['records']);
                  console.log(response.status);
                  // alertify.set('notifier', 'position', 'top-right');
                  // alertify.success(response.status);
                  iziToast.success({
                    position: 'topRight',
                    title: 'Done',
                    message: response.status
                  });
                  blankControls();
                  $("#btnSave").val("Save");
                  $("#ecity").focus();

                }
              }

            }
          });
        }



      }
    </script>
    <script>
      var globalrowid;

      function delrowid(rowid) {
        globalrowid = rowid;
        $('#myModal').modal('show');
      }

      function deleteRecord(rowId) {
        // alert(rowId);

        $.ajax({
          method: "POST",
          url: "<?php echo base_url() ?>/trpadmin/trpadmin/deleteCity",
          data: {
            'globalrowid': globalrowid,
          },
          success: function(response) {
            // console.log(response.records);
            if (response) {
              if (response.status == 'Record can not be deleted..Dependent record found.') {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(response.status);
              } else {
                setTable(response['records']);
                console.log(response.status);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                blankControls();
                $("#btnSave").val("Save");
                $("#ecity").focus();
              }
            }
          }
        });
        $('#myModal').modal('hide');
      }
      $('.editRecord').bind('click', editThis);

      function editThis(jhanda) {
        rowIndex = $(this).parent().index();
        colIndex = $(this).index();
        globalrowid = $(this).closest('tr').children('td:eq(0)').text();
        city = $(this).closest('tr').children('td:eq(1)').text();
        taluka = $(this).closest('tr').children('td:eq(2)').text();
        dist = $(this).closest('tr').children('td:eq(3)').text();
        pin = $(this).closest('tr').children('td:eq(4)').text();
        // alert(taluka);
        $("#ecity").val(city);
        $("#etaluka").val(taluka);
        $("#edist").val(dist);
        $("#epin").val(pin);
        $("#ecity").focus();
        $("#btnSave").val("Update");
      }


      $(document).ready(function() {
        loadTalDist();
        myDataTable = $('#tbl').DataTable({

        });
        $("#master").removeClass("collapsed");
        $("#forms-nav").toggleClass('show');
        $("#citya").toggleClass('active');

      });





      function loadTalDist() {

        $.ajax({
          method: "GET",
          url: "<?php echo base_url() ?>/loadTalDist",
          success: function(response) {
            // console.log(response.taluka);
            if (response) {

              //   let citydata = [{
              //   label: 'Select taluka',
              //   value: 0,
              //   selected: true

              // }]
              // console.log(response.norlist);
              // $.each(response.taluka, (index, value) => {
              //   citydata.push({
              //     label: value.taluka,
              //     // value: value.nor_id
              //   })
              //   // console.log(value.nor_id)
              // })
              // // console.log(nordata)
              // const element1 = document.querySelector('#etaluka');
              // const choices = new Choices(element1, {
              //   choices: citydata,
              //   shouldSort: false,
              // });
              $.each(response.taluka, function(key, value) {
                $('#etaluka').append(
                  '<option>' + value['taluka'] + '</option>'
                );
              });
              $.each(response.dist, function(key, value) {
                $('#edist').append(
                  '<option>' + value['dist'] + '</option>'
                );
              });
              // console.log(response.quotrecords);
              // alertPopup('Records loaded...', 4000);
            }
          }
        });
      }
    </script>

    <!-- cell.setAttribute("data-toggle", "modal"); -->

    <?php $this->endsection(); ?>