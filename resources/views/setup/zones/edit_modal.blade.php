	
<!-- Add Label -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h6 class="text-uppercase fw-bold mb-3">Edit Zone</h6>
                <form>
                    <ul id="update_error_list"></ul>
                    <input type="hidden" id="update_id">
                    <div class="row gx-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" type="text" id="edit_name" placeholder="LGA Name"/>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status">
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary float-end" id="update_btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Label -->