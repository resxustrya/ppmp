<form action="{{ asset('create/program')}}" method="POST" onsubmit="check_venue(this);">
    <input type="hidden" value="{{ $ppcode }}" name="ppcode" />
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text" class="form-control" name="program_name" placeholder="Enter program name or other expense title" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <p>Venues</p>
            @foreach(DB::table('training_venue')->get() as $venue)
                <input type="checkbox" id="md_checkbox_{{$venue->id}}" name="venue[]" value="{{ $venue->id}}" class="filled-in chk-col-red">
                <label for="md_checkbox_{{$venue->id}}">{{ $venue->venue }}</label>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="button-demo col-sm-5">
            <button type="submit" class="btn bg-red waves-effect">Submit</button>
            <a href="javascript:void(0);" class="btn bg-pink waves-effect btn_back">Back</a>           
        </div>
    </div>
</forma>

<script>
    function check_venue(el)
    {
        $(el).preventDefault();
        $('input[type=checkbox]').each(function () {
            if(this.checked) {
                alert("Checked : " + this.val());
            }
        });
    }
</script>



