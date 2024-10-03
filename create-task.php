<?php  
include 'common/header.php';

if(!empty($_SESSION["user"])){
          
   ?>
   <!-- ========== section start ========== -->
   <section class="tab-components">
      <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
         <div class="row align-items-center">
            <div class="col-md-6">
               <div class="title">
                  <h2>Create Task</h2>
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
                        <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                           Create Task
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
      <!-- ========== form-elements-wrapper start ========== -->
      <div class="form-elements-wrapper">
         <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
               <!-- input style start -->
               <form action="function/create-task.php" method="post">
               <div class="card-style mb-30">
                     <?php
                       if(!empty($_GET['q'])){
                            ?> <div class="alert alert-success"><?php echo $_GET['q'];?></div> <?php
                            
                       }
                       if(!empty($_GET['error'])){
                         ?> <div class="alert alert-danger"><?php echo $_GET['error'];?></div> <?php
                         
                     }
                     ?>
                  <div class="input-style-2">
                     <label>Start Time</label>
                     <input type="time" name="start_time" required  />
                  </div>
                  <!-- end input -->
                  <div class="input-style-2">
                     <label>Stop Time</label>
                     <input type="time" name="stop_time" required />
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                     <label>Notes</label>
                     <textarea name="notes"></textarea>
                  </div>

                  <div class="input-style-1">
                     <label>Description</label>
                      <textarea name="description"></textarea>
                  </div>


                   <div class="input-style-1">
                     <button class="main-btn primary-btn btn-hover">Create</button>
                  </div>
                  <!-- end input -->
               </div>
               </form>
               <!-- end card -->
            </div>
            <div class="col-lg-3"></div>
            <!-- end row -->
         </div>
         <!-- ========== form-elements-wrapper end ========== -->
      </div>
      <!-- end container -->
   </section>
   <?php 
}
?>
<!-- ========== section end ========== -->
<?php  
   include 'common/footer.php';
?>
 <script type="text/javascript">
    window.history.replaceState({}, '', window.location.pathname);
 </script>  