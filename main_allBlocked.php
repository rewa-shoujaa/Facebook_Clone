<?php
session_start();
if (empty($_SESSION["User_id"])) {
  header("Location:./index.html");
}
$User_ID = $_SESSION["User_id"];
//echo($User_ID);

$Image_URL = $_SESSION["Image_URL"];
$fname = $_SESSION["firstname"];
$lname = $_SESSION["lastname"];
$name = $fname . " " . $lname;
?>

<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from themified.com/friend-finder/newsfeed-people-nearby.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:31:20 GMT -->
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Nearby People | Find Local People</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>
    <form action="POST">
    <input type="hidden" id="userID_hidden" name="userID_hidden" value=<?php echo $User_ID; ?>>
    <input type="hidden" id="userName_hidden" name="userName_hidden" value=<?php echo $name; ?>>
  </form>

    <!-- Header
    ================================================= -->
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main_allUsers.php"><img src="images/logo.png" alt="logo" /></a>
          </div>

           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="main_allUsers.php">Manage Connections</a></li>
                    <li><a href="edit-profile.php">Edit Profile</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notifications</a>
                  <ul class="dropdown-menu newsfeed-home" id="Notifications_container">
                  
                  </ul>
              </li>

              <li class="dropdown"><a href="logout.php">logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

    			<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3" style="position:static;">
            <div class="profile-card">
            	<img src= <?php echo "'" . $Image_URL . "'"; ?> alt="user" class="profile-photo" />
            	<h5><a href="" class="text-white"><?php echo $name; ?></a></h5>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li ><i class="icon ion-ios-people"></i><div><a href="main_allUsers.php" >Network</a></div></li>
              <li  ><i class="icon ion-ios-people-outline"></i><div><a href="main_allFriends.php" >Friends</a></div></li>
              <li ><i class="icon ion-ios-people"></i><div><a href="main_pendingRequests.php">Pending Requests</a></div></li>
              <li ><i class="icon ion-chatboxes"></i><div><a href="main_allBlocked.php" >Blocked</a></div></li>

            </ul><!--news-feed links ends-->

          </div>
    			<div class="col-md-6">

             <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
            	<div class="row">
                <form class="navbar-form navbar-left hidden-sm" name="SearchForm" id="SearchForm" method="POST" action=".\API\search-allUsers.php">
                  <div class="form-group" style="margin-right: 5px;">
                
                    <input type="text" id="Searchtxt" name="Searchtxt" class="form-control" placeholder="Search friends...">
                  </div>
                  <input type="Submit" class="btn btn-primary pull-right" style="float:right;" value="Search" id="SearchBtn" name="SearchBtn">
                </form>
                </div>
                </div>

           

            <!-- Nearby People List
            ================================================= -->
            <div class="people-nearby">
              <div class="nearby-user" id="FriendsList">

              </div>
              
            </div>
          </div>

	<!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			<div class="col-md-3 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey" id="PendingUserList">Pending Requests</h4>
              
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            <div class="col-md-3 col-sm-3">
              <a href="#"><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
            </div>
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>Thunder Team © 2016. All rights reserved</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>


    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      var AcceptPending;
      var DeclinePending;
      var Unblock;
      //var goAllUsers;
      //var goAllFriends;
      //var goAllBlocked;

      $(function() {
        let User_ID= document.getElementById("userID_hidden").value;
        console.log(User_ID);
        getAllUsers();
        getPendingUsers();
        getAllNotifications();

          ///////////////////////////////All USERS

        async function fetch_Network_API(){
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/get_allblocked.php",
					data: {
            userID:User_ID
                        },
          success: function(response){
            Users=JSON.parse(response);
                         },
				})
			}catch(error) {
				console.log(error);
			}

        console.log(Users);
        return Users;
			}

		function getAllUsers(){
			fetch_Network_API().then(results => {
        //console.log(results);
        var newUser="";
        for(var user in results) {
            newUser=newUser+'<div id="user_'+results[user]["id"]+'">'+
            '<div class="row" style="margin-bottom:10px;">'+
                  '<div class="col-md-3 col-sm-3">'+
                    '<img src="'+results[user]["image_url"]+'" class="profile-photo-lg" " />'+
                  '</div>'+
                  '<div class="col-md-5 col-sm-5" >'+
                    '<h5>'+ results[user]["firstName"]+' '+ results[user]["LastName"]+'</h5>'+
                  '</div>'+
                  '<div class="col-md-2 col-sm-2">'+
                    '<button class="btn btn-primary pull-right" id="add_'+results[user]["id"]+'" onclick="Unblock(this.id)">Unblock</button>'+
                  '</div>'+
                '</div>'+
                '</div>';
                }
                console.log(newUser);
                $("#FriendsList").html("");
                $("#FriendsList").append(newUser);
			}).catch(error => {
				console.log(error.message);
			})
		}

    ////////////////////////////// Search All Users

    async function getSearchResults_API(SearchValue){
      //var Pending_Users;
          try{
				result = await $.ajax({
                   type: "POST",
                   url: "http://localhost/Facebook_Project-RewaShoujaa/API/search_allBlocked.php",
                     data: {
                        userID: User_ID,
                         SearchKey: SearchValue
                        },
                        success: function(response){
                          SearchResult=JSON.parse(response);
                          console.log(SearchResult);
                          
                         }
                        })
                        return SearchResult;
			}catch(error) {
				console.log(error);
			}
      

        //console.log(Pending_Users);
			}
    

    
    $('#SearchForm').on('submit',  function(e) {
      
                var SearchValue=$("#Searchtxt").val();

                if (SearchValue !=""){
                //let SearchResult;
              

                e.preventDefault();
               
        var newUser="";
        getSearchResults_API(SearchValue).then(results => {
  
        console.log("this is the result"+SearchResult);
        for(var user in results) {
          
            newUser=newUser+ '<div id="user_'+results[user]["id"]+'">'+
            '<div class="row" style="margin:8px;">'+
                  '<div class="col-md-3 col-sm-3">'+
                    '<img src="'+results[user]["image_url"]+'" class="profile-photo-lg" />'+
                  '</div>'+
                  '<div class="col-md-5 col-sm-5">'+
                    '<h5>'+ results[user]["firstName"]+' '+ results[user]["LastName"]+'</h5>'+
                    '<p class="hide" class="User_ID_hidden">'+results[user]["id"]+'</p>'+
                  '</div>'+
                  '<div class="col-md-2 col-sm-2">'+
                    '<button class="btn btn-primary pull-right" id="add_'+results[user]["id"]+'" onclick="Unblock(this.id)">Unblock</button>'+
                  '</div>'+
                '</div>'+
                '</div>';
                }
                console.log(newUser);
                $("#Searchtxt").val("");
                $("#FriendsList").html("");
                $("#FriendsList").append(newUser);
              }).catch(error => {
				console.log(error.message);
			})
    }
        
    });

    ///////////////////////////////PENDING USERS
    

    async function fetch_Pending_API(){
      //var Pending_Users;
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/get_pendingUsers.php",
					data: {
            userID:User_ID
                        },
          success: function(response){
            Pending_Users=JSON.parse(response);
                         },
				})
			}catch(error) {
				console.log(error);
			}

        console.log(Pending_Users);
        return Pending_Users;
			}

		function getPendingUsers(){
			fetch_Pending_API().then(results => {
        //console.log(results);
        var newUser="";
        for(var user in results) {
            newUser=newUser+'<div class="follow-user" id="pendinguser_'+ results[user]["connection_id"]+'">'+
                '<img src="'+results[user]["image_url"]+'" class="profile-photo-sm pull-left" />'+
                '<div>'+
                  '<h5>'+ results[user]["firstName"]+' '+ results[user]["LastName"]+'</h5>'+
                  '<button class="btn " style="display:inline-block;margin:5px;background: #27aae1;color: #fff;border-radius:15px;" id="accept_'+ results[user]["connection_id"]+'" onclick="AcceptPending(this.id)">Accept</button>'+
                  '<button class="btn " style="display:inline-block;margin:5px;background: red;color: #fff;border-radius: 15px;" id="decline_'+ results[user]["connection_id"]+'" onclick="DeclinePending(this.id)">Decline</button>'+
                  '<p class="hide" class="Pending_ID_hidden">'+results[user]["id"]+'</p>'+
                  '<p class="hide" class="Pending_cnx_ID_hidden">'+results[user]["connection_id"]+'</p>'+
                '</div>'+
              '</div>';
                }
                //$("#PendingUserList").html("");
                $("#PendingUserList").append(newUser);
			}).catch(error => {
				console.log(error.message);
			})
		}


    /////////////////////////Pending Functionalities

    async function Accept_Pending_API(id){
      var user_name = document.getElementById("userName_hidden").value;
      console.log("user_name");
      var notification_content= user_name+" accepted your friend request";
      //var Pending_Users;
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/accept_pendingUsers.php",
					data: {
            connectionID:id,
            notification:notification_content
                        }
				})
			}catch(error) {
				console.log(error);
			}
			}

     AcceptPending =function(id){
      //var id=$(this).attr("id");
      console.log(id);
      var id_pending=id.split("_");
      id_pending=id_pending[1];
      console.log(id_pending);
      Accept_Pending_API(id_pending).then(results => {
        //console.log(results);
        $("#pendinguser_"+id_pending).hide();
      }).catch(error => {
				console.log(error.message);
			})
    }

    

    async function Decline_Pending_API(id){
      //var Pending_Users;
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/decline_pendingUsers.php",
					data: {
            connectionID:id
                        }
				})
			}catch(error) {
				console.log(error);
			}
			}

      DeclinePending =function(id){
      //var id=$(this).attr("id");
      console.log(id);
      var id_pending=id.split("_");
      id_pending=id_pending[1];
      console.log(id_pending);
      Decline_Pending_API(id_pending).then(results => {
        //console.log(results);
        $("#pendinguser_"+id_pending).hide();
        getAllUsers();
      }).catch(error => {
				console.log(error.message);
			})
    }


    /////////////////////////////USER functionalities


    async function Add_User_API(id){
      var user_name = document.getElementById("userName_hidden").value;
      console.log("user_name");
      var notification_content= user_name+" sent you a friend request";
      //var Pending_Users;
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/add_user.php",
					data: {
            AddedUserID:id,
            userID:User_ID,
            notification:notification_content
                        }
				})
			}catch(error) {
				console.log(error);
			}
			}

      AddUser =function(id){
      //var id=$(this).attr("id");
      console.log(id);
      var id_pending=id.split("_");
      id_pending=id_pending[1];
      console.log(id_pending);
      Add_User_API(id_pending).then(results => {
        //console.log(results);
        $("#user_"+id_pending).hide();
      }).catch(error => {
				console.log(error.message);
			})
    }


    async function Unblock_User_API(id){
      //var Pending_Users;
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/unblock_friend.php",
					data: {
            AddedUserID:id,
            userID:User_ID
                        }
				})
			}catch(error) {
				console.log(error);
			}
			}

      Unblock =function(id){
      //var id=$(this).attr("id");
      console.log(id);
      var id_pending=id.split("_");
      id_pending=id_pending[1];
      console.log(id_pending);
      Unblock_User_API(id_pending).then(results => {
        //console.log(results);
        $("#user_"+id_pending).hide();
      }).catch(error => {
				console.log(error.message);
			})
    }

    /////////////////////Get Notifications


    async function fetch_Notifications_API(){
          try{
				result = await $.ajax({
					type: "POST",
					url: "http://localhost/Facebook_Project-RewaShoujaa/API/get_notifications.php",
					data: {
            userID:User_ID
                        },
          success: function(response){
            Users=JSON.parse(response);
                         },
				})
			}catch(error) {
				console.log(error);
			}

        console.log(Users);
        return Users;
			}

		function getAllNotifications(){
			fetch_Notifications_API().then(results => {
        //console.log(results);
        var NotificationList="";
        for(var user in results) {
          NotificationList=NotificationList+ 
          '<li><a href="" id="notification_'+results[user]["notificationID"]+'">'+results[user]["notification"]+'</a></li>';
        }
        console.log(NotificationList);
        $("Notifications_container").html("");
        $("#Notifications_container").append(NotificationList);
			}).catch(error => {
				console.log(error.message);
			})
		}

    //////////Navigation

    //goAllUsers =function(){$.get(main_allUsers.php); return false;}
    //goAllFriends=function(){$.get(main_allFriends.php); return false;}
    //goAllBlocked=function(){$.get(main_allBlocked.php); return false;}



     






      });
    </script>



  </body>

<!-- Mirrored from themified.com/friend-finder/newsfeed-people-nearby.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Sep 2021 08:31:21 GMT -->
</html>
