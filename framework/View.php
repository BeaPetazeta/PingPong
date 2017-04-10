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

      switch ($template) {

            case '404error.php':
                include 'templates/layout/header.php'; 
                include $templateFile;
                include 'templates/layout/footer.php';
                break;
            case 'contact.php':
                include 'templates/layout/header.php';
                include 'templates/layout/menu.php'; 
                include $templateFile;
                include 'templates/layout/footer.php';
                break;
            
            default:
                include 'templates/layout/header.php';
                include 'templates/layout/menu.php';
                include 'templates/layout/banner.php'; 
                include $templateFile;
                include 'templates/layout/footer.php';
                break;
        }

    }
}
