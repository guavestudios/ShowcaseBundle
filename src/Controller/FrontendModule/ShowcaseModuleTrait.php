<?php

namespace Guave\ShowcaseBundle\Controller\FrontendModule;

use Contao\ContentModel;
use Contao\Controller;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Model;
use Contao\PageModel;
use Guave\ShowcaseBundle\Model\ShowcaseLanguageModel;
use Guave\ShowcaseBundle\Model\ShowcaseTagModel;

trait ShowcaseModuleTrait
{
    protected function parseRecord(Model $record, string $templateFile, ?int $detailPageId = null): string
    {
        $template = new FrontendTemplate($templateFile);
        $template->setData($record->row());
        $template->tags = $this->getRelation(unserialize($record->tags), ShowcaseTagModel::class);
        $template->linkList = $this->getRelation(unserialize($record->linkList), PageModel::class);

        $template->hasListImage = false;
        if ($record->listImage !== null) {
            $template->hasListImage = true;
            $template->listImage = FilesModel::findByUuid($record->listImage)->path;
        }

        $template->hasHeaderAsset = false;
        if ($record->headerAsset !== null) {
            $template->hasHeaderAsset = true;
            $template->headerAsset = FilesModel::findByUuid($record->headerAsset)->path;
            $template->headerAssetMobile = FilesModel::findByUuid($record->headerAssetMobile)->path;
        }

        $parentId = ShowcaseLanguageModel::findByLanguageAndPid($GLOBALS['TL_LANGUAGE'], $record->id)->id;
        $template->main = static function () use ($parentId): ?string {
            $elements = ContentModel::findPublishedByPidAndTable($parentId, 'tl_showcase_language');

            if (null === $elements) {
                return null;
            }

            $content = '';
            foreach ($elements as $element) {
                $content .= Controller::getContentElement($element->id);
            }

            return $content;
        };

        if ($detailPageId !== null) {
            $template->jumpTo = $detailPageId;
            $template->detailPage = $this->generateLink($GLOBALS['TL_LANG']['MSC']['more'], $record, $detailPageId);
        }

        return $template->parse();
    }
}
