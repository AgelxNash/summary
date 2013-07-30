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
 * @see http://blog.agel-nash.ru/addon/summary.html
 * @date 31.07.2013
 * @version 1.0.2
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
    if(isset($options)){
        $options=explode("&",$options);
        foreach($options as $item){
            list($name,$val)=explode("=",$item);
            switch($name){
                case 'tags': $tags=$val; break;
                case 'len': $len=$val; break;
                case 'noparser': $noparser=$val; break;
                case 'dotted': $dot=$val; break;
                case 'cut': $cut=$val; break;
            }
        }
    }
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
    $summary = new SummaryText($input,$action);
    if(!empty($cut)){
        $summary->setCut($cut);   
    }
    $out = $summary->run($dot);

    unset($summary,$input,$action);

}else{
    $modx->log(modX::LOG_LEVEL_DEBUG,'[summary] not found summary class');
    $out = $text;
}

return $out;