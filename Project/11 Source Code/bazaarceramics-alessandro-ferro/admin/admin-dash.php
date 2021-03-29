<?php
include "inc/header.php";
include "inc/navbar.php";

$conn = $pdo->open();
?>
<div class="d-flex flex-column min-vh-100">
    <main id="page-content" class="container-fluid py-3 overflow-auto">     
        <div class="position- col-sm-10">
          <div id="sales" class="collapse show" data-parent="#page-content">
            <div class="col-sm-10">
              <canvas id="myChart"></canvas>    
            </div>
          </div>
          <!-- CUSTOMERS -->
          <div id="customers" class="collapse" data-parent="#page-content">
            <h5 class="card-title">Customers</h5>
            <div class="d-flex justify-content-end">
              <input type="text" id="searchCustomerInput" onkeyup="searchCustomer()" placeholder="Search for names..">
            </div>
            <table id="customersTable" class="table table-hover">
               <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Email</th>
                  <th scope='col'><button class='btn btn-success btn-sm' data-target='#addCustModal'><span class='addCust'>Create</span></button></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  try{
                    $stmt = $conn->prepare("SELECT userId, firstName, lastName, email FROM users WHERE role = :role");
                    $stmt->execute(['role'=>'customer']);

                    foreach($stmt as $row) {
                        echo "
                          <tr>
                            <th scope='row'>".$row['userId']."</th>
                            <td>".$row['firstName']."</td>
                            <td>".$row['lastName']."</td>
                            <td>".$row['email']."</td>
                            <td>
                              <button class='btn btn-danger btn-sm'><span class='deleteCust' data-id='".$row['userId']."'>Delete</span></button>
                            </td>
                          </tr>
                        ";
                      }
                    }
                    catch(PDOException $e) {
                      echo $e->getMessage();
                  }
                  ?>
              </tbody>
            </table>
          </div>


          <!-- PRODUCTS -->
          <div id="products" class="collapse" data-parent="#page-content">
          <h5 class="card-title">Products</h5>
          <div class="d-flex justify-content-end">
              <input type="text" id="searchProductsInput" onkeyup="searchProducts()" placeholder="Search for names..">
            </div>
            <table id="productsTable" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Img</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price $</th>
                  <th scope='col'><button class='btn btn-success btn-sm' data-target='#addProdModal'><span class='addProd'>Create</span></button></th>
                </tr>
              </thead>
              <tbody>
              <?php
                  try{
                    $stmt = $conn->prepare("SELECT productId, productImage, productName, price, description, categoryId, size, glazeType, dateProduced FROM products");
                    $stmt->execute();

                    $counter = 1;
                    foreach($stmt as $row) {
                        echo "
                          <tr>
                            <th>".$row['productId']."</th>
                            <td><img src='../".$row['productImage']."' width='50px' alt='some pottery'></td>
                            <td>".$row['productName']."</td>
                            <td>".$row['price']."</td>
                            <td hidden>".$row['description']."</td>
                            <td hidden>".$row['categoryId']."</td>
                            <td hidden>".$row['size']."</td>
                            <td hidden>".$row['glazeType']."</td>
                            <td hidden>".$counter."</td>
                            <td>
                              <button class='btn btn-danger btn-sm'><span class='deleteProd' data-id='".$row['productId']."'>Delete</span></button>
                              <button class='btn btn-primary btn-sm' data-target='#updateProdModal'><span class='updateProd' data-id='".$counter."'>Update</span></button>
                            </td>
                          </tr>
                        ";
                        $counter++;
                      }
                    }
                    catch(PDOException $e) {
                      echo $e->getMessage();
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- MODAL CREATE NEW CUSTOMER -->
        <div class="modal fade" id="addCustModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- MODAL ADD CUSTOMER FORM -->
                <form>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">First Name</label>
                    <input type="text" id='firstname' name='firstname' class="form-control" placeholder="First Name" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput4">Last Name</label>
                    <input type="text" id='lastname' name='lastname' class="form-control" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Role</label>
                    <input type="text" id='role' name='role' class="form-control" placeholder="Customer" value="customer" readonly>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="email" id='email' name='email' class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Password</label>
                    <input type="password" id='password' name='password' class="form-control" placeholder="Password" required>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <p class="text-warning" id="addCustNotification"></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><span class="addCustBtn">Add</span></button>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL UPDATE PRODUCT -->
        <div class="modal fade" id="updateProdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- MODAL UPDATE PRODUCT FORM -->
                <form>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Product ID</label>
                    <input type="text" id='productid' name='productid' class="form-control" placeholder="Product ID" readonly>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Image</label>
                    <input type="text" id='productimage' name='productimage' class="form-control" placeholder="Image Path" readonly>
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Name</label>
                    <input type="text" id='productname' name='productname' class="form-control" placeholder="Product Name">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput3">Price</label>
                    <input type="text" id='productprice' name='productprice' class="form-control" placeholder="Price">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput4">Description</label>
                    <input type="text" id='productdescription' name='productdescription' class="form-control" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Category ID</label>
                    <input type="text" id='categoryid' name='categoryid' class="form-control" placeholder="Category">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Size</label>
                    <input type="text" id='size' name='size' class="form-control" placeholder="Size">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Glaze Type</label>
                    <input type="text" id='glaze' name='glaze' class="form-control" placeholder="Glaze">
                  </div>
                  <div class="form-group" hidden>
                    <label for="formGroupExampleInput">Table Row #</label>
                    <input type="text" id='rowcounter' name='rowcounter' class="form-control" placeholder="Table Row #">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <p class="text-warning" id="updateProdNotification"></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><span class="saveChanges">Save changes</span></button>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL ADD NEW PRODUCT -->
        <div class="modal fade" id="addProdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- MODAL ADD PRODUCT FORM -->
                <form>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Image</label>
                    <input type="text" id='addproductimage' name='addproductimage' class="form-control" placeholder="Image Path">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2">Name</label>
                    <input type="text" id='addproductname' name='addproductname' class="form-control" placeholder="Product Name">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput3">Price</label>
                    <input type="text" id='addproductprice' name='addproductprice' class="form-control" placeholder="Price">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput4">Description</label>
                    <input type="text" id='addproductdescription' name='addproductdescription' class="form-control" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Category ID</label>
                    <input type="text" id='addcategoryid' name='addcategoryid' class="form-control" placeholder="Category">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Size</label>
                    <input type="text" id='addsize' name='addsize' class="form-control" placeholder="Size">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput">Glaze Type</label>
                    <input type="text" id='addglaze' name='addglaze' class="form-control" placeholder="Glaze">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <p class="text-warning" id="addProdNotification"></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"><span class="addProdBtn">Add</span></button>
              </div>
            </div>
          </div>
        </div>
        <!-- TOAST MESSAGE -->
        <div class="toast align-items-center" id="toast" data-delay="1250" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body" id="toastMessage"></div>
          </div>
        </div>
    </main>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</div>
<?php
include "inc/footer.php";
?>