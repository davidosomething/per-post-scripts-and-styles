<?php

class PPSS_Model extends PW_Model
{
  protected $_title = "Per Post Scripts & Styles";
  protected $_name = 'ppss';
  protected $_post_types;
	
	protected $_help_tab = 
	  array(
	    'title' => 'Instructions',
  	  'id' => 'per-post-scripts-and-styles-help1',
  	  'content' => '<p>This is the instructions</p>'
	  );

  public function data()
  {
    // create an array of post types
    $post_types = get_post_types( array('public'=>true), 'objects');
    foreach($post_types as $name=>$object) {
      if ($name === 'attachment') continue;
      $this->_post_types[$name] = $object->labels->name;
    }
    
    return array(
      'post_types' => array(
				'label' => 'Allow Per Post Scripts & Styles For The Following Post Types:',
				'default' => array('post', 'page'),
				'options' => $this->_post_types,
			),
			'on' => array(
				'label' => 'Only Load Scripts/Styles When:',
				'default' => 'single',
				'options' => array(
				  'single' => 'Viewing a single post with attached scripts/styles',
				  'home' => 'Viewing a single post or the home page (if it contains posts with attached scripts/styles)',
				  'all' => 'Viewing any page containing posts with attached scripts/styles',
				)
			),
    );
  } 
}