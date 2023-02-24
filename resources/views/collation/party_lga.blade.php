 <!-- Progress report -->
 <div class="col-lg-4 col-12 mb-4">

    <div class="card">
        <div class="card-header d-flex align-items-start justify-content-between pb-2">
            <h5 class="card-title mb-0">Summary ({{ @$lga_name->name }} LGA)</h5>
        </div>
        <div class="card-body pt-1">
            <div class="info-container">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="fw-semibold me-1">Registered Voters:</span>
                        <span>{{ number_format($registered, 0) }}</span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-semibold me-1">Accredited Voters:</span>
                        <span>{{ number_format($accredited, 0) }}</span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-semibold me-1">Valid Votes:</span>
                        <span>{{ number_format($valid, 0) }}</span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-semibold me-1">Rejected Votes:</span>
                        <span>{{ number_format($rejected, 0) }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Progress report  -->


<!-- Party wise -->
<div class="col-lg-8 col-12 mb-4">
    <div class="card">
        <h5 class="card-header">Party-Wise ({{ @$lga_name->name }} LGA)</h5>
        <div class="card-body">

            @php
                $labels = json_decode(@$labels);
                $values = json_decode(@$values);
            @endphp
            <div>
                <canvas id="party_lga"></canvas>
            </div>


        </div>
    </div>
</div>
<!-- /Party wise -->