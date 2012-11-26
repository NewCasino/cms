Mh.app.pages = function () {
    this.pageId = 0;
    
    this.attachEventListeners = function (mode) {
        switch (mode) {
            case "index" :
                $("#btn-page-create").click(this.createPage);
                break;
        }
    };
    
    this.createPage = function (event) {
        /*var name = $("#page_page_name").val();
        var maxChildren = $("#page_page_max_children").val();
        var data = {
            "page_name" : name,
            "page_max_children" : maxChildren
        };
        
        // Post data.
        $.ajax({
            "url" : "/app_dev.php/cms/pages/create",
            "type" : "post",
            "data" : data
        }).done(function (response) {
            console.log(response);
        });
        
        // Update table listing.
        
        // Close modal.*/
        $("#form-page-create").submit();
    };
};