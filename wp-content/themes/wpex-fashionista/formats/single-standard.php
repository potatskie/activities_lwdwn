<?php
$fullwidthimg_arr = simple_fields_value('full_width_image');

if($fullwidthimg_arr && $fullwidthimg_arr['is_image']){
	echo '<img src="' . $fullwidthimg_arr['image_src']['full'][0] . '" alt="' . get_the_title() .'" />';
}
else{
	wpex_post_thumbnail(); 
}
?>
