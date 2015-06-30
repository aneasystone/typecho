$(document).ready(function() {
    
    var qrcode = $('.qrcode');
    if (qrcode.length != 1) {
        return;
    } 
    
    var url = window.location.href;
    var hashIndex = url.indexOf('#');
    var qrUrl = hashIndex < 0 ? url : url.substring(0, hashIndex);
    qrcode.qrcode({ width: 64, height: 64, text: qrUrl });
    qrcode.show();
});
