<div class="container-fluid">

<nav class="container navbar navbar-expand-lg navbar-light ">
    
  <a class="navbar-brand" href="#">
  <img src="<?php echo URLROOT . '/assets/imgs/coder.jpeg' ?>" alt="" width="30" height="30"> 
  
    May Food</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto ">
      <?php if(getSession()):?>
        <li class="nav-item active">
        <a class="nav-link " href="<?php echo URLROOT .'/admin/home' ?>">Admin pannel <span class="sr-only"></span></a>
      </li>
        <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link " href="#">Features</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php if(getSession() != false) :?>
          <?php echo getSession()->name; ?>
          <?php else:?>
           Member
        <?php endif;?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if(getSession()!= false): ?>
          <a class="dropdown-item " href="<?php echo  URLROOT . '/user/logout' ?>">Logout</a>
          <?php else: ?>
          <a class="dropdown-item " href="<?php echo  URLROOT . '/user/login' ?>">Login</a>
          <a class="dropdown-item " href="<?php echo  URLROOT . '/user/register' ?>">Register</a>
          <?php endif; ?>
        </div>
      </li>
      
    </ul>
  </div>
</nav>
</div>