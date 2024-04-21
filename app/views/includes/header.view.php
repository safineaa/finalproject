<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?? 'Header' ?> | <?=APP_NAME?></title>
    <link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/bootstrap.min.css">
    <style>
        
        .navbar-custom {
            background-color: #ff91af; 
        }

        .btn-fun {
            background-color: #ff79c6; 
            border: none;
            border-radius: 20px; 
            color: white;
            padding: 10px 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-fun:hover {
            background-color: #ff61a6; 
            transform: scale(1.05); 
        }

        
        .form-control {
            border-radius: 20px;
            border: 2px solid #ff91af;
        }

        
        .btn-outline-success {
            border-color: #ff91af;
            color: #ff91af;
        }

        .btn-outline-success:hover {
            background-color: #ff91af;
            color: white;
        }
    </style>
</head>
<body>

    <?php
        $ses = new \Core\Session;
    ?>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=ROOT?>"><?=APP_NAME?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=ROOT?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=ROOT?>/photos">My Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=ROOT?>/upload">Upload Item</a>
                    </li>
                    <?php if ($ses->is_logged_in()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?=$ses->user('username')?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
                            <?php if ($ses->user('role') == 'admin'): ?>
                                <li><a class="dropdown-item" href="<?=ROOT?>/admin">Admin</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Log Out</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=ROOT?>/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=ROOT?>/signup">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <form action="<?=ROOT?>/search" method="get" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search wishlist items" aria-label="Search">
                    <button class="btn btn-fun" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>
</html>

