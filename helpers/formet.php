<?php 
class helps{
  	public function setdate($date){
  		return date("d M, Y" ,strtotime($date));
  	}

  	public function shortText($text,$limit = 200){
  		//$text = $text." ";
  		$text = substr($text,0,$limit)."..............";
  		//$text = $text."....";
  		return $text;
  	}

  	public function dynamicT(){
  		$path = $_SERVER['SCRIPT_FILENAME'];
  		$title = basename($path,'.php');
  		if($title =='index'){
  			$title = 'Home';
  		}else if($title =='contact'){
  			$title = 'contact';
  		}else if($title =='search'){
  			$title = 'search';
  		}
  		return $title;
  	}
}
 ?>
