<?php
 use google\appengine\api\users\User;
 use google\appengine\api\users\UserService;
 global $user,$userdata,$appid;

 $user = UserService::getCurrentUser();
 if($user){
	 $uid = $user->getUserId();
 $userfile = "gs://$appid/user_$uid.json";
 $userdata = array();
 if(file_exists($userfile)){
 $filedata = file_get_contents($userfile);
 $userdata = json_decode($filedata,true);
 }else{
 $userdata['nick']=$user->getNickname();
}
  
 $url = UserService::createLogoutUrl('/index.php');
 echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$userdata['nick']."<b class='caret'></b></a>";
 echo "<ul class='dropdown-menu'><li><a href='index.php?p=useredit'>Edit User</a></li>";
 echo "<li><a href='$url'>Logout</a></li></ul></li>";
 
 }else{
 $url = UserService::createLoginUrl('/index.php');
 echo "<li><a href='$url'>Login</a></li>";
 }
?>