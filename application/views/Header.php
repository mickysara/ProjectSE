
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Design System - Free Design System for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel = "icon" type = "image/png"  href = "<?php echo base_url(); ?>./assets/img/brand/favicon.png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Athiti:300,400,700&amp;subset=thai" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/nucleo/css/nucleo.css">
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Argon CSS -->
  <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url(); ?>./assets/css/argon.css?v=1.0.1">
  <!-- Docs CSS -->
  <link rel = "stylesheet" href = "<?php echo base_url('/assets/css/docs.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <style>
        body,h1,h2,h3,h4,h5,.tooltip,h6 {
        font-family: 'Athiti', sans-serif !important;
    }
        .swal-footer {
        background-color: rgb(245, 248, 250);
        margin-top: 32px;
        border-top: 1px solid #E9EEF1;
        overflow: hidden;
}</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary " style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center; position: sticky; position: sticky; z-index: 1071; top: 0;">
          <div class="container">
          <?php if($this->session->userdata('TypeID') != ''){
                ?>
            <a class="navbar-brand" href="<?php echo site_url('/IndexController');?>">System For Ku University</a>
            <?php
            }?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
              <div class="navbar-collapse-header">
                <div class="row">
                  <div class="col-6 collapse-brand">
                    <a href="index.html">
                      <img src="assets/img/brand/blue.png">
                    </a>
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                </li>
                <?php if($this->session->userdata('TypeID') != ''){
                ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("/LinenotifyController");?>">แจ้งปัญหาการใช้งาน</a>
                </li>
                  <?php
                  }?>
                <?php if($this->session->userdata('TypeID') == ''){
                ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url("/LoginController");?>">Login</a>
                </li>
                  <?php
                  }?>
                  <?php if($this->session->userdata('TypeID') != ''){
                  ?>

               
                        <li class="nav-item dropdown">
                                  <a class="nav-link" href="#" id="navbar-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->userdata('FirstName')?></a>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-primary_dropdown_1">
                                    <a class="dropdown-item" href="#">ตรวจสอบการอบรมและการประเมิน</a>
                                    <a class="dropdown-item" href="#">ตั้งค่าผู้ใช้</a>
                                    <?php if($this->session->userdata('TypeID') == '2')
                                    {?>
                                        <a class="dropdown-item" href="<?php echo site_url("/EditdepartinevaluationController");?>">จัดการหน่วยงานในการประเมิน</a>
                                        <a class="dropdown-item" href="<?php echo site_url("/EditController");?>">จัดการUsers</a>
                                        <a class="dropdown-item" href="<?php echo site_url("/EditdepartController");?>">จัดการหน่วยงาน</a>
                                        <a class="dropdown-item" href="<?php echo site_url("/EvaluationController");?>">จัดการการประเมิน</a>
                                        <a class="dropdown-item" href="<?php echo site_url("/EvaluationFormController");?>">จัดการแบบสอบถาม</a>
                                        <a class="dropdown-item" href="<?php echo site_url("/utype");?>">จัดการประเภทผู้ใช้</a>
                                        <a class="dropdown-item" href="<?php echo site_url("/TrainningController");?>">จัดการการอบรม</a>

                                    <?php
                                    }?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo site_url('/LoginController/Logout');?>">ออกจากระบบ</a>
                                  </div>
                        </li>
                  <?php
                  }?>

              </ul>
            </div>
          </div>
        </nav>
</body>

</html>