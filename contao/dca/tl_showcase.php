<?php

use Contao\Backend;
use Contao\BackendUser;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\DataContainer;
use Contao\Image;
use Contao\StringUtil;
use Contao\System;
use Terminal42\DcMultilingualBundle\Driver as Multilingual;

$GLOBALS['TL_DCA'][tl_showcase::class] = [
    'config' => [
        'dataContainer' => Multilingual::class,
        'switchToEdit' => true,
        'enableVersioning' => true,
        'markAsCopy' => 'title',
        'languages' => System::getContainer()->get('contao.intl.locales')->getEnabledLocaleIds(),
        'fallbackLang' => 'de',
        'langPid' => 'langPid',
        'langColumnName' => 'language',
        'ctable' => ['tl_showcase_language'],
        'sql' => [
            'keys' => [
                'id' => 'primary',
                'alias' => 'index',
                'langPid,language,sorting,published' => 'index',
            ],
        ],
    ],
    'list' => [
        'sorting' => [
            'mode' => DataContainer::MODE_SORTABLE,
            'fields' => ['title'],
            'flag' => DataContainer::SORT_INITIAL_LETTER_ASC,
            'headerFields' => ['title'],
            'panelLayout' => 'filter;search,limit',
        ],
        'label' => [
            'fields' => ['title'],
            'showColumns' => true,
            'format' => '%s',
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ],
        ],
        'operations' => [
            'edit' => [
                'href' => 'table=tl_showcase_language',
                'icon' => 'edit.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
            'editheader' => [
                'href' => 'act=edit',
                'icon' => 'header.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
            'copy' => [
                'href' => 'act=paste&amp;mode=copy',
                'icon' => 'copy.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
            'cut' => [
                'href' => 'act=paste&amp;mode=cut',
                'icon' => 'cut.svg',
                'attributes' => 'onclick="Backend.getScrollOffset()"',
            ],
            'delete' => [
                'href' => 'act=delete',
                'icon' => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null) . '\'))return false;Backend.getScrollOffset()"',
            ],
            'toggle' => [
                'href' => 'act=toggle&amp;field=published',
                'icon' => 'visible.svg',
                'button_callback' => [tl_showcase::class, 'toggleIcon'],
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg',
            ],
        ],
    ],
    'palettes' => [
        'default' => '{basic_legend},title,alias,subtitle,weight,specification,listImage;{client_legend},client,clientImage;{header_legend},headerAsset,headerAssetMobile,headerAssetPoster,customBackgroundColor;{content_legend},lead,shortDescription,vimeoId,vimeoImage,cinematicRatio,changeBgColors;{meta_legend},tagTitle,tags,regularLink,regularLinkTitle,linksSectionTitle,linksSection,published;',
    ],
    'fields' => [
        'id' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'autoincrement' => true],
        ],
        'langPid' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
        ],
        'language' => [
            'sql' => ['type' => 'string', 'length' => 2, 'default' => ''],
        ],
        'sorting' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
        ],
        'tstamp' => [
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
        ],
        'title' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'mandatory' => true, 'tl_class' => 'w50', 'translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'alias' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'rgxp' => 'alias',
                'unique' => true,
                'tl_class' => 'w50',
                'translatableFor' => '*',
                'isMultilingualAlias' => true,
                'generateAliasFromField' => 'title',
            ],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'subtitle' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'tl_class' => 'w100 clr', 'translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'weight' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50'],
            'sql' => ['type' => 'integer', 'unsigned' => true, 'default' => 0],
        ],
        'specification' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'tl_class' => 'w50', 'translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'listImage' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'multiple' => false,
                'extensions' => '%contao.image.valid_extensions%',
                'tl_class' => 'w50',
                'translatableFor' => '*'
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'client' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'tl_class' => 'w100 clr', 'translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'clientImage' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'multiple' => false,
                'extensions' => '%contao.image.valid_extensions%',
                'tl_class' => 'w50',
                'translatableFor' => '*'
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'headerAsset' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'multiple' => false,
                'extensions' => ['%contao.image.valid_extensions%', 'mp4'],
                'tl_class' => 'w50',
                'translatableFor' => '*'
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'headerAssetMobile' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'multiple' => false,
                'extensions' => ['%contao.image.valid_extensions%', 'mp4'],
                'tl_class' => 'w50',
                'translatableFor' => '*'
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'headerAssetPoster' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'multiple' => false,
                'extensions' => '%contao.image.valid_extensions%',
                'tl_class' => 'w50',
                'translatableFor' => '*'
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'customBackgroundColor' => [
            'excludes' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'colorpicker' => true, 'tl_class' => 'w50', 'translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'lead' => [
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => ['rows' => 4, 'tl_class' => 'w100 clr', 'translatableFor' => '*'],
            'sql' => ['type' => 'text', 'notnull' => false],
        ],
        'shortDescription' => [
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => ['rows' => 4, 'tl_class' => 'w100 clr', 'translatableFor' => '*'],
            'sql' => ['type' => 'text', 'notnull' => false],
        ],
        'vimeoId' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['maxlength' => 255, 'tl_class' => 'w100 clr', 'translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'vimeoImage' => [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'filesOnly' => true,
                'fieldType' => 'radio',
                'multiple' => false,
                'extensions' => '%contao.image.valid_extensions%',
                'tl_class' => 'w50',
                'translatableFor' => '*'
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'cinematicRatio' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'w50 m12'],
            'sql' => ['type' => 'boolean', 'default' => 0],
        ],
        'changeBgColors' => [
            'exclude' => true,
            'inputType' => 'select',
            'default' => '-',
            'options' => &$GLOBALS['TL_LANG']['tl_showcase']['colors'],
            'eval' => ['tl_class' => 'w50 m12', 'includeBlankOption' => true],
            'sql' => ['type' => 'string', 'length' => 255],
        ],
        'tagTitle' => [
            'exclude' => true,
            'inputType' => 'textarea',
            'eval' => ['rows' => 4, 'tl_class' => 'w100 clr', 'translatableFor' => '*'],
            'sql' => ['type' => 'text', 'notnull' => false],
        ],
        'tags' => [
            'exclude' => true,
            'inputType' => 'select',
            'foreignKey' => 'tl_tag.title',
            'eval' => ['chosen' => true, 'includeBlankOption' => true, 'multiple' => true, 'tl_class' => 'w100 clr'],
            'sql' => ['type' => 'string', 'default' => ''],
        ],
        'regularLink' => [
            'excludes' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'tl_class' => 'w50', 'dcaPicker' => true],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'regularLinkTitle' => [
            'excludes' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'tl_class' => 'w50'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'linksSectionTitle' => [
            'excludes' => true,
            'inputType' => 'text',
            'eval' => ['mandatory' => false, 'tl_class' => 'w100 clr'],
            'sql' => ['type' => 'string', 'length' => 255, 'default' => ''],
        ],
        'linksSection' => [
            'exclude' => true,
            'inputType' => 'multiColumnWizard',
            'eval' => [
                'columnFields' => [
                    'link' => [
                        'label' => &$GLOBALS['TL_LANG']['tl_showcase']['linksSectionLink'],
                        'excludes' => true,
                        'inputType' => 'text',
                        'eval' => [
                            'mandatory' => false,
                            'dcaPicker' => true,
                            'style' => 'width: calc(100% - 50px)',
                        ],
                    ],
                    'linkTitle' => [
                        'label' => &$GLOBALS['TL_LANG']['tl_showcase']['linksSectionLinkTitle'],
                        'excludes' => true,
                        'inputType' => 'text',
                        'eval' => ['mandatory' => false, 'style' => 'width: calc(100% - 24px)'],
                    ],
                ]
            ],
            'sql' => ['type' => 'blob', 'notnull' => false],
        ],
        'published' => [
            'exclude' => true,
            'toggle' => true,
            'filter' => true,
            'inputType' => 'checkbox',
            'eval' => ['translatableFor' => '*'],
            'sql' => ['type' => 'string', 'length' => 1, 'default' => ''],
        ],
    ],
];

class tl_showcase extends Backend
{
    public function __construct()
    {
        parent::__construct();
        $this->import(BackendUser::class, 'User');
    }

    public function toggleIcon($row, $href, $label, $title, $icon): string
    {
        $toggleField = 'published';

        $securityHelper = System::getContainer()->get('security.helper');
        if ($securityHelper && !$securityHelper->isGranted(
                ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE,
                self::class . '::' . $toggleField
            )) {
            return '';
        }

        $href .= '&amp;id=' . $row['id'];
        if (!$row[$toggleField]) {
            $icon = 'invisible.svg';
        }

        return '<a href="' . self::addToUrl($href)
            . '" title="' . StringUtil::specialchars($title)
            . '" onclick="Backend.getScrollOffset();return AjaxRequest.toggleField(this, true)">'
            . Image::getHtml(
                $icon,
                $label,
                'data-icon="' . Image::getPath('visible.svg')
                . '" data-icon-disabled="' . Image::getPath('invisible.svg')
                . '"data-state="' . ($row[$toggleField] ? 1 : 0) . '"'
            )
            . '</a> ';
    }
}
