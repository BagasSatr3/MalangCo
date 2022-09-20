@extends("layouts.template")

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header bg-transparent mb-0"><h5 class="text-center">Please Login</h5></div>
          <div class="card-body">
          <form action="" method="post">
              <div class="form-group">
                <input type="text" id="user" name="user" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>