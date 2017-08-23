<div class="panel panel-default">

  <div class="panel-heading">
    <h3 class="panel-title">Share something</h3>

  </div>
  <div class="panel-body">
    <?php Messages::display(); ?><!-- displaying the message in case the fields are not filled up -->
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" name="submit">
      <div class="form-group">
        <label>Share Title</label>
        <input type="text" name="title" id="title" class="form-control">
      </div>
      <div class="form-group">
        <label>Body</label>
        <textarea name="body" id="body" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Link</label>
        <input type="text" id="link" name="link" class="form-control">
      </div>
      <input type="submit" class="btn btn-primary">
      <a href="<?php echo ROOT_URL ?>shares" class="btn btn-danger">Cancel</a>
    </form>
  </div>
</div>