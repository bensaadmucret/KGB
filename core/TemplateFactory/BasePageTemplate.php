<?php declare(strict_types=1);

namespace Core\TemplateFactory;

use Core\TemplateFactory\PageTemplate;

abstract class BasePageTemplate implements PageTemplate
{
    protected $titleTemplate;

    public function __construct(TitleTemplate $titleTemplate)
    {
        $this->titleTemplate = $titleTemplate;
    }
}