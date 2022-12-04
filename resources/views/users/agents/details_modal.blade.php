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
          
                <h5 class="mt-4 small text-uppercase text-muted">Details</h5>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                        <span class="fw-semibold me-1">Full Name:</span>
                        <span id="user_name"></span>
                        </li>
                        <li class="mb-2 pt-1">
                        <span class="fw-semibold me-1">Email:</span>
                        <span id="user_email"></span>
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