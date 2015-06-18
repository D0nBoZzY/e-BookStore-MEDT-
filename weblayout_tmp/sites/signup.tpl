    <!-- page heading -->
    <div class="col-md-5" id="heading">
	<h1>Sign Up</h1>
    </div>

    <div class="col-md-2"></div>

    <!-- second page heading -->
    <div class="col-md-5">
	<h1>Reset Password</h1>
    </div>


    <!-- seperate -->
    <div class="col-md-12"><hr /></div>


    <!-- content -->
    <div class="col-md-5">
        <form action="" method="post">
            <div class="form-group">
            	<input type="text" class="form-control input-lg" name="uname" placeholder="Username" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" name="pw1" placeholder="Password"/>
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" name="pw2" placeholder="Retype Password"/>
            </div>                                                                      
            <button type="submit" class="btn btn-success btn-lg" name="reg_btn" id="reg_btn">Sign Up</button>
	    {$error}
	    {$notice}
        </form>
    </div>
    
    <div class="col-md-2"></div>
    
    <div class="col-md-5">
	<form action="" method="post">
	    <div class="form-group">
		<input type="text" class="form-control input-lg" name="uname" placeholder="Username" />
	    </div>
	    <div class="form-group">
		<p class="form-control input-lg" disabled>or</p>
	    </div>
	    <div class="form-group">
		<input type="text" class="form-control input-lg" name="email" placeholder="email" />
	    </div>
	    <button type="submit" class="btn btn-success btn-lg" name="reset_btn" id="reset_btn">Reset</button>
	    {$error}
	    {$notice}
	    <div class="clear"><br /></div>
	</form>
    </div>
