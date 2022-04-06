<?php declare(strict_types=1);

namespace Core\TemplateFactory;

use Core\TemplateFactory\TitleTemplate;

class PHPTemplateTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1><?php echo \$title; ?></h1>";
    }
}