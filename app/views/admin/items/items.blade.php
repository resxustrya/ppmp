<div class="input-group" style="padding: 20px;">
    <div class="form-line">
        <input type="text" class="form-control date" id="myInput" onkeyup="myFunction()" placeholder="Search Item">
    </div>
    <span class="input-group-addon">
        <i class="glyphicon glyphicon-search"></i>
    </span>
</div>
<table class="table" id="myTable">
    <thead>
    <tr>
        @if($v != "display")
            <th></th>
        @endif
        <th>DESCRIPTION</th>
        <th>ITEM CODE</th>
        <th>UNIT</th>
    </tr>
    </thead>
    <tbody style="overflow-x: auto;">
    <?php $i = 1; ?>
    @foreach($items as $item)
        <tr>
            @if($v != "display")
                <td>
                    <input type="checkbox" id="id{{$i}}" class="filled-in chk-col-red">

                    <label for="id{{$i}}"></label>
                </td>
            @endif
            <td>
                {{ $item->description }}
            </td>
            <td>
                {{ $item->code }}
            </td>
            <td>{{ $item->unit  }}</td>
        </tr>
        <?php $i = $i + 1; ?>
    @endforeach
    </tbody>
</table>



