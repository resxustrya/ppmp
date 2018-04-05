
<form action="{{ asset('new/item') }}" method="POST" id="form_item" data-link="{{ asset('check/item') }}">
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
        <tr>
            <td class="col-sm-3"><label>Item Expense Title</label></td>
            <td class="col-sm-1">:</td>
            <td class="col-sm-8">
                <div class="form-line error">
                    <select data-url="{{ asset('c/code') }}" class="selectpicker" name="expensecode" id="selectpicker" data-live-search="true" required>
                        <option value="0" selected>Chose Options</option>
                        @foreach(DB::table('ppmp_code')->get() as $ppcode)
                            <option value="{{ $ppcode->ppcode }}">{{ $ppcode->description }}</option>
                        @endforeach
                    </select>
                </div>
            </td>
        </tr>
    </table>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-success" id="submit"><i class="ace-icon fa fa-floppy-o bigger-160" ></i>Save</button>
    </div>
</form>


