const fileInput = document.getElementById('fileInput');
const imagePreview = document.getElementById('imagePreview');
const blurredBackground = document.getElementById('blurredBackground');
const uploadContainer = document.querySelector('.upload-container');
const uploadLabel = document.querySelector('.upload-label');
const deleteButton = document.getElementById('deleteButton');
const acceptButton = document.getElementById('acceptButton');
const title = document.getElementById('title');
const content = document.getElementById('content');

fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();

        // When the file is read, display both images
        reader.onload = (e) => {
            const imageUrl = e.target.result;
            imagePreview.src = imageUrl; // Set the preview image
            blurredBackground.src = imageUrl; // Set the blurred background
            imagePreview.style.display = 'block'; // Show the main image
            blurredBackground.style.display = 'block'; // Show the blurred background
            acceptButton.style.display = 'flex';
            deleteButton.style.display = 'flex'; // Show the delete button
            uploadLabel.style.display = 'none'; // Hide the upload label
        };

        reader.readAsDataURL(file); // Read the file as a data URL
    }
});

deleteButton.addEventListener('click', () => {
    // Reset everything
    fileInput.value = ''; // Clear the file input
    imagePreview.style.display = 'none';
    blurredBackground.style.display = 'none';
    deleteButton.style.display = 'none';
    uploadLabel.style.display = 'flex'; // Show the upload label again
});

title.addEventListener('input', () => {
    title.value = title.value.charAt(0).toUpperCase() + title.value.slice(1);
});

content.addEventListener('input', () => {
    content.value = content.value.charAt(0).toUpperCase() + content.value.slice(1);
});