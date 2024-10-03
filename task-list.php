<?php  
  include 'common/header.php';
  include 'function/connection.php';
if(!empty($_SESSION["admin"])){
   
  $query = "SELECT a.*,b.fname,b.lname FROM task a
          JOIN users b ON a.user_id = b.id";

  $result = mysqli_query($conn, $query);        
 
      
   ?>
      <!-- ========== section start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Task List</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Task list
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                 
                  <div class="table-wrapper table-responsive">
                    <table class="table table-stripped" id="task-list">
                      <thead>
                        <tr>
                          <th class="lead-email">
                            <h6>User</h6>
                          </th>

                          <th class="lead-email">
                            <h6>Start Time</h6>
                          </th>
                          <th class="lead-phone">
                            <h6>Stop Time</h6>
                          </th>
                          <th class="lead-company">
                            <h6>Notes</h6>
                          </th>
                          <th>
                            <h6>Description</h6>
                          </th>
                         
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
  <?php

  while ($row = mysqli_fetch_assoc($result)) {

      ?>
       
                    <tr>
                         
                          <td class="min-width">
                            <p><?php echo $row['fname'] .' '.$row['lname']; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $row['start_time']; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $row['stop_time']; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $row['notes']; ?></p>
                          </td>
                          <td class="min-width">
                            <p><?php echo $row['description']; ?></p>
                          </td>
                         
                        </tr>


      <?php
          
      }


  ?>

                        
                     
                        <!-- end table row -->
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
   <?php 
}
?>      
<?php  
  include 'common/footer.php';
?>
<script>
    $(document).ready(function() {
        $('#task-list').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>   