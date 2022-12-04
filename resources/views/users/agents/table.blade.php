<div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th colspan="2" class="text-center">Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($agents as $key => $value )
        <tr>
          <td>
            {{ $agents->firstItem() + $key }}
          </td>
          <td>
            <div class="avatar avatar-sm me-2">
                <img src="/uploads/default.png" alt="Avatar" class="rounded-circle" />
            </div>
          </td>
          <td>
            <strong>{{ $value->name }}</strong>
          </td>
          <td>
            {{ @$value->lga->name.' - '.@$value->ward->name }}
          </td>
          <td>
            {{ $value->phone1}}
          </td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item userDetails" href="javascript:void(0);" data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#userDetailsModal"
                  ><i class="ti ti-user me-1"></i> Details</a
                >
                <a class="dropdown-item" href="javascript:void(0);"
                  ><i class="ti ti-pencil me-1"></i> Edit</a
                >
                <a class="dropdown-item" href="javascript:void(0);"
                  ><i class="ti ti-trash me-1"></i> Delete</a
                >
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $agents->links() }}
  </div>
  
