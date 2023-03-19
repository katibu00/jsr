 <!-- Active Projects -->
 <div class="col-xl-5 col-md-7 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <div class="card-title mb-0">
          <h5 class="mb-0">Jigawa State Gubernotorial Election</h5>
          <small class="text-muted">Source: www.jigawasituationroom.org</small>
        </div>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
         @php
             $parties = explode(',', $elect->parties); 
             $totalVotes = App\Models\PostResult::where('election_id',$election_id)->sum('votes')
         @endphp
         @foreach ($parties as $party)
             
            @php
                $theParty = App\Models\PP::find($party);
                $partyVotes = App\Models\PostResult::where('election_id',$election_id)->where('party_id',$party)->sum('votes');
                $percent = $partyVotes/$totalVotes * 100;
            @endphp
            <li class="mb-3 pb-1 d-flex">
            <div class="d-flex w-50 align-items-center me-3">
              <div class="d-flex align-items-center">
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                 
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $theParty->candidate }}" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="/uploads/{{ $theParty->logo }}" alt="{{ $theParty->candidate }}">
                  </li>
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $theParty->candidate }}" class="avatar avatar-sm pull-up">
                    <img class="rounded-circle" src="/uploads/{{ $theParty->image }}" alt="{{ $theParty->candidate }}">
                  </li>
                 
                </ul>
              </div>
              <div>
                <h6 class="mb-0">{{ $theParty->candidate }}</h6>
                <small class="text-muted">{{ $theParty->code }}</small>
              </div>
            </div> <p class="mb-0">
                <em>{{ number_format((@$partyVotes), 0) }}</em>
            </p>

            <div class="d-flex flex-grow-1 align-items-center">
               
              <div class="progress w-100 me-3" style="height:8px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <span class="text-muted">{{ number_format($percent,2) }}%</span>
            </div>
          </li>
          @endforeach
   
        </ul>
      </div>
    </div>
  </div>
