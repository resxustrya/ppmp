
<form action="{{ asset('e/unit') }}" method="POST" id="form_item">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <table class="table table-hover table-form table-striped">
        <tr>
            <td class="col-sm-3"><label>Unit Code</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8"><input type="text" id="unit-code" value="{{ $unit->unitcode }}" autofocus name="unit-code" class="form-control" required autocomplete="off" onkeyup="up(this);"></td>
        </tr>
        <tr>
            <td class="col-sm-3"><label>Unit Description</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8"><input type="text" id="unit-desc" value="{{ $unit->unit }}" name="unit-desc" class="form-control" required autocomplete="off" onkeyup="up(this);"></td>
        </tr>
    </table>
    <div class="modal-footer">
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-link waves-effect">SAVE</button>
    </div>
</form>

<script>
    $('#form_item input').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
</script>