document.addEventListener('DOMContentLoaded', function() {
    const articles = document.querySelectorAll('.members article');

    articles.forEach(article => {
        const image = article.querySelector('img');

        // Toggle 'active' class on article when image is clicked
        image.addEventListener('click', function() {
            article.classList.toggle('active');
        });
    });
});
