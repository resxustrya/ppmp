
<form action="{{ asset('n/item') }}" method="POST" id="form_item" data-link="{{ asset('check/item') }}">
    <input type="hidden" name="rdr" value="{{ $url }}" />
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <table class="table table-hover table-form table-striped">
        <tr>
            <td class="col-sm-3"><label>Item Description</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8"><input type="text" id="description" autofocus name="description" class="form-control" required autocomplete="off"></td>
        </tr>
        <tr>
            <td class="col-sm-3"><label>Item Unit</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8">
                <select name="unit" class="form-control" required>
                    <option value="" selected disable>Select item unit</option>
                    @foreach(Units::all() as $unit)
                        <option value="{{ $unit->unitcode }}">{{ $unit->unit }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
    <div class="modal-footer">
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
        <button type="submit" class="btn btn-link waves-effect">SUBMIT</button>
    </div>
</form>


