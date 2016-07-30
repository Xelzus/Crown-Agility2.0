var upload = document.getElementById('upload');
var image = document.getElementById('image');

var srcChange = function() {
    if (upload.files && upload.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            image.setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(upload.files[0]);
    }
};
