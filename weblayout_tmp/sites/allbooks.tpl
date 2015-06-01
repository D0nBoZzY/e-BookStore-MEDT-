    <!-- page heading -->
    <div class="col-md-8" id="heading">
        <h1>Your Books</h1>
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

    <!-- navigation -->
    <div class="col-md-12" id="nav-books">
        <nav>
            <ul class="pager">
                <li class="previous"><a href="?page=allbooks&site=prev"><span aria-hidden="true">&larr;</span> Previous</a></li>
                <li class="active"><a href="?page=allbooks&site=1">1 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="?page=allbooks&site=2">2 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="?page=allbooks&site=3">3 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="?page=allbooks&site=4">4 <span class="sr-only">(current)</span></a></li>
                <li class="active">... <span class="sr-only">(current)</span></li>
                <li class="active"><a href="?page=allbooks&site=last">57 <span class="sr-only">(current)</span></a></li>
                <li class="next"><a href="?page=allbooks&site=next">Next <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
    <!-- content -->
    <div class="row">
      <!--{$i = 0}
      {while $i < 9}-->
        <div class="col-md-4">
          <h3>{$title[$i]}</h3>
          <p><i>{$author[$i]}</i></p>
          <p>{$content[$i]}</p>
          <p><a class="btn btn-primary" href="{$path[$i]">View details &raquo;</a></p>
        </div>
        <!--{$i++}
      {/while}-->
    </div>
