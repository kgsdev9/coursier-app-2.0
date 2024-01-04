



document.querySelector('.kgs').addEventListener('click', function(e) {
    e.preventDefault();
     const input = document.getElementById('phone').value;
     const message  = "https://wa.me/" +input+"?text=je vous contacte pour votre candidature";
     var top = window.screenTop || window.screenY
     var left =window.screenLeft ||  window.screenX ;

    var width  = window.innerWidth || document.documentElement.clientWidth;
    var hauteur  = window.innerHeight || document.documentElement.clientHeight;

    var widthPage = 640 ;
    var heightPage  =  320;
    var popupLeft   = left + width /2 -widthPage / 2;
    var popupTop  = top +  hauteur /2 - heightPage / 2

    window.open(message, "partage", 'scrollbars=yes width='+widthPage + ', height=' + heightPage +', top=' + popupTop+ ' , left='+ popupLeft );

});








