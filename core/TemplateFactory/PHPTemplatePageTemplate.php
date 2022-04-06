<?php declare(strict_types=1);

namespace Core\TemplateFactory;

use Core\TemplateFactory\BasePageTemplate;


class PHPTemplatePageTemplate extends BasePageTemplate
{
    public function getTemplateString(): string
    {
        $renderedTitle = $this->titleTemplate->getTemplateString();

        return <<<HTML
        <div class="page">
            $renderedTitle
            <article class="content"><?= \$content; ?></article>           
        </div>
        HTML;
    }
}