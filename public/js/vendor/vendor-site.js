$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // ==============================================================
    // Theme options
    // ==============================================================
    // ==============================================================
    // sidebar-hover
    // ==============================================================

    //Add Category Type With Ajax

    $('#addVendorCategoryType').click(function () {


        $('#vendoraddingDataModal').modal('show');


    });


    $('#vendor-site-item_category').on('change',function(){
        var base_url = window.location.origin;
        var categoryID = $(this).val();
        alert('hjj');
        if(categoryID){
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"GET",
                url: base_url+'/autosheba/public/vendor-site/loadItemSubCategoryWithItemType/'+categoryID,
                success:function(response) {
                    if(response) {
                        $("#item_subcategories").empty();
                        $("#item_type").empty();
                        $("#item_subcategories").removeAttr('required');
                        $("#item_type").removeAttr('required');
                        $("#subCategoryDiv").css("display", "none");
                        $("#itemTypeDiv").css("display", "none");
                        if(response.subcategories.length > 0) {
                            $("#subCategoryDiv").css("display", "block");
                            $("#item_subcategories").attr('required', 'required');
                            for (var k in response.subcategories){
                                if (response.subcategories.hasOwnProperty(k)) {
                                    $('#item_subcategories').append('<option value="'+ response.subcategories[k].id +'">'+ response.subcategories[k].subcategory_name +'</option>');
                                }
                            }
                        }

                        if(response.categoryType != null){
                            $("#itemTypeDiv").css("display", "block");
                            $("#item_type").attr('required', 'required');
                            $('#item_type').append('<option value="'+ response.categoryType.id +'">'+ response.categoryType.category_type +'</option>');
                        }
                    } else {
                        $("#item_subcategories").empty();
                        $("#item_type").empty();
                    }
                }
            });
        } else {
            $("#item_subcategories").empty();
        }
    });


});

   