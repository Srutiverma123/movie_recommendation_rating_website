function checkUsername(){
  var username = document.getElementById("exampleInputUsername2").value;
  if(!username){
    document.getElementById("usernameHint").innerHTML = "username is a must";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("usernameHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "checkUsername.php?username="+username, true);
  xhttp.send();
}

function checkPassword(){
  var password = document.getElementById("exampleInputPassword2").value;
  var pwExpression = /^(?=.*[a-zA-Z])(?=.*[0-9])/;
  if(!password){
    // document.getElementById("pw1Hint").innerHTML = "password is a must";
    $('#pw1Hint').text("password is a must");
    return;
  }else if(!password.match(pwExpression)){
  	$('#pw1Hint').text("password must contains alphabetic and numeric characters.");
  	return;
  }else if(password.length < 8){
    $('#pw1Hint').text("password must at least 8 charactors");
    return;
  }
  // $('#pw1Hint').text(password.length);
  // document.getElementById("pw1Hint").innerHTML = password;
  // $('#pw1Hint').text(password);
  $('#pw1Hint').text("");
}


function checkPassword2(){
  var password = document.getElementById("exampleInputPassword2").value;
  var password2 = document.getElementById("exampleInputPassword3").value;
  if(!password2){
    // document.getElementById("pw1Hint").innerHTML = "password is a must";
    $('#pw2Hint').text("this field cannot be left blank");
    return;
  }else if(password !== password2){
    $('#pw2Hint').text("not match");
    return;
  }
  // $('#pw1Hint').text(password.length);
  // document.getElementById("pw1Hint").innerHTML = password;
  // $('#pw2Hint').text(password);
  $('#pw2Hint').text("");
}

function formsubmit(){
  var username = document.getElementById("exampleInputUsername2").value;
  var password = document.getElementById("exampleInputPassword2").value;
  var password2 = document.getElementById("exampleInputPassword3").value;
  var pwExpression = /^(?=.*[a-zA-Z])(?=.*[0-9])/;
  if(!username || !password || password.length < 8 || password !== password2 || !password.match(pwExpression)){
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     if(this.responseText === "Username exists!"){
       return;
     }else{
       $('#login-nav').submit();
     }
    }
  };
  xhttp.open("GET", "checkUsername.php?username="+username, true);
  xhttp.send();
}


$(document).ready(function() {
  if (document.cookie.indexOf("movierating") >= 0) {
    //alert("hello again!");
    document.getElementById("upright1").innerHTML = "<a href='wishlisting.php?page=1'><b>Wish List</b></a>";
    document.getElementById("upright2").innerHTML = "<a href='logout.php'><b>Log out</b></a>";
}
});
