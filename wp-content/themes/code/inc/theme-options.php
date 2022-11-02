<?php
 function consult_intigratewithvc(){
	 
	//section 1 
	 vc_map(array(
	 'name'=>__('First Section','text-donain'),
	 'description'=>'This is First Addon',
	 'base'=>'section_1_base',
	 'category'=>'Consult',
	 'icon'=> get_template_directory_uri().'/images/favicon.ico',
	 'params'=>array(
	 
		 array(
		 'param_name'=>'title_sec_1',
		 'type'=>'textfield',
		 'heading'=>'Section One Title ',
		 'value'=>'Placeholder',

		 ),
			 
			 
		array(
		 'param_name'=>'title_sec_desc_1',
		 'type'=>'textarea',
		 'heading'=>'Section One Description ',
		 'value'=>'Placeholder',

		 ),
			 
			 
		array(
		 'param_name'=>'title_sec_desc_1_color',
		 'type'=>'colorpicker',
		 'heading'=>'Section One Description color ',
		 ),
		 
		 
		array(
		 'param_name'=>'title_sec_1_image',
		 'type'=>'attach_image',
		 'heading'=>'Section One Image ',
		 ),
		 
	 
	 ),
	 
	));
	 
	 
 //section 3
 
 
 vc_map(array(
 	 'name'=>__('Third Section','text-donain'),
	 'description'=>'This is Third Addon',
	 'base'=>'section_3_base',
	 'category'=>'Consult',
	 'icon'=> get_template_directory_uri().'/images/favicon.ico',
	 'params'=>array(
	 
     array(
	 
	 'type'=>'param_group',
	 'heading'=>'Section 3 Items',
	 'param_name'=>'sec_3_grp',
	 'params'=>array(
	 
	 	 array(
	 
	 	 'param_name'=>'icon_image',
		 'heading'=>'Section 3 Dropdown',
		 'type'=>'dropdown',
		 'value'=>array(
		   'Select a value'=>'',
		   'Icon'=>'fontawesome',
		   'Image'=>'custom',
		 ),
	 
	 ),
	
	 array(
	 	 'param_name'=>'sec_3_icon',
		 'heading'=>'Section 3 Icon',
		 'type'=>'iconpicker',
		'dependency' => array(
			    'element' => 'icon_image',
				'value' => 'fontawesome',
			),
 
	    ),	 	 	

	 array(
	 	 'param_name'=>'sec_3_image',
		 'heading'=>'Section 3 Image',
		 'type'=>'attach_image',
		 'dependency'=>array(
		   'element'=>'icon_image',
		   'value'=>'custom',
		 ),
		 
	 ),	 
	 
	 array(
	 	 'param_name'=>'sec_3_title',
		 'heading'=>'Section 3 Title',
		 'type'=>'textfield',
		 'group'=>'Amit',
		 
	 ),	 
	 
	 array(
	 	 'param_name'=>'sec_3_desc',
		 'heading'=>'Section 3 Description',
		 'type'=>'textarea',
		 'group'=>'Amit',
		 
	 ),
	 
	 
	 )
	 
	 
	 ),
	 
	 

 
	 )

 ));
 
 //Blog Options
 
 
 vc_map(array(
 'name'=>'Blog Section',
 'description'=>'This is Blog',
 'base'=>'section_3_blog',
 'category'=>'Consult',
 'icon'=> get_template_directory_uri().'/images/favicon.ico',
 'params'=>array(
 
     array(
	 'param_name'=>'sec_blog_title',
	 'heading'=>'Latest Title',
	 'type'=>'textfield', 
	 )

   )
 
 ));
 
 
  
 vc_map(array(
 'name'=>'Contact Form 7 Section',
 'description'=>'This is Contact Form 7',
 'base'=>'section_cf',
 'category'=>'Consult',
 'icon'=> get_template_directory_uri().'/images/favicon.ico',
 'params'=>array(
 
     array(
	 'param_name'=>'content',
	 'heading'=>'Contact Form 7',
	 'type'=>'textarea_html', 
	 )
 )
 
 ));
 


 }

add_action('vc_before_init','consult_intigratewithvc');




?>