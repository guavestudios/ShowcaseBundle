<?php

namespace Guave\ShowcaseBundle\Model;

use Contao\Model\Collection;
use Terminal42\DcMultilingualBundle\Model\Multilingual;

/**
 * Class ShowcaseModel
 * @package Guave\ShowcaseBundle\Model
 *
 * @property int $id
 * @property int $langPid
 * @property string $language
 * @property int $sorting
 * @property int $tstamp
 * @property string $title
 * @property string $alias
 * @property string $subtitle
 * @property int $weight
 * @property string $specification
 * @property string $listImage
 * @property string $client
 * @property string $clientImage
 * @property string $headerAsset
 * @property string $headerAssetMobile
 * @property string $headerAssetPoster
 * @property string $customBackgroundColor
 * @property string $lead
 * @property string $shortDescription
 * @property string $vimeoId
 * @property string $vimeoImage
 * @property bool $cinematicRatio
 * @property string $changeBgColors
 * @property string $tagTitle
 * @property string $tags
 * @property string $regularLink
 * @property string $regularLinkTitle
 * @property string $linksSectionTitle
 * @property string $linksSection
 * @property string $published
 *
 * @method static ShowcaseModel|null findById($id, array $opt = array())
 * @method static ShowcaseModel|null findByPk($id, array $opt = array())
 * @method static ShowcaseModel|null findOneBy($col, $val, array $opt = array())
 * @method static ShowcaseModel|null findOneByPid($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByLangPid($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByLanguage($val, array $opt = array())
 * @method static ShowcaseModel|null findOneBySorting($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByTstamp($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByTitle($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByAlias($val, array $opt = array())
 * @method static ShowcaseModel|null findOneBySubtitle($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByWeight($val, array $opt = array())
 * @method static ShowcaseModel|null findOneBySpecification($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByListImage($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByClient($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByClientImage($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByHeaderAsset($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByHeaderAssetMobile($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByHeaderAssetPoster($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByCustomBackgroundColor($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByLead($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByShortDescription($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByVimeoId($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByVimeoImage($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByCinematicRatio($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByChangeBgColors($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByTagTitle($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByTags($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByRegularLink($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByRegularLinkTitle($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByLinksSectionTitle($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByLinksSection($val, array $opt = array())
 * @method static ShowcaseModel|null findOneByPublished($val, array $opt = array())
 *
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByPid($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLangPid($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLanguage($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBySorting($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTstamp($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTitle($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByAlias($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBySubtitle($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByWeight($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBySpecification($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByListImage($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByClient($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByClientImage($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByHeaderAsset($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByHeaderAssetMobile($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByHeaderAssetPoster($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByCustomBackgroundColor($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLead($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByShortDescription($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByVimeoId($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByVimeoImage($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByCinematicRatio($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByChangeBgColors($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTagTitle($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByTags($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByRegularLink($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByRegularLinkTitle($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLinksSectionTitle($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByLinksSection($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findByPublished($val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findMultipleByIds($var, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findBy($col, $val, array $opt = array())
 * @method static Collection|ShowcaseModel[]|ShowcaseModel|null findAll(array $opt = array())
 *
 * @method static integer countById($id, array $opt = array())
 * @method static integer countByPid($val, array $opt = array())
 * @method static integer countByLangPid($val, array $opt = array())
 * @method static integer countByLanguage($val, array $opt = array())
 * @method static integer countBySorting($val, array $opt = array())
 * @method static integer countByTstamp($val, array $opt = array())
 * @method static integer countByTitle($val, array $opt = array())
 * @method static integer countByAlias($val, array $opt = array())
 * @method static integer countBySubtitle($val, array $opt = array())
 * @method static integer countByWeight($val, array $opt = array())
 * @method static integer countBySpecification($val, array $opt = array())
 * @method static integer countByListImage($val, array $opt = array())
 * @method static integer countByClient($val, array $opt = array())
 * @method static integer countByClientImage($val, array $opt = array())
 * @method static integer countByHeaderAsset($val, array $opt = array())
 * @method static integer countByHeaderAssetMobile($val, array $opt = array())
 * @method static integer countByHeaderAssetPoster($val, array $opt = array())
 * @method static integer countByCustomBackgroundColor($val, array $opt = array())
 * @method static integer countByLead($val, array $opt = array())
 * @method static integer countByShortDescription($val, array $opt = array())
 * @method static integer countByVimeoId($val, array $opt = array())
 * @method static integer countByVimeoImage($val, array $opt = array())
 * @method static integer countByCinematicRatio($val, array $opt = array())
 * @method static integer countByChangeBgColors($val, array $opt = array())
 * @method static integer countByTagTitle($val, array $opt = array())
 * @method static integer countByTags($val, array $opt = array())
 * @method static integer countByRegularLink($val, array $opt = array())
 * @method static integer countByRegularLinkTitle($val, array $opt = array())
 * @method static integer countByLinksSectionTitle($val, array $opt = array())
 * @method static integer countByLinksSection($val, array $opt = array())
 * @method static integer countByPublished($val, array $opt = array())
 */
class ShowcaseModel extends Multilingual
{
    protected static $strTable = 'tl_showcase';

    public static function findPublishedById($arrIds, array $opt = []): Collection|ShowcaseModel|array|null
    {
        return self::findBy(
            [self::$strTable . '.published = ? AND ' . self::$strTable . '.id IN (?)'],
            [1, implode(', ', $arrIds)],
            $opt
        );
    }
}
