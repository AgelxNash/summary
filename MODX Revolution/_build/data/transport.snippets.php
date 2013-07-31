<?php
/**
 * summary
 * Truncates the HTML string to the specified length
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 */
/**
 * @package DocLister
 * @subpackage build
 */
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => PKG_NAME_LOWER,
    'description' => 'Truncates the HTML string to the specified length',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.summary.php'),
));
$snippets[0]->setProperties(array(
    array(
        'name' => 'text',
        'value' => '',
        'type' => 'textarea',
        'desc' => 'summary.text',
        'lexicon' => 'summary:properties',
        'options' => '',
    ),
    array(
        'name' => 'len',
        'value' => '100',
        'type' => 'numberfield',
        'desc' => 'summary.len',
        'lexicon' => 'summary:properties',
        'options' => '',
    ),
    array(
        'name' => 'noparser',
        'value' => '0',
        'type' => 'list',
        'desc' => 'summary.noparser',
        'lexicon' => 'summary:properties',
        'options' => array(
            array('text' => 'YES','value' => '1'),
            array('text' => 'NO','value' => '0'),
        ),
    ),
    array(
        'name' => 'tags',
        'value' => '0',
        'type' => 'list',
        'desc' => 'summary.tags',
        'lexicon' => 'summary:properties',
        'options' => array(
            array('text' => 'YES','value' => '1'),
            array('text' => 'NO','value' => '0'),
        ),
    ),
	array(
        'name' => 'dotted',
        'value' => '0',
        'type' => 'list',
        'desc' => 'summary.dotted',
        'lexicon' => 'summary:properties',
        'options' => array(
            array('text' => 'Yes','value' => '1'),
            array('text' => 'Cut ignore','value' => '2'),
			array('text' => 'No','value' => '0'),
        ),
    ),
	array(
        'name' => 'cut',
        'value' => '<cut/>',
        'type' => 'textfield',
        'desc' => 'summary.cut',
        'lexicon' => 'summary:properties',
		'options' => ''
    ))
);
return $snippets;