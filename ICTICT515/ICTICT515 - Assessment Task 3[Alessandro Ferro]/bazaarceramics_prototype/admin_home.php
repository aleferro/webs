<?php
include 'includes/header.php';
?>
<body style='background-color: silver'>
<row>
  <header class="admin-header">
    <div class="collapse navbar-collapse admin-brand">
      <h3>Admin Dashboard</h3>
    </div>
    <nav class="navbar navbar-dark">
        <a class="pull-right navbar-button" href="logout.php">Log out</a>
    </nav>
  </header>
</row>
<div class='container-fluid' style="padding-left: 0">
    <div class="row">
        <div class="col-xs-2 admin-console">
          <?php 
            echo file_get_contents("svg/command-console.svg"); 
          ?>
          <div class="command-panel-content">
            <ul>
                <li class="command-list"><a class="command-button" href="?option=users">Users</a></li>
                <li class="command-list"><a class="command-button" href="?option=catalogue">Catalogue</a></li>
                <li class="command-list"><a class="command-button" href="?option=stats">Stats</a></li>
            </ul>
          </div>
        </div>
        <div class='col-xs-8'>
		  <div class='admin_content'>
            <?php
            if(isset($_GET['option'])) {
                if($_GET['option'] == "users") {
                    include 'admin_users.php';
                } else if($_GET['option'] == "catalogue") {
                    include 'admin_catalogue.php';
                } else if($_GET['option'] == "stats") {
                    include 'admin_stats.php';
                }
            } else {
                include 'admin_stats.php';
              }
            ?>
          </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>