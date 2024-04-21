
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<?php $this->view('includes/header', $data); ?>

<div class="container text-center my-4">
    <h1 style="color: #880e4f;">Selected Item</h1>
</div>


<div class="container" style="background-color: #fce4ec; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); padding: 20px;">
    <div class="row justify-content-center align-items-center">

        
        <?php if (!empty($row)): ?>
        <div class="col-md-6 text-center">
            <?php if (!empty($row->link)): ?>
            <a href="<?= esc($row->link) ?>" target="_blank">
                <img src="<?= get_image($row->image) ?>" class="img-fluid rounded" style="width: 100%; max-width: 300px;">
            </a>
            <?php else: ?>
            <img src="<?= get_image($row->image) ?>" class="img-fluid rounded" style="width: 100%; max-width: 300px;">
            <?php endif; ?>
        </div>

        
        <div class="col-md-6 text-left">
            <h4 style="color: #880e4f;"><?= esc($row->title) ?></h4>
            <p><i>By: <?= esc($row->user_id) ?></i></p>
            
            
            <?php if ($ses->is_logged_in() && $ses->user('id') == $row->user_id): ?>
            <div style="margin-top: 20px;">
                <a href="<?= ROOT ?>/upload/delete/<?= $row->id ?>" class="btn btn-pink" style="background-color: #e91e63; color: white; transition: background-color 0.3s; border-radius: 5px;">Delete Item</a>
                <a href="<?= ROOT ?>/upload/edit/<?= $row->id ?>" class="btn btn-pink" style="background-color: #f06292; color: white; transition: background-color 0.3s; border-radius: 5px;">Edit Item</a>
            </div>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="col text-center" style="padding: 30px;">
            <p>Item not found</p>
        </div>
        <?php endif; ?>
    </div>
</div>


<?php $this->view('includes/footer', $data); ?>

