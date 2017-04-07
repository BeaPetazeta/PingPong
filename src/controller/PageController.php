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


    public function error404()
    {
        
        $pageView = new \LeanProgrammers\Framework\View('page');

        $pageView->render('404error.php');

    }


    public function userLogin()
    {
        
        $pageView = new \LeanProgrammers\Framework\View('page');

        $pageView->render('loginUser.php');

    }


    public function compLogin()
    {
        
        $pageView = new \LeanProgrammers\Framework\View('page');

        $pageView->render('compLogin.php');

    }

}