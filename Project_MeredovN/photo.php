<?php
@session_start();
$LangArray = array("sk", "en");
$DefaultLang = "sk";
if(@$_SESSION['NowLang']) {
	if(!in_array($_SESSION['NowLang'], $LangArray)) {
		$_SESSION['NowLang'] = $DefaultLang;
	}
}
else {
	$_SESSION['NowLang'] = $DefaultLang;
}
$language = addslashes($_GET['lang']);
if($language) {
	if(!in_array($language, $LangArray)) {
		$_SESSION['NowLang'] = $DefaultLang;
	}
	else {
		$_SESSION['NowLang'] = $language;
	}
}
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Photo</title>
</head>
<body>
    <header class="headerhomepage"> 
        <a href="index.php"><img src="photo\logo1.svg" alt="logo" class="logo"></a>
        
        <nav> 
            <ul class="nav_panel">
            <li><a href="characteristic.php"><?php echo $Lang['CHARACTERISTIC']; ?></a></li>
          <li><a href="reviews.php"><?php echo $Lang['REVIEWS']; ?></a></li>
          <li><a href="comparison.php"><?php echo $Lang['COMPARISON']; ?></a></li>
          <li><a href="accessories.php"><?php echo $Lang['ACCESSORIES']; ?></a></li>
          <li><a href="faq.php"><?php echo $Lang['Others']; ?></a></li>
    
            </ul>
        </nav>
        <a href="about.php" class="about"><button><?php echo $Lang['ABOUT']; ?></button></a>
       </header>

    <div class="descriptionV">
    <h1 class="main"><?php echo $Lang['Photo Examples:']; ?>  </h1>
    </div>


    <?php
    // Создам директорию через ифы для считания всех файлов в папке
    $dir ="photo/gallery";  
      if (is_dir($dir)){
         if ($dh = opendir($dir)){
                 while (($file = readdir($dh)) !== false){
                    if($file=="." OR $file==".."){} else { 
              ?>          
                         <img src="photo/gallery/<?php echo $file; ?>" style="width: 500px;" tabindex="0" border="2" >
             <?php
              }
             }
         closedir($dh);
         }
      } 
      ?>



    <div id="fottermain">
        <footer>
                  <section class="footerHomePage">RoboHub s.r.o Address Lichnerova 32, 903 01 Senec</section>
                  <section class="link-foot">
                  <a class="link" href="photo.php?lang=sk">Slovensky</a> |
                  <a class="link" href="photo.php?lang=en">English</a>
                  </section>
        </footer>
    </div>
</body>
</html>