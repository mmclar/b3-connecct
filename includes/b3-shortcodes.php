<?php
function b3_calendar_shortcode($atts=[], $content=null, $tag='') {
    $shows= b3_get('/shows');
    foreach ($shows as $show) {
        echo("<li>$show->name");
    }
}

function b3_shortcodes_init() {
    add_shortcode('b3_calendar', 'b3_calendar_shortcode');
}

add_action('init', 'b3_shortcodes_init');

function b3_get($path, $params=array()) {
    $url = get_option('b3_api_url').$path.'?'.http_build_query($params);
    $args = array(
        'headers' => array(
            'Authorization' => 'Bearer '.get_option('b3_api_key'),
            'Accept' => 'application/json'
        )
    );
    $response = wp_remote_get($url, $args);
    return json_decode($response['body'])->results;
}
?>