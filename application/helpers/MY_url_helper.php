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

    function image_url($image_name)
    {
        return assets_url('images/' . $image_name);
    }                                                                                                                        
    
    function file_icon_url($extension)
    {
        return image_url('file/' . strtolower($extension) .'.png');
    }
    
    function fb_profile_pic_url($fb_id,$large = false)
    {
        return "https://graph.facebook.com/{$fb_id}/picture" . ($large ? '?large' : '');
    }
