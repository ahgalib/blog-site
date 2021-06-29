<?php 
 

include("helpers/formet.php");
include"oop-Lib/code.php";
$date_obj = new helps();

$object = new blog();



 ?>

<!DOCTYPE html>
<html>
<head>
	<?php $title = "GAlib Meadi"; ?>
	<?php 
	if(isset($_GET['pageId'])){
		$title2 = $_GET['pageId'];
		$sql3 = "SELECT * FROM blog_add_page WHERE id = '$title2'";
		$query3 = $object->select($sql3);
		if($query3){
			while($row3 = $query3->fetch_assoc()){
	
	 ?>
	
	<title><?php echo $row3['name'];?></title>
<?php }}}else if(isset($_GET['id'])){
				$title3 = $_GET['id'];
				$sql4 = "SELECT * FROM blog_post WHERE id = '$title3'";
				$query4 = $object->select($sql4);
				if($query4){
					while($row4 = $query4->fetch_assoc()){
 ?>
 				<title><?php echo $row4['titlt'];?></title>
 			<?php }}}else if(isset($_GET['cata_id'])){
				$title4 = $_GET['cata_id'];
				$sql5 = "SELECT * FROM blog_category WHERE id = '$title4'";
				$query5 = $object->select($sql5);
				if($query5){
					while($row5 = $query5->fetch_assoc()){
 ?>
 				<title><?php echo $row5['name'];?></title>
 			<?php }}}else{ ?>
 						<title><?php echo $date_obj->dynamicT()?></title>
 					<?php } ?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>

	
	
	
	<div class="headersection templete clear">
		<a href="index.php">
			<?php 
			$sqlti = "SELECT * FROM blog_title";
			$queryti = $object->select($sqlti);
			if($queryti){
				while($rowti = $queryti->fetch_assoc()){
			 ?>
			<div class="logo">
				<img style="width:100px;height:70px;" src="images/<?php echo $rowti['logo']; ?>" alt="Logo"/>
				<h2><?php echo $rowti['title']; ?></h2>
				<p><?php echo $rowti['slogan']; ?></p>
			</div>
			<?php }} ?>
		</a>
		
		<div class="social clear">
			<div class="icon clear">
				<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="post">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>

	<div class="navsection templete">
		<?php 
		$path = $_SERVER['SCRIPT_FILENAME'];
		$current_page = basename($path,'.php');
		 ?>
		<ul>
			<li><a  <?php if($current_page == 'index'){echo 'id="active"';} ?>href="index.php">Home</a></li>
			<?php 
			$sql = "SELECT * FROM blog_add_page";
			$query = $object->select($sql);
			if($query){
				while($row = $query->fetch_assoc()){
			 ?>
			<li><a 
				<?php 
				if(isset($_GET['pageId']) && $_GET['pageId']== $row['id']){
					 echo 'id="active"';
				}
		 ?>
				href="navpage.php?pageId=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>	
		<?php }} ?>
		
			<li><a  <?php if($current_page == 'contact'){echo 'id="active"';} ?> href="contact.php">Contact</a></li>
		</ul>
	</div>