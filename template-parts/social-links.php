<?php
/**
 * Displays a set of social links.
 *
 * Don't include this template directly, instead call Helpers\display_social_links().
 *
 * @see display_social_links() in inc/helpers.php
 */

$class_list = 'b-social';
$class_list .= ( true === $mini ? ' b-social--mini' : '' );
$class_list .= ' b-social--' . $color;
?>

<div class="<?php echo esc_attr( $class_list ); ?>">

	<?php if ( ! empty( $label ) ) : ?>
		<h5 class="b-social__title"><?php echo esc_html( $label ); ?></h5>
	<?php endif; ?>

	<ul class="b-social__menu">

		<?php if ( ! empty( $facebook_link ) ) : ?>
			<li class="b-social__item">
				<a href="<?php echo esc_url( $facebook_link ); ?>" class="b-social__link b-social__link--facebook" target="_blank"><span class="screen-reader-text">Facebook</span></a>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $twitter_link ) ) : ?>
			<li class="b-social__item">
				<a href="<?php echo esc_url( $twitter_link ); ?>" class="b-social__link b-social__link--twitter" target="_blank"><span class="screen-reader-text">Twitter</span></a>
			</li>
		<?php endif; ?>

		<?php if ( ! empty( $instagram_link ) ) : ?>
			<li class="b-social__item">
				<a href="<?php echo esc_url( $instagram_link ); ?>" class="b-social__link b-social__link--instagram" target="_blank"><span class="screen-reader-text">Instagram</span></a>
			</li>
		<?php endif; ?>
	</ul>
</div><!-- .b-social -->
