<?php 

namespace Controller;

defined('ROOTPATH') OR exit('Access Denied!');
use \Model\Photo;
use \Model\Image;

/**
 * Upload class
 */
class Upload
{
    use MainController;

    private $photo;
    private $session;
    private $request;

    public function __construct()
    {
        $this->photo = new Photo;
        $this->session = new \Core\Session;
        $this->request = new \Core\Request;
    }

    public function index()
    {
        if (!$this->session->is_logged_in()) {
            message("Log in to upload an item");
            redirect('login');
        }

        $data = [
            'title' => "Upload Item",
            'mode' => 'new',
            'photo' => $this->photo
        ];

        if ($this->request->posted()) {
            $post_data = $this->request->post();
            $post_data['user_id'] = $this->session->user('id');
            $post_data['image'] = "";
            $post_data['link'] = $post_data['link'] ?? '';

            if ($this->photo->validate($post_data)) {
                $this->handleImageUpload($post_data);
            }

            $data['errors'] = $this->photo->errors;
        }

        $this->view('upload', $data);
    }

    private function handleImageUpload(&$post_data)
    {
        $files = $this->request->files();
        if (!empty($files['image']['name'])) {
            $folder = 'uploads/';
            $this->prepareUploadDirectory($folder);
            $allowed = ['image/jpeg', 'image/png', 'image/webp'];
            if (in_array($files['image']['type'], $allowed)) {
                $post_data['image'] = $folder . time() . $files['image']['name'];
                if (move_uploaded_file($files['image']['tmp_name'], $post_data['image'])) {
                    $image = new Image;
                    $image->resize($post_data['image'], 1200);
                    $this->photo->insert($post_data);
                    redirect('photos');
                }
            } else {
                $this->photo->errors['image'] = "File type not supported";
            }
        } else {
            $this->photo->errors['image'] = "Image Required";
        }
    }

    private function prepareUploadDirectory($folder)
    {
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
            file_put_contents($folder . 'index.php', "");
        }
    }

	public function edit($id = null)
{
    if (!$this->session->is_logged_in()) {
        message("Log in to edit an item");
        redirect('login');
    }

    $data = [
        'title' => "Edit Item",
        'mode' => 'edit',
        'photo' => $this->photo,
        'row' => $this->photo->first(['id' => $id, 'user_id' => $this->session->user('id')])
    ];

    if ($this->request->posted() && $data['row']) {
        $post_data = $this->request->post();
        $post_data['id'] = $data['row']->id;
        $post_data['link'] = $post_data['link'] ?? '';

        if ($this->photo->validate($post_data)) {
            $this->handleImageUpdate($data['row'], $post_data);
        }

        $data['errors'] = $this->photo->errors;
    }

    $this->view('upload', $data);
}

private function handleImageUpdate($row, &$post_data)
{
    $files = $this->request->files();
    $folder = 'uploads/';
    $this->prepareUploadDirectory($folder);
    $allowed = ['image/jpeg', 'image/png', 'image/webp'];

    if (!empty($files['image']['name']) && in_array($files['image']['type'], $allowed)) {
        $new_image_path = $folder . time() . $files['image']['name'];
        if (move_uploaded_file($files['image']['tmp_name'], $new_image_path)) {
            if (file_exists($row->image)) {
                unlink($row->image); 
            }
            $post_data['image'] = $new_image_path;
            $image = new Image;
            $image->resize($post_data['image'], 1200);
        } else {
            $this->photo->errors['image'] = "Failed to move uploaded file.";
        }
    }

    if (empty($this->photo->errors)) {
        $this->photo->update($row->id, $post_data);
        redirect('photos');
    }
}
public function delete($id = null)
{
    if (!$this->session->is_logged_in()) {
        message("You need to log in to delete an image");
        redirect('login');
    }

    $row = $this->photo->first(['id' => $id, 'user_id' => $this->session->user('id')]);
    if ($this->request->posted() && $row) {
        if (file_exists($row->image)) {
            unlink($row->image); 
        }
        $this->photo->delete($row->id);
        redirect('photos');
    } else {
        message("Item not found or you're not authorized to delete it");
    }

    $this->view('upload', [
        'title' => "Delete item",
        'mode' => 'delete',
        'photo' => $this->photo,
        'row' => $row
    ]);
}


    
}
