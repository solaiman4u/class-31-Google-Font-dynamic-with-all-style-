<?php


require(get_template_directory().'/inc/codestar-framework/cs-framework.php');

// framework options filter example
function industry_cs_framework_options( $options ) {

  $options      = array(); // remove old options

  $options[]    = array(
    'id'      => 'industry_slide_meta',
    'title'     => 'Slide Options',        
    'post_type' => 'industry-slide',
	'context'   => 'normal',
	'priority'  => 'default',
    'sections'    => array(
      array(
        'name'    => 'industry_slide_metabox',
        'title' => 'Slide Options',
        'fields' => array(
        // begin: a field
       array(
          'id'    => 'slider_width',
           'type'     => 'select',
            'title'    => 'Select slider text Width',
            'options'  => array(
              'col-md-4'  => '4 Columns',
              'col-md-5'  => '5 Columns',
              'col-md-6'  => '6 Columns',
              'col-md-7'  => '7 Columns',
              'col-md-8'  => '8 Columns',
              'col-md-9'  => '9 Columns',
              'col-md-10'  => '10 Columns',
              'col-md-11'  => '11 Columns',
              'col-md-12'  => '12 Columns',
                          
            ),
            'default'  => 'col-md-6',            
          ),
        // end: a field
       array(
          'id'    => 'slider_offset',
           'type'     => 'select',
            'title'    => 'Select text offset',
            'options'  => array(
              'col-md-offset-1'  => '1 Columns',
              'col-md-offset-2'  => '2 Columns',
              'col-md-offset-3'  => '3 Columns',
              'col-md-offset-4'  => '4 Columns',
              'col-md-offset-5'  => '5 Columns',
              'col-md-offset-6'  => '6 Columns',
              'col-md-offset-7'  => '7 Columns',
              'col-md-offset-8'  => '8 Columns',
                          
            ),
            'default'  => 'no-offset',            
          ),
        // end: a field
       array(
          'id'    => 'slider_text_align',
           'type'     => 'select',
            'title'    => 'Select text align',
            'options'  => array(
              'center'  => 'Center',
              'left'   => 'Left',
              'right' => 'Right',
            ),
            'default'  => 'left',                           
                        
          ),
        // end: a field

        array(
          'id'    => 'text_color',
          'type'  => 'color_picker',
          'title' => 'Slider text color',
          'default' => '#2ecc71',
        ),
        // end: a field
        array(
          'id'    => 'enable_overlay',
          'type'  => 'switcher',
          'title' => 'Overlay Oprion',
          'default' => 'false',
        ),
        // end: a field  
        array(
          'id'    => 'overlay_color',
          'type'  => 'color_picker',
          'title' => 'Overlay Color',
          'desc' => 'Type a Overlay Color',
          'default' => '#333',
          'dependency' => array( 'enable_overlay', '==', 'true' ) // dependency rule
        ),
        // end: a field 
        array(
          'id'    => 'overlay_opacity',
          'type'  => 'number',
          'title' => 'Overlay Opacity',
          'desc' => 'Type a Opacity number',
          'default' => '70',
          'dependency' => array( 'enable_overlay', '==', 'true' ) // dependency rule
        ),
        // end: a field       
      )
      )     
    )
  );  


  $options[]    = array(
    'id'      => 'industry_page_meta',
    'title'     => 'Page Options',        
    'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
    'sections'    => array(
      array(
        'name'    => 'industry_page_metabox',
        'title' => 'Page Options',
        'fields' => array(
        // begin: a field
        array(
          'id'    => 'enable_title',
          'type'  => 'switcher',
          'title' => 'Enable Page Title',
          'default' => 'false',
        ),
        // end: a field  
        array(
          'id'    => 'custom_title',
          'type'  => 'textarea',
          'title' => 'Add Page custom Title',          
          'dependency' => array( 'enable_title', '==', 'true' ) 
        ),
        // end: a field
        array(
          'id'    => 'text_title_direction',
           'type'     => 'select',
            'title'    => 'Select Text Align',
            'options'  => array(
              'center'  => 'Center',
              'left'   => 'Left',
              'right' => 'Right',
            ),
            'default'  => 'left',
            'dependency' => array( 'enable_title', '==', 'true' ) 
          ),
        // end: a field      
        array(
          'id'    => 'header_style',
           'type'     => 'select',
            'title'    => 'Select Header Style',
            'options'  => array(
              '1'  => 'Header 1',
              '2'   => 'Header 2',             
            ),
            'default'  => 'Header 1',            
          ),
        // end: a field      
              
      )
      )     
    )
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'industry_cs_framework_options' );


// framework Theme options filter example
function industry_theme_options( $options ) {

  $options      = array(); // remove old options

  $options[]    = array(
    'name'      => 'typography',
    'title'     => 'Typography',
    'icon'      => 'fa fa-heart',
    'fields'    => array(
      array(
        'id'    => 'body_font',
        'type'  => 'typography',
        'title' => 'Body Font',
        'default'   => array(
          'family'  => 'Montserrat',
          'variant' => '300',        
        ),
      ),
//Font Variant Add
      array(
        'id'    => 'body_font_variant',
        'type'  => 'checkbox',
        'title' => 'Body Font Variant',
        'options'  => array(
          '300'  => '300',
          '300i'   => '300 Italic',
          'regular' => '400',
          'italic'    => '400 Italic',
           '500'  => '500',
          '500i'   => '500 Italic',
           '600'  => '600',
          '600i'   => '600 Italic',
          '700'  => '700',
          '700i'   => '700 Italic',
          '800'  => '800',
          '800i'   => '800 Italic',
          '900'  => '900',
          '900i'   => '900 Italic',
        ),
        'default'  => array( '300', 'regular', '600', '800' ),
      ),

      array(
        'id'    => 'body_font_size',
        'type'  => 'text',
        'title' => 'Body Font Size',
        'default'   => '14px',        
        ),

      //Different Hading Font

       array(
        'id'    => 'different_hadding_font',
        'type'  => 'switcher',
        'title' => 'Different Heading Font',
        'default'   => 'false',        
        ),

      array(
        'id'    => 'heading_font',
        'type'  => 'typography',
        'title' => 'Heading Font',
        'default'   => array(
          'family'  => 'Montserrat',
          'variant' => '300',        
        ),
        'dependency' => array( 'different_hadding_font', '==', 'true' ) 
      ),            
            
          
       //Font Variant Add
      array(
        'id'    => 'heading_font_variant',
        'type'  => 'checkbox',
        'title' => 'Heading Font Variant',
        'options'  => array(
          '300'  => '300',
          '300i'   => '300 Italic',
          'regular' => '400',
          'italic'    => '400 Italic',
           '500'  => '500',
          '500i'   => '500 Italic',
           '600'  => '600',
          '600i'   => '600 Italic',
          '700'  => '700',
          '700i'   => '700 Italic',
          '800'  => '800',
          '800i'   => '800 Italic',
          '900'  => '900',
          '900i'   => '900 Italic',
        ),
        'default'  => array( '400', 'regular', '800' ),
        'dependency' => array( 'different_hadding_font', '==', 'true' ) 

      ),

      ),   

  );

  return $options;

}
add_filter( 'cs_framework_options', 'industry_theme_options' );

