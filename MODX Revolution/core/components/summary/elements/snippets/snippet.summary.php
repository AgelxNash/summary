<?php
/**
 * summary
 * Truncates the HTML string to the specified length
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @category extender
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 * @package DocLister
 * @see https://github.com/AgelxNash/DocLister/blob/master/core/controller/extender/summary.extender.inc
 * @see http://wiki.modx.im/evolution:snippets:truncate
 * @date 14.03.2012
 * @version 1.0.0
 *
 * @var modX $modx
 * @var array $scriptProperties
 * @var string $input
*/

if(empty($modx) || !($modx instanceof modX)) return '';

if(isset($text) && !empty($text)){
    $input=$text;
}

if (is_scalar($input)){
    if(empty($input)){
        $modx->log(modX::LOG_LEVEL_DEBUG,'[summary] text is empty, aborting.');
        return '';
    }
}else{
    $modx->log(modX::LOG_LEVEL_DEBUG,'[summary] text is not scalar, aborting.');
    return '';
}

$modelPath = $modx->getOption('summary.core_path',null,$modx->getOption('core_path').'components/summary/').'model/';

if(file_exists($modelPath.'summary/summary.class.php') && !class_exists('SummaryText',false)){
    require_once($modelPath.'summary/summary.class.php');
}

$out='';
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
  
  $summary = new SummaryText($input,$action);
  $out = $summary->run();

  unset($summary,$input,$action);

}else{
    $modx->log(modX::LOG_LEVEL_DEBUG,'[summary] not found summary class');
	$out = $text;
}

return $out;
?>