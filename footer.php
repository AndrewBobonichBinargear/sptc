<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seattlepremiumtowncarservice
 */

?>

	<footer class="site-footer footer ">
		<div class="container">
			<div class="footer_top">
				<div class="">
					<img src="/wp-content/uploads/2025/01/Vector.svg" alt="logo">
				</div>
				<?php
				$social = get_field('social', 'option');
				?>

				<div class="social">
				    <?php if (!empty($social['instagram'])) : ?>
				        <a href="<?php echo esc_url($social['instagram']); ?>">
				            <img src="/wp-content/uploads/2025/01/instagram.svg" alt="Instagram">
				        </a>
				    <?php endif; ?>

				    <?php if (!empty($social['facebook'])) : ?>
				        <a href="<?php echo esc_url($social['facebook']); ?>">
				            <img src="/wp-content/uploads/2025/01/facebook.svg" alt="Facebook">
				        </a>
				    <?php endif; ?>

				    <?php if (!empty($social['twitter'])) : ?>
				        <a href="<?php echo esc_url($social['twitter']); ?>">
				            <img src="/wp-content/uploads/2025/01/facebook-1.svg" alt="Twitter">
				        </a>
				    <?php endif; ?>
				</div>

			</div>
			<div class="footer_middle">
				<div class="footer_middle_menu">
						<?php
						$menu_name = 'Footer Services';
						$menu = wp_get_nav_menu_object($menu_name);

						if ($menu) {
								$menu_items = wp_get_nav_menu_items($menu->term_id);

								if ($menu_items) {
										echo '<ul>';
										foreach ($menu_items as $item) {
												echo '<li><a href="' . esc_url($item->url) . '"><h4>' . esc_html($item->title) . '</h4></a></li>';
										}
										echo '</ul>';
								}
						}
						?>
				</div>

				<div class="footer_middle_menu">
					<?php
					$menu_name = 'Footer Our Fleet';
					$menu = wp_get_nav_menu_object($menu_name);

					if ($menu) {
							$menu_items = wp_get_nav_menu_items($menu->term_id);

							if ($menu_items) {
									echo '<ul>';
									foreach ($menu_items as $item) {
											echo '<li><a href="' . esc_url($item->url) . '"><h4>' . esc_html($item->title) . '</h4></a></li>';
									}
									echo '</ul>';
							}
					}
					?>

				</div>
				<div class="footer_middle_menu">
					<?php
					$menu_name = 'Footer About Us';
					$menu = wp_get_nav_menu_object($menu_name);

					if ($menu) {
							$menu_items = wp_get_nav_menu_items($menu->term_id);

							if ($menu_items) {
									echo '<ul>';
									foreach ($menu_items as $item) {
											echo '<li><a href="' . esc_url($item->url) . '"><h4>' . esc_html($item->title) . '</h4></a></li>';
									}
									echo '</ul>';
							}
					}
					?>

				</div>
				<div class="footer_middle_menu">
					<?php
					$menu_name = 'Footer Blog';
					$menu = wp_get_nav_menu_object($menu_name);

					if ($menu) {
							$menu_items = wp_get_nav_menu_items($menu->term_id);

							if ($menu_items) {
									echo '<ul>';
									foreach ($menu_items as $item) {
											echo '<li><a href="' . esc_url($item->url) . '"><h4>' . esc_html($item->title) . '</h4></a></li>';
									}
									echo '</ul>';
							}
					}
					?>

				</div>
				<div class="footer_middle_menu">
					<?php
					$menu_name = 'Footer TOP Cities';
					$menu = wp_get_nav_menu_object($menu_name);

					if ($menu) {
							$menu_items = wp_get_nav_menu_items($menu->term_id);

							if ($menu_items) {
									echo '<ul>';
									foreach ($menu_items as $item) {
											echo '<li><a href="' . esc_url($item->url) . '"><h4>' . esc_html($item->title) . '</h4></a></li>';
									}
									echo '</ul>';
							}
					}
					?>

				</div>
				<div class="footer_middle_menu">
					<?php
					$menu_name = 'Footer FAQ';
					$menu = wp_get_nav_menu_object($menu_name);

					if ($menu) {
							$menu_items = wp_get_nav_menu_items($menu->term_id);

							if ($menu_items) {
									echo '<ul>';
									foreach ($menu_items as $item) {
											echo '<li><a href="' . esc_url($item->url) . '"><h4>' . esc_html($item->title) . '</h4></a></li>';
									}
									echo '</ul>';
							}
					}
					?>
				</div>
			</div>
			<div class="footer_bottom">
				<div class="footer_bottom_info">
				    <?php if ( have_rows( 'contact_info', 'option' ) ): ?>
				        <?php while ( have_rows( 'contact_info', 'option' ) ): the_row(); ?>
				            <?php
				                $phone = get_sub_field( 'phone' );
				                $email = get_sub_field( 'email' );
				            ?>
				            <?php if ( ! empty( $phone ) ): ?>
				                <h4><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></h4>
				            <?php endif; ?>
				            <?php if ( ! empty( $email ) ): ?>
				                <h4><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></h4>
				            <?php endif; ?>
				        <?php endwhile; ?>
				    <?php endif; ?>
				</div>

				<div class="footer_bottom_warpper">
					<div class="footer_bottom_reserved">
						<p class="h4_monts_med">2024 All rights reserved</p>
					</div>

					<?php
					$menu_name = 'Privacy Terms';
					$menu = wp_get_nav_menu_object($menu_name);

					if ($menu) {
					    $menu_items = wp_get_nav_menu_items($menu->term_id);

					    if ($menu_items) {
					        echo '<div class="footer_bottom_policy">';
					        foreach ($menu_items as $item) {
					            echo '<a href="' . esc_url($item->url) . '" class="h4_monts_med">' . esc_html($item->title) . '</a>';
					        }
					        echo '</div>';
					    } else {
					        echo '<p>No menu items found.</p>';
					    }
					} else {
					    echo '<p>Menu "Privacy Terms" not found.</p>';
					}
					?>

				</div>


			</div>
		</div>

	</footer>

	<style media="screen">
			#custom-success-popup {
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				background: white;
				padding: 20px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				z-index: 1000;
				border: 1px solid #ccc;
				text-align: center;
		}

		#custom-success-popup button {
			margin-top: 10px;
			padding: 5px 10px;
			background: #0073aa;
			color: white;
			border: none;
			cursor: pointer;
		}

		#custom-success-popup button:hover {
			background: #005177;
		}
	</style>



<?php wp_footer(); ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.gallery-slider');
    const wrapper = slider.querySelector('.swiper-wrapper');
    const slides = Array.from(wrapper.querySelectorAll('.swiper-slide'));

    const paginationContainer = document.createElement('div');
    paginationContainer.classList.add('swiper-pagination');
    slider.appendChild(paginationContainer);

    let currentIndex = 0;

    slides.forEach((slide, index) => {
      const bullet = document.createElement('span');
      bullet.classList.add('swiper-pagination-bullet');
      if (index === 0) bullet.classList.add('swiper-pagination-bullet-active');
      bullet.addEventListener('click', () => changeActiveSlide(index));
      paginationContainer.appendChild(bullet);
    });

    function changeActiveSlide(activeIndex) {
      slides.forEach((s, i) => s.classList.toggle('swiper-slide-active', i === activeIndex));
      document.querySelectorAll('.swiper-pagination-bullet').forEach((b, i) =>
        b.classList.toggle('swiper-pagination-bullet-active', i === activeIndex)
      );

      if (window.outerWidth < 950) {
        const slide = slides[activeIndex];
        const slideRect = slide.getBoundingClientRect();
        const wrapperRect = wrapper.getBoundingClientRect();

        let totalOffset = 0;

        if (activeIndex === 1) {
          if (activeIndex > currentIndex) {
            totalOffset = 0;
          }
          if (activeIndex < currentIndex) {
            totalOffset = 0;
          }
        }

        if (activeIndex === 2 || activeIndex === 3) {
          if (activeIndex > currentIndex) {
            totalOffset = 100;
          }
          if (activeIndex < currentIndex) {
            totalOffset = 60;
          }
        }

        if (activeIndex === 4) {
          if (activeIndex > currentIndex) {
            totalOffset = 200;
          }
          if (activeIndex < currentIndex) {
            totalOffset = 60;
          }
        }

        if (activeIndex === 5) {
          if (activeIndex > currentIndex) {
            totalOffset = 1000;
          }
        }

        if (
          slideRect.left < wrapperRect.left ||
          slideRect.right > wrapperRect.right ||
          activeIndex === 2 ||
          activeIndex === 3 ||
          activeIndex === 1
        ) {
          wrapper.scrollTo({
            left: totalOffset,
            behavior: 'smooth'
          });
        }
      }

      currentIndex = activeIndex;
    }

    changeActiveSlide(0);

    slides.forEach((slide, index) => {
      slide.addEventListener('click', () => changeActiveSlide(index));
    });
  });

</script>

</body>
</html>
