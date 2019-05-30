<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'sections'        => array( 
      
      array(
        'id'          => 'header_settings',
        'title'       => __( 'Header Sttings', 'philosophy' )
      ),
      array(
        'id'          => 'footer_settings',
        'title'       => __( 'Footer Sttings', 'philosophy' )
      )
    ),
    'settings'        => array(
      array(
        'id' => 'social',
        'label' => 'Social Profile',
        'desc' => 'Add Your SOcial Profile Links',
        'type' => 'list-item',
        'section' => 'header_settings',
        'settings' => array(
          array(
            'id' => 'icon_name',
            'type' => 'text',
            'label' => 'Icon Name',
            'desc' => 'This theme using font awesome icon pack.So please use icon formal name',
            ),
          array(
            'id' => 'icon_link',
            'type' => 'text',
            'label' => 'Icon Link',
            'desc' => 'Please use your socil link',
            )
          ),
        ),
      array(
        'id' => 'copyright_text',
        'label' => 'Copyright Text',
        'desc' => 'Type Your Copyright Text',
        'type' => 'textarea',
        'section' => 'footer_settings',
        'std' => '',
        ),
      
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}