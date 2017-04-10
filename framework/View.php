<?php
namespace LeanProgrammers\Framework;

class View{
    protected $templatePath;
    protected $attributes;

    public function __construct($templatePath = '', $attributes = [])
    {
        $this->templatePath = 'templates/' . rtrim($templatePath, '/\\') . '/';
        $this->attributes = $attributes;
    }

    public function render(string $template, array $data = [])
    {
        $data = array_merge($this->attributes, $data);
        $templateFile = $this->templatePath . $template;
        extract($data);

 
        include 'templates/layout/header.php'; 
        include $templateFile;
        include 'templates/layout/footer.php';
        
          
    }
}
