<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');
use \Model\Photo;
use \Model\Image;
use \Core\Session;

class Photos
{
    use MainController;

    public function index()
    {
        $session = new Session();
        $photo = new Photo;
        $photo->limit = 24;

        $data['rows'] = $photo->findAll(); // fetch all photos initially
        $data['image'] = new Image;
        $data['session'] = $session; // pass the session object to the view

        $this->view('photos', $data);
    }
}

