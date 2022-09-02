<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>MCQ SYSTEM || DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">MCQ SYSTEM</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
    echo $_SESSION['email'];  
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home</a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">User</a></li>
		<li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
    <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="dash.php?q=4">Add Quiz</a></li>
        <!-- <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
			
          </ul> -->
        </li><li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->
<?php
  include_once 'dbConnection.php';
  // $title;
  $r1 = mysqli_query($con,'SELECT * FROM quiz WHERE eid="558920ff906b8"') or die("ERROR");
  
  while($row = mysqli_fetch_array($r1)){
    $title = $row['title'];
    $total = $row['total'];
    $tag = $row['tag'];
    $sahi = $row['sahi'];
    $wrong = $row['wrong'];
    $time1=$row['time'];
    $tag =$row['tag'];
    $intro =$row['intro'];
    
      
    echo '
    <div class="col-md-20">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-2"></div><div class="col-md-9"> 
 
 <form class="form-horizontal title1" name="form" action="update.php?q=eaddquiz&eid=558920ff906b8"  method="POST">
<fieldset>



<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">TITLE :</span>
  <span class="input-group-addon" id="basic-addon1" id="title">'.$title.'</span>
</div>


<div class="input-group">
  <span class="input-group-addon" id="basic-addon">QUESTION &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
  <span class="input-group-addon" id="basic-addon1">'.$total.'</span>
  <input type="text" name="total" id ="total" class="form-control" placeholder="QESTION TO BE ADD" aria-describedby="basic-addon1">
</div>


<div class="input-group">
  <span class="input-group-addon" id="basic-addon">MARK ON RIGHT &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;:</span>
  <span class="input-group-addon" id="basic-addon1">'.$sahi.'</span>
  <input type="text" name="sahi" id ="sahi" class="form-control" placeholder="MARK ON ANS PR QUESTION" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon">MARK ON WRONG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
  <span class="input-group-addon" id="basic-addon1">'.$wrong.'</span>
  <input type="text" name="wrong" id ="wrong" class="form-control" placeholder="WRONG MARK ON ANS PR QUESTION NOT LESS THEN '.$wrong.'" aria-describedby="basic-addon1">
</div>

<!-- time limit--> 
<div class="input-group">
  <span class="input-group-addon" id="basic-addon">CURRENT TIME LIMIT&nbsp;:</span>
  <span class="input-group-addon" id="basic-addon1">'.$time1.'</span>
  <input type="text" name="time" id ="time" class="form-control" placeholder="TIME SHIULD NOT BE LESS THEN '.$time1.'" aria-describedby="basic-addon1">
</div>

<!-- TAG--> 
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CURRENT TAG:</span>
  <span class="input-group-addon" id="basic-addon1" id="tag">'.$tag.'</span>
  
</div>

<!-- INTRO--> 
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CURRENT DESCRIPTION:</span>
  <span class="input-group-addon" id="basic-addon1" id ="intro">'.$intro.'</span>
  
</div>






<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>
    
    
    ';
  
  
  }  
  

?>


<?php
if(@$_GET['q']==6 && (@$_GET['step'])==4 ){
  $eid =@$_GET['eid'];
  $r1 = "SELECT qid,qns FROM questions WHERE eid =`558920ff906b8`";
  $r2 = mysqli_query($con,$r1);
  while(mysqli_fetch_row($r2)){
    $qestion1 = $row['qns'];
    $qid= $row['qid'];
    $r3 = "SELECT `qid`,`option` FROM `options` WHERE `qid`=$qid";

    $r4=mysqli_query($con,$r3);

    while(mysqli_fetch_row($r4)){
      $op= $row['option'];
      $r5 =(mysqli_query($con,"SELECT `total` FROM `quiz` WHERE `eid`=`558920ff906b8`"));
      while(mysqli_fetch_row($r5)){
        $t= $row['total'];
        if (@$_GET['n']>=$t){
          for($i=1;$i>=$t;$i++){
            
            echo '
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon">'.$i.'</span>
            <span class="input-group-addon" id="basic-addon1">'.$qestion1.'</span>
            <br>
            <span class="input-group-addon" id="basic-addon">OPTION FOR THE QUESIOTN </span>
            <span class="input-group-addon" id="basic-addon">'.$op.'</span>
            
        </div>
          
          
          
          
          ';
        }
      }

      };
     
    };

  };

}
?>