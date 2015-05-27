    <!-- page heading -->
    <div class="col-md-8" id="heading">
    <h1>Sign Up</h1>
    </div>
    <!-- search bar -->
    <div class="col-md-4">
        <div class="input-group" id="search">
            <input type="text" class="form-control" value="Search for..." onclick="this.select()" />
            <div class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </div>
        </div>
    </div>


    <!-- seperate -->
    <div class="col-md-12"><hr /></div>


    <!-- content -->
    <div class="col-md-12">
        <form>
            <div class="form-group">
            	<input type="text" class="form-control input-lg" placeholder="Username" />
            </div>
            <div class="form-group">
            	<input type="text" class="form-control input-lg" placeholder="e-mail" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" placeholder="Password"/>
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" placeholder="Retype Password"/>
            </div>
            <button type="submit" class="btn btn-success btn-lg" id="btn_reg">Sign Up</button>
        </form>
    </div>