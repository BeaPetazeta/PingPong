<?php
namespace LeanProgrammers\Controller;

class PageController
{
    public function index()
    {
        
        $pageView = new \LeanProgrammers\Framework\View('page');

        $pageView->render('index.php');

    }

    public function contact()
    {
        
        $pageView = new \LeanProgrammers\Framework\View('page');

        $pageView->render('contact.php');

    }
}