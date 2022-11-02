<?php
class ra_hero_wigets extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hero_section';
	}
	public function get_title() {
		return __( 'Hero Section', 'rasel-ahmed' );
	}
	public function get_icon() {
		return 'fa fa-code';
	}
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'rasel-ahmed' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'profile_img',
			[
				'label' => __( 'Profile Image', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'background_img',
			[
				'label' => __( 'Background Image', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);
		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '"Hi, Im Rasel Ahmed.", "I am Upcoming Web Developer.", "I Love to Develop.","I am Upcoming Freelancer."','rasel-ahmed' ),
				'placeholder' => __( 'Type your title here', 'rasel-ahmed' ),
				'label_block' => true,
				'description' =>'Type title in duble codetion and seperate using comma',
			]
		);
		$this->add_control(
			'section_content',
			[
				'label' => __( 'Content', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type your content here', 'rasel-ahmed' ),
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'social_section',
			[
				'label' => __( 'Social Section', 'rasel-ahmed' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Social Icon', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link_url',
			[
				'label' => __( 'Link URL', 'EW-toolkit' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'rasel-ahmed' ),
				'label_block' => true,
	
			]
			
		);
		$this->add_control(
			'social',
			[
				'label' => __( 'Social', 'rasel-ahmed' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();


	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		if(!empty($settings['background_img'])){
          $background = $settings['background_img']['url'];
		}
		else{
			$background = '';
		}
		if(!empty($settings['background_color'])){
			$background_color = $settings['background_color'];
		}else{
           $background_color = '';
		}
	
	$html = '
	<div class="hero-area" style="background-image: url('.$background.');background-color:'.$background_color.'">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
			   <div class="profile-img">
			       <div class="profile-wrap" style="background-image:url('.$settings['profile_img']['url'].')"></div>
			   </div>
			   <div class="about-me">
			<h1>
			  <a href="" class="typewrite" data-period="2000" data-type=\'['.$settings['title'].']\'>
				<span class="wrap"></span>
			  </a>
		   </h1>
				'.wpautop($settings['section_content']).'
			   </div>
			   <div class="social-icon">
				   <ul>';
				   foreach($settings['social'] as $social){
					if($social['link_url']['is_external'] == true){
						$link_type = '_blank';
					}else{
						$link_type = '_self';
					}
					 $html .= '<li><a target="'.$link_type.'" href="'.$social['link_url']['url'].'"><i class="'.$social['icon'].'"></i></a></li>';
				   }
	$html .= '   
				   </ul>
			   </div>
			</div>
		</div>
	</div>
</div>
	';
    echo $html;
	}

}