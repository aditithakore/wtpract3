// Function to smoothly scroll to a section when a navigation link is clicked
function smoothScroll(targetId) {
    const targetElement = document.getElementById(targetId);
    if (targetElement) {
        window.scrollTo({
            top: targetElement.offsetTop,
            behavior: "smooth"
        });
    }
}

// Add click event listeners to navigation links
const navLinks = document.querySelectorAll("nav a");
navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        e.preventDefault(); // Prevent the default link behavior
        const targetId = link.getAttribute("href").substring(1); // Remove the "#" from the href
        smoothScroll(targetId);
    });
});

// Function to display comments dynamically
function displayComment(name, comment) {
    const commentsContainer = document.getElementById("comments");
    const commentElement = document.createElement("div");
    commentElement.classList.add("comment");
    commentElement.innerHTML = `<strong>${name}:</strong> ${comment}`;
    commentsContainer.appendChild(commentElement);
}

// Handle comment submission
const commentForm = document.getElementById("comment-form");
commentForm.addEventListener("submit", (e) => {
    e.preventDefault(); // Prevent the form from submitting and refreshing the page
    const name = document.getElementById("name").value;
    const comment = document.getElementById("comment").value;
    displayComment(name, comment);
    // Clear the form fields after submission
    document.getElementById("name").value = "";
    document.getElementById("comment").value = "";
});
