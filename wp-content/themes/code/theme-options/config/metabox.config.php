<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

//

$options[] = array(

 'id'=>'_portfolio_setting',
 'title'=>'Portfolio Options',
 'post_type'=>'portfolio',
 'context'=>'normal',
 'priority'=>'high',
 'sections'=>array(
	array(
	'name'=>'Portfolio',
	'title'=>'Portfolio Section ',
	'icon'=>'fa fa-cog',
	'fields'=>array(
	
	
	 array(
	 'id'=>'port_image_size',
	 'type'=>'select',
	 'title'=>'Select Image Size',
	 'options'=>array(
	 'width'=>'Width Image',
	 'height'=>'Height Image',
	 
	 ),
	 
	 
	 ),
	
	
	),
	),
 
 
 ),



);





// -----------------------------------------
// Page Side Metabox Options               -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_side_options',
  'title'     => 'Custom Page Side Options',
  'post_type' => 'page',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_3',
      'fields' => array(

        array(
          'id'        => 'section_3_image_select',
          'type'      => 'image_select',
          'options'   => array(
            'value-1' => 'http://codestarframework.com/assets/images/placeholder/65x65-2ecc71.gif',
            'value-2' => 'http://codestarframework.com/assets/images/placeholder/65x65-e74c3c.gif',
            'value-3' => 'http://codestarframework.com/assets/images/placeholder/65x65-3498db.gif',
          ),
          'default'   => 'value-2',
        ),

        array(
          'id'            => 'section_3_text',
          'type'          => 'text',
          'attributes'    => array(
            'placeholder' => 'do stuff'
          )
        ),

        array(
          'id'      => 'section_3_switcher',
          'type'    => 'switcher',
          'label'   => 'Are you sure ?',
          'default' => true
        ),

      ),
    ),

  ),
);

// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_post_options',
  'title'     => 'Custom Post Options',
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_4',
      'fields' => array(

        array(
          'id'    => 'section_4_text',
          'type'  => 'text',
          'title' => 'Text Field',
        ),

        array(
          'id'    => 'section_4_textarea',
          'type'  => 'textarea',
          'title' => 'Textarea Field',
        ),

        array(
          'id'    => 'section_4_upload',
          'type'  => 'upload',
          'title' => 'Upload Field',
        ),

        array(
          'id'    => 'section_4_switcher',
          'type'  => 'switcher',
          'title' => 'Switcher Field',
          'label' => 'Yes, Please do it.',
        ),

      ),
    ),

  ),
);

CSFramework_Metabox::instance( $options );
