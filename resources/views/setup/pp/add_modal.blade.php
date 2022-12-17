<!-- Add New Credit Card Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-3">
                    <h3 class="mb-2">Add New Political Party</h3>
                </div>

                <form id="addNewForm" class="row g-3"  enctype="multipart/form-data">


                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Party Name</label>
                            <input class="form-control" type="text" name="name" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Code</label>
                            <input class="form-control" type="text" name="code" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Color</label>
                            <input class="form-control" type="text" name="color" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Border Color</label>
                            <input class="form-control" type="text" name="border" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Logo</label>
                            <input class="form-control" type="file" name="logo" required/>
                        </div>
                    </div>



                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submit_btn">Submit</button>
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
