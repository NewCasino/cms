Mh.app.pages = function () {
    this.pageId = 0;
    
    this.attachEventListeners = function (mode) {
        switch (mode) {
            case "index" :
                $("#btn-page-create").click(this.createPage);
                break;
            case "stage" :
                this.addAddableListeners();
                this.addAddBlockListeners();
                break;
        }
    };
    
    this.addAddBlockListeners = function () {
        var form = $("#form-add-block");
        
        form.submit(function (event) {
            event.stopPropagation();
            event.preventDefault();
                        
            var data = {
                content_block : {
                    parent : $("#content_block_parent").attr("value"),
                    content_block_content : $("#content_block_content_block_content").attr("value"),
                    content_block_type : $("#content_block_content_block_type").attr("value")
                }
            };
            
            $.ajax({
                url : form.attr("action"),
                type : form.attr("method"),
                data : data
            }).done(function (response){
                $("#page-add-block").modal("toggle");
                $("[data-block=\"" + data.content_block.parent + "\"]").append(response);
            });
        });
        
        $("#btn-add-block").click(function (event) {
            form.submit();
        });
    }
    
    this.addAddableListeners = function () {
        $(".addable").click(function (event) {
            event.stopPropagation();
            
            var target = event.target || window.event.srcElement;
            var parent = $(target).attr("data-block");
            
            if (!parent) {
                alert("You cannot add to this block.");
                return false;
            }
            
            $("#builder-nav").css("display", "block");

            //$("#content_block_parent").attr("value", parent);
            //$("#page-add-block").modal("show");
        });
    }   
    
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