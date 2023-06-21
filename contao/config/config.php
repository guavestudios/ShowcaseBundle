<?php

use Guave\ShowcaseBundle\Model\ShowcaseLanguageModel;
use Guave\ShowcaseBundle\Model\ShowcaseModel;
use Guave\ShowcaseBundle\Model\ShowcaseTagModel;

$GLOBALS['TL_MODELS']['tl_showcase'] = ShowcaseModel::class;
$GLOBALS['TL_MODELS']['tl_showcase_language'] = ShowcaseLanguageModel::class;
$GLOBALS['TL_MODELS']['tl_showcase_tag'] = ShowcaseTagModel::class;

$GLOBALS['BE_MOD']['content']['showcase'] = [
    'tables' => [tl_showcase::class, tl_showcase_language::class, tl_content::class],
];

$GLOBALS['BE_MOD']['content']['showcase_tag'] = [
    'tables' => [tl_showcase_tag::class],
];
