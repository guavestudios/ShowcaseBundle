<?php

namespace Guave\ShowcaseBundle\Model;

use Contao\Model\Collection;
use Terminal42\DcMultilingualBundle\Model\Multilingual;

/**
 * Class ShowcaseModel
 * @package Guave\ShowcaseBundle\Model
 *
 * @property int $id
 * @property int $pid
 * @property int $langPid
 * @property string $language
 * @property int $sorting
 * @property int $tstamp
 * @property string $title
 * @property string $alias
 * @property string $subtitle
 * @property string $listImage
 * @property string $lead
 * @property string $metaDescription
 * @property string $shortDescription
 * @property string $headerAsset
 * @property string $headerAssetMobile
 * @property string $tags
 * @property string $linkList
 * @property string $published
 *
 * @method static ShowcaseModel|null findById($id, array $opt=array())
 * @method static ShowcaseModel|null findByPk($id, array $opt=array())
 * @method static ShowcaseModel|null findOneBy($col, $val, array $opt=array())
 * @method static ShowcaseModel|null findOneByPid($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByLangPid($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByLanguage($val, array $opt=array())
 * @method static ShowcaseModel|null findOneBySorting($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByTstamp($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByTitle($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByAlias($val, array $opt=array())
 * @method static ShowcaseModel|null findOneBySubtitle($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByListImage($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByLead($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByMetaDescription($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByShortDescription($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByHeaderAsset($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByHeaderAssetMobile($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByTags($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByLinkList($val, array $opt=array())
 * @method static ShowcaseModel|null findOneByPublished($val, array $opt=array())
 *
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByPid($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLangPid($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLanguage($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBySorting($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTstamp($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTitle($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByAlias($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBySubtitle($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByListImage($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLead($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByMetaDescription($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByShortDescription($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByHeaderAsset($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByHeaderAssetMobile($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTags($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLinkList($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByPublished($val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findMultipleByIds($var, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBy($col, $val, array $opt=array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findAll(array $opt=array())
 *
 * @method static integer countById($id, array $opt=array())
 * @method static integer countByPid($val, array $opt=array())
 * @method static integer countByLangPid($val, array $opt=array())
 * @method static integer countByLanguage($val, array $opt=array())
 * @method static integer countBySorting($val, array $opt=array())
 * @method static integer countByTstamp($val, array $opt=array())
 * @method static integer countByTitle($val, array $opt=array())
 * @method static integer countByAlias($val, array $opt=array())
 * @method static integer countBySubtitle($val, array $opt=array())
 * @method static integer countByListImage($val, array $opt=array())
 * @method static integer countByLead($val, array $opt=array())
 * @method static integer countByMetaDescription($val, array $opt=array())
 * @method static integer countByShortDescription($val, array $opt=array())
 * @method static integer countByHeaderAsset($val, array $opt=array())
 * @method static integer countByHeaderAssetMobile($val, array $opt=array())
 * @method static integer countByTags($val, array $opt=array())
 * @method static integer countByLinkList($val, array $opt=array())
 * @method static integer countByPublished($val, array $opt=array())
 */
class ShowcaseModel extends Multilingual
{
    protected static $strTable = 'tl_showcase';

    public static function findPublishedById($arrIds, array $opt = []): ?Collection
    {
        return self::findBy(
            [self::$strTable.'.published = ? AND ' . self::$strTable.'.id IN (' . implode(', ', $arrIds) . ')'],
            [1],
            $opt
        );
    }
}
