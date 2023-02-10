<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr>
                
                <th>S/N</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allData as $key => $value)
            <tr>
                <td>{{ $key + $allData->firstItem() }}</td>
                <td colspan="4">
                    <span><strong>{{ $value->name }} LGA </strong></span> 
                </td>
                
                
            </tr>
            @php
                $wards = App\Models\Ward::where('lga_id',$value->id)->get();
            @endphp
                @foreach ($wards as $key2 => $ward )
                    <tr>
                        <td></td>
                        <td>{{ $key2 + 1 }}</td>
                        <td>{{ $ward->name }}</td>
                        <td>
                            {!! $ward->status == 1 ? '  <span class="badge bg-label-primary me-1">Active</span>': '  <span class="badge bg-label-danger me-1">Not Active</span>' !!}
                        </td>
                        <td>
                            <button type="button" data-id="{{ $ward->id }}" data-name="{{ $ward->name }}" data-status="{{ $ward->status }}" class="btn btn-icon btn-outline-primary editItem"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                <span class="ti ti-pencil me-1"></span>
                            </button>
                            <button type="button"  data-id="{{ $ward->id }}" data-name="{{ $ward->name }}" class="btn btn-icon btn-outline-danger deleteItem">
                                <span class="ti ti-trash me-1"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    {{ $allData->links() }}
</div>


