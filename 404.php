<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package seattlepremiumtowncarservice
 */

get_header();
?>

<main class="page-error">
    <div class="container">
        <h1>404 Error: Page Not Found</h1>
        <p class="subtitle">Oops! The page you're looking for doesn't seem to exist.</p>
				<div class="page-error-list">
					<p>Here’s what you can do next:</p>
					<ul>
							<li>Return to our <a href="<?php echo home_url(); ?>">homepage</a>.</li>
							<li>Double-check the URL for typos.</li>
							<li>Explore our site using the menu above.</li>
					</ul>
				</div>

        <p class="page-error-lost">Still lost? <a href="<?php echo home_url('/contact'); ?>">Contact us</a> for help—we’re here for you!</p>
        <a href="<?php echo home_url(); ?>" class="btn_small">Go Back Home</a>
    </div>
</main>

<div class="lines-block">
	<img src="/wp-content/uploads/2025/01/Lines.svg" alt="line">
</div>

<?php
get_footer();
?>
