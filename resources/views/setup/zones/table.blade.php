<div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>LGAs</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
       @foreach ($zones as $key => $value)    
        <tr>
            <td>{{ $key + 1 }}</td>
          <td>
            <strong>{{ $value->name }}</strong>
          </td>
          @php
                $lgas = explode(',', $value->lga_id); 
            @endphp

            <td>
                @foreach ($lgas as $lga)
                    @php
                        $name = App\Models\LGA::find($lga);
                    @endphp
                    <span class="badge badge bg-secondary">{{ @$name->name }}</span>
                @endforeach
            </td>
         
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div>
              <button type="button"  data-id="{{ $value->id }}" data-name="{{ $value->name }}" class="btn btn-icon btn-outline-danger deleteItem">
                  <span class="ti ti-trash me-1"></span>
              </button>
              </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>