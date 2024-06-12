<div class="row mt-3">
<div class="col-md-7">
    <!-- Container for associated products -->
    <div id="associatedProducts">
@foreach ($allAssociatedProducts as $associated)
<div class="badge text-bg-warning p-2 me-1 mb-1">
    <input type="hidden" name="associated['{{$associated->name}}']" value="{{$associated->id}}" />
    <span> {{$associated->sku}} - {{$associated->name}} </span> 
    <button type="button" class="btn-close removeAssociatedProduct" aria-label="Close" data-product-id="{{$associated->id}}" data-main-id="{{$product->id}}"></button>
</div>   
@endforeach 
    </div>

   
</div>
<div class="col-md-5">
    <select id="allProducts" class="form-select mb-3">
        <!-- Loop through categories -->
        <?php foreach ($categories as $category): ?>
            <optgroup label="<?= $category->name ?>">
                <!-- Loop through products within the category -->
                <?php foreach ($category->products as $product): ?>
                    <option value="<?= $product->id ?>"><?= $product->sku ?> - <?= $product->name ?></option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
    </select>
    <button type="button" id="addAssociatedProductBtn" class="btn btn-success mb-3">Add Associated Product <i class="bi bi-plus-circle"></i></button>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('#addAssociatedProductBtn').click(function () {
    // Get the selected product ID and name
    var productId = $('#allProducts').val();
    var productName = $('#allProducts option:selected').text();

    // Append hidden input and remove button to the container
    if ($('#associatedProducts input[value="' + productId + '"]').length === 0) {
            // Append hidden input and remove button to the container
            $('#associatedProducts').append(
                '<div class="badge text-bg-warning p-2 me-1 mb-1">' +
                    '<input type="hidden" name="associated[' + productName + ']" value="' + productId + '" />' +
                    '<span>' + productName + '</span> ' +
                    '<button type="button" class="btn-close removeAssociatedProduct" aria-label="Close" data-product-id="' + productId + '"></button>' +
                '</div>'
            );
        } else {
            // Notify the user that the product is already added
            alert('This product is already added.');
        }
});

// Remove associated product button click event
$(document).on('click', '.removeAssociatedProduct', function () {
    // Get the product ID and associated product ID
    
    var mainProductId = $(this).data('main-id'); 
    var associatedProductId = $(this).data('product-id');

    // Remove the parent div containing the hidden input and button
    $(this).parent().remove();

    // Remove the association from the database via AJAX
    $.ajax({
        url: '/remove-associated-product', // Endpoint to remove the association
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // Include CSRF token
            mainProductId: mainProductId, // Send the main product ID to the server
            associatedProductId: associatedProductId // Send the associated product ID to the server
        },
        success: function (response) {
            console.log(response.message);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});

</script>