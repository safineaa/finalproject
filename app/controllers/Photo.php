<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');
use \Model\Image;
/**
 * Photo class
 */
class Photo
{
	use MainController;

	public function index($id = null)
	{
		$photo = new \Model\Photo;

		

		$data['row'] = $photo->first(['id'=>$id]);
		$data['image'] = new Image;
     

		$data['ses'] = new \Core\Session;
	
		$this->view('photo', $data);
	}

}
