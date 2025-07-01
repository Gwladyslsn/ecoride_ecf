window.addEventListener('scroll', () => {
    const cards = document.querySelectorAll('.value-card, .stat-item, .commitment-item');
    cards.forEach(card => {
        const rect = card.getBoundingClientRect();
        const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

        if (isVisible) {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }
    });
});

// Initialisation
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.value-card, .stat-item, .commitment-item');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
});