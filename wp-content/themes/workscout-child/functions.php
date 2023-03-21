<?php 
add_action( 'wp_enqueue_scripts', 'workscout_enqueue_styles' );
function workscout_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css',array('workscout-base','workscout-responsive','workscout-font-awesome') );

}

function remove_parent_theme_features() {
   	
}
add_action( 'after_setup_theme', 'remove_parent_theme_features', 10 );


 /* Here we add a form field into Create New Resume Form 

// Add field to frontend
add_filter( 'submit_resume_form_fields', 'wpjms_frontend_resume_form_fields' );
function wpjms_frontend_resume_form_fields( $fields ) {

$fields['resume_fields']['candidate_color'] = array(
'label' => __( 'Favourite Color', 'job_manager' ),
'type' => 'text',
'required' => false,
'placeholder' => '',
'priority' => 8
);

return $fields;

}

// Add a line to the notifcation email with custom field
add_filter( 'apply_with_resume_email_message', 'wpjms_color_field_email_message', 10, 2 );
function wpjms_color_field_email_message( $message, $resume_id ) {
$message[] = "\n" . "Favourite Color: " . get_post_meta( $resume_id, '_candidate_color', true );
return $message;
}
*/
?>