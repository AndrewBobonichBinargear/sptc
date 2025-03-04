document.addEventListener('DOMContentLoaded', function() {
    // Слушаем событие успешной отправки формы Ninja Forms
    document.addEventListener('nfFormSubmitSuccess', function(event) {
        // Показываем попап
        document.getElementById('custom-success-popup').style.display = 'block';
    });
});

// Функция для закрытия попапа
function closePopup() {
    document.getElementById('custom-success-popup').style.display = 'none';
}
