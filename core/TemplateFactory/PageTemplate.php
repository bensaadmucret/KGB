<?php declare(strict_types=1);

namespace Core\TemplateFactory;

interface PageTemplate
{
    public function getTemplateString(): string;
}