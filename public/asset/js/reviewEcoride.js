document.addEventListener("DOMContentLoaded", function () {
    const nameReviewEcorideInput = document.getElementById('nameReviewEcoride');
    const emailReviewEcorideInput = document.getElementById('emailReviewEcoride');
    const ratingEcorideInput = document.getElementById('rating-ecoride');
    const textReviewEcorideInput = document.getElementById('text-review-ecoride');
    const btnReviewEcoride = document.getElementById('btn-review-ecoride');
    const feedbackReviewEcoride = document.getElementById('feedback-review-ecoride');

    btnReviewEcoride.addEventListener('click', ()=>{

        //Nettoyage des données
        let nameReviewEcoride = nameReviewEcorideInput.value.trim();
        let emailReviewEcoride = emailReviewEcorideInput.value.trim();
        let ratingReviewEcoride = ratingEcorideInput.value;
        let textReviewEcoride = textReviewEcorideInput.value.trim();
    })
})