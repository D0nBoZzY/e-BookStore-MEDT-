<div class="navbar navbar-inverse navbar-fixed-top" id="header">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     
                </div>
                <div>
                <a class="navbar-brand" href="?page=home">
                        <img width="25%" alt="Brand" src="img/logo_tmp.ico"/>
                        e-Library
                  </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="?page=home">Home</a></li>
			<!-- <li><a href="?page=signup">{$error}</a></li> -->
                	<li><a href="?page=categories">Categories</a></li>
                	<li><a href="?page=authors">Authors</a></li>
                	<li><a href="?page=allbooks">All Books</a></li>
                    </ul>
                
                    <form class="navbar-form navbar-right" action="" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Username" name="uname" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="pw" class="form-control" />
                        </div>    
                        <div class="form-group">
                            <a href="?page=signup" class="navbar-link">?</a>
                            <input type="submit" name="log_btn" class="btn btn-success" value="Sign In">
			</div>
                    </form>
                </div>
            </div>
        </div>
