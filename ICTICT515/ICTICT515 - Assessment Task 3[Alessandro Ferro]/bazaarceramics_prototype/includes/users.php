<?php
include 'includes/user.php';
include 'session.php';

$user1 = new User('images/no-picture.png', 'Admin', 'Admin', 'admin@admin.com', 'adminpass');
$user2 = new User('images/lei.jpg', 'Lei', 'Ella', 'lei@ella.com', 'lala');
$user3 = new User('images/lui.png', 'Lui', 'Egli', 'lui@egli.com', 'illo');
$user4 = new User('images/no-picture.png', 'Vincent', 'Vinnifreg', 'vin@vinni.com', 'fregvinvin');


$users = [$user1, $user2, $user3, $user4];

if(!isset($_SESSION['users'])) {
    $_SESSION['users'] = $users;
}
?>