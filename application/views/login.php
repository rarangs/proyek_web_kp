<!DOCTYPE html>
<html lang="en">
  <head>    
    <?php $this->load->view('partials/head.php') ?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <?= $this->session->flashdata('success')?>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                 <?php elseif($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error')?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
            <?php endif ?>
            <br>
              <h1>Login Form</h1>
              <form class="user" method="POST" action="<?= base_url('login/proses_login') ?>">
                    <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" placeholder="Masukkan Username" autocomplete="off" require name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Password" require name="password">
                                        </div>
                                        <div class="form-group">
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="">Masuk Sebagai</option>
                                                <option value="kasir">Finance</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
              <!-- <div>
                <a class="btn btn-default submit" href="index.html">Log in</a>
              </div> -->
              <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Login</button>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>PT Hanbro Tekno Utama</h1>
                  <p></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
