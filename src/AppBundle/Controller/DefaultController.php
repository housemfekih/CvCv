<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    


        /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('test.html.twig');
    }

           /**
     * @Route("/log_out", name="logout_page")
     */
    public function logoutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('logout.html.twig');
    }

         /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/admin", name="admin_page")
     *
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('admin.html.twig');
    }


      /**
     * @Route("/calendrier", name="calend_page")
     */
    public function calendAction(Request $request)

   {
       return $this->render('calendrier.html.twig');
}


   
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/user", name="user_page")
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function userAction(){
      
        return $this->render('user.html.twig');
}

}
