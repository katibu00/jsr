<!-- Edit User Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Add New User</h3>
          </div>
          <ul id="error_list"></ul>
          <form id="addNewForm" class="row g-3">
            
            <div class="col-12">
                <label class="form-label" for="name">Full name</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="form-control"
                  placeholder="Enter Full Name"
                />
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label" for="phone1">Primary Phone Number</label>
                <div class="input-group">
                  <input
                    type="tel"
                    id="phone1"
                    name="phone1"
                    class="form-control phone-number-mask"
                    placeholder="Primary Phone Number"
                  />
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label" for="phone2">Alternate Phone Number</label>
                <div class="input-group">
                  <input
                    type="tel"
                    id="phone2"
                    name="phone2"
                    class="form-control phone-number-mask"
                    placeholder="Alternate Phone Number"
                  />
                </div>
            </div>
            
            
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                placeholder="Enter Email"
              />
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="lga">LGA</label>
                <select
                  id="lga"
                  name="lga"
                  class="form-select"
                >
                  <option value=""></option>
                  @foreach ($lgas as $lga)
                     <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                  @endforeach
                 
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="ward">Ward</label>
                <select
                  id="ward"
                  name="ward"
                  class="form-select"
                >
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="pu">PU</label>
                <select
                  id="pu"
                  name="pu"
                  class="form-select"
                >
                </select>
            </div>

            <div class="col-12 col-md-6">
              <label class="form-label" for="marital">Role</label>
              <select
                name="role"
                class="form-select"
              >
                <option value=""></option>
                <option value="agent">Agent</option>
                <option value="coordinator">LG Coordinator</option>
                <option value="ward">Ward Coordinator</option>
                <option value="admin">Admin</option>
              </select>
            </div>
        
            <div class="col-12 col-md-12">
              <label class="form-label" for="address">Address</label>
              <input
                type="text"
                id="address"
                name="address"
                class="form-control"
                placeholder="Enter Residential Address"
              />
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