<?php
include "inc/session.php";
?>
<nav class="navbar navbar-expand-md sticky-to navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin Dash</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar1">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" data-target="#sales:not(.show)" data-toggle="collapse" data-parent="#page-content">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-target="#customers:not(.show)" data-toggle="collapse">Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-target="#products:not(.show)" data-toggle="collapse">Products</a>
            </li>
        </ul>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li>
                <a class='text-center'><a class='nav-link text-secondary' href='../logout.php'>Sign out</a>
            </li>
        </ul>
    </div>
</nav>