  <!-- Edit User Modal -->
  <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Edit User Information</h3>
            <p class="text-muted">Updating user details will receive a privacy audit.</p>
          </div>
          <form id="addNewForm" class="row g-3">
          
            <div class="col-12 col-md-6">
                <label class="form-label" for="name">Name</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-control"
                  placeholder="Zone Name" />
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label" for="lgas">LGAs</label>
              <select
                id="lgas"
                name="lgas[]"
                class="select2 form-select"
                multiple
              >
                <option value="">Select</option>
                @foreach ($lgas as $lga)
                <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                @endforeach
               
              </select>
            </div>
     
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submit_btn">Submit</button>
              <button
                type="reset"
                class="btn btn-label-secondary"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--/ Edit User Modal -->