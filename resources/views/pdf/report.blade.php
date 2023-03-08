<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>End of Term Report Sheet</title>
    <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome/css/fontawesome.min.css">
    <style type="text/css">
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            /* min-width: 400px; */
            width: 100%;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 5px 5px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <div style="width: 100%; overflow: auto; clear:both; margin-top: 30px;">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th style="width: 25%;">LGA</th>
                        <th class="text-center" style="width: %;">TRV</th>
                        <th class="text-center" style="width: %;">TAV</th>
                        <th class="text-center" style="width: %;">TVV</th>
                        <th class="text-center" style="width: %;">TJV</th>
                        @foreach ($parties as $code)
                            <th class="text-center" style="width: %;">{{ $code }}</th>
                        @endforeach
                        <th class="text-center" style="width: %;">Winner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lgas as $lga_id => $name)
                        {{-- <p>ID: {{ $id }} - Name: {{ $name }}</p> --}}
                        <tr>
                            <td>{{ $name }}</td>
                            @php
                                $registered = App\Models\PostResultSubmit::where('election_id', $election_id)->where('lga_id',$lga_id)->sum('registered');
                                $accredited = App\Models\PostResultSubmit::where('election_id', $election_id)->where('lga_id',$lga_id)->sum('accredited');
                                $valid = App\Models\PostResultSubmit::where('election_id', $election_id)->where('lga_id',$lga_id)->sum('valid');
                                $rejected = App\Models\PostResultSubmit::where('election_id', $election_id)->where('lga_id',$lga_id)->sum('rejected');
                            @endphp
                            <td class="text-center">{{ number_format($registered,0) }}</td>
                            <td class="text-center">{{ number_format($accredited,0) }}</td>
                            <td class="text-center">{{ number_format($valid,0) }}</td>
                            <td class="text-center">{{ number_format($rejected,0) }}</td>
                            @php
                                $highest_score = 0;
                                $highest_score_party_name = '';
                            @endphp
                            @foreach ($parties as $party_id => $code)
                            @php
                                $party_score = App\Models\PostResult::where('election_id', $election_id)->where('lga_id',$lga_id)->where('party_id',$party_id)->sum('votes');
                                if ($party_score > $highest_score) {
                                    $highest_score = $party_score;
                                    $highest_score_party_name = App\Models\PP::find($party_id)->code;
                                }
                            @endphp
                            <td class="text-center">{{ $party_score }}</td>
                            @if($loop->last)<td class="text-center">{{ $highest_score_party_name }}</td>@endif
                        @endforeach
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div style=" width: 100%; margin-top: -5px;">
            <p style="font-size: 13px; text-align: center">Generated on {{ date('l, jS \of F Y ') }} @
                {{ date('h:i A') }} | intellisas</p>
        </div>
    </div>
</body>

</html>
