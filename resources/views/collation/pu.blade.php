<div class="card">
    <div class="card-body">

        @foreach ($submissions as $submit)
            @php
                $total = App\Models\PostResult::select('votes')
                    ->where('post_submit_id', $submit->id)
                    ->where('election_id', $election_id)
                    ->sum('votes');
            @endphp
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-sm">
                    <tr>
                        <td>Registered</td>
                        <td>Accredited</td>
                        <td>Valid</td>
                        <td>Rejected</td>
                        @foreach ($parties_ids as $party_id)
                            @php
                                $code = App\Models\PP::find($party_id)->code;
                            @endphp
                            <td class="text-center fw-bold">{{ $code }}</td>
                        @endforeach
                    </tr>
                    <tbody>
                        <tr>
                            <td>{{ number_format($submit->registered) }}</td>
                            <td>{{ number_format($submit->accredited) }}</td>
                            <td>{{ number_format($submit->valid) }}</td>
                            <td>{{ number_format($submit->rejected) }}</td>

                            @foreach ($parties_ids as $party_id)
                                @php
                                    $score = App\Models\PostResult::select('votes')
                                        ->where('post_submit_id', $submit->id)
                                        ->where('election_id', $election_id)
                                        ->where('party_id', $party_id)
                                        ->first()->votes;
                                        if(@$total < 1)
                                        {
                                            @$total = 1;
                                        }
                                @endphp
                                <td class="text-center fw-bold">{{ number_format($score) }}
                                    ({{ number_format((@$score / @$total) * 100, 2) }}%)</td>
                            @endforeach
                        </tr>
                    </tbody>
                    <caption>
                        <strong>{{ ucwords(strtolower(@$submit->pu->name)) . ' - ' . ucwords(strtolower(@$submit->ward->name)) . ' - ' . ucwords(strtolower(@$submit->lga->name)) . ' LG' }}</strong>
                    </caption>
                </table>
        @endforeach
    </div>
</div>
</div>
</div>
