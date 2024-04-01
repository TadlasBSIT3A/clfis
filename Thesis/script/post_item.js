function previewImage(event) {
    var file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" style="max-width:100%; max-height:100%;">';
        };
        reader.readAsDataURL(file);
    } else {
        alert('Please select a valid image file.');
        event.target.value = '';
    }
}

// Function to reset the form fields
function resetForm() {
    document.getElementById("postForm").reset(); // Reset the form with id "postForm"
    document.getElementById("imagePreview").innerHTML = ""; // Clear the image preview
}

// Add an event listener to the "Cancel" button
document.querySelector(".post_btn[name='cancel']").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the default form submission behavior
    resetForm(); // Call the function to reset the form fields
});