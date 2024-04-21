
<?php $this->view('includes/header', $data); ?>

<div class="container my-4">
  
    <div class="text-center">
        <h3 style="color: #880e4f;">Community Wishes</h3>
    </div>

    <div class="row justify-content-center">

        <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
                <div class="col-sm-12 col-md-6 col-lg-4 my-2 text-center">
                    <div class="card" style="border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                      
                        <?php if (!empty($row->link)): ?>
                            <a href="<?= esc($row->link) ?>" target="_blank" style="text-decoration: none;">
                                <img src="<?= get_image($row->image) ?>" class="card-img-top" style="border-radius: 10px; transition: transform 0.3s;" 
                                onmouseover="this.style.transform='scale(1.05)'" 
                                onmouseout="this.style.transform='scale(1)'">
                            </a>
                        <?php else: ?>
                            <img src="<?= get_image($row->image) ?>" class="card-img-top" style="border-radius: 10px; transition: transform 0.3s;" 
                            onmouseover="this.style.transform='scale(1.05)'" 
                            onmouseout="this.style.transform='scale(1)'">
                        <?php endif; ?>

                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($row->title) ?></h5>
                            <p class="card-text"><i>Uploaded By: <?= esc($row->user_id) ?></i></p>
                            <a href="<?= esc($row->link) ?>" target="_blank" class="btn btn-pink" style="background-color: #e91e63; color: white; transition: background-color 0.3s; border-radius: 5px;">View Product</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            
            <div class="col text-center my-4" style="color: #880e4f;">
                <p>No images found!</p>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php $this->view('includes/footer', $data); ?>

   
  