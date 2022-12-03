<!-- Add New Credit Card Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-3">
                    <h3 class="mb-2">Add New Ward</h3>
                </div>

                <form id="addNewForm" class="row g-3">


                    <div class="col-12 col-md-9">
                        <label class="form-label" for="lga">LGA</label>
                        <select
                          id="lga"
                          name="lga"
                          class="select2 form-select"
                          data-allow-clear="true"
                        >
                          <option value="">Select</option>
                            @foreach ($lgas as $lga)
                                <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="add_item">
                        <div class="row  mb-2">
                            <div class="col-md-9">
                                <input type="text" name="name[]" class="form-control" placeholder="Enter Ward Name" />
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
