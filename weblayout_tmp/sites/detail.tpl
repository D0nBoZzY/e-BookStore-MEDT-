<!-- page heading -->
<div class="col-md-8" id="heading">
    <h1>Details</h1>
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
<div class="col-md-6"><hr /></div>


<!-- content -->
<div class="row">
    <div id="bookheading">
    </div>
    <div class="col-md-12">

      <div class="row">
          <div class="col-md-12">
            <h1>{$title}</h1>
            <p><b>{$author}</b></p>
            <p>{$content}</p>
            <p>{$year}</p>
            <p>{$language}</p>
            <p>{$publisher}</p>
          </div>
      </div>
    </div>
  </div>

  <form action="?page=buchmelden" method="post" autocomplete="off">
  <button type="submit" name="meldensubmit">Buch melden</button>
  </form>
