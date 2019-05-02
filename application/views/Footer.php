  
  
  <!-- Core -->
  <script src="<?php echo base_url('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/popper/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/headroom/headroom.min.js'); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url('/assets/vendor/onscreen/onscreen.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/nouislider/js/nouislider.min.js'); ?>"></script>
  <script src="<?php echo base_url('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url('/assets/js/argon.js?v=1.0.1'); ?>"></script>
  <!-- sweetalert -->
  <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo base_url('/assets/js/ajax.js'); ?>"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script>
      $(document).on('submit', '#login_form', function () {
          
            $.post("<?=base_url('index.php/LoginController/login')?>", $("#login_form").serialize(),
                function (data) {
                    
                    d = JSON.parse(data)
                    var test = JSON.parse(data)
                    if(d.status == 1)
                    {
                        swal({
                            icon: "success",
                            text: "เข้าสู่ระบบสำเร็จ ยินดีต้อนรับ",
                            
                            
                            
                        })
                        setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/IndexController';",5000);
                        //document.getElementById("demo").innerHTML = d[0].msg;
                        //alert("asd")
                    }
                    else
                    {
                        
                        swal({
                            icon: "error",
                            text: "E-mail หรือ Password ของท่านผิดกรุณากรอกใหม่ :",
                            
                        });
                    }

                }
            );

          event.preventDefault();
      });

      function change_province()
      {
          var val = $("#Proviance").val()
          
          $.get("<?=base_url('index.php/kidmaiook/amphur/')?>"+val, 
              function (data) {
                  
                $("#District").html(data)

              }
          );
      }
      function change_district()
      {
            var val = $("#District").val()

            $.get("<?=base_url('index.php/kidmaiook/tumbon/')?>"+val,
            function(data){
                $("#Subdistrict").html(data)

            }
        );
      }
      function insert(id)
      {
          $.get("<?=base_url('index.php/evaluationController/test/')?>"+id,
              function (data) {
                setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/evaluationController/';",100);
              }
          );
      }
      $(document).on('submit', '#register_form', function () {
          
          $.post("<?=base_url('index.php/RegisterController/insert_user')?>", $("#register_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                            icon: "success",
                            text: d.msg,
                      });
                      
                     setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/LoginController';",5000);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }
                  else
                  {
                      
                      swal({
                            icon: "error",
                             text: d.msg,
                          
                      });
                      //base_url('index.php/RegisterController/insert_user');
                      //setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/RegisterController/insert_user';",5000);
                  }

              }
          );

        event.preventDefault();
    });
    // function insert(){
    //     $.post("<?=base_url('index.php/trainer/insert_user')?>",  $this->session->userdata('UserID'),
    //           function (data) {
                  
    //               d = JSON.parse(data)
    //               var test = JSON.parse(data)
                  
    //               if(d.status == 1)
    //               {
    //                   swal({
    //                         icon: "success",
    //                         text: d.msg,
    //                   });
                      
    //                  setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/LoginController';",5000);
    //                   //document.getElementById("demo").innerHTML = d[0].msg;
    //                   //alert("asd")
    //               }
    //               else
    //               {
                      
    //                   swal({
    //                         icon: "error",
    //                          text: d.msg,
                          
    //                   });
    //                   //base_url('index.php/RegisterController/insert_user');
    //                   //setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/RegisterController/insert_user';",5000);
    //               }

    //           }
    //       );

    // }
    $(document).on('submit', '#notify_form', function () {
          
          $.post("<?=base_url('index.php/LinenotifyController/notify')?>", $("#notify_form").serialize(),
              function (data) {
                  
                  d = JSON.parse(data)
                  var test = JSON.parse(data)
                  if(d.status == 1)
                  {
                      swal({
                            icon: "success",
                            text: d.msg,
                      });
                      
                     setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/LoginController';",1000);
                      //document.getElementById("demo").innerHTML = d[0].msg;
                      //alert("asd")
                  }
                  else
                  {
                      
                      swal({
                            icon: "error",
                             text: d.msg,
                          
                      });
                      //base_url('index.php/RegisterController/insert_user');
                      //setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/RegisterController/insert_user';",5000);
                  }

              }
          );

        event.preventDefault();
    });
    // $(document).on('submit', '#raidio', function () {
          
    //       $.post("<?=base_url('index.php/EvaluationController/insertEva')?>", $("#raidio").serialize(),
    //           function (data) {
                  
    //               d = JSON.parse(data)
    //               var test = JSON.parse(data)
    //               if(d.status == 1)
    //               {
    //                   swal({
    //                         icon: "success",
    //                         text: d.msg,
    //                   });
                      
    //                  //setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/LoginController';",1000);
    //                   //document.getElementById("demo").innerHTML = d[0].msg;
    //                   //alert("asd")
    //               }
    //               else
    //               {
                      
    //                   swal({
    //                         icon: "error",
    //                          text: d.msg,
                          
    //                   });
    //                   //base_url('index.php/RegisterController/insert_user');
    //                   //setTimeout("location.href = 'http://localhost/SystemOfUniver/index.php/RegisterController/insert_user';",5000);
    //               }

    //           }
    //       );

    //     event.preventDefault();
    // });

    function change_Department()
      {
          var val = $("#Department").val()
          
          $.get("<?=base_url('index.php/kidmaiook/Department/')?>"+val, 
              function (data) {
                  
                $("#District").html(data)

              }
          );
      }

    </script>
    <script>
        $(document).ready(function() {
            $('#Result').DataTable( {
                "order": [[ 1, "desc" ]]
            } );
        } );
    </script>
  
</body>
</html>