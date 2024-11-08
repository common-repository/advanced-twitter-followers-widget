<?php
/**
 * @package advanced-twitter-followers-widget
*/
/*
Plugin Name: Advanced Twitter Followers Widget
Plugin URI: http://www.sparxseo.com
Description: Advanced Twitter Followers Widget for Wordpress.Advanced Twitter Followers Widget is an advanced Wordpress Twitter Followers Display widget which allow to customized in lots of way. You can add or remove options as well change color of background. No of Twitter followers to display and lots of. So Hope you will enjoy our this free wordpress widget :) .
Version: 1.1
Author: Alan Ferdinand
Author URI: http://www.sparxseo.com
*/
class advancedTwitterFollowersWidget extends WP_Widget{
    public function __construct() {
        // Register style sheet.
	add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
        $params = array(
            'description' => 'Advanced Twitter Followers Widget for Wordpress.Advanced Twitter Followers Widget is an advanced Wordpress Twitter Followers Display widget which allow to customized in lots of way. You can add or remove options as well change color of background. No of Twitter followers to display and lots of. So Hope you will enjoy our this free wordpress widget :)',
            'name' => 'Advanced Twitter Followers Widget'
        );
        parent::__construct('advancedTwitterFollowersWidget','',$params);
    }
    /**
    * Register and enqueue style sheet.
    */
    public function register_plugin_styles() {
        wp_register_style( 'advancedTwitterFollowersWidget', plugins_url( 'assets/style.css' , __FILE__ ) );
        wp_enqueue_style( 'advancedTwitterFollowersWidget' );
    }
    public function form($instance) {
        extract($instance);
        ?>
<script type="text/javascript">
//<![CDATA[
    jQuery(document).ready(function()
    {
	// colorpicker field
	jQuery('.cw-color-picker').each(function(){
	var $this = jQuery(this),
        id = $this.attr('rel');
 	$this.farbtastic('#' + id);
    });
});		
//]]>   
</script>
<!-- Advanced Twitter Display Widget Configuration Fields START - -->
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Basic Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('title');?>"
	name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Advanced Twitter Followers Widget"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('moduleclass_sfx');?>">Module Class Suffix : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('moduleclass_sfx');?>"
	name="<?php echo $this->get_field_name('moduleclass_sfx');?>"
    value="<?php echo !empty($moduleclass_sfx) ? $moduleclass_sfx : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('tUsername');?>">Twitter Username : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('tUsername');?>"
	name="<?php echo $this->get_field_name('tUsername');?>"
    value="<?php echo !empty($tUsername) ? $tUsername : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Width : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('width');?>"
	name="<?php echo $this->get_field_name('width');?>"
    value="<?php echo !empty($width) ? $width : "500"; ?>" />
</p>
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Twitter App Configuration(Must Fill This Correctly)**</div>
<p>
    <label for="<?php echo $this->get_field_id('consumerKey');?>">Consumer Key : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('consumerKey');?>"
	name="<?php echo $this->get_field_name('consumerKey');?>"
    value="<?php echo !empty($consumerKey) ? $consumerKey : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('consumerSecret');?>">Consumer Secret : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('consumerSecret');?>"
	name="<?php echo $this->get_field_name('consumerSecret');?>"
    value="<?php echo !empty($consumerSecret) ? $consumerSecret : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('accessToken');?>">Access Token : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('accessToken');?>"
	name="<?php echo $this->get_field_name('accessToken');?>"
    value="<?php echo !empty($accessToken) ? $accessToken : ""; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('accessTokenSecret');?>">Access Token Secret : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('accessTokenSecret');?>"
	name="<?php echo $this->get_field_name('accessTokenSecret');?>"
    value="<?php echo !empty($accessTokenSecret) ? $accessTokenSecret : ""; ?>" />
</p>
<div style="color:#fff; font-size:12px; font-weight:bold; padding:3px; margin:0; text-align:center; background:#333333;">Advanced Configuration</div>
<p>
    <label for="<?php echo $this->get_field_id('background'); ?>">Background Color :</label> 
    <input
    	class="widefat background"
   	id="<?php echo $this->get_field_id('background'); ?>"
        name="<?php echo $this->get_field_name('background'); ?>"
        value="<?php if($background) { echo $background; } else { echo '#fff';} ?>" />
</p>
<div class="cw-color-picker backgroundHide" rel="<?php echo $this->get_field_id('background'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id( 'border' ); ?>">Show Border :</label> 
    <select id="<?php echo $this->get_field_id( 'border' ); ?>"
        name="<?php echo $this->get_field_name( 'border' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($border == 'true') echo 'selected="true"'; ?> > Yes</option>
            <option value="false" <?php if ($border == 'false') echo 'selected="false"'; ?> >No</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('borderSize');?>">Border Size(if Border is true) : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('borderSize');?>"
	name="<?php echo $this->get_field_name('borderSize');?>"
        value="<?php echo !empty($borderSize) ? $borderSize : "1"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('borderColor'); ?>">Border Color :</label> 
    <input
    	class="widefat borderColor"
   	id="<?php echo $this->get_field_id('borderColor'); ?>"
        name="<?php echo $this->get_field_name('borderColor'); ?>"
        value="<?php if($borderColor) { echo $borderColor; } else { echo '#ccc';} ?>" />
</p>
<div class="cw-color-picker borderColorHide" rel="<?php echo $this->get_field_id('borderColor'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id('modulePadding');?>">Padding of Module : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('modulePadding');?>"
	name="<?php echo $this->get_field_name('modulePadding');?>"
        value="<?php echo !empty($modulePadding) ? $modulePadding : "10"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('borderRadius');?>">Border Radius : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('borderRadius');?>"
	name="<?php echo $this->get_field_name('borderRadius');?>"
        value="<?php echo !empty($borderRadius) ? $borderRadius : "10"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'header' ); ?>">Show Header :</label> 
    <select id="<?php echo $this->get_field_id( 'header' ); ?>"
        name="<?php echo $this->get_field_name( 'header' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($header == 'true') echo 'selected="true"'; ?> > Yes</option>
            <option value="false" <?php if ($header == 'false') echo 'selected="false"'; ?> >No</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('headerText');?>">Header Text : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('headerText');?>"
	name="<?php echo $this->get_field_name('headerText');?>"
        value="<?php echo !empty($headerText) ? $headerText : "Follow us on Twitter"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('headerBackgroundColor'); ?>">Header Background Color :</label> 
    <input
    	class="widefat headerBackgroundColor"
   	id="<?php echo $this->get_field_id('headerBackgroundColor'); ?>"
        name="<?php echo $this->get_field_name('headerBackgroundColor'); ?>"
        value="<?php if($headerBackgroundColor) { echo $headerBackgroundColor; } else { echo '#ccc';} ?>" />
</p>
<div class="cw-color-picker headerBackgroundColorHide" rel="<?php echo $this->get_field_id('headerBackgroundColor'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id('headerFontColor'); ?>">Header Font Color :</label> 
    <input
    	class="widefat headerFontColor"
   	id="<?php echo $this->get_field_id('headerFontColor'); ?>"
        name="<?php echo $this->get_field_name('headerFontColor'); ?>"
        value="<?php if($headerFontColor) { echo $headerFontColor; } else { echo '#fff';} ?>" />
</p>
<div class="cw-color-picker headerFontColorHide" rel="<?php echo $this->get_field_id('headerFontColor'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id('followButtonText');?>">Follow Button Text : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('followButtonText');?>"
	name="<?php echo $this->get_field_name('followButtonText');?>"
        value="<?php echo !empty($followButtonText) ? $followButtonText : "follow"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('connections');?>">No of Connections : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('connections');?>"
	name="<?php echo $this->get_field_name('connections');?>"
        value="<?php echo !empty($connections) ? $connections : "15"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('imagePadding');?>">Padding Between Connection Images : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('imagePadding');?>"
	name="<?php echo $this->get_field_name('imagePadding');?>"
        value="<?php echo !empty($imagePadding) ? $imagePadding : "0"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('imageBorderRadius');?>">Border Radius of Connection Images : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('imageBorderRadius');?>"
	name="<?php echo $this->get_field_name('imageBorderRadius');?>"
        value="<?php echo !empty($imageBorderRadius) ? $imageBorderRadius : "7"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('imageBorder');?>">Connections Image Border : </label>
    <input
	class="widefat"
	id="<?php echo $this->get_field_id('imageBorder');?>"
	name="<?php echo $this->get_field_name('imageBorder');?>"
        value="<?php echo !empty($imageBorder) ? $imageBorder : "2"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('imageBorderColor'); ?>">Connections Image Border Color :</label> 
    <input
    	class="widefat imageBorderColor"
   	id="<?php echo $this->get_field_id('imageBorderColor'); ?>"
        name="<?php echo $this->get_field_name('imageBorderColor'); ?>"
        value="<?php if($imageBorderColor) { echo $imageBorderColor; } else { echo '#ccc';} ?>" />
</p>
<div class="cw-color-picker imageBorderColorHide" rel="<?php echo $this->get_field_id('imageBorderColor'); ?>"></div>
<p>
    <label for="<?php echo $this->get_field_id( 'footer' ); ?>">Show Footer :</label> 
    <select id="<?php echo $this->get_field_id( 'footer' ); ?>"
        name="<?php echo $this->get_field_name( 'footer' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($footer == 'true') echo 'selected="true"'; ?> > Yes</option>
            <option value="false" <?php if ($footer == 'false') echo 'selected="false"'; ?> >No</option>	
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'author' ); ?>">Support Author :</label> 
    <select id="<?php echo $this->get_field_id( 'author' ); ?>"
        name="<?php echo $this->get_field_name( 'author' ); ?>"
        class="widefat" style="width:100%;">
			<option value="false" <?php if ($author == 'false') echo 'selected="false"'; ?> >I'm not Supporting Author</option>
            <option value="true" <?php if ($author == 'true') echo 'selected="true"'; ?> >I'm Supporting Author</option>
    </select>
</p>
<!--end of configuration fields-->
<?php
    }
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
        //including the api
        $dir = plugin_dir_path( __FILE__ )."TwitterAPIExchange.php";
        require_once($dir);
        $settings = array(
        'oauth_access_token' => trim($accessToken),
        'oauth_access_token_secret' => trim($accessTokenSecret),
        'consumer_key' => trim($consumerKey),
        'consumer_secret' => trim($consumerSecret)
        );
        $urlUserInformation = "https://api.twitter.com/1.1/users/show.json";
        $url = "https://api.twitter.com/1.1/followers/list.json";
        $requestMethod = "GET";
        $getFollowers = "?cursor=-1&screen_name=$tUsername&skip_status=true&include_user_entities=false";
        $twitter = new TwitterAPIExchange($settings);
        $stringUserInfo = json_decode($twitter->setGetfield($getFollowers)
        ->buildOauth($urlUserInformation, $requestMethod)
        ->performRequest(),$assoc = TRUE);
        $string = json_decode($twitter->setGetfield($getFollowers)
        ->buildOauth($url, $requestMethod)
        ->performRequest(),$assoc = TRUE);
        $followers = $stringUserInfo['followers_count'];
        $data = "";
        
        $data .= "
<div id='advanced_twitter_followers_widget' style='max-width: $width";
        $data .= "px; background: $background; padding: $modulePadding";
        $data .= "px; border-radius: $borderRadius";
        $data .= "px;'>
		<div id='twitterWidget' class='twitterFollowers'>
			<div class='likebox-border'>
				<div id='likebox' style='color: #000; font-size: 14px; ";
        if($border== "true"){
            $data .= "border: $borderSize";
            $data .= "px solid $borderColor; ";
            }
        $data .= "'>";
        if($header == "true"){
        $data .= "<div class='findus' style='background: $headerBackgroundColor; color: $headerFontColor; '>$headerText</div>";
        }
        $userScreenName = $stringUserInfo['screen_name'];
        $userProfileImage = $stringUserInfo['profile_image_url'];
        $userNameInfo = $stringUserInfo['name'];
	$data .= "<div class='floatelement'>
            <div class='thumb-img'><a href='//twitter.com/$userScreenName' target='_blank'><img src='$userProfileImage'></a></div>
		<div class='right-text'><p class='title'><a href='//twitter.com/$userScreenName' target='_blank'>$userNameInfo</a></p>
                    <a class='follow-btn' href='//twitter.com/$userScreenName' target='_blank'><span></span> $followButtonText</a></div>						
			<div class='clr'></div>
		</div>
			<div class='imagelisting'>
                <p>$followers peoples erare following <strong><a href='//twitter.com/$userScreenName' target='_blank'>$userScreenName</a></strong> @twitter</p>
    <ul>";
foreach($string as $items){						
$length = count($items);
if($length<$connections){
$t = $length;}
else{$t = $connections+1;
}
for($i=0;$i<$t-1;$i++){
$followImg = $items[$i]['profile_image_url'];
$followURL = $items[$i]['screen_name'];
$followTitle = $items[$i]['name'];
$data .= "<li style='margin: 5px 5px 0 0;'><a href='//twitter.com/$followURL' target='_blank'><img src='$followImg' title='$followTitle' style='border: $imageBorder";
$data .= "px  solid $imageBorderColor; border-radius: $imageBorderRadius";
$data .= "px;margin: $imagePadding";
$data .= "px;'></a></li>";
}
}
$data .= "<div class='clr'></div>
    </ul>";
if($footer=="true"){
    $data .= "<p class='icon'>follow us on twitter</p>";
        }
$data .= "</div>
				</div>
			</div>
		</div>
	</div>";
	$data .= "<div style='font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;'><a href='http://www.advantagebusinessvaluations.com/' target='_blank' style='color: #808080;' title='click here'>how much is my business worth</a></div>";
            echo $before_widget;
            echo $before_title . $title . $after_title;
			if($consumerKey == "" && $consumerSecret == "" && $accessToken == "" && $accessTokenSecret == ""){
				echo "Please check documentation. You must have to fill all require fields of Twitter Configuration";
			}else{
				echo $data;}
            echo $after_widget;
    }
}
//color picker module codies
function sparx_sample_load_color_picker_script() {
	wp_enqueue_script('farbtastic');
}
function sparx_sample_load_color_picker_style() {
	wp_enqueue_style('farbtastic');
}
add_action('admin_print_scripts-widgets.php', 'sparx_sample_load_color_picker_script');
add_action('admin_print_styles-widgets.php', 'sparx_sample_load_color_picker_style');
//start registering the extension
add_action('widgets_init','register_sparx_advancedTwitterFollowersWidget');
function register_sparx_advancedTwitterFollowersWidget(){
    register_widget('advancedTwitterFollowersWidget');
}