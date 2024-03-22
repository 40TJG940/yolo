<?php
/**
 *  Dynamic CSS
 *
 * @package    Location_weather
 * @subpackage Location_weather/public
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$weather_additional_data_layout = isset( $splw_meta['weather-additional-data-layout'] ) ? $splw_meta['weather-additional-data-layout'] : '';
$icon_color                     = isset( $splw_meta['lw-icon-color'] ) ? $splw_meta['lw-icon-color'] : '';
$background_type                = isset( $splw_meta['lw-background-type'] ) ? $splw_meta['lw-background-type'] : '';
$bg_solid                       = isset( $splw_meta['lw-bg-solid'] ) ? $splw_meta['lw-bg-solid'] : '#F05800';

$lw_bg_border      = isset( $splw_meta['lw_bg_border'] ) ? $splw_meta['lw_bg_border']['all'] . 'px ' . $splw_meta['lw_bg_border']['style'] . ' ' . $splw_meta['lw_bg_border']['color'] : '';
$bg_border_radius  = isset( $splw_meta['lw_bg_border_radius'] ) ? $splw_meta['lw_bg_border_radius']['all'] . $splw_meta['lw_bg_border_radius']['unit'] : '8px';
$weather_icon_size = isset( $splw_meta['lw_current_icon_size'] ) ? $splw_meta['lw_current_icon_size'] : '58';
// $weather_title_margin         = isset( $splw_meta['lw_title_margin'] ) && ! empty( $splw_meta['lw_title_margin'] ) ? $splw_meta['lw_title_margin'] : ' ';
// $lw_title_margin_top          = isset( $weather_title_margin['top'] ) ? $weather_title_margin['top'] : '0';
// $lw_title_margin_right        = isset( $weather_title_margin['right'] ) ? $weather_title_margin['right'] : '0';
// $lw_title_margin_bottom       = isset( $weather_title_margin['bottom'] ) ? $weather_title_margin['bottom'] : '20';
// $lw_title_margin_left         = isset( $weather_title_margin['left'] ) ? $weather_title_margin['left'] : '0';
$custom_css                  .= "#splw-location-weather-{$splw_id}.splw-main-wrapper {
	max-width: 320px;
	margin   : auto;
	margin-bottom: 2em;
}
#splw-location-weather-{$splw_id}.splw-main-wrapper.horizontal {
	max-width: 666px;
}";
$weather_content_padding_unit = isset( $splw_meta['lw_content_padding']['unit'] ) ? $splw_meta['lw_content_padding']['unit'] : 'px';
$weather_content_padding      = isset( $splw_meta['lw_content_padding'] ) ? $splw_meta['lw_content_padding'] : array(
	'top'    => '16',
	'right'  => '20',
	'bottom' => '10',
	'left'   => '20',
);
$custom_css                  .= '#splw-location-weather-' . $splw_id . ' .splw-lite-wrapper,#splw-location-weather-' . $splw_id . ' .splw-forecast-weather select,#splw-location-weather-' . $splw_id . ' .splw-forecast-weather option,#splw-location-weather-' . $splw_id . ' .splw-lite-wrapper .splw-weather-attribution a{
	text-decoration: none;
}';

$custom_css .= "#splw-location-weather-{$splw_id} .splw-lite-templates-body{
	padding : {$weather_content_padding['top']}{$weather_content_padding_unit} {$weather_content_padding['right']}{$weather_content_padding_unit} {$weather_content_padding['bottom']}{$weather_content_padding_unit} {$weather_content_padding['left']}{$weather_content_padding_unit};
}
#splw-location-weather-{$splw_id} .splw-weather-detailed-updated-time{
	padding : 0 {$weather_content_padding['right']}{$weather_content_padding_unit} 10px {$weather_content_padding['left']}{$weather_content_padding_unit};
}
#splw-location-weather-{$splw_id} .splw-lite-wrapper{
	 border: {$lw_bg_border};
}
#splw-location-weather-{$splw_id} .splw-lite-wrapper .splw-lite-current-temp .weather-icon{
	width: {$weather_icon_size}px;
}";

$custom_css .= "#splw-location-weather-{$splw_id} .splw-lite-wrapper{
	border-radius: {$bg_border_radius};
}";

$custom_css .= '#splw-location-weather-' . $splw_id . ' .splw-lite-daily-weather-details .details-icon svg path,#splw-location-weather-' . $splw_id . ' .splw-lite-daily-weather-details .details-icon svg circle{
	fill:' . $icon_color . ';
}';
switch ( $background_type ) {
	case 'solid':
	default:
		$custom_css .= '#splw-location-weather-' . $splw_id . ' .splw-lite-wrapper,#splw-location-weather-' . $splw_id . ' .splw-forecast-weather option{background:' . $bg_solid . '}';
		break;
}

$weather_view = isset( $splw_meta['weather-view'] ) ? $splw_meta['weather-view'] : 'vertical';
// Weather additional data layout style.
if ( 'vertical' === $weather_view ) {
	$active_additional_data_layout = isset( $splw_meta['weather-additional-data-layout'] ) ? $splw_meta['weather-additional-data-layout'] : 'center';
	switch ( $active_additional_data_layout ) {
		case 'center':
			$custom_css .= '#splw-location-weather-' . $splw_id . ' .splw-lite-daily-weather-details.lw-center .splw-other-opt{
					text-align: center;
				}';
			break;
		case 'left':
			$custom_css .= '#splw-location-weather-' . $splw_id . ' .splw-lite-daily-weather-details.lw-left .splw-other-opt{
					text-align: left;
				}';
			break;
		case 'justified':
			$custom_css .= '#splw-location-weather-' . $splw_id . ' .splw-lite-daily-weather-details.lw-justified .splw-other-opt div:not(.splw-weather-icons){
				    display: flex;
    				justify-content: space-between;
    				align-items: center;
				}';
			break;
	}
}
$lw_weather_title_typo       = isset( $splw_meta['lw-weather-title-typography'] ) ? $splw_meta['lw-weather-title-typography'] : array(
	'color'         => '#444',
	'margin-top'    => '0',
	'margin-bottom' => '20',
);
$lw_weather_title_color      = isset( $splw_meta['lw-weather-title-typography']['color'] ) ? $splw_meta['lw-weather-title-typography']['color'] : '#444';
$lw_city_name_typo           = isset( $splw_meta['lw-city-name-typography'] ) ? $splw_meta['lw-city-name-typography'] : array(
	'color'         => '#fff',
	'margin-top'    => '0',
	'margin-bottom' => '4',
);
$lw_date_time_typo           = isset( $splw_meta['lw-date-time-typography'] ) ? $splw_meta['lw-date-time-typography'] : array(
	'color'         => '#fff',
	'margin-top'    => '0',
	'margin-bottom' => '10',
);
$lw_temperature_typo         = isset( $splw_meta['lw-temp-scale-typography'] ) ? $splw_meta['lw-temp-scale-typography'] : array(
	'color'         => '#fff',
	'margin-top'    => '0',
	'margin-bottom' => '0',
);
$lw_temperature_desc_typo    = isset( $splw_meta['lw-real-feel-weather-desc-typography'] ) ? $splw_meta['lw-real-feel-weather-desc-typography'] : array(
	'color'         => '#fff',
	'margin-top'    => '10',
	'margin-bottom' => '0',
);
$lw_addition_data_typo       = isset( $splw_meta['lw-weather-units-typography'] ) ? $splw_meta['lw-weather-units-typography'] : array(
	'color' => '#fff',
);
$lw_addition_data_margin     = isset( $splw_meta['lw-weather-additional-data-margin'] ) ? $splw_meta['lw-weather-additional-data-margin'] : array(
	'top'    => '16',
	'bottom' => '0',
);
$lw_addition_data_icons_typo = isset( $splw_meta['lw-weather-units-icons-typography'] ) ? $splw_meta['lw-weather-units-icons-typography'] : array(
	'color'         => '#fff',
	'margin-top'    => '16',
	'margin-bottom' => '0',
);
$lw_attr_typo                = isset( $splw_meta['lw-weather-attr-typography'] ) ? $splw_meta['lw-weather-attr-typography'] : array(
	'color' => '#fff',
);
$lw_attr_margin              = isset( $splw_meta['lw-attr-margin'] ) ? $splw_meta['lw-attr-margin'] : array(
	'top'    => '0',
	'bottom' => '0',
);
$custom_css                 .= '#splw-location-weather-' . $splw_id . ' .splw-weather-title{
	color: ' . $lw_weather_title_color . ';
	margin-top: ' . $lw_weather_title_typo['margin-top'] . 'px;
	margin-bottom: ' . $lw_weather_title_typo['margin-bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-lite-header-title{
	color: ' . $lw_city_name_typo['color'] . ';
	margin-top: ' . $lw_city_name_typo['margin-top'] . 'px;
	margin-bottom: ' . $lw_city_name_typo['margin-bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-lite-current-time{
	color: ' . $lw_date_time_typo['color'] . ';
	margin-top: ' . $lw_date_time_typo['margin-top'] . 'px;
	margin-bottom: ' . $lw_date_time_typo['margin-bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-cur-temp{
	color: ' . $lw_temperature_typo['color'] . ';
	margin-top: ' . $lw_temperature_typo['margin-top'] . 'px;
	margin-bottom: ' . $lw_temperature_typo['margin-bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-lite-desc{
	color: ' . $lw_temperature_desc_typo['color'] . ';
	margin-top: ' . $lw_temperature_desc_typo['margin-top'] . 'px;
	margin-bottom: ' . $lw_temperature_desc_typo['margin-bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-lite-daily-weather-details{
	color: ' . $lw_addition_data_typo['color'] . ';
	margin-top: ' . $lw_addition_data_margin['top'] . 'px;
	margin-bottom: ' . $lw_addition_data_margin['bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-weather-details .splw-weather-icons {
	color: ' . $lw_addition_data_icons_typo['color'] . ';
	margin-top: ' . $lw_addition_data_icons_typo['margin-top'] . 'px;
	margin-bottom: ' . $lw_addition_data_icons_typo['margin-bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .lw-footer{
	margin-top: ' . $lw_attr_margin['top'] . 'px;
	margin-bottom: ' . $lw_attr_margin['bottom'] . 'px;
}
#splw-location-weather-' . $splw_id . ' .splw-weather-attribution a,#splw-location-weather-' . $splw_id . ' .splw-weather-attribution,
#splw-location-weather-' . $splw_id . ' .splw-weather-detailed-updated-time a,#splw-location-weather-' . $splw_id . ' .splw-weather-updated-time{
		color: ' . $lw_attr_typo['color'] . ';
}';

// Weather template box shadow style.
$show_lw_box_shadow = isset( $splw_meta['lw_box_shadow_type'] ) ? $splw_meta['lw_box_shadow_type'] : 'none';
if ( 'none' !== $show_lw_box_shadow ) {
	$lw_box_shadow   = isset( $splw_meta['weather_box_shadow'] ) ? $splw_meta['weather_box_shadow'] : array(
		'vertical'   => '4',
		'horizontal' => '4',
		'blur'       => '16',
		'spread'     => '0',
		'color'      => 'rgba(0,0,0,0.3)',
	);
	$box_shadow_css  = '';
	$box_shadow_css .= ( $lw_box_shadow['vertical'] >= 0 ) ? $lw_box_shadow['vertical'] . 'px ' : '0 ';
	$box_shadow_css .= ( $lw_box_shadow['horizontal'] >= 0 ) ? $lw_box_shadow['horizontal'] . 'px ' : '0 ';
	$box_shadow_css .= ( $lw_box_shadow['blur'] >= 0 ) ? $lw_box_shadow['blur'] . 'px ' : '10px ';
	$box_shadow_css .= ( $lw_box_shadow['spread'] >= 0 ) ? $lw_box_shadow['spread'] . 'px ' : '0 ';
	$box_shadow_css .= ( '' !== $lw_box_shadow['color'] ) ? $lw_box_shadow['color'] . ' ' : 'rgba(0,0,0,0.3) ';
	$box_shadow_css .= ( 'outset' !== $show_lw_box_shadow ) ? $show_lw_box_shadow : '';
	$custom_css     .= '#splw-location-weather-' . $splw_id . '.splw-main-wrapper:not(.table-view,.tabs-view) .splw-lite-wrapper {
		box-shadow:' . $box_shadow_css . ';
	}';
}

// Dynamic style for the preloader image.
$preloader = isset( $splw_meta['lw-preloader'] ) ? $splw_meta['lw-preloader'] : true;
if ( $preloader ) {
	$custom_css .= '#splw-location-weather-' . $splw_id . '.splw-main-wrapper {
		position: relative;
	}
	#lw-preloader-' . $splw_id . '{
		position: absolute;
		left: 0;
		top: 0;
		height: 100%;
		width: 100%;
		text-align: center;
		display: flex;
		align-items: center;
		justify-content: center;
		background: #fff;
		z-index: 9999;
	}';
}



