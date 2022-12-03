<!-- Add New Credit Card Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-3">
                    <h3 class="mb-2">Create New PUs</h3>
                </div>

                <form id="addNewForm" class="row g-3">


                    <div class="row gx-3">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="form-label">LGA</label>
                                <select class="form-select" name="lga" id="lga" required>
                                    <option value="">--</option>
                                    @foreach ($lgas as $lga)
                                        <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="form-label">Ward</label>
                                <select class="form-select" name="ward" id="ward" required>
                                </select>
                            </div>
                        </div>
                    </div>

                   
                    <div class="add_item">
                        <div class="row  mb-2">
                            <div class="col-md-7">
                                <input type="text" name="name[]" class="form-control mb-2" placeholder="Enter PU Name" required />
                            </div>
                            <div class="col-lg-3">
                                <input type="number" class="form-control mb-2" name="voters[]"  placeholder="Registered Voters" required />
                            </div>
                            <div class="col-md-2 d-flex mt-1">
                                <span class="btn btn-success  addeventmore"><i class="fa fa-plus-circle"></i></span>
                            </div>
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
