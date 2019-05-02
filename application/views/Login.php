<body>
<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="login" id="login_form" method="post">
                <h1 class="display-2">Login</h1>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>E-mail</div>
                      <input type="email" class="form-control form-control-alternative" name="mailtxt" placeholder="name@example.com" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>Password</div>
                    <input type="password" class="form-control form-control-alternative" id="password" name="password" placeholder="Password" required>
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; width:120px;" >Login</button>
                <button type="button" class="btn btn-primary btn-lg" style="margin-top: 44px; width:120px;" onclick="location.href='<?php echo base_url();?>index.php/RegisterController'">Register</button>
                
            </form>
            </div>
            </div>
            
</div>
