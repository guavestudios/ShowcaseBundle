<?php

namespace Guave\ShowcaseBundle\Model;

use Contao\Model;
use Contao\Model\Collection;

/**
 * Class ShowcaseLanguageModel
 * @package Guave\ShowcaseBundle\Model
 *
 * @property int $id
 * @property int $pid
 * @property int $tstamp
 * @property string $language
 *
 * @method static ShowcaseLanguageModel|null findById($id, array $opt = array())
 * @method static ShowcaseLanguageModel|null findByPk($id, array $opt = array())
 * @method static ShowcaseLanguageModel|null findOneBy($col, $val, array $opt = array())
 * @method static ShowcaseLanguageModel|null findOneByPid($val, array $opt = array())
 * @method static ShowcaseLanguageModel|null findOneByTstamp($val, array $opt = array())
 * @method static ShowcaseLanguageModel|null findOneByLanguage($val, array $opt = array())
 *
 * @method static Collection|ShowcaseLanguageModel[]|ShowcaseLanguageModel|null findByPid($val, array $opt = array())
 * @method static Collection|ShowcaseLanguageModel[]|ShowcaseLanguageModel|null findByTstamp($val, array $opt = array())
 * @method static Collection|ShowcaseLanguageModel[]|ShowcaseLanguageModel|null findByLanguage($val, array $opt = array())
 * @method static Collection|ShowcaseLanguageModel[]|ShowcaseLanguageModel|null findMultipleByIds($var, array $opt = array())
 * @method static Collection|ShowcaseLanguageModel[]|ShowcaseLanguageModel|null findBy($col, $val, array $opt = array())
 * @method static Collection|ShowcaseLanguageModel[]|ShowcaseLanguageModel|null findAll(array $opt = array())
 *
 * @method static integer countById($id, array $opt = array())
 * @method static integer countByPid($val, array $opt = array())
 * @method static integer countByTstamp($val, array $opt = array())
 * @method static integer countByLanguage($val, array $opt = array())
 */
class ShowcaseLanguageModel extends Model
{
    protected static $strTable = 'tl_showcase_language';

    public static function findByLanguageAndPid(string $language, int $pid, array $opt = []): ShowcaseLanguageModel|Collection|array|null
    {
        return static::findBy(['language=? AND pid=?'], [$language, $pid], $opt);
    }
}
