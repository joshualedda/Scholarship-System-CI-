
<main>

  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <img src="../assets/images/logo.png" alt="DMMMSU Logo" class="w-25">

            <div class="d-flex justify-content-center py-4">
              <a href="" class="logo d-flex align-items-center w-auto">
                <span class="d-none d-lg-block">Scholarships System</span>
              </a>
            </div>



            <div class="card mb-3">
              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your email & password to login</p>
                </div>
                <?php

                if (isset($_SESSION['success_message'])) {
                  echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';

                  unset($_SESSION['success_message']);
                }

                ?>

                <form class="row g-3 needs-validation" action="<?=base_url('') ?>" method="POST">


                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">

                      <input type="text" name="username" required
                        class="form-control" id="yourUsername">
                

                    </div>

                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input required type="password" name="password" class="form-control " id="yourPassword">

                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>


                  <div class="col-12">
                    <button class="btn btn-success w-100" type="submit" name="submit">Login</button>
                  </div>

                </form>

              </div>
            </div>





          </div>
        </div>
      </div>

    </section>

  </div>
</main>
