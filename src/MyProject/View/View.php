<?php

namespace MyProject\View;

class View
{
    private $templatePath;
    private $extraVars = [];


    public function __construct(string $templatesPath)
    {
        $this->templatePath = $templatesPath;
    }
    public function setVar(string $name, $value): void
    {
        $this->extraVars[$name] = $value;
    }
    public function renderHtml(string $templateName, array $vars = [], int $code = 200)
    {
        http_response_code($code);

        extract($this->extraVars);
        extract($vars);

        ob_start();
        include $this->templatePath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }


}