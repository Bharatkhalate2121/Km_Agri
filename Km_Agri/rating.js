// rating.js

// Function to initialize the star rating
function initializeRating(elementId) {
    const element = document.getElementById(elementId);
    const resultElement = document.getElementById("result");
    
    if (!element) return;

    const stars = [];
    const maxStars = 5;
    let currentRating = 0;

    // Create stars
    for (let i = 1; i <= maxStars; i++) {
        const star = document.createElement("i");
        star.classList.add("fas", "fa-star");
        star.dataset.value = i;
        stars.push(star);

        star.addEventListener("click", () => {
            currentRating = parseInt(star.dataset.value);
            updateRating();
        });

        element.appendChild(star);
    }

    function updateRating() {
        stars.forEach((star, index) => {
            if (index < currentRating) {
                star.classList.add("rated");
            } else {
                star.classList.remove("rated");
            }
        });

        resultElement.textContent = `You rated it ${currentRating} stars.`;
    }

    updateRating();
}

// Call the initializeRating function with the element ID
initializeRating("rateMe1");
