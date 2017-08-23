<div class="col-md-4">
  <?php Messages::display(); //displaying the messags tha comes from the setMsg method ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" />
        </div>
        <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
      </form>
    </div>
  </div> 
</div>