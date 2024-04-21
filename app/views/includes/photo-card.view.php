<div class="card m-2 text-center" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <a href="<?= esc($row->link) ?>" target="_blank" style="text-decoration: none;">
        <img src="<?=get_image($image->getThumbnail($row->image, 250, 251))?>" class="card-img-top" style="border-radius: 15px; transition: transform 0.3s;" 
        onmouseover="this.style.transform='scale(1.05)'" 
        onmouseout="this.style.transform='scale(1)'">
        <div class="card-body">
            <h5 style="color: #000000;"><?=esc($row->title)?></h5>
            <p style="color: #666666;">Uploaded By: <?=esc($row->user_id)?></p>
            <a href="<?=ROOT?>/photo/<?=$row->id?>" class="btn btn-primary" style="background-color: #e91e63; color: white; transition: background-color 0.3s; border-radius: 5px;">Update Item</a>
        </div>
    </a>
</div>


