<?php
  /**
 * summary
 *
 * @category extender
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 * @see http://blog.agel-nash.ru/addon/summary.html
 * @date 31.07.2013
 * @version 1.0.2
 */
 if(!defined('MODX_BASE_PATH')) {die('HACK?');}
 
$dir = MODX_BASE_PATH. (isset($dir) ? $dir : 'assets/snippets/summary/');
$summary = $dir . "class.summary.php";

if(file_exists($summary) && !class_exists('SummaryText',false)){
		include_once($summary);
}

if(class_exists('SummaryText',false)){
  $action = array();
  
  if(empty($tags)){
  	$action[]='notags';
  }
  
  if(!empty($noparser)){
  	$action[]='noparser';
  }
  
  if(!empty($len)){
  	$action[]='len'.((int)$len>0 ? ':'.(int)$len : '');
  }
  
  
  $action=implode(",",$action);
  
  if(!isset($dot)){
       $dot = 0;
    }

	
  $summary = new SummaryText($text,$action);
  if(!empty($cut)){
    $summary->setCut($cut);   
  }
  $out = $summary->run($dot);
  unset($summary,$action);
}else{
	$out = $text;
}

return $out;
?>