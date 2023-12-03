document.getElementById('xray-records').addEventListener('change', function () {
    var files = this.files;
    var imagesContainer = document.getElementById('images-container');

    // Clear previous content
    imagesContainer.innerHTML = '';

    // Display selected file names and image previews
    for (var i = 0; i < files.length; i++) {
        var fileName = files[i].name;

        // Create elements for file name and image preview
        var fileContainer = document.createElement('div');
        var fileNameElement = document.createElement('p');
        var imageElement = document.createElement('img');

        // Read the image file as a data URL
        var reader = new FileReader();
        reader.onload = function (e) {
            imageElement.src = e.target.result;
        };
        reader.readAsDataURL(files[i]);

        // Set up image preview
        imageElement.alt = 'Image Preview';
        imageElement.style.width = '150px'; // Adjust the width as needed
        imageElement.style.height = '150px'; // Adjust the height as needed

        // Set up file name display
        fileNameElement.textContent = 'Selected file: ' + fileName;

        // Append elements to the container
        fileContainer.appendChild(fileNameElement);
        fileContainer.appendChild(imageElement);

        // Append the container to the images container
        imagesContainer.appendChild(fileContainer);
    }
});
