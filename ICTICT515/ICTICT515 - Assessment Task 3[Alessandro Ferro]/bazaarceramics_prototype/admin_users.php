<?php
require_once 'includes/user.php';

$user1 = new User('images/no-picture.png', 'Admin', 'Admin', 'admin@admin.com', 'admin');
$user2 = new User('images/lei.jpg', 'Lei', 'Ella', 'lei@ella.com', 'lala');
$user3 = new User('images/lui.png', 'Lui', 'Egli', 'lui@egli.com', 'illo');
$user4 = new User('images/no-picture.png', 'Vincent', 'Vinnifreg', 'vin@vinni.com', 'fregvinvin');


$users = [$user1, $user2, $user3, $user4];
?>
<div>
    <h1 class="admin_text">&lt PREVIEW &gt</h1><h3 class="admin_text">&nbsp&nbspFunctionalities not yet implemented</h3>
</div>
<table class='table  table-sm'>
    <caption><h3>Users</h3></caption>
	<thead>
		<th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>
            <a class="admin-table-button button-add" href="#">Add New</a>
        </th>
    </thead>
    <tbody id='tbody'>

<?php

foreach($users as $user) {
    echo "
        <tr>
			<td><img src=".$user->img." width='50px' heigth='auto' class='image-responsive'></td>
            <td style='padding-top: 1.5em'>".$user->first_name." ".$user->last_name."</td>
            <td style='padding-top: 1.5em'>".$user->email."</td>
            <td style='padding-top: 1.5em'>
			<div>
                <div class='oblique-button'><a class='admin-table-button button-update' href='#'>Update</a></div>
                <div class='oblique-button'><a class='admin-table-button button-delete' href='#'>Delete</a></div>
            </div>
            </td>
        </tr>
    ";
}
?>
    </tbody>
</table>
