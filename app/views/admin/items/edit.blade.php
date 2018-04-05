
<form action="{{ asset('e/item') }}" method="POST" id="form_item" >
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <table class="table table-hover table-form table-striped">
        <tr>
            <td class="col-sm-3"><label>Item Description</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8"><input type="text" id="description" autofocus name="description" value="{{ $item->description }}" class="form-control" required autocomplete="off"></td>
        </tr>
        <tr>
            <td class="col-sm-3"><label>Item Unit</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8">
                <select name="unit" class="form-control" required>
                    <option value="" selected disable>Select item unit</option>
                    @foreach(DB::table('unit')->get() as $unit)
                        <option value="{{ $unit->unitcode }}" {{ $item->unit == $unit->unitcode ? ' selected' : '' }}>{{ $unit->unit }}</option>
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


