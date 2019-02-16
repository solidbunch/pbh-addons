<?php

return array(
	'name'        => esc_html__( 'Alert', '{domain}' ),
	'base'        => 'pbh_alert',
	'icon'        => '/icon.svg',
	'category'    => esc_html__( 'Page Builder Hub', '{domain}' ),
	'description' => esc_html__( 'Add an alert', '{domain}' ),
	'params'      => array(

		array(
			'type'       => 'textarea_html',
			'heading'    => esc_html__( 'Alert Content', '{domain}' ),
			'param_name' => 'content',
			'holder'     => 'h2',
			'value'      => '',
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => esc_html__( 'Icon', '{domain}' ),
			'param_name' => 'icon',
			'settings'   => array(
				'emptyIcon' => true,
				'type'      => 'fontawesome',
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'CSS classes', '{domain}' ),
			'param_name' => 'classes',
			'value'      => '',
		),
		array(
			'type'       => 'el_id',
			'heading'    => esc_html__( 'Element ID', '{domain}' ),
			'param_name' => 'el_id',
			'settings'   => array(
				'auto_generate' => true,
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Style', '{domain}' ),
			'param_name' => 'style',
			'value'      => array(
				esc_html__( 'Primary', '{domain}' )   => 'primary',
				esc_html__( 'Secondary', '{domain}' ) => 'secondary',
				esc_html__( 'Success', '{domain}' )   => 'success',
				esc_html__( 'Danger', '{domain}' )    => 'danger',
				esc_html__( 'Warning', '{domain}' )   => 'warning',
				esc_html__( 'Info', '{domain}' )      => 'info',
				esc_html__( 'Light', '{domain}' )     => 'light',
				esc_html__( 'Dark', '{domain}' )      => 'dark',
			),
		),

	)
);