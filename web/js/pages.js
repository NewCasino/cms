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
                this.addRemoveableListeners();
                //this.addPublishListeners();
                break;
        }
    };

    this.addPublishListeners = function () {
        $(".publish").click(function (event) {
            event.preventDefault();

            var target = event.target|| window.event.srcElement;
            var id = $(target).attr("data-id");

            $.ajax({
                type : "get",
                url : $(target).attr("href")
            }).done(function (response) {
                if ($(target).attr("id") === "btn-page-publish") {
                    $(target).attr("id", "btn-page-unpublish");
                    $(target).html("Take Offline");
                    $(target).attr("href", "/cms/pages/" + id + "/unpublish");
                } else {
                    $(target).attr("id", "btn-page-publish");
                    $(target).html("Publish Page");
                    $(target).attr("href", "/cms/pages/" + id + "/publish");
                }
            });
        });
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

    this.toggleEditBlockModal = function (dataId) {
        this.toggleBlockMenu();

        var block = $("[data-id=" + dataId + "]");

        $("#page-edit-block").modal("toggle");

        // TODO Set the values in the form
        $("#edit_content_block_content_block_content").attr("value", block.html());

        // TODO Set the form action
        $("#form-block-edit").attr("action", "/cms/content_blocks/" + dataId + "/update");

        // TODO Return
    }

    this.addRemoveableListeners = function () {
        var that = this;
        var selectedId = 0;

        $(".removeable").click(function (event) {
            event.stopPropagation();
            event.preventDefault();

            var target = event.target || window.event.srcElement;
            var id = $(target).attr("data-id");
            selectedId = id;

            $("#btn-block-add").css("display", "none");
            $("#form-block-destroy").attr("action", "/cms/content_blocks/" + id + "/delete");

            that.toggleBlockMenu();
        });

        $("#btn-block-edit").click(function (event) {
            that.toggleEditBlockModal(selectedId);
        });

        // TODO: Add an submit listener to the edit form and handle the event.
        $("#btn-block-update").click(function (event) {
            $("#form-block-edit").submit();
        });

        $("#form-block-destroy").submit(function (event) {
            event.preventDefault();
            event.stopPropagation();

            var form = event.target || window.event.srcElement;

            $.ajax({
                url : $(form).attr("action"),
                type : $(form).attr("method")
            }).done(function (response){
                that.toggleBlockMenu();
                $("[data-id=" + selectedId + "]").remove();
            });
        })
    };

    this.toggleBlockMenu = function () {
        $("#page-block-menu").modal("toggle");
    }

    this.addAddableListeners = function () {
        var that = this;

        $(".addable").click(function (event) {
            event.stopPropagation();
            event.preventDefault();

            var target = event.target || window.event.srcElement;
            var parent = $(target).attr("data-block");

            // Condition: If we cannot add to this block, hide the button.
            if (!parent) {

            } else {
                $("#btn-block-add").css("display", "inline-block");
            }

            // This will set the value of the hidden field in the add block
            // modal.
            $("#content_block_parent").attr("value", parent);
            that.toggleBlockMenu();
        });

        $("#btn-block-add").click(function (event) {
            $("#page-block-menu").modal("toggle");
            $("#page-add-block").modal("toggle");
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