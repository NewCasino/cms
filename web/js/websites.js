Mh.app.websites = function () {
    this.websiteId = 0;
    
    this.attachEventListeners = function (mode) {
        switch (mode) {
            case "index" :
                $(".activate-website").click(this.activateWebsite);
                break;
        }
    };
    
    this.activateWebsite = function (event) {
        var wrapper = this.parentNode;
                
        $.get(this.href, function (data) {
            wrapper.innerHTML = data;
        });
        
        return false;
    };
};