 <!-- Modal -->
 <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userDetailsModalTitle">Loading . . .</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">


            <div class="text-center d-flex justify-content-center my-5" id="loading_div_details">
                <div class="spinner-border text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="d-none" id="content_div_details">
          
                <div class="user-avatar-section">
                    <div class="d-flex align-items-center flex-column">
                      <img
                        class="img-fluid rounded mb-3 pt-1 mt-4"
                        src="/uploads/default.png"
                        height="100"
                        width="100"
                        id="image"
                        alt="Profile Picture"
                      />
                      <div class="user-info text-center">
                        <h4 id="user_name" class="mb-2"></h4>
                        <span id="user_usertype" class="badge bg-label-secondary"></span>
                        <span id="user_status" class="badge bg-label-danger">In-Active</span>
                      </div>
                    </div>
                  </div>

                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                        <span class="fw-semibold me-1">Primary Phone:</span>
                        <span id="user_phone1"></span>
                        </li>
                        <li class="mb-2">
                        <span class="fw-semibold me-1">Alternate Phone:</span>
                        <span id="user_phone2"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Email:</span>
                            <span id="user_email"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">LGA:</span>
                            <span id="user_lga"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Ward:</span>
                            <span id="user_ward"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">PU:</span>
                            <span id="user_pu"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Address:</span>
                            <span id="user_address"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Gender:</span>
                            <span id="user_gender"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Marital Status:</span>
                            <span id="user_marital"></span>
                        </li>
                        <li class="mb-2 pt-1">
                            <span class="fw-semibold me-1">Password:</span>
                            <span id="user_pass"></span>
                        </li>
                    </ul>
                </div>

            </div>
                      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-primary" data-bs-dismiss="modal">
            Dismiss
          </button>
        </div>
      </div>
    </div>
  </div>