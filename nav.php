<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
$login_text =  (!isset($_SESSION["userid"]))? 'Login' : 'Logout';
?>

<!-- Grey with black text -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Likes You!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if($_SESSION["userid"] == '100012913927165'): ?>
      <li class="nav-item">
        <a class="nav-link" href="/compare">Compare</a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php"><?php echo $login_text;?></a>
      </li>
    </ul>
  </div>
</nav>