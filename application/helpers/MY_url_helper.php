<?php
    function assets_url($url = '')
    {
        return base_url('assets/' . $url);
    }
    
    function css_url($css_name)
    {
        return assets_url('css/' . $css_name . '.css');
    }
    
    function js_url($js_name)
    {
        return assets_url('js/' . $js_name .'.js');
    }
