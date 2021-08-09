<div class="body_content">
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{$errors->first()}}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="box_4">
        <div class="heading">Change a password </div>
        <form method="post" action="{{ route('hk.users-password') }}">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="text" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="end">
                <div class="center">
                    <button type="submit">Save</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</div>
