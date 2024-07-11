<?php

namespace Guave\ShowcaseBundle\Controller\FrontendModule;

use Contao\Config;
use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Exception\PageNotFoundException;
use Contao\CoreBundle\Routing\ResponseContext\HtmlHeadBag\HtmlHeadBag;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\Environment;
use Contao\Input;
use Contao\ModuleModel;
use Contao\System;
use Guave\ShowcaseBundle\Model\ShowcaseModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(category: 'showcase')]
class ShowcaseReaderController extends AbstractFrontendModuleController
{
    use FrontendModuleTrait, ShowcaseModuleTrait;

    private string $subTemplate = 'showcase_reader';

    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        if (!isset($_GET['items']) && isset($_GET['auto_item']) && Config::get('useAutoItem')) {
            Input::setGet('items', Input::get('auto_item'));
        }

        if (!Input::get('items')) {
            return $template->getResponse();
        }

        $showcase = ShowcaseModel::findByAlias(Input::get('items'));
        if ($showcase === null) {
            throw new PageNotFoundException('Page not found: ' . Environment::get('uri'));
        }

        $template->showcase = $this->parseRecord($showcase, $this->subTemplate);

        $responseContext = System::getContainer()
            ->get('contao.routing.response_context_accessor')
            ->getResponseContext();
        if ($responseContext && $responseContext->has(HtmlHeadBag::class)) {
            /** @var HtmlHeadBag $htmlHeadBag */
            $htmlHeadBag = $responseContext->get(HtmlHeadBag::class);
            $htmlDecoder = System::getContainer()->get('contao.string.html_decoder');

            if ($showcase->title) {
                $htmlHeadBag->setTitle(
                    $showcase->specification ? $showcase->title . ' · ' . $showcase->specification : $showcase->title
                );
            }

            if ($showcase->shortDescription) {
                $htmlHeadBag->setMetaDescription($htmlDecoder->inputEncodedToPlainText($showcase->shortDescription));
            } elseif ($showcase->lead) {
                $htmlHeadBag->setMetaDescription($htmlDecoder->htmlToPlainText($showcase->lead));
            }
        }

        return $template->getResponse();
    }
}
