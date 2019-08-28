<form id="createVendorCategoryTypeWithAjax" role="form" action="" method="POST">
  <fieldset class="scheduler-border">
    <legend class="scheduler-border">Add Category Type</legend>
    <div class="box-body">
      {{ csrf_field() }}
      <div id="form-errors"></div>
      <div class="form-group">
        <label for="category_type">Category Type <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="category_type" name="category_type" placeholder="Enter Category Type" autocomplete="off">
      </div>
    </div>
    <button type="submit" class="">Submit</button>
  </fieldset>
</form>
