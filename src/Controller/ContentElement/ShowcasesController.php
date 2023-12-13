<?php

namespace Guave\ShowcaseBundle\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\FilesModel;
use Contao\PageModel;
use Contao\System;
use Contao\Template;
use Guave\ShowcaseBundle\Helper\RelationHelper;
use Guave\ShowcaseBundle\Model\ShowcaseModel;
use Guave\TagBundle\Model\TagModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement("showcases", category="showcases", template="content_element/showcases")
 */
#[AsContentElement('showcases', category: 'showcases', template: 'content_element/showcases')]
class ShowcasesController extends AbstractContentElementController
{
    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        $scope = System::getContainer()->get('contao.routing.scope_matcher');
        if ($scope && $scope->isBackendRequest($request)) {
            $template = new BackendTemplate('be_wildcard');
            $template->title = 'Showcases';
            return $template->getResponse();
        }

        $showcases = ShowcaseModel::findByPublished(1);
        if (!empty($model->showcases)) {
            $showcases = ShowcaseModel::findPublishedById(unserialize($model->showcases));
        }

        foreach ($showcases as $showcase) {
            $showcase->tags = RelationHelper::getRelation(unserialize($showcase->tags), TagModel::class);
            $showcase->linkList = RelationHelper::getRelation(unserialize($showcase->linkList), PageModel::class);
            $showcase->listImage = FilesModel::findByUuid($showcase->listImage)->path;
            $showcase->headerAsset = FilesModel::findByUuid($showcase->headerAsset)->path;
            $showcase->headerAssetMobile = FilesModel::findByUuid($showcase->headerAssetMobile)->path;
        }
        $template->showcases = $showcases;

        return $template->getResponse();
    }
}
