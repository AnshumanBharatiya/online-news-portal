<div class="col-md-4">
  <!-- Search Widget -->
  <div class="card mb-5 shadow bg-white rounded">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <form name="search" action="search.php" method="post">
        <div class="input-group">
          
          <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
          <span class="input-group-btn">
            <button class="btn btn-info " type="submit">Go!</button>
          </span>
        </form>
      </div>
    </div>
  </div>
  <!-- Categories Widget -->
  <div class="card my-5 shadow bg-white rounded">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="list-unstyled list-group">
            <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
            while($row=mysqli_fetch_array($query))
            {
            ?>
            <li>
              <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" class="list-group-item list-group-item-action list-group-item-info"><?php echo htmlentities($row['CategoryName']);?></a>
            </li>
            <?php } ?>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Side Widget -->
  <div class="card my-5 shadow bg-light rounded">
    <h5 class="card-header">Recent News</h5>
    <div class="card-body">
      <ul class="p-3">
        <?php
        $query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
        while ($row=mysqli_fetch_array($query)) {
        ?>
        <li>
          <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>