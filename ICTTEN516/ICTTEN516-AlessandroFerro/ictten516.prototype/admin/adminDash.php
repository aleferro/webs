<?php
include "inc/header.php";
?>
<div class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md sticky-to navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Home</a>
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
        </div>
    </nav>
    <main id="page-content" class="container-fluid py-3 overflow-auto">        
        <div class="position- col-sm-10">
          <div id="sales" class="collapse" data-parent="#page-content">
            <div class="col-sm-10">
              <canvas id="myChart"></canvas>    
            </div>
          </div>
          <div id="customers" class="collapse" data-parent="#page-content">
            <h5 class="card-title">Customers</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Email</th>
                  <th scope="col"><button class="btn btn-success btn-sm">New</button></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Cust</td>
                  <td>Omer</td>
                  <td>cust@omer.com</td>
                  <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Cust</td>
                  <td>Omer</td>
                  <td>cust@omer.com</td>
                  <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Cust</td>
                  <td>Omer</td>
                  <td>cust@omer.com</td>
                  <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="products" class="collapse" data-parent="#page-content">
          <h5 class="card-title">Products</h5>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Img</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col"><button class="btn btn-success btn-sm">New</button></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td><img src="../img/pottery1.jpg" width="50px" alt="random pottery"></td>
                  <td>Pottery</td>
                  <td>Some pottery</td>
                  <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td><img src="../img/pottery1.jpg" width="50px" alt="random pottery"></td>
                  <td>Pottery</td>
                  <td>Some pottery</td>
                  <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td><img src="../img/pottery1.jpg" width="50px" alt="random pottery"></td>
                  <td>Pottery</td>
                  <td>Some pottery</td>
                  <td>
                    <button class="btn btn-danger btn-sm">Delete</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</div>
<?php
include "inc/footer.php";
?>