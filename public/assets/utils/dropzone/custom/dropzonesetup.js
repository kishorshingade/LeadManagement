Dropzone.autoDiscover = false; // Prevent automatic initialization

$(document).ready(function () {
    var baseUrl = $('meta[name="base-url"]').attr("content");
    var imageUrl = baseUrl + "/admin/upload-temp-image";
    // Destroy existing Dropzone instances
    Dropzone.instances.forEach(function (instance) {
        instance.destroy();
    });

    // Initialize the single image dropzone
    $("#image").dropzone({
        url: imageUrl,
        maxFiles: 1,
        paramName: "image",
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/jpg",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        init: function () {
            this.on("addedfile", function (file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        success: function (file, response) {
            $("#image_id").val(response.image_id);
        },
    });

    $("#product_images_edit").dropzone({
        
        url: `${baseUrl}/admin/updateProductImage`,
        maxFiles: 4,
        paramName: "image",
        params: {
            'product_id': $('#product_images_edit').data("product_id")
        },
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        init: function () {
            this.on("maxfilesexceeded", function (file) {
                this.removeFile(file);
                showToast("You can only add up to 4 images.", false, "error");
            });
            this.on("sending", function (file, xhr, formData) {
                if ($("#product_gallery .product-image-card").length > 4) {
                    this.removeFile(file);
                    showToast(
                        "You must upload exactly 4 images",
                        false,
                        "error"
                    );
                    return false;
                }
            });
        
            
        },
        success: function (file, response) {
            let productCard = `<div class="col-md-3 col-6 product-image-card" >
                                    <div class="card" style="">
                                        <input type="hidden" name="image_array[]" value="${response.image_id}" />
                                        <div style="height: 150px;">
                                            <img style="width: 100%" height="100%" class="rounded-3"
                                            src="${response.imagePath}"
                                            class="card-img-top" alt="">
                                        </div>
                                        <div class="position-absolute top-0 end-0 cursor-pointer">
                                            <button
                                                class="p-3 bg-info text-white py-1 border-0  delete-img-btn" data-id="${response.image_id}" data-route="deleteProductImage" data-toggle="tooltip" data-placement="bottom" title="Delete Image">X</button>
                                        </div>
                                    </div>
                                </div>`;
            if ($("#product_gallery .product-image-card").length < 4) {
                $("#product_gallery").append(productCard);
                console.log($("#product_gallery .product-image-card").length);
            } else {
                showToast("You must upload exactly 4 images", false, "error");
            }
        },
        complete: function (file) {
            this.removeFile(file);
        },
    });

    //Add images
    $("#product_images_add").dropzone({
        url: imageUrl,
        maxFiles: 4,
        paramName: "image",
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        init: function () {
            this.on("maxfilesexceeded", function (file) {
                this.removeFile(file);
                showToast("You can only add up to 4 images.", false, "error");
            });
            this.on("sending", function (file, xhr, formData) {
                if ($("#product_gallery .product-image-card").length > 4) {
                    this.removeFile(file);
                    showToast(
                        "You must upload exactly 4 images",
                        false,
                        "error"
                    );
                    return false;
                }
            });
        },
        success: function (file, response) {
            let productCard = `<div class="col-md-3 col-6 product-image-card" >
                                    <div class="card" style="">
                                        <input type="hidden" name="image_array[]" value="${response.image_id}" />
                                        <div style="height: 150px;">
                                            <img style="width: 100%" height="100%" class="rounded-3"
                                            src="${response.imagePath}"
                                            class="card-img-top" alt="">
                                        </div>
                                        <div class="position-absolute top-0 end-0 cursor-pointer">
                                            <button
                                                class="p-3 bg-info text-white py-1 border-0  delete-img" data-id="${response.image_id}" data-route="deleteProductImage" data-toggle="tooltip" data-placement="bottom" title="Delete Image">X</button>
                                        </div>
                                    </div>
                                </div>`;
            if ($("#product_gallery .product-image-card").length < 4) {
                $("#product_gallery").append(productCard);
            } else {
                showToast("You must upload exactly 4 images", false, "error");
                showToast("You must upload exactly 4 images", false, "error");
            }
        },
        complete: function (file) {
            this.removeFile(file);
        },
    });
});