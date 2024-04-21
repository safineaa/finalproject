<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');

/*instantiate photo class to read from database*/ 
use \Model\Photo;
use \Model\Image;

/**
 * home class
 */
class Home
{
	use MainController;

	public function index()
	{
       
		$data ['title'] = "Home";

		/*for adding photos to homepage*/
		$photo = new Photo;
		$photo->limit = 12;
		$data['rows'] = $photo ->findAll();
		$data['image'] = new Image;

		$this->view('home',$data);
	}

}
