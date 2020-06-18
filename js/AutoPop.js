(function(){
    var self = {
        init: function() {
            var settings = lightning.get('autoPop');
            setTimeout(function(){
                console.debug('setting timeout');
                $.ajax({
                    url: settings.url,
                    dataType: 'html',
                    // Load the contents
                    success: function(data){
                        // Set the modal contents
                        lightning.dialog.setContent(data);
                        if (settings.norepeat) {
                            setTimeout(function(){
                                // If the dialog has been on the screen for 5 seconds,
                                // set a cookie to remember not to show it again
                                self.doNotRepeat();
                            }, 5000);
                        }
                    },
                    error: function(){
                        console.error("Failed to load modal");
                    }
                });
            }, settings.delay * 1000);
        },

        doNotRepeat: function() {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + 365);
            document.cookie = "autoPop=true; path=/; expires=" + exdate.toUTCString();
        }
    };
    lightning.js.addModule("autoPop", self);
})();
