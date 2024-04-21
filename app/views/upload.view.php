
<?php $this->view('includes/header', $data); ?>

<style>
   
    .btn-fun, .btn-danger, .btn-primary {
        background-color: #ff79c6; 
        border: none;
        color: white;
        position: relative;
        overflow: hidden;
        transition: background-color 0.5s;
    }
    
    .btn-fun:hover, .btn-danger:hover, .btn-primary:hover {
        background-color: #e864b7; 
        box-shadow: 0 0 15px #ff79c6; 
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }

    .form-control, .input-group-text {
        border-radius: 15px;
        border: 2px solid #ff91af;
    }

    .text-danger {
        color: #db7093; 
    }

    .img-thumbnail {
        border: 2px solid #ff91af;
        transition: transform 0.3s ease-in-out;
    }

    .img-thumbnail:hover {
        transform: scale(1.05); 
        cursor: pointer;
    }
</style>

<div class="mx-auto col-md-4 bg-light shadow m-4 p-4 g-3 border" style="border-color: #ff91af;">

<h3><?=$title?></h3> 

<?php if( $mode == 'new' || (($mode == 'edit' || $mode == 'delete') && $row)):?>

    <?php if($mode == 'delete'):?>
       <div class="alert alert-danger text-center">Do you want to delete?</div>
    <?php endif?>

<form method="post" enctype="multipart/form-data">
    <input class="form-control" value="<?=old_value('title', $row->title ?? '')?>" name="title" placeholder="Item Name"><br>
    <div><small class="text-danger"><?=$photo->getError('title')?></small></div><br>

    <input class="form-control" value="<?=old_value('link', $row->link ?? '')?>" name="link" placeholder="Link URL"><br>
<div><small class="text-danger"><?=$photo->getError('link')?></small></div><br>

    <label class="d-block">

    <?php if($mode != 'delete'):?>
        <div class="input-group mb-3">
            <input onchange="display_image(this.files[0])" name="image" type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Select Image</label>
        </div>
        <div><small class="text-danger"><?=$photo->getError('image')?></small></div><br>
    <?php endif?>

    <div>                                  
        <img src="<?=get_image($row->image ?? '')?>" class="js-image-preview img-thumbnail mx-auto d-block">
    </div>
    </label>

    <?php if($mode == 'delete'):?>
        <button class="btn btn-danger">Delete</button>
    <?php else:?>
        <button class="btn btn-fun">Save</button>
    <?php endif?>

</form>
<?php else:?>
    <div class="p-2 text-center">Item not found!</div>
<?php endif?>

</div>

<script type="text/javascript">
    function display_image(file)
    {
        let allowed = ['image/jpeg','image/png','image/webp'];
        if(!allowed.includes(file.type))
        {
            alert("The only files supported are: " + allowed.toString().replaceAll("image/",""));
            return;
        }
        document.querySelector(".js-image-preview").src = URL.createObjectURL(file);
    }
</script>

<?php $this->view('includes/footer', $data); ?>
