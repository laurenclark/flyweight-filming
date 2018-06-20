<?php
/**
 * The template for displaying search form
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

do_action( 'Foundationpress_before_searchform' ); ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<?php do_action( 'Foundationpress_searchform_top' ); ?>
	<div class="input-group">
		<input type="text" class="input-group-field" value="" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'Foundationpress' ); ?>">
		<?php do_action( 'Foundationpress_searchform_before_search_button' ); ?>
		<div class="input-group-button">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'Foundationpress' ); ?>" class="button">
		</div>
	</div>
	<?php do_action( 'Foundationpress_searchform_after_search_button' ); ?>
</form>
<?php do_action( 'Foundationpress_after_searchform' );
