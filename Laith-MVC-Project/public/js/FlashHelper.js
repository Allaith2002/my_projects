// Get the flash message element
var flashMessage = document.querySelector('.flash-message');

// Check if the flash message element exists
if (flashMessage) {
  // Add the show class to make the flash message visible
  flashMessage.classList.add('show');

  // Remove the show class and hide the flash message after 5 seconds
  setTimeout(function() {
    flashMessage.classList.remove('show');
  }, 2000);
}
