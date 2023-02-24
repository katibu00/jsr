<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date</th>
                <th>Status</th>
                <th>Collation</th>
                <th>Parties</th>
                <th>LGAs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($elections as $key => $election)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <strong>{{ $election->title }}</strong>
                    </td>
                    <td>
                        <em>{{ \Carbon\Carbon::parse($election->date)->format('D, d F') }}</em>
                    </td>
                    <td>

                        @php
                             $election_start = \Carbon\Carbon::createFromFormat('Y-m-d', $election->date);
                             $today_date = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                        @endphp
                         @if($today_date->lt($election_start))
                         <span class="badge bg-label-info">Pending</span>
                         @elseif($today_date->lte($election_start))
                         <span class="badge bg-label-success">Ongoing</span>
                         @elseif($today_date->gt($election_start))
                         <span class="badge bg-label-danger">Closed</span>
                        @endif
                     </td>
                     <td>{!! @$election->accepting? '<span class="badge bg-label-success">Accepting</span>': '<span class="badge bg-label-danger">Not Accepting</span>' !!}</td>
                    <td>
                        @php
                            $parties = explode(',', $election->parties); 
                        @endphp
                        @foreach ($parties as $party)
                            @php
                                $name = App\Models\PP::select('code')->where('id',$party)->first();
                            @endphp
                            <span class="badge badge bg-secondary">{{ @$name->code }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($election->lgas == 'all')
                        All
                        @else
                            @php
                                $lgas = explode(',', $election->selected_lgas); 
                            @endphp
                            @foreach ($lgas as $lga)
                                @php
                                    $name = App\Models\LGA::select('name')->where('id',$lga)->first();
                                @endphp
                                <span class="badge badge bg-secondary">{{ @$name->name }}</span>
                            @endforeach
                        @endif

                    </td>

                   

                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              {{-- <a class="dropdown-item userDetails" href="javascript:void(0);" data-id="" data-bs-toggle="modal" data-bs-target="#userDetailsModal"
                                ><i class="ti ti-hand-stop me-1"></i> Stop Collation</a> --}}

                                <a class="dropdown-item collation" data-id="{{ $election->id }}" data-name="{{ $election->title }}" data-accepting="{{ $election->accepting }}" href="javascript:void(0);"
                                    ><i class="ti ti-checkup-list me-1"></i>{{ $election->accepting == 1 ? 'Stop Collation': 'Start Collation'}}</a
                                  >

                              <a class="dropdown-item deleteItem" href="javascript:void(0);" data-id="{{ @$election->id }}" data-name="{{ @$election->title }}" data-bs-toggle="modal" data-bs-target="#userDetailsModal"
                                ><i class="ti ti-trash me-1"></i> Delete</a>
                             
                            </div>
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>