<?php

use Contao\BackendUser;
use Contao\DataContainer;
use Contao\DC_Table;
use Contao\System;

System::loadLanguageFile('tl_content');

$GLOBALS['TL_DCA'][tl_showcase_language::class] = [
    'config' => [
        'dataContainer' => DC_Table::class,
        'ptable' => 'tl_showcase',
        'ctable' => ['tl_content'],
        'switchToEdit' => true,
        'enableVersioning' => true,
        'markAsCopy' => 'title',
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'pid,language' => 'index',
            ],
        ],
    ],
    'list' => [
        'sorting' => [
            'mode' => DataContainer::MODE_PARENT,
            'fields' => ['id'],
            'headerFields' => ['title', 'tstamp'],
            'panelLayout' => 'filter;sort,search,limit',
            'disableGrouping' => true,
            'child_record_callback' => [tl_showcase_language::class, 'addCteType'],
        ],
        'label' => [
            'fields' => ['id', 'language'],
            'format' => '%s - %s',
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ],
        ],
        'operations' => [
            'edit' => [
                'href' => 'table=tl_content',
                'icon' => 'edit.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
            'editheader' => [
                'href' => 'act=edit',
                'icon' => 'header.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
        ],
    ],
    'palettes' => [
        'default' => '{title_legend},language',
    ],
    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true],
        ],
        'pid' => [
            'foreignKey' => 'tl_showcase.title',
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
            'relation' => ['type' => 'belongsTo', 'load' => 'lazy'],
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
        ],
        'language' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'select',
            'options_callback' => [tl_showcase_language::class, 'getPageLanguages'],
            'sql' => ['type' => 'string', 'length' => 2, 'default' => ''],
        ],
    ],
];

class tl_showcase_language extends Backend
{
    public function __construct()
    {
        parent::__construct();
        $this->import(BackendUser::class, 'User');
    }

    public function getPageLanguages(): array
    {
        return System::getContainer()->get('contao.intl.locales')->getEnabledLocaleIds();
    }

    public function addCteType($arrRow): string
    {
        $language = $arrRow['language'];
        $class = 'limit_height';

        return '<div class="cte_type">' . $language . '</div>
            <div class="' . trim($class) . '"></div>' . "\n";
    }
}
