<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Logo</th>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($pps as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="/uploads/{{ $value->logo }}" alt="logo" height="40" width="60" />
                    </td>
                    <td>
                       {{ $value->name }}
                    </td>
                    <td>
                        <strong>{{ $value->code }}</strong>
                    </td>

                    <td>
                        <div>
                            <button type="button" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-color="{{ $value->color }}" data-border="{{ $value->border }}" data-code="{{ $value->code }}" data-status="{{ $value->status }}" class="btn btn-icon btn-outline-primary editItem"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                <span class="ti ti-pencil me-1"></span>
                            </button>
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