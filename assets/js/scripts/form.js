document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('.wpcf7-form');
  const popup = document.getElementById('form-cf-popup');
  const closeBtn = document.getElementById('close-popup');

  function showPopup() {
    popup.style.display = 'flex';
    setTimeout(() => {
      popup.style.opacity = '1';
    }, 10);
  }

  function hidePopup() {
    popup.style.opacity = '0';
    setTimeout(() => {
      popup.style.display = 'none';
    }, 300);
  }

  form.addEventListener('wpcf7mailsent', function(event) {
    if (event.detail.status === 'mail_sent') {
      showPopup();
    }
  });

  form.addEventListener('wpcf7mailfailed', function(event) {
    if (event.detail.status === 'mail_failed') {
      showPopup();
    }
  });

  closeBtn.addEventListener('click', hidePopup);

  window.addEventListener('click', function(event) {
    if (event.target === popup) {
      hidePopup();
    }
  });
});
