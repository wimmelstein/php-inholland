import SignaturePad from 'signature_pad';

const canvas = document.getElementById("canvas");
canvas.height = 250;
canvas.width = 700;

// Library is installed using
// $ npm install signature_pad
const signaturePad = new SignaturePad(canvas);

function saveImage() {
    // save image with name is done with Javascript
    let file = document.createElement('a');
    const fileName = prompt('Name your file');
    file.href = signaturePad.toDataURL();
    file.download = (fileName) ? fileName : 'untitled';
    document.body.appendChild(file);
    file.click();
    document.body.removeChild(file);
}

function reset() {
    signaturePad.clear();
}
