<?php
 if(!$user) return;
global $userdata;
 if($_POST["feedback"]){
$rec=array();
$rec['user']=$user->getUserId();
$rec['name']=$userdata['nick'];
$rec['feedback']=$_POST['feedback'];
$rec['time']=mktime();
$fbdata[ ] = $rec;
$fbjson = json_encode($fbdata, JSON_PRETTY_PRINT);
file_put_contents($fbfile,$fbjson);
echo "<br> Complete <a href='index.php?p=$page' id='pagelink'>OK</a>";
 return;
 }
 $pic = userpic($user->getUserId());

?>
<br><br>
<form method="post" action="">
<div class="row">
<div class="col-xs-10">
<?= "<img class='img-circle' src='$pic' width='60'>" ?>
 <label for="feedback"><?= $userdata['nick'] ?></label>
 <div class="input-group">
 <input type="text" class="form-control" placeholder="Comment here" name="feedback">
 <span class="input-group-btn">
 <button class="btn btn-default">SEND </button>
 </span>
 </div>
</div> <!-- /.col-10 -->
</div> <!-- /.row -->
</form>

