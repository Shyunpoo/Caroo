// Carousel d'images
document.addEventListener("DOMContentLoaded", function() {
    const carouselInner = document.querySelector('.carousel-inner');
    const carouselItems = document.querySelectorAll('.carousel-item');

    let currentIndex = 0;

    function nextSlide() {
        currentIndex = (currentIndex + 1) % carouselItems.length;
        updateCarousel();
    }

    function updateCarousel() {
        const newTransformValue = -currentIndex * 100 + '%';
        carouselInner.style.transform = 'translateX(' + newTransformValue + ')';
    }

    setInterval(nextSlide, 3000);
});

// Liste des produits
document.getElementById('sort').addEventListener('change', function() {
    var sortValue = this.value;
    window.location.href = 'produits.php?tri=' + sortValue;
});

// API Google
function handleCredentialResponse(response) {
    console.log("ID: " + response.credential);
}


// Bouton comparer
document.addEventListener('DOMContentLoaded', function () {
    var compareButton = document.querySelector('.comparer');

    if (compareButton) {
        window.addEventListener('scroll', function () {
            compareButton.style.top = (window.scrollY + window.innerHeight / 2) + 'px';
        });
    }
});