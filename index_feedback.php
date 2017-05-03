<?php
 use google\appengine\api\users\UserService;
 global $appid,$page,$title,$userdata;

 $fbfile = "gs://$appid/$page.json";
 $fbdata = array();
 

 if(file_exists($fbfile)){
 $fbjson = file_get_contents($fbfile);
 $fbdata = json_decode($fbjson, true);
 echo "<hr>";
 foreach($fbdata as $fb){
 $text = htmlspecialchars($fb['feedback']);
 $time=date("d/m/Y H:i:s",$fb['time']);


 $pic = userpic($fb['user']);
 echo "<div class='row'>";
 echo "<div class='col-xs-1'></div>";
 echo "<div class='col-xs-10'><img class='img-circle' src='$pic' width='60'>";
 echo "<a href='#'>$fb[name]</a><br>$text <br>";
 echo "<a href='#'>Like</a> $time<hr>";
 echo "</div>";
 echo "</div>";
 }
 }


 $user = UserService::getCurrentUser();
 if($user){
 include("index_feedback_add.php");
 }
?>