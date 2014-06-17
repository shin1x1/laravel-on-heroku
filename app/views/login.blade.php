@extends('base')

@section('title')
@stop

@section('sub_content')
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

            <?= Form::open(['url' => '/login', 'method' => 'post', 'id' => 'loginform', 'role' => 'form', 'class' => 'form-horizontal']) ?>

                <div style="margin-bottom: 25px" class="input-group">
                    demo [username: demo / password: demo]
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?= Form::text('name', Form::old('name'), ['class' => 'form-control', 'placeholder' => 'Username']) ?>
                    <?= $errors->first('name', '<p class="text-danger">:message</p>'); ?>
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <?= Form::password('password', '', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
                    <?= $errors->first('password', '<p class="text-danger">:message</p>'); ?>
                </div>

                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <input type="submit" class="btn btn-success" value="Login">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account!
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                Sign Up Here
                            </a>
                        </div>
                    </div>
                </div>
            <?= Form::close() ?>
        </div>
    </div>
</div>
<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
        </div>
        <div class="panel-body" >
            <?= Form::open(['url' => '/signup', 'method' => 'post', 'id' => 'signupform', 'role' => 'form', 'class' => 'form-horizontal']) ?>

                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>

                <div class="form-group">
                    <label for="firstname" class="col-md-3 control-label">Username</label>
                    <div class="col-md-9">
                        <?= Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username']) ?>
                        /\A[a-z0-9_-]\z/i
                        <?= $errors->first('name', '<p class="text-danger">:message</p>') ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <?= Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <?= Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'Password']) ?>
                    </div>
                </div>

                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-9">
                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                    </div>
                </div>

            <?= Form::close() ?>
        </div>
    </div>
</div>
@stop
