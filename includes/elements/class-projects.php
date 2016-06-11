<?php

/**
 * Tailor Projects element class.
 *
 * @package Tailor Portfolio
 * @subpackage Elements
 * @since 1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Projects_Element' ) ) {

    /**
     * Tailor Projects element class.
     *
     * @since 1.0.0
     */
    class Tailor_Projects_Element extends Tailor_Element {

	    /**
	     * Registers element settings, sections and controls.
	     *
	     * @since 1.0.0
	     * @access protected
	     */
	    protected function register_controls() {

		    $this->add_section( 'general', array(
			    'title'                 =>  __( 'General', tailor_portfolio()->textdomain() ),
			    'priority'              =>  10,
		    ) );

		    $this->add_section( 'query', array(
			    'title'                 =>  __( 'Query', tailor_portfolio()->textdomain() ),
			    'priority'              =>  20,
		    ) );

		    $this->add_section( 'colors', array(
			    'title'                 =>  __( 'Colors', tailor_portfolio()->textdomain() ),
			    'priority'              =>  30,
		    ) );

		    $this->add_section( 'attributes', array(
			    'title'                 =>  __( 'Attributes', tailor_portfolio()->textdomain() ),
			    'priority'              =>  40,
		    ) );

		    $priority = 0;

		    $general_control_types = array(
			    'style',
			    'layout',
			    'masonry',
			    'items_per_row',
			    'item_spacing',
			    'autoplay',
			    'arrows',
			    'dots',
			    'fade',
			    'meta',
			    'image_size',
			    'aspect_ratio',
			    'stretch',
			    'posts_per_page',
			    'pagination',
		    );
		    $general_control_arguments = array(
			    'style'                 =>  array(
				    'control'               =>  array(
					    'choices'               =>  array(
						    'default'               =>  __( 'Default', tailor_portfolio()->textdomain() ),
						    'boxed'                 =>  __( 'Boxed', tailor_portfolio()->textdomain() ),
					    ),
				    ),
			    ),
			    'layout'                =>  array(
				    'control'               =>  array(
					    'choices'               =>  array(
						    'list'                  =>  __( 'List', tailor_portfolio()->textdomain() ),
						    'grid'                  =>  __( 'Grid', tailor_portfolio()->textdomain() ),
						    'carousel'              =>  __( 'Carousel', tailor_portfolio()->textdomain() ),
					    ),
				    ),
			    ),
			    'masonry'               =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'equals',
							    'value'                 =>  'grid',
						    ),
						    'items_per_row'         =>  array(
							    'condition'             =>  'greaterThan',
							    'value'                 =>  '1',
						    ),
					    ),
				    ),
			    ),
			    'items_per_row'         =>  array(
				    'setting'               =>  array(
					    'default'               =>  '2',
				    ),
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  array( 'grid', 'carousel' ),
						    ),
					    ),
				    ),
			    ),
			    'autoplay'              =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  array( 'carousel', 'slideshow' ),
						    ),
					    ),
				    ),
			    ),
			    'arrows'                =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  array( 'carousel', 'slideshow' ),
						    ),
					    ),
				    ),
			    ),
			    'dots'                  =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  array( 'carousel', 'slideshow' ),
						    ),
					    ),
				    ),
			    ),
			    'fade'                  =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  array( 'carousel', 'slideshow' ),
						    ),
						    'items_per_row'         =>  array(
							    'condition'             =>  'lessThan',
							    'value'                 =>  '2',
						    ),
					    ),
				    ),
			    ),
			    'meta'                  =>  array(
				    'setting'               =>  array(
					    'default'               =>  'date,excerpt',
				    ),
				    'control'               =>  array(
					    'choices'               =>  array(
						    'author'                =>  __( 'Author', tailor_portfolio()->textdomain() ),
						    'portfolio'             =>  __( 'Portfolio', tailor_portfolio()->textdomain() ),
						    'date'                  =>  __( 'Date', tailor_portfolio()->textdomain() ),
						    'excerpt'               =>  __( 'Excerpt', tailor_portfolio()->textdomain() ),
						    'thumbnail'             =>  __( 'Featured image', tailor_portfolio()->textdomain() ),
					    ),
				    ),
			    ),
			    'image_size'            =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'meta'                  =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  'thumbnail',
						    ),
					    ),
				    ),
			    ),
			    'aspect_ratio'          =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'meta'                  =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  'thumbnail',
						    ),
					    ),
				    ),
			    ),
			    'stretch'               =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'meta'                  =>  array(
							    'condition'             =>  'contains',
							    'value'                 =>  'thumbnail',
						    ),
					    ),
				    ),
			    ),
			    'pagination'            =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'not',
							    'value'                 =>  'carousel',
						    ),
					    ),
				    ),
			    ),
		    );
		    tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );

		    $priority = 0;

		    $this->add_setting( 'portfolio', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
		    ) );
		    $this->add_control( 'portfolio', array(
			    'label'                 =>  __( 'Portfolio', tailor_portfolio()->textdomain() ),
			    'type'                  =>  'select-multi',
			    'choices'               =>  tailor_get_terms( 'portfolio' ),
			    'section'               =>  'query',
			    'priority'              =>  $priority += 10,
		    ) );

		    $this->add_setting( 'skill', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
		    ) );
		    $this->add_control( 'skill', array(
			    'label'                 =>  __( 'Skill', tailor_portfolio()->textdomain() ),
			    'type'                  =>  'select-multi',
			    'choices'               =>  tailor_get_terms( 'skill' ),
			    'section'               =>  'query',
			    'priority'              =>  $priority += 10,
		    ) );

		    $query_control_types = array(
			    //'portfolio',
			    //'tags',
			    'order_by',
			    'order',
			    'offset',
		    );
		    $query_control_arguments = array();
		    tailor_control_presets( $this, $query_control_types, $query_control_arguments, $priority );

		    $priority = 0;
		    $color_control_types = array(
			    'color',
			    'link_color',
			    'heading_color',
			    'background_color',
			    'border_color',
			    'navigation_color',
		    );
		    $color_control_arguments = array(
			    'navigation_color'      =>  array(
				    'control'               =>  array(
					    'dependencies'          =>  array(
						    'layout'                =>  array(
							    'condition'             =>  'equals',
							    'value'                 =>  'carousel',
						    ),
					    ),
				    ),
			    ),
		    );
		    tailor_control_presets( $this, $color_control_types, $color_control_arguments, $priority );

		    $priority = 0;
		    $attribute_control_types = array(
			    'class',
			    'padding',
			    'margin',
			    'border_style',
			    'border_width',
			    'border_radius',
			    'shadow',
			    'background_image',
			    'background_repeat',
			    'background_position',
			    'background_size',
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	    /**
	     * Returns custom CSS rules for the element.
	     *
	     * @since 1.0.0
	     *
	     * @param $atts
	     * @return array
	     */
	    public function generate_css( $atts ) {
		    $css_rules = array();
		    $excluded_control_types = array();
		    $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

		    return $css_rules;
	    }
    }
}