function changeItemQuantityDB(itemInCartId, userCartId) {
    var elementId = itemInCartId+"ID"+userCartId;
    var newQuantity = document.getElementById(elementId).value;

    $.ajax({
        url: 'update-quantity.php',
        type: 'POST',
        data: {itemInCartId:itemInCartId, userCartId:userCartId, newQuantity:newQuantity},
        success: function(response){
            if(response == 1) {
                $('#cartToastMessage').html("Quantity Updated");
                $("#cartToast").toast("show");
            }
        }
    });
}

function changeItemQuantitySession(itemInCartId) {
    var newQuantity = document.getElementById(itemInCartId).value;
    
    $.ajax({
        url: 'update-quantity.php',
        type: 'POST',
        data: {itemInCartId:itemInCartId, newQuantity:newQuantity},
        success: function(response){
            if(response == 1) {
                $('#cartToastMessage').html("Quantity Updated");
                $("#cartToast").toast("show");
            }
        }
    });
}