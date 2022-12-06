
@php
    if($parties != '')
    {
        $parties = explode(',', @$parties); dd($parties);
    }
@endphp
<div class="row ">
    @foreach ($parties as $party)

    @php
        $row = App\Models\PP::select('code','id')->where('id',$party)->first();
    @endphp
    <div class="col-md-10 mb-2">
      <div class="row">
        <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-first-name"
          >{{ $row->code}}</label
        >
        <div class="col-sm-9">
          <input type="text" id="formtabs-first-name" class="form-control form-control-sm" placeholder="Enter Votes for PDP" />
        </div>
      </div>
    </div>

    @endforeach

</div>
{{-- @endif --}}