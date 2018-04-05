
        <div class="body">
            <form id="sign_up" action="{{ asset('edit/user') }}" method="POST">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="fname" placeholder="Firstname" value="{{ $user->fname }}" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="lname" placeholder="Lastname" value="{{ $user->lname }}" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                    <div class="form-line">
                        <select class="form-control" name="section">
                            <option value="" selected>Chose section</option>
                            @foreach(DB::table('section')->get(['id','description']) as $section)
                                <option value="{{ $section->id }}" {{ $user->section == $section->id ? 'selected' : '' }}>{{ $section->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">people_outline</i>
                        </span>
                    <div class="form-line">
                        <select class="form-control" name="level">
                            <option value="" selected>Chose Level</option>
                            <option value="0" {{ $user->user_priv == "0" ? 'selected' : '' }}>Regular Employee</option>
                            <option value="1" {{ $user->user_priv == "1" ? 'selected' : '' }}>Section Head</option>
                            <option value="8888" {{ $user->user_priv == "8888" ? 'selected' : '' }}>System Administrator</option>
                            <option value="9999" {{ $user->user_priv == "9999" ? 'selected' : '' }}>Division Chief</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">
                    <i class="material-icons">check_circle</i>
                    Save
                </button>

            </form>
        </div>
