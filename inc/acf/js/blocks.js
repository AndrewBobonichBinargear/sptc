jQuery(document).ready(function ($) {
    function startCounting() {
        $('.count-number').each(function () {
            var $this = $(this);
            var fullText = $this.text().trim();
            var numberMatch = fullText.match(/\d+/);
            var textAfterNumber = numberMatch ? fullText.replace(numberMatch[0], '').trim() : '';

            if (!numberMatch) return;

            var target = parseInt(numberMatch[0], 10);
            $this.text('0' + (textAfterNumber ? textAfterNumber : ''));

            $({ countNum: 0 }).animate({ countNum: target }, {
                duration: 3000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.floor(this.countNum) + (textAfterNumber ? textAfterNumber : ''));
                },
                complete: function () {
                    $this.text(target + (textAfterNumber ? textAfterNumber : ''));
                }
            });
        });
    }

    var isCounting = false;
    $(window).on('scroll', function () {
        var $countItems = $('.count-items');

        if ($countItems.length === 0) return;

        var offset = $countItems.offset().top - $(window).height() + 100;

        if (!isCounting && $(window).scrollTop() > offset) {
            isCounting = true;
            startCounting();
        }
    });
});




// FAQ

document.addEventListener("DOMContentLoaded", function () {
    const accordionItems = document.querySelectorAll(".accordion_item");

    accordionItems.forEach((el) => {
        el.addEventListener("click", () => {
            const body = el.querySelector(".accordion_body");
            const indicator = el.querySelector(".status_indicator");

            accordionItems.forEach((item) => {
                const itemBody = item.querySelector(".accordion_body");
                const itemIndicator = item.querySelector(".status_indicator");

                if (itemBody !== body) {
                    itemBody.style.gridTemplateRows = "0fr";
                    itemIndicator.style.transform = "rotate(0deg)";
                }
            });

            if (body.style.gridTemplateRows === "1fr") {
                body.style.gridTemplateRows = "0fr";
                indicator.style.transform = "rotate(0deg)";
            } else {
                body.style.gridTemplateRows = "1fr";
                indicator.style.transform = "rotate(180deg)";
            }
        });
    });
});



//Select layout

document.addEventListener('DOMContentLoaded', function() {
  const cardsButton = document.querySelector('.filter-fleet-container-layout-cards');
  const bloksButton = document.querySelector('.filter-fleet-container-layout-bloks');
  const fleetResults = document.getElementById('fleet-results');

  if (cardsButton && bloksButton && fleetResults) {

    cardsButton.classList.add('selected');
    bloksButton.classList.add('not-selected');
    fleetResults.classList.add('fleet-results-cards');

    cardsButton.addEventListener('click', function() {
      fleetResults.style.opacity = 0;
      setTimeout(function() {
        fleetResults.classList.remove('fleet-results-bloks');
        fleetResults.classList.add('fleet-results-cards');
        fleetResults.style.opacity = 1;

        cardsButton.classList.add('selected');
        cardsButton.classList.remove('not-selected');

        bloksButton.classList.remove('selected');
        bloksButton.classList.add('not-selected');
      }, 500);
    });

    bloksButton.addEventListener('click', function() {
      fleetResults.style.opacity = 0;
      setTimeout(function() {
        fleetResults.classList.remove('fleet-results-cards');
        fleetResults.classList.add('fleet-results-bloks');
        fleetResults.style.opacity = 1;

        bloksButton.classList.add('selected');
        bloksButton.classList.remove('not-selected');

        cardsButton.classList.remove('selected');
        cardsButton.classList.add('not-selected');
      }, 500);
    });
  }
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });
    });
});


document.querySelectorAll('.service-item').forEach(item => {
  item.addEventListener('click', () => {
      if (window.innerWidth <= 1024) {
        item.classList.toggle('active');
      }
    });
});
