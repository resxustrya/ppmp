<div class="modal-content">
    <form action="{{ asset('section/current/source-fund') }}" method="POST">
        <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Section current source of fund</h4>
        </div>
        <div class="modal-body">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-credit-card"></i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="source_fund" value="{{ isset($source_fund) ? $source_fund->source_fund : '' }}" placeholder="Enter your source of fund" required autofocus>
                </div>
            </div>
        </div>
        <center class="side-loading">
            <div class="preloader pl-size-xl">
                <div class="spinner-layer">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </center>
        <div class="modal-footer">
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-link waves-effect">SAVE</button>
        </div>
    </form>    
</div>