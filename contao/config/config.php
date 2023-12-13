<?php

use Guave\ShowcaseBundle\Model\ShowcaseLanguageModel;
use Guave\ShowcaseBundle\Model\ShowcaseModel;

$GLOBALS['TL_MODELS']['tl_showcase'] = ShowcaseModel::class;
$GLOBALS['TL_MODELS']['tl_showcase_language'] = ShowcaseLanguageModel::class;

$GLOBALS['BE_MOD']['content']['showcase'] = [
    'tables' => [tl_showcase::class, tl_showcase_language::class, tl_content::class],
];
