// SALES CHART //////////////////////////////////////////////////////////////////
function getSalesData() {
  const today = new Date().toLocaleDateString();
  var yesterday = new Date(Date.now() - 864e5);
  var twodaysago = new Date(Date.now() - (864e5*2));
  var threedaysago = new Date(Date.now() - (864e5*3));
  var fourdaysago = new Date(Date.now() - (864e5*4));
  var fivedaysago = new Date(Date.now() - (864e5*5));
  yesterday = yesterday.toLocaleDateString();
  twodaysago = twodaysago.toLocaleDateString();
  threedaysago = threedaysago.toLocaleDateString();
  fourdaysago = fourdaysago.toLocaleDateString();
  fivedaysago = fivedaysago.toLocaleDateString();

  // Ajax call to get sales data
  $.ajax({
    url: 'sales-report.php',
    type: 'POST',
    data: { date:today },
    success: function(response){

      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [fivedaysago, fourdaysago, threedaysago, twodaysago, yesterday, today],
              datasets: [{
                  label: 'Total sales in $',
                  data: [response[0], response[1], response[2], response[3], response[4], response[5]],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
      
    
    },
    dataType:"json"
  });
}

getSalesData();


// CUSTOMERS SEARCH //////////////////////////////////////////////////////////
function searchCustomer() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchCustomerInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customersTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// PRODUCTS SEARCH ///////////////////////////////////////////////////////////
function searchProducts() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchProductsInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("productsTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// FUNCTION TO DELETE CUSTOMER
function deleteCustomer() {
      // AJAX CALL TO DELETE CUSTOMER
      $('.deleteCust').click(function(){
        var el = this;
       
        // Delete id
        var deleteid = $(this).data('id');
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
           // AJAX Request
           $.ajax({
             url: 'user-delete.php',
             type: 'POST',
             data: { id:deleteid },
             success: function(response){
      
               if(response == 1){
                // Remove row from HTML Table
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800,function(){
                    $(this).remove();
                });
               }else{
             alert('Invalid ID.');
               }
      
             }
           });
        }
      
      });
}


// FUNCTION TO DELETE PRODUCT
function deleteProduct() {
      // AJAX CALL TO DELETE PRODUCT 
      $('.deleteProd').click(function(){
        var el = this;
       
        // Delete id
        var delproductid = $(this).data('id');
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            // AJAX Request
            $.ajax({
              url: 'product-delete.php',
              type: 'POST',
              data: { id:delproductid },
              success: function(response){
       
                if(response == 1){
                  // Remove row from HTML Table
                  $(el).closest('tr').css('background','tomato');
                  $(el).closest('tr').fadeOut(800,function(){
                    $(this).remove();
                  });
                }else{
                  alert('Invalid product ID.');
                }
          
              }
            });
        }
          
    });
}


// FUNCTION TO UPDATE PRODUCTS
function updateProduct() {
      // UPDATE BUTTON TO POPULATE MODAL
      $('.updateProd').click(function(){
        var updateProd = $(this).data('id');
        var x = document.getElementById("productsTable").rows[updateProd].cells;
        $('#productid').val(x[0].innerHTML);
        $('#productimage').val(x[1].innerHTML);
        $('#productname').val(x[2].innerHTML);
        $('#productprice').val(x[3].innerHTML);
        $('#productdescription').val(x[4].innerHTML);
        $('#categoryid').val(x[5].innerHTML);
        $('#size').val(x[6].innerHTML);
        $('#glaze').val(x[7].innerHTML);
        $('#rowcounter').val(x[8].innerHTML);
        $('#updateProdModal').modal('show');
      });
    
      // SAVE CHANGES BUTTON TO UPDATE DATABASE
      $(".saveChanges").click(function(){
        var productId = $("#productid").val();
        var productImage = $("#productimage").val();
        var productName = $("#productname").val();
        var productPrice = $("#productprice").val();
        var productDescription = $("#productdescription").val();
        var categoryId = $("#categoryid").val();
        var productSize = $("#size").val();
        var glaze = $("#glaze").val();
        var rowCounter = $('#rowcounter').val();
        if(productImage=="" || productName=="" || productPrice=="" || productDescription=="" || categoryId=="" || productSize=="" || glaze=="") {
          $("#updateProdNotification").html("**Please fill all the fields**");
        }
        else {
          $('#updateProdModal').modal('hide');
          $("#updateProdNotification").html("");
          $('#toastMessage').html("Product Updated");
          $("#toast").toast("show");
    
          // AJAX Request
          $.ajax({
              url: 'product-update.php',
              type: 'POST',
              data: { prodid:productId, prodimage:productImage, prodname:productName, prodprice:productPrice, proddescription:productDescription, catid:categoryId, prodsize:productSize, prodglaze:glaze },
              success: function(response){
           
                if(response == 1){
                  // Update row in the table
                  var x = document.getElementById("productsTable").rows[rowCounter].cells;
                  x[2].innerHTML = productName;
                  x[3].innerHTML = productPrice;
                  // alert("Changes Saved");
                  }else{
                      alert('Invalid product ID.');
                  }
              
              }
          });
        }
      });
}



// FUNCTION TO CREATE A NEW CUSTOMER
function addNewCustomer() {

  $(".addCust").click(function(){
    $('#addCustModal').modal('show');
  });

  $(".addCustBtn").click(function(){
    var firstName = $("#firstname").val();
    var lastName = $("#lastname").val();
    var role = $("#role").val();
    var email = $("#email").val();
    var password = $("#password").val();
    if(email=="" || password=="") {
      $("#addCustNotification").html("**Email and Password are required**");
    }
    else {
      $('#addCustModal').modal('hide');
      $("#addCustNotification").html("");
      $('#toastMessage').html("Customer Created");
      $("#toast").toast("show");
      // AJAX Request
      $.ajax({
          url: 'user-add.php',
          type: 'POST',
          data: {fname:firstName, lname:lastName, urole:role, uemail:email, upassword:password},
          success: function(response){
            if(response > 0){
              //Add customer to the table
              var markup = "<tr><th scope='row'>" + response + "</th><td>" + firstName + "</td><td>" + lastName + "</td><td>" + email + "</td><td><button class='btn btn-danger btn-sm'><span class='deleteCust' data-id='"+ response +"'>Delete</span></button></td></tr>";
                $("#customersTable tbody").append(markup);
                $(".deleteCust").on("click", deleteCustomer());
            }
            else if(response == -1) {
              alert("Customer couldn't be added to database");
            }
            else if(response == -2) {
              alert("Customer already exists");
            }
            else if( response == -3) {
              alert("Email cannot be posted to the server");
            }
            else {
              alert("Something went wrong. Please report the issue to our customer service.");
            }
          }
      });
    }
  });
}



// FUNCTION TO CREATE A NEW PRODUCT
function addNewProduct() {
  $(".addProd").click(function(){
    $('#addProdModal').modal('show');
  });

  $(".addProdBtn").click(function(){
    var prodImage = $("#addproductimage").val();
    var prodName = $("#addproductname").val();
    var prodPrice = $("#addproductprice").val();
    var prodDescription = $("#addproductdescription").val();
    var prodCategory = $("#addcategoryid").val();
    var prodSize = $("#addsize").val();
    var prodGlaze = $("#addglaze").val();

    var counter = document.getElementById("productsTable").rows.length;
    if(prodImage=="" || prodName=="" || prodPrice=="" || prodDescription=="" || prodCategory=="" || prodSize=="" || prodGlaze=="") {
      $("#addProdNotification").html("**Please fill all the fields**");
    }
    else {
      $('#addProdModal').modal('hide');
      $("#addProdNotification").html("");
      $('#toastMessage').html("Product Created");
      $("#toast").toast("show");
      // AJAX Request
      $.ajax({
        url: 'product-add.php',
        type: 'POST',
        data: {pimage:prodImage, pname:prodName, pprice:prodPrice, pdescription:prodDescription, pcategory:prodCategory, psize:prodSize, pglaze:prodGlaze},
        success: function(response){
          if(response > 0){
            //Add product to the table
            var markup = "<tr><th scope='row'>" + response + "</th><td><img src='../" + prodImage + "' width='50px' alt='some pottery'></td><td>" + prodName + "</td><td>" + prodPrice + "</td><td hidden>" + prodDescription + "</td><td hidden>" + prodCategory + "</td><td hidden>" + prodSize + "</td><td hidden>" + prodGlaze + "</td><td hidden>" + counter + "</td><td><button class='btn btn-danger btn-sm'><span class='deleteProd' data-id='"+ response +"'>Delete</span></button>&nbsp;<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#updateProdModal'><span class='updateProd' data-id='" + counter + "'>Update</span></button></td></tr>";
              $("#productsTable tbody").append(markup);
              $(".deleteProd").on("click", deleteProduct());
              $(".updateProd").on("click", updateProduct());
          }
          else if(response == -1) {
            alert("Product couldn't be added to database");
          }
          else if(response == -2) {
            alert("Product already exists");
          }
          else if( response == -3) {
            alert("Prodduct Name cannot be posted to the server");
          }
          else {
            alert("Something went wrong. Please report the issue to our customer service.");
          }
        }
      });
    }
  });
}

// ADMIN CRUD
$(document).ready(function(){

  deleteCustomer();
  deleteProduct();
  updateProduct();
  addNewCustomer();
  addNewProduct();
  
});

