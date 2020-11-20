<?php
/**
 * Template for displaying complete button in content lesson.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-lesson/button-complete.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();

if ( $item->is_preview() ) {
	return;
}

$completed = $user->has_completed_item( $item->get_id(), $course->get_id() );

if ( $completed ) :
	echo '<div>'.esc_html__( 'You have completed this lesson at ', 'learnpress' ) . $user->get_item_data( $item->get_id(), $course->get_id(), 'end_time' ).'</div>';
	?>

	<button class="lp-button completed" disabled><i class="fa fa-check"></i><?php esc_html_e( 'Completed', 'learnpress' ); ?></button>

<?php else : ?>

	<form method="post" name="learn-press-form-complete-lesson" class="learn-press-form form-button <?php echo $completed ? 'completed' : ''; ?>">

		<?php do_action( 'learn-press/lesson/before-complete-button' ); ?>

		<input type="hidden" name="id" value="<?php echo esc_attr( $item->get_id() ); ?>"/>
		<input type="hidden" name="course_id" value="<?php echo esc_attr( $course->get_id() ); ?>"/>
		<input type="hidden" name="complete-lesson-nonce" value="<?php echo esc_attr( $item->create_nonce( 'complete' ) ); ?>"/>
		<input type="hidden" name="type" value="lp_lesson"/>
		<input type="hidden" name="lp-ajax" value="complete-lesson"/>
		<input type="hidden" name="noajax" value="yes"/>
		<button class="lp-button button button-complete-item button-complete-lesson"><?php echo esc_html__( 'Complete', 'learnpress' ); ?></button>

		<?php do_action( 'learn-press/lesson/after-complete-button' ); ?>

	</form>
<?php endif; ?>
