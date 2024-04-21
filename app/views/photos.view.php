
<?php $this->view('includes/header', $data); ?>


<div class="container text-center my-4">
    <h3 style="color: #880e4f; font-family: 'Arial', sans-serif;">My Items</h3>
</div>


<div class="container">
    <div class="row justify-content-center">

        <?php if (!empty($data['rows']) && $data['session']->is_logged_in()): ?>
            <?php foreach ($data['rows'] as $row): ?>
                <?php if ($row->user_id == $data['session']->user('id')): ?>
                   
                    <div class="col-sm-12 col-md-6 col-lg-4 my-3 text-center">
                        <?php $this->view('includes/photo-card', ['row' => $row, 'image' => $data['image']]); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if (empty(array_filter($data['rows'], fn($row) => $row->user_id == $data['session']->user('id')))): ?>
                <div class="col-12 text-center my-4" style="color: #880e4f; font-family: 'Arial', sans-serif;">
                    <p>No items found for your account.</p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="col-12 text-center my-4" style="color: #880e4f; font-family: 'Arial', sans-serif;">
                <p>No images found or you are not logged in!</p>
            </div>
        <?php endif; ?>
    
    </div>
</div>


<?php $this->view('includes/footer', $data); ?>



