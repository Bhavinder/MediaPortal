<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> | <?php endif; ?> <?php echo e(config('app.name', Lang::get('titles.app'))); ?></title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/css/mdb.min.css" rel="stylesheet">

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/js/mdb.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .title small {
                font-size: 60px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>


<nav class="mb-1 navbar navbar-expand-lg  bg-white">
    <a class="navbar-brand p-0" href="<?php echo e(url('/')); ?>">
      <img src="https://www.quantisence.com/wp-content/uploads/2018/09/logo_300.png" alt="" height="60px">
    </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5" aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-5">
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <?php if(Route::has('login')): ?>
                    <?php if(Auth::check()): ?>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="<?php echo e(url('/home')); ?>">Home</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="<?php echo e(url('/login')); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="<?php echo e(url('/register')); ?>">Register</a>
                    </li>
                    <?php endif; ?>
            <?php endif; ?>



        </ul>
      </div>
    </nav>


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <small>
                        <?php echo e(trans('titles.app2', ['version' => config('settings.app_project_version')])); ?>

                    </small><br />
                    <?php echo trans('titles.app'); ?>

                </div>
                <div class="links">
                    <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <a href="<?php echo e(url('/login')); ?>">Login</a>
                    <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <a href="https://www.quantisence.com/#about">About</a>
                    <a href="https://www.quantisence.com/#contact">Contact Us</a>
                </div>
            </div>
        </div>
    </body>
</html>
