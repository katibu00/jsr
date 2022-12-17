<!-- Add New Credit Card Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-3">
                    <h3 class="mb-2">Edit Political Party</h3>
                </div>

                <form id="editForm" class="row g-3">


                    <ul id="update_error_list"></ul>
                    <input type="hidden" name="update_id" id="update_id">

                    <div class="add_item">
                        <div class="form-group  mb-2">
                            <div class="col-md-12">
                                <label class="form-label">Party Name</label>
                                <input type="text" id="edit_name" name="edit_name" class="form-control" placeholder="Enter Party Name" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Code</label>
                                <input class="form-control" type="text" id="edit_code" name="edit_code" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Color</label>
                                <input class="form-control" type="text" id="edit_color" name="edit_color" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Border Color</label>
                                <input class="form-control" type="text" id="edit_border" name="edit_border" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Logo</label>
                                <input class="form-control" type="file" name="edit_logo"/>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="update_btn">Update</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add New Credit Card Modal -->
