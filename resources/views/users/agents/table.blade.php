<div class="table-responsive text-nowrap table-data">
    <table class="table mb-2">
      <thead>
        <tr>
          <th>#</th>
          <th colspan="2" class="text-center">Name</th>
          <th>Address</th>
          <th>Contact</th>
          <th>Role</th>
          <th>Status</th>
          <th>Postings</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($users as $key => $value )
        <tr>
          <td>
            {{ $key + 1}}
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
          <td>{{ ucfirst($value->usertype) }}</td>
          <td>@if($value->status == 1)<span class="badge bg-label-success me-1">Active</span> @else <span class="badge bg-label-danger me-1">Inactive</span> @endif</td>
         @php
           $postings = App\Models\PostResultSubmit::where('user_id', $value->id)->count();
         @endphp
         <td>{{ $postings }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="ti ti-dots-vertical"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item userDetails" href="javascript:void(0);" data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#userDetailsModal"
                  ><i class="ti ti-user me-1"></i> Details</a
                >
                <a class="dropdown-item verifyUser" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-status="{{ $value->status }}" href="javascript:void(0);"
                  ><i class="ti ti-checkup-list me-1"></i>{{ $value->status == 1 ? 'Inactive': 'Active'}}</a
                >
                <a class="dropdown-item smspass" data-id="{{ $value->id }}" data-name="{{ $value->name }}" href="javascript:void(0);"
                  ><i class="ti ti-mail me-1"></i> SMS login Credentials</a
                >
                <a class="dropdown-item deleteItem" data-id="{{ $value->id }}" data-name="{{ $value->name }}" href="javascript:void(0);"
                  ><i class="ti ti-trash me-1"></i> Delete</a
                >
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{-- {{ $users->links() }} --}}
    </div>
  </div>
  
