<?php

namespace Guave\ShowcaseBundle\Model;

use Contao\Model;
use Contao\Model\Collection;

/**
 * Class TagModel
 * @package Guave\ShowcaseBundle\Model
 *
 * @property int $id
 * @property int $pid
 * @property int $sorting
 * @property int $tstamp
 * @property string $title
 *
 * @method static ShowcaseTagModel|null findById($id, array $opt=array())
 * @method static ShowcaseTagModel|null findByPk($id, array $opt=array())
 * @method static ShowcaseTagModel|null findOneBy($col, $val, array $opt=array())
 * @method static ShowcaseTagModel|null findOneByPid($val, array $opt=array())
 * @method static ShowcaseTagModel|null findOneBySorting($val, array $opt=array())
 * @method static ShowcaseTagModel|null findOneByTstamp($val, array $opt=array())
 * @method static ShowcaseTagModel|null findOneByTitle($val, array $opt=array())
 *
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findByPid($val, array $opt=array())
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findBySorting($val, array $opt=array())
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findByTstamp($val, array $opt=array())
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findByTitle($val, array $opt=array())
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findMultipleByIds($var, array $opt=array())
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findBy($col, $val, array $opt=array())
 * @method static Collection|ShowcaseTagModel[]|ShowcaseTagModel|null findAll(array $opt=array())
 *
 * @method static integer countById($id, array $opt=array())
 * @method static integer countByPid($val, array $opt=array())
 * @method static integer countBySorting($val, array $opt=array())
 * @method static integer countByTstamp($val, array $opt=array())
 * @method static integer countByTitle($val, array $opt=array())
 */
class ShowcaseTagModel extends Model
{
    protected static $strTable = 'tl_showcase_tag';
}
