var canvas = document.getElementById("canvas");
canvas.height = 250;
canvas.width = 700;
const signature = new SignaturePad(canvas);
const context = canvas.getContext('2d');
function saveImage() {
    const image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
    window.location.href = image;
}

function reset() {
    
   context.clearRect(0, 0, canvas.width, canvas.height);
}
