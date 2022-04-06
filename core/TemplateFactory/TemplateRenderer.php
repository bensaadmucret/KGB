<?php declare(strict_types=1);

namespace Core\TemplateFactory;

interface TemplateRenderer
{
    public function render(string $templateString, array $arguments = []): string;
}