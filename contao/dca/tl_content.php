<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['showcases'] = '{type_legend},type;{showcase_legend},showcases;{invisible_legend:hide},invisible,start,stop;';

$GLOBALS['TL_DCA']['tl_content']['fields']['showcases'] = [
    'inputType' => 'select',
    'foreignKey' => 'tl_showcase.title',
    'eval' => ['chosen' => true, 'includeBlankOption' => true, 'multiple' => true, 'tl_class' => 'w100 clr'],
    'sql' => ['type' => 'string', 'default' => ''],
];
