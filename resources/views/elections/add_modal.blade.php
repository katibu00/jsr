 <!-- Edit User Modal -->
 <div class="modal fade" id="addNewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Create New Election</h3>
            <p class="text-muted">Reports can be collected only after the election day.</p>
          </div>
          <ul id="error_list"></ul>
          <form id="addNewForm" class="row g-3">
            <div class="col-12 col-md-12">
              <label class="form-label" for="title">Election Title</label>
              <input
                type="text"
                id="title"
                name="title"
                class="form-control"
                placeholder="Election Title"
              />
            </div>
            <div class="col-12 col-md-3">
                <label for="flatpickr-date" class="form-label">Start Date</label>
                <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="date" id="flatpickr-date" />
            </div>
            <div class="col-12 col-md-9">
                <label class="form-label" for="parties">Parties</label>
                <select
                  id="parties"
                  name="parties[]"
                  class="select2 form-select"
                  multiple
                >
                  <option value=""></option>
                  @foreach ($parties as $party)
                      <option value="{{ $party->id}}">{{ $party->code }}</option>
                  @endforeach
                </select>
            </div>

              <div class="col-12 col-md-3">
                <label class="form-label" for="lgas">LGAs</label>
                <select
                  id="lgas"
                  name="lgas"
                  class="form-select"
                  aria-label="Default select example"
                >
                  <option value=""></option>
                  <option value="all">All</option>
                  <option value="selected">Selected</option>
                </select>
            </div>
           
            <div class="col-12 col-md-9 d-none" id="selected_lg_div">
                <label class="form-label" for="selected_lgas">Selected LGAs</label>
                <select
                  id="selected_lgas"
                  name="selected_lgas[]"
                  class="select2 form-select"
                  multiple
                >
                  <option value=""></option>
                  @foreach ($lgas as $lga)
                      <option value="{{ $lga->id}}">{{ $lga->name }}</option>
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