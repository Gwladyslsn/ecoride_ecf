document.addEventListener('DOMContentLoaded', () => {
    const editBtn = document.getElementById('edit-user-btn');
    const profileSection = editBtn.closest('.profile-section');

    editBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (editBtn.textContent.includes('Modifier')) {
            // Passer spans en inputs
            const spans = profileSection.querySelectorAll('span.edit-info');
            spans.forEach(span => {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = span.dataset.field;
                input.value = span.textContent.trim();
                input.classList.add('border', 'border-gray-300', 'rounded', 'px-2', 'py-1', 'w-full');
                span.replaceWith(input);
            });
            editBtn.textContent = 'Sauvegarder mes informations';
        } else {
            // Collecter données des inputs
            const inputs = profileSection.querySelectorAll('input[name]');
            const data = {};
            inputs.forEach(input => {
                data[input.name] = input.value.trim();
            });

            // Envoi AJAX avec fetch (à adapter l'URL et la route PHP)
            fetch('/?controller=page&action=updateUser', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                        //alert('Informations mises à jour !');
                        window.location.reload();
                    } else {
                        alert('Erreur : ' + (response.message || 'Impossible de sauvegarder'));
                    }
                })
                .catch(() => {
                    alert('Erreur réseau ou serveur');
                });
        }
    });

    const editPhoto = document.getElementById('edit-photo');
    const fileInput = document.getElementById('file-input');
    const submitBtn = document.getElementById('submit-btn');

    editPhoto.addEventListener('click', (e) =>{
        e.preventDefault();
        fileInput.classList.remove('hidden');
        submitBtn.classList.remove('hidden');
    })

    fileInput.addEventListener('change', () => {
      //test
    });



});
