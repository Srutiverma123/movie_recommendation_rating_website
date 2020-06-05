<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Movie Rating</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/movinfo.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/focus.js"></script>
    <script src="js/functions.js"></script>
	<script>
		$(window).on("load resize", function () {
		  if($(window).width() < 995){
			$('#catdesk').hide();
			$('#catmob').show();
			$('#mobsep').show();
		  }else{
			$('#catmob').hide();
			$('#catdesk').show();
			$('#mobsep').hide();
		  }
		}).resize();
    </script>
	<style>
      ul.pagination {
          display: inline-block;
          padding: 0;
          margin: 0;
      }

      ul.pagination li {display: inline;}

      ul.pagination li a {
          color: black;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
      }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#35383B;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Movie Edge</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="col-sm-3 col-md-3">
                    <form action="searchmov.php" method="GET" class="navbar-form" role="search">
                        <div class="input-group">
                            <input name = "name" type="text" class="form-control" placeholder="Search movies" name="q">
                            <div class="input-group-btn">
                                <button class="btn btn-default searchheight" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <ul id="upright" class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#">Login</a></li> -->
                    <li >
                        <a href="http://127.0.0.1:5000/"><b>MovieRecommender</b> <span class="caret"></span></a>
                       </li>
                    <?php
                    if(isset($_COOKIE['movierating'])){
                      session_start();
                      if($_SESSION['admin'] === 1){
                        echo "<li><a href='managemovies.php?page=1'><b>Manage Movies</b></a></li>";
                      }
                      echo "<li><a><b>". $_COOKIE['movierating'] . "</b></a></li>";
                    }
                    ?>
                </ul>
            </div>


            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <div class="col-md-3" id="catdesk" style="display: none">
              <p class="lead">Movie Category</p>
              <div class="list-group">
                <a href="sort.php?category=Action&page=1" class="list-group-item">Action</a>
                <a href="sort.php?category=Adventure&page=1" class="list-group-item">Adventure</a>
                <a href="sort.php?category=Animation&page=1" class="list-group-item">Animation</a>
                <a href="sort.php?category=Comedy&page=1" class="list-group-item">Comedy</a>
                <a href="sort.php?category=Drama&page=1" class="list-group-item">Drama</a>
                <a href="sort.php?category=Thriller&page=1" class="list-group-item">Thriller</a>
                <a href="sort.php?category=Crime&page=1" class="list-group-item">Crime</a>
                <a href="sort.php?category=Music&page=1" class="list-group-item">Music</a>
                <a href="sort.php?category=Romance&page=1" class="list-group-item">Romance</a>
                <a href="sort.php?category=Sci-Fi&page=1" class="list-group-item">Sci-Fi</a>
              </div>
          </div>
          <!--add-->
          <div class="col-md-3" id="catmob" style="display: none">
              <p class="lead">Movie Category</p>
              <select class="form-control" id="Category">
                <option value="empty" selected="selected">Select a Categoy</option>
                <option value="sort.php?category=Action&page=1" class="list-group-item" id="Action">Action</option>
                <option value="sort.php?category=Adventure&page=1" class="list-group-item" id="Adventure">Adventure</option>
                <option value="sort.php?category=Animation&page=1" class="list-group-item" id="Animation">Animation</option>
                <option value="sort.php?category=Comedy&page=1" class="list-group-item" id="Comedy">Comedy</option>
                <option value="sort.php?category=Drama&page=1" class="list-group-item" id="Drama">Drama</option>
                <option value="sort.php?category=Thriller&page=1" class="list-group-item" id="Thriller">Thriller</option>
                <option value="sort.php?category=Crime&page=1" class="list-group-item" id="Crime">Crime</option>
                <option value="sort.php?category=Music&page=1" class="list-group-item" id="Music">Music</option>
                <option value="sort.php?category=Romance&page=1" class="list-group-item" id="Romance">Romance</option>
                <option value="sort.php?category=Sci-Fi&page=1" class="list-group-item" id="Sci-Fi">Sci-Fi</option>
              </select>
          </div>
          <!--add-->
          <span id='mobsep'><br /><br /></span>
            <?php
              $getcat = $_GET['category'];
			         $page_num = $_GET['page'];
               echo "<p class='lead'>&nbsp&nbsp" . $getcat . " Movies: </p>";
               echo "<div class='col-md-9'>";
               $con = mysqli_connect("localhost","root","" , "movie");
                $sql="SELECT * FROM Movies WHERE Category='$getcat'";
                $result = mysqli_query($con,$sql);
                $row_num = mysqli_num_rows($result);
                $count=1;
                while($count <= $row_num){
				  $row = mysqli_fetch_array($result);
				  if($count > ($page_num-1)*5 && $count <= $page_num*5){
						echo "<table><tr>";
						echo "<td><div class='col-sm-3 col-md-3'>";
						  $cover = $row['cover'];
						  $title = $row['title'];
						  echo "<a href='movieinfo.php?name=" . $title . "'><img src='$cover' style='width: auto;height: 120px;'></a>";
						echo "</div></td>";
						echo "<td><div class='col-sm-12 col-md-12'>";
						  echo "<h4><a href='movieinfo.php?name=" . $title . "'>" . $title . "</a></h4>";
						  $director = $row['director'];
						  $stars = $row['stars'];
						  $writers = $row['writers'];
						  $date = $row['release_date'];
						  echo "<h5 style='font-size:80%;font-weight:normal;'><strong>Director</strong>: " . $director . "</h5>";
						  echo "<h5 style='font-size:80%;font-weight:normal;'><strong>Writers</strong>: " . $writers . "</h5>";
						  echo "<h5 style='font-size:80%;font-weight:normal;'><strong>Stars</strong>: " . $stars . "</h5>";
						  echo "<h5 style='font-size:80%;font-weight:normal;'><strong>Release Date</strong>: " . $date . "</h5>";
						echo "</div></td>";
						echo "</tr>";
					  echo "</table>";
					  echo "<hr>";
				  }
				  $count++;
                }
				echo "<div class='center'><ul class='pagination'>";
				for($i = 1; $i <= ceil($row_num/5); $i++){
					echo"<li><a href='sort.php?category=" . $getcat . "&" . "page=" . $i ."'>". $i . "</a></li>";
				  }
				echo "</ul></div>";
			  //div c9
			  echo "</div>";
            ?>

		</div>
		<!-- /.row -->

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
               
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
      var movieCategory=document.getElementById('Category');
      movieCategory.onchange=function() {
        var op=this.options[this.selectedIndex];
        if (op.value!="empty"){
          window.open(op.value, "_self");
        }
      }
    </script>

</body>

</html>
