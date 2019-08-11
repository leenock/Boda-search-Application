
jQuery('input.disablePaste').keydown(function(event) {
    var forbiddenKeys = new Array('c', 'x', 'v');
    var keyCode = (event.keyCode) ? event.keyCode : event.which;
    var isCtrl;
    isCtrl = event.ctrlKey
    if (isCtrl) {
        for (i = 0; i < forbiddenKeys.length; i++) {
            if (forbiddenKeys[i] == String.fromCharCode(keyCode).toLowerCase()) {
                 return false;
            }
        }
    }
    return true;
});