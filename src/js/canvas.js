var canvas = document.getElementById("canvas");
canvas.height = 250;
canvas.width = 400;
var signature = new SignaturePad(canvas);
const context = canvas.getContext('2d');
function saveImage() {
    var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    window.location.href = image;
}

function reset() {

    for (var i=0; i< 10; i++) {
        context.fillRect(100 + i,100 + i, 100,100);
    }
    
   // context.clearRect(0, 0, canvas.width, canvas.height);
}
