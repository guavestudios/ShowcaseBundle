<?php

namespace Guave\ShowcaseBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\Exception\PageNotFoundException;
use Contao\CoreBundle\ServiceAnnotation\FrontendModule;
use Contao\Environment;
use Contao\ModuleModel;
use Contao\StringUtil;
use Contao\System;
use Contao\Template;
use Guave\ShowcaseBundle\Model\ShowcaseModel;
use Guave\ShowcaseBundle\Model\ShowcaseTagModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @FrontendModule(category="showcase")
 */
class ShowcaseListController extends AbstractFrontendModuleController
{
    use FrontendModuleTrait, ShowcaseModuleTrait;

    private string $subTemplate = 'showcase_list';

    protected function getResponse(Template $template, ModuleModel $model, Request $request): ?Response
    {
        $showcaseIds = StringUtil::deserialize($model->showcases);
        $showcases = ShowcaseModel::findPublishedById($showcaseIds, ['order' => 'weight DESC']);

        if ($showcases === null) {
            throw new PageNotFoundException('Page not found: ' . Environment::get('uri'));
        }

        $showcaseTags = $this->readTags($showcases);
        $template->showcaseTags = $showcaseTags;
        $template->showcases = $this->parseRecords($showcases, $this->subTemplate, $model->jumpTo);

        return $template->getResponse();
    }

    protected function readTags($showcases): array
    {
        $allTags = [];

        foreach ($showcases as $showcase) {
            $showcaseTags = unserialize($showcase->tags);

            if ($showcaseTags) {
                foreach ($showcaseTags as $tag) {
                    if (!array_key_exists($tag, $allTags)) {
                        $allTags[$tag] = ShowcaseTagModel::findById($tag);
                    }
                }
            }
        }

        return $allTags;
    }
}
