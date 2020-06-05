<?php
$mName ="";
$mID = 0;
if(!empty($_GET['name'])){
  $mName = $_GET['name'];
  $con = mysqli_connect("localhost","root","" , "movie");
  $sql="SELECT M_ID FROM Movies WHERE title='$mName'";
  $result = mysqli_query($con,$sql);
  $mData = mysqli_fetch_array($result);
  $mmid = $mData['M_ID'];
  // if($mmid == NULL){
  //   header('Location: index.php');
  // }
}else{
  $mmid = $_GET['id'];
  // if($mmid == NULL){
  //   header('Location: index.php');
  // }
}

?>
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
	<link href="css/movindex.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
	<script>
		function checktitle(){
			var ctitle = document.getElementById("checkt").value;
			if(ctitle==""){
				alert("Movie title is a must!");
				return false;
			}
		}
	</script>
	<style>
		.updatetable{
			width:100%;
			padding-right:20px;
			table-layout:auto;
		}
		.updatetable td textarea{
			width: 100%;
			word-wrap: break-word;
    		word-break: break-all;
		}
		#storyplot{
		 height: 100px;
		}
		#stars{
		  height: 38px;
		}
		#cover{
		  height: 38px;
		}
		#trailer{
		  height: 38px;
		}
	</style>

    </head>

<body>

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
                  <li id="upright1" class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Register</b> <span class="caret"></span></a>
                      <ul id="login-dp" class="dropdown-menu">
                          <li>
                              <div class="row">
                                  <div class="col-md-12">
                                      <!-- Login via
                                      <div class="social-buttons">
                                          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                      </div>
                                      or -->
                                      <form class="form" role="form" method="POST" action="register.php" accept-charset="UTF-8" id="login-nav">
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputEmail2">Username</label>
                                              <input name="username" onblur="checkUsername()" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username" required>
                                              <a id="usernameHint"></a>
                                          </div>
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputPassword2">Password</label>
                                              <input name="password" onblur="checkPassword()" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                              <a id="pw1Hint"></a>
                                              <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
                                          </div>
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputPassword2">Confirm Password</label>
                                              <input onblur="checkPassword2()" type="password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password" required>
                                              <a id="pw2Hint"></a>
                                              <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
                                          </div>
                                          <div class="form-group">
                                              <button onclick="formsubmit()" id="register" type="button" class="btn btn-primary btn-block">Register Now !</button>
                                          </div>
                                      </form>
                                  </div>
                                  <!-- <div class="bottom text-center">
                                      New here ? <a href="#"><b>Join Us</b></a>
                                  </div> -->
                              </div>
                          </li>
                      </ul>
                  </li>





                  <li id="upright2" class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                      <ul id="register-dp" class="dropdown-menu">
                          <li>
                              <div class="row">
                                  <div class="col-md-12">
                                      <!-- Login via
                                      <div class="social-buttons">
                                          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                      </div>
                                      or -->
                                      <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="register-nav">
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputEmail2">Username</label>
                                              <input name="username" type="text" class="form-control" id="exampleInputEmail3" placeholder="Username" required>
                                          </div>
                                          <div class="form-group">
                                              <label class="sr-only" for="exampleInputPassword2">Password</label>
                                              <input name="password" type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" required>
                                              <!-- <div class="help-block text-right"><a href="">Forget the password ?</a></div> -->
                                          </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-block">Login</button>
                                          </div>
                                          <div class="checkbox">
                                              <label><input name="keepLogin" type="checkbox"> keep me logged-in</label>
                                          </div>
                                      </form>
                                  </div>
                                  <!-- <div class="bottom text-center">
                                      New here ? <a href="#"><b>Join Us</b></a>
                                  </div> -->
                              </div>
                          </li>
                      </ul>
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
                <a href="sort.php?category=Action&page=1" class="list-group-item" id="Action">Action</a>
                <a href="sort.php?category=Adventure&page=1" class="list-group-item" id="Adventure">Adventure</a>
                <a href="sort.php?category=Animation&page=1" class="list-group-item" id="Animation">Animation</a>
                <a href="sort.php?category=Comedy&page=1" class="list-group-item" id="Comedy">Comedy</a>
                <a href="sort.php?category=Drama&page=1" class="list-group-item" id="Drama">Drama</a>
                <a href="sort.php?category=Thriller&page=1" class="list-group-item" id="Thriller">Thriller</a>
                <a href="sort.php?category=Crime&page=1" class="list-group-item" id="Crime">Crime</a>
                <a href="sort.php?category=Music&page=1" class="list-group-item" id="Music">Music</a>
                <a href="sort.php?category=Romance&page=1" class="list-group-item" id="Romance">Romance</a>
                <a href="sort.php?category=Sci-Fi&page=1" class="list-group-item" id="Sci-Fi">Sci-Fi</a>
              </div>
          </div>
		  <!--optimized for mobile-->
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
		  <span id='mobsep'><br /><br /></span>
          <?php
          if($_SESSION['admin'] === 1){
            $con = mysqli_connect("localhost","root","" , "movie");
          $sql="SELECT * FROM Movies WHERE M_ID=$mmid";
          $result = mysqli_query($con,$sql);
          $mData = mysqli_fetch_array($result);
        }
           ?>


            <div class="col-md-9">
				<?php
			   		if($mData['title']===null){
			   			echo "<p class='lead'><b>&nbsp&nbsp Add a Movie: </b></p>";
		   			}
					else{
						echo "<p class='lead'><b>&nbsp&nbsp Update Movie: <q>" . $mData['title'] . "</q></b></p>";
					}
			   	?>
                <div class="thumbnail" style="background-color: #eaeef2;">
                 <form action="/editMovieInfo.php" onsubmit="return checktitle()" method="POST">
                  <table class="updatetable">
					<col style="width: 20%">
					<col style="width: 80%">
                    <tr>
                      <td>Title: </td>
					  <td><textarea name="title" rows="1" id="checkt"><?php echo $mData['title']?></textarea></td>
					  <td id="titlehint"></td>
                    </tr>
                    <tr>
                      <td>Category: </td>
                      <td><textarea name="category" rows="1"><?php echo $mData['Category']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Year: </td>
                      <td><textarea name="year" rows="1"><?php echo $mData['m_year']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Release date: </td>
                      <td><textarea name="release_date" rows="1"><?php echo $mData['release_date']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Director: </td>
                      <td><textarea name="director" rows="1"><?php echo $mData['director']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Writers: </td>
                      <td><textarea name="writers" rows="1"><?php echo $mData['writers']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Stars: </td>
                      <td><textarea name="stars" rows="2"><?php echo $mData['stars']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Cover: </td>
                      <td><textarea name="cover" rows="3"><?php echo $mData['cover']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Trailer: </td>
                      <td><textarea name="trailer" rows="3"><?php echo $mData['trailer']?></textarea></td>
                    </tr>
                    <tr>
                      <td>Storyline: </td>
                      <td><textarea name="storyline" rows="5"><?php echo $mData['storyline']?></textarea></td>
                    </tr>
                    <tr><td><input type='hidden' name='mmid' value='<?php echo "$mmid";?>'/></td></tr>
                    <?php
                    if($_SESSION['admin'] === 1){
                    echo "<tr><td><input type='submit' name='submitedit' class='btn btn-success'></td></tr>";
                    }
                    ?>
                  </table>
                </form>


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
     
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
