document.querySelectorAll('nav ul li a').forEach(link => {
    link.addEventListener('click', function() {
      document.querySelectorAll('nav ul li a').forEach(l => l.classList.remove('active'));
      this.classList.add('active');
    });
    link.addEventListener('mouseover', function() {
      this.classList.add('hovered');
    });
    link.addEventListener('mouseout', function() {
      this.classList.remove('hovered');
    });
    link.addEventListener('mousedown', function() {
      this.classList.add('visited');
    });
  });
  

  document.querySelectorAll('.download-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default link behavior

        const url = this.getAttribute('href');
        const filename = this.getAttribute('download');

        // Create a temporary link element
        const tempLink = document.createElement('a');
        tempLink.href = url;
        tempLink.download = filename;

        // Append the link to the body (required for Firefox)
        document.body.appendChild(tempLink);

        // Trigger the download
        tempLink.click();

        // Remove the link from the body
        document.body.removeChild(tempLink);
    });
});
