<?php
/*
Plugin Name: Social Engine Public Blogs 
Plugin URI: http://2cq.it/
Description: This plugin/widget retrieves the Last X SE Public Blogs and display them in your Wordpress Sidebar. To show your SE blogs in the other pages of your wp, simply put the code <code>&lt;?php joomood_blogs(); ?&gt;</code> where you want in your template.
Author: JooMood
Version: 1.0
Author URI: http://2cq.it/

	Copyright 2009, JooMOod
	-----------------------

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
*/

function joomood_blogs_install() {

	$newoptions = get_option('joomood_blogs_options');
	
    $newoptions['title']					='JooMood SE Blogs';
    $newoptions['numOfGroup']				='6';
    $newoptions['how_many_groups']			='1';
    $newoptions['image_border']				='0';
    $newoptions['image_bordercolor']		='#333333';
    $newoptions['go_profile_text']			='See the blog';
    $newoptions['go_profile_text1']			='See the profile of';
    $newoptions['pic']						='photo';
    $newoptions['empty_image_url']			='images/nophoto.gif';
    $newoptions['pic_dim_width']			='50';
    $newoptions['pic_dim_height']			='50';
    $newoptions['nametype']					='2';
	$newoptions['mainbox_border_style']		='0';
	$newoptions['mainbox_border_color']		='#333333';
	$newoptions['mainbox_border_dim']		='1';
	$newoptions['mainbox_bg_color']			='#ededed';
	$newoptions['box_border_style']			='0';
	$newoptions['box_border_color']			='#333333';
	$newoptions['box_border_dim']			='1';
	$newoptions['box_bg_color']				='#f7f7f7';
	$newoptions['outer_cellspacing']		='4';
	$newoptions['outer_cellpadding']		='2';
	$newoptions['inner_cellspacing']		='4';
	$newoptions['inner_cellpadding']		='2';
	$newoptions['cut_off']					='100';
	$newoptions['hide_desc']				='no';
	$newoptions['split_stat']				='no';
	$newoptions['blogbody']					='yes';
	

	add_option('joomood_blogs_options', $newoptions);

}


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

// add the admin page
function joomood_blogs_add_pages() {
	add_options_page('SE Blogs', 'SE Blogs', 8, __FILE__, 'joomood_blogs_options');
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function joomood_blogs() {

  $newoptions = get_option("joomood_blogs_options");

  	echo $before_widget;
    echo $before_title;
    echo "<h3>";

    echo $newoptions['title'];
    
    $title		 				= $newoptions['title'];
    $numOfGroup 				= $newoptions['numOfGroup'];
    $how_many_groups 			= $newoptions['how_many_groups'];
    $image_border 				= $newoptions['image_border'];
    $image_bordercolor 			= $newoptions['image_bordercolor'];
    $go_profile_text 			= $newoptions['go_profile_text'];
    $go_profile_text1 			= $newoptions['go_profile_text1'];
    $pic			 			= $newoptions['pic'];
    $empty_image_url 			= $newoptions['empty_image_url'];
    $pic_dim_width 				= $newoptions['pic_dim_width'];
    $pic_dim_height 			= $newoptions['pic_dim_height'];
    $nametype 					= $newoptions['nametype'];
	$mainbox_border_style		= $newoptions['mainbox_border_style'];
	$mainbox_border_color		= $newoptions['mainbox_border_color'];
	$mainbox_border_dim			= $newoptions['mainbox_border_dim'];
	$mainbox_bg_color			= $newoptions['mainbox_bg_color'];
	$box_border_style			= $newoptions['box_border_style'];
	$box_border_color			= $newoptions['box_border_color'];
	$box_border_dim				= $newoptions['box_border_dim'];
	$box_bg_color				= $newoptions['box_bg_color'];
	$outer_cellspacing			= $newoptions['outer_cellspacing'];
	$outer_cellpadding			= $newoptions['outer_cellpadding'];
	$inner_cellspacing			= $newoptions['inner_cellspacing'];
	$inner_cellpadding			= $newoptions['inner_cellpadding'];
	$cut_off					= $newoptions['cut_off'];
	$hide_desc					= $newoptions['hide_desc'];
	$split_stat					= $newoptions['split_stat'];
	$blogbody					= $newoptions['blogbody'];
	    
    
    echo $after_title;
    echo"</h3><br />";

	
	// Load main file
	
    include(ABSPATH.'wp-content/plugins/wp-se_blogs/main/se_blogs.php');

    echo $after_widget;
    echo "<br /><br />";

} // End of se_groups function



// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


	function joomood_blogs_options() {

	$options = $newoptions = get_option('joomood_blogs_options');

	if ( $_POST["myblogs_submit"] ) {

    $newoptions['title'] =htmlspecialchars($_POST['title']);
    $newoptions['numOfGroup'] = $_POST['numOfGroup'];
    $newoptions['how_many_groups'] = $_POST['how_many_groups'];
    $newoptions['image_border'] = $_POST['image_border'];
    $newoptions['image_bordercolor'] = $_POST['image_bordercolor'];
    $newoptions['go_profile_text'] = htmlspecialchars($_POST['go_profile_text']);
    $newoptions['go_profile_text1'] = htmlspecialchars($_POST['go_profile_text1']);
    $newoptions['pic'] = $_POST['pic'];
    $newoptions['empty_image_url'] = $_POST['empty_image_url'];
    $newoptions['pic_dim_width'] = $_POST['pic_dim_width'];
    $newoptions['pic_dim_height'] = $_POST['pic_dim_height'];
    $newoptions['nametype'] = $_POST['nametype'];
	$newoptions['mainbox_border_style'] = $_POST['mainbox_border_style'];
	$newoptions['mainbox_border_color'] = $_POST['mainbox_border_color'];
	$newoptions['mainbox_border_dim'] = $_POST['mainbox_border_dim'];
	$newoptions['mainbox_bg_color'] = $_POST['mainbox_bg_color'];
	$newoptions['box_border_style'] = $_POST['box_border_style'];
	$newoptions['box_border_color'] = $_POST['box_border_color'];
	$newoptions['box_border_dim'] = $_POST['box_border_dim'];
	$newoptions['box_bg_color'] = $_POST['box_bg_color'];
	$newoptions['outer_cellspacing'] = $_POST['outer_cellspacing'];
	$newoptions['outer_cellpadding'] = $_POST['outer_cellpadding'];
	$newoptions['inner_cellspacing'] = $_POST['inner_cellspacing'];
	$newoptions['inner_cellpadding'] = $_POST['inner_cellpadding'];
	$newoptions['cut_off'] = $_POST['cut_off'];
	$newoptions['split_stat'] = $_POST['split_stat'];
	$newoptions['hide_desc'] = $_POST['hide_desc'];
	$newoptions['blogbody'] = $_POST['blogbody'];


	}
	
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('joomood_blogs_options', $options);
	}


	echo '<form method="post">';
	echo "<div class=\"wrap\"><h2>JooMood Social Engine Blogs - Display Options</h2>";
	echo '<table class="form-table">';

	echo '<tr valign="top">';
	echo '<th scope="row">Title of the block</th><td><input name="title" type="text" value="'.$options['title'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">How many Blogs you want to display?</th><td><input name="numOfGroup" type="text" value="'.$options['numOfGroup'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">How many Blogs in every line?</th><td><input name="how_many_groups" type="text" value="'.$options['how_many_groups'].'" /></td></tr>';

	echo '<tr valign="top">';
	echo '<th scope="row">Type of Image</th><td><select name="pic" id="pic">
      <option ';
      if($options['pic'] == "photo"){ echo ' selected '; } echo 'value="photo">Photo</option>
      <option ';
      if($options['pic'] == "icon"){ echo ' selected '; } echo 'value="icon">Icon</option>
	  </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Width</th><td><input name="pic_dim_width" type="text" value="'.$options['pic_dim_width'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Height</th><td><input name="pic_dim_height" type="text" value="'.$options['pic_dim_height'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Border (in pixel)</th><td><input name="image_border" type="text" value="'.$options['image_border'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Image Border Color</th><td><input name="image_bordercolor" type="text" value="'.$options['image_bordercolor'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Blog Link Title</th><td><input name="go_profile_text" type="text" value="'.$options['go_profile_text'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">User Link Title</th><td><input name="go_profile_text1" type="text" value="'.$options['go_profile_text1'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">SE Empty Image</th><td><input name="empty_image_url" type="text" value="'.$options['empty_image_url'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Type of Name</th><td>
    <select name="nametype" id="nametype">
      <option ';
      if($options['nametype'] == "1"){ echo ' selected '; } echo 'value="1">Username</option>
      <option ';
      if($options['nametype'] == "2"){ echo ' selected '; } echo 'value="2">Full Name</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Style</th><td>
    <select name="mainbox_border_style" id="mainbox_border_style">
      <option ';
      if($options['mainbox_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>
      <option ';
      if($options['mainbox_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>
      <option ';
      if($options['mainbox_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Color</th><td><input name="mainbox_border_color" type="text" value="'.$options['mainbox_border_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Border Thickness</th><td><input name="mainbox_border_dim" type="text" value="'.$options['mainbox_border_dim'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Background Color</th><td><input name="mainbox_bg_color" type="text" value="'.$options['mainbox_bg_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Style</th><td>
    <select name="box_border_style" id="box_border_style">
      <option ';
      if($options['box_border_style'] == "0"){ echo ' selected '; } echo 'value="0">No Border</option>
      <option ';
      if($options['box_border_style'] == "1"){ echo ' selected '; } echo 'value="1">Dotted Border</option>
      <option ';
      if($options['box_border_style'] == "2"){ echo ' selected '; } echo 'value="2">Solid Border</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Color</th><td><input name="box_border_color" type="text" value="'.$options['box_border_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Border Thickness</th><td><input name="box_border_dim" type="text" value="'.$options['box_border_dim'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Background Color</th><td><input name="box_bg_color" type="text" value="'.$options['box_bg_color'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Mainbox Cellspacing</th><td><input name="outer_cellspacing" type="text" value="'.$options['outer_cellspacing'].'" /></td>
	</tr>
	
	<tr valign="top">
	<th scope="row">Mainbox Cellpadding</th><td><input name="outer_cellpadding" type="text" value="'.$options['outer_cellpadding'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner box Cellspacing</th><td><input name="inner_cellspacing" type="text" value="'.$options['inner_cellspacing'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Inner Cellpadding</th><td><input name="inner_cellpadding" type="text" value="'.$options['inner_cellpadding'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Cut Description after X Chars</th><td><input name="cut_off" type="text" value="'.$options['cut_off'].'" /></td>
	</tr>

	<tr valign="top">
	<th scope="row">Show the Blog Body?</th>
	<td>
    <select name="blogbody" id="blogbody">
      <option ';
      if($options['blogbody'] == "yes"){ echo ' selected '; } echo 'value="yes">Yes</option>
      <option ';
      if($options['blogbody'] == "no"){ echo ' selected '; } echo 'value="no">No</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Split Stats in 2 Lines?</th><td>
    <select name="split_stat" id="split_stat">
      <option ';
      if($options['split_stat'] == "yes"){ echo ' selected '; } echo 'value="yes">Yes</option>
      <option ';
      if($options['split_stat'] == "no"){ echo ' selected '; } echo 'value="no">No</option>
    </select>
	</td>
	</tr>

	<tr valign="top">
	<th scope="row">Hide the Description?</th><td>
    <select name="hide_desc" id="hide_desc">
      <option ';
      if($options['hide_desc'] == "yes"){ echo ' selected '; } echo 'value="yes">Yes</option>
      <option ';
      if($options['hide_desc'] == "no"){ echo ' selected '; } echo 'value="no">No</option>
    </select>
	</td>
	</tr>

	<input type="hidden" name="myblogs_submit" value="true">

	</table>

	<p class="submit"><input type="submit" value="Update Options &raquo;"></input></p>

	</div>

	</form>';


	} // End of se_groups_options function


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function widget_SeBlog($args) {
  extract($args);

  $options = get_option("widget_SeBlog");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'JooMood SE Blogs',
      'numOfGroup' => '3',
      'how_many_groups'=>'1',
      'image_border'=>'0',
      'image_bordercolor'=>'#333333',
      'go_profile_text'=>'See the blog',
      'go_profile_text1'=>'See the profile of',
      'empty_image_url'=>'images/nophoto.gif',
      'pic'=>'photo',
      'pic_dim_width'=>'30',
      'pic_dim_height'=>'30',
      'nametype'=>'2',
      'mainbox_width'=>'100',
      'mainbox_border_style'=>'0',
      'mainbox_border_color'=>'#333333',
      'mainbox_border_dim'=>'1',
      'mainbox_bg_color'=>'#ededed',
      'box_border_style'=>'0',
      'box_border_color'=>'#333333',
      'box_border_dim'=>'1',
      'box_bg_color'=>'#f7f7f7',
      'outer_cellspacing'=>'4',
      'outer_cellpadding'=>'2',
      'inner_cellspacing'=>'4',
      'inner_cellpadding'=>'2',
      'cut_off'=>'100',
      'blogbody'=>'yes',
      'split_stat'=>'no',
      'hide_desc'=>'no'
      );
  }      

  	echo $before_widget;
    echo $before_title;

    echo $options['title'];
    
    $title		 				= $options['title'];
    $numOfGroup 				= $options['numOfGroup'];
    $how_many_groups 			= $options['how_many_groups'];
    $image_border 				= $options['image_border'];
    $image_bordercolor 			= $options['image_bordercolor'];
    $go_profile_text 			= $options['go_profile_text'];
    $go_profile_text1 			= $options['go_profile_text1'];
    $empty_image_url 			= $options['empty_image_url'];
    $pic 						= $options['pic'];
    $pic_dim_width 				= $options['pic_dim_width'];
    $pic_dim_height 			= $options['pic_dim_height'];
    $nametype 					= $options['nametype'];
	$mainbox_width				= $options['mainbox_width'];
	$mainbox_border_style		= $options['mainbox_border_style'];
	$mainbox_border_color		= $options['mainbox_border_color'];
	$mainbox_border_dim			= $options['mainbox_border_dim'];
	$mainbox_bg_color			= $options['mainbox_bg_color'];
	$box_border_style			= $options['box_border_style'];
	$box_border_color			= $options['box_border_color'];
	$box_border_dim				= $options['box_border_dim'];
	$box_bg_color				= $options['box_bg_color'];
	$outer_cellspacing			= $options['outer_cellspacing'];
	$outer_cellpadding			= $options['outer_cellpadding'];
	$inner_cellspacing			= $options['inner_cellspacing'];
	$inner_cellpadding			= $options['inner_cellpadding'];
	$cut_off					= $options['cut_off'];
	$blogbody					= $options['blogbody'];
	$hide_desc					= $options['hide_desc'];
	$split_stat					= $options['split_stat'];
	    
    
    echo $after_title;

	
	// Load main file
	
    include(ABSPATH.'wp-content/plugins/wp-se_blogs/main/se_blogs.php');

    echo $after_widget;

} // End of widget_SeBlog function


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX


function SeBlog_control()
{
  $options = get_option("widget_SeBlog");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'JooMood SE Blogs',
      'numOfGroup' => '3',
      'how_many_groups'=>'1',
      'image_border'=>'0',
      'image_bordercolor'=>'#333333',
      'go_profile_text'=>'See the blog',
      'go_profile_text1'=>'See the profile of',
      'empty_image_url'=>'images/nophoto.gif',
      'pic'=>'photo',
      'pic_dim_width'=>'30',
      'pic_dim_height'=>'30',
      'nametype'=>'2',
      'mainbox_width'=>'100',
      'mainbox_border_style'=>'0',
      'mainbox_border_color'=>'#333333',
      'mainbox_border_dim'=>'1',
      'mainbox_bg_color'=>'#ededed',
      'box_border_style'=>'0',
      'box_border_color'=>'#333333',
      'box_border_dim'=>'1',
      'box_bg_color'=>'#f7f7f7',
      'outer_cellspacing'=>'4',
      'outer_cellpadding'=>'2',
      'inner_cellspacing'=>'4',
      'inner_cellpadding'=>'2',
      'cut_off'=>'100',
      'blogbody'=>'yes',
      'split_stat'=>'no',
      'hide_desc'=>'no'
      );
  }    

  if ($_POST['SeBlog-Submit'])
  {
    	
    $options['numOfGroup'] = $_POST['SeBlog-numOfGroup'];
    if($options['numOfGroup']=="") {
    $options['numOfGroup']="3";
    }

    $options['title'] = htmlspecialchars($_POST['SeBlog-WidgetTitle']);
    if($options['title']=="") {
    $options['title']="Last ".$options['numOfGroup']." SE Public Blogs";
    }
 
    $options['how_many_groups'] = $_POST['SeBlog-how_many_groups'];
    if($options['how_many_groups']=="") {
    $options['how_many_groups']="1";
    }
 
    $options['image_border'] = $_POST['SeBlog-image_border'];
    if($options['image_border']=="") {
    $options['image_border']="0";
    }
 
    $options['image_bordercolor'] = $_POST['SeBlog-image_bordercolor'];
     if($options['image_bordercolor']=="") {
    $options['image_bordercolor']="#333333";
    }

    $options['go_profile_text'] = htmlspecialchars($_POST['SeBlog-go_profile_text']);
    if($options['go_profile_text']=="") {
    $options['go_profile_text']="";
    }
 
    $options['go_profile_text1'] = htmlspecialchars($_POST['SeBlog-go_profile_text1']);
    if($options['go_profile_text1']=="") {
    $options['go_profile_text1']="";
    }
 
    $options['empty_image_url'] = $_POST['SeBlog-empty_image_url'];
    if($options['empty_image_url']=="") {
    $options['empty_image_url']="images/nophoto.gif";
    }
    
    $options['pic'] = $_POST['SeBlog-pic'];
    if($options['pic']=="") {
    $options['pic']="photo";
    }

    $options['pic_dim_width'] = $_POST['SeBlog-pic_dim_width'];
    if($options['pic_dim_width']=="") {
    $options['pic_dim_width']="30";
    }

    $options['pic_dim_height'] = $_POST['SeBlog-pic_dim_height'];
    if($options['pic_dim_height']=="") {
    $options['pic_dim_height']="30";
    }

    $options['nametype'] = $_POST['SeBlog-nametype'];
    if ($options['nametype']=="") {
    $options['nametype']="2";
    }

	$options['mainbox_width'] = $_POST['SeBlog-mainbox_width'];
    if ($options['mainbox_width']=="") {
    $options['mainbox_width']="0";
    }

	$options['mainbox_border_style'] = $_POST['SeBlog-mainbox_border_style'];
    if ($options['mainbox_border_style']=="") {
    $options['mainbox_border_style']="0";
    }

	$options['mainbox_border_color'] = $_POST['SeBlog-mainbox_border_color'];
    if ($options['mainbox_border_color']=="") {
    $options['mainbox_border_color']="#333333";
    }

	$options['mainbox_border_dim'] = $_POST['SeBlog-mainbox_border_dim'];
    if ($options['mainbox_border_dim']=="") {
    $options['mainbox_border_dim']="1";
    }
    
	$options['mainbox_bg_color'] = $_POST['SeBlog-mainbox_bg_color'];
    if ($options['mainbox_bgcolor']=="") {
    $options['mainbox_bgcolor']="#ededed";
    }

	$options['box_border_style'] = $_POST['SeBlog-box_border_style'];
    if ($options['box_border_style']=="") {
    $options['box_border_style']="0";
    }

	$options['box_border_color'] = $_POST['SeBlog-box_border_color'];
    if ($options['box_border_color']=="") {
    $options['box_border_color']="#333333";
    }

	$options['box_border_dim'] = $_POST['SeBlog-box_border_dim'];
    if ($options['box_border_dim']=="") {
    $options['box_border_dim']="1";
    }
    
	$options['box_bg_color'] = $_POST['SeBlog-box_bg_color'];
    if ($options['box_bg_color']=="") {
    $options['box_bg_color']="#f7f7f7";
    }

	$options['outer_cellspacing'] = $_POST['SeBlog-outer_cellspacing'];
    if ($options['outer_cellspacing']=="") {
    $options['outer_cellspacing']="4";
    }

	$options['outer_cellpadding'] = $_POST['SeBlog-outer_cellpadding'];
    if ($options['outer_cellpadding']=="") {
    $options['outer_cellpadding']="2";
    }

	$options['inner_cellspacing'] = $_POST['SeBlog-inner_cellspacing'];
    if ($options['inner_cellspacing']=="") {
    $options['inner_cellspacing']="4";
    }

	$options['inner_cellpadding'] = $_POST['SeBlog-inner_cellpadding'];
    if ($options['inner_cellpadding']=="") {
    $options['inner_cellpadding']="2";
    }

	$options['cut_off'] = $_POST['SeBlog-cut_off'];

	$options['blogbody'] = $_POST['SeBlog-blogbody'];
    if ($options['blogbody']=="") {
    $options['blogbody']="yes";
    }

	$options['split_stat'] = $_POST['SeBlog-split_stat'];
    if ($options['split_stat']=="") {
    $options['split_stat']="no";
    }

	$options['hide_desc'] = $_POST['SeBlog-hide_desc'];
    if ($options['hide_desc']=="") {
    $options['hide_desc']="no";
    }

    update_option("widget_SeBlog", $options);
  }

?>
    <p><label for="SeBlog-WidgetTitle">Widget Title: </label>
    <input class="widefat"  type="text" id="SeBlog-WidgetTitle" name="SeBlog-WidgetTitle" value="<?php echo $options['title'];?>" /></p>
    <p><label for="SeBlog-numOfGroup">Total Blogs: </label>
    <input class="widefat"  type="text" id="SeBlog-numOfGroup" name="SeBlog-numOfGroup" value="<?php echo $options['numOfGroup'];?>" /></p>
    <p><label for="SeBlog-how_many_groups">Blogs per Line: </label>
    <input class="widefat"  type="text" id="SeBlog-how_many_groups" name="SeBlog-how_many_groups" value="<?php echo $options['how_many_groups'];?>" /></p>
    <p><label for="SeBlog-pic">Type of Image: </label>
    <select name="SeBlog-pic" id="SeBlog-pic">
    <option <?php if($options['pic'] == "photo"){ echo ' selected '; } ?>value="photo">Photo</option>
    <option <?php if($options['pic'] == "icon"){ echo ' selected '; } ?>value="icon">Icon</option>
      </select>  </p>
    <p><label for="SeBlog-image_border">Image Border: </label>
    <input class="widefat"  type="text" id="SeBlog-image_border" name="SeBlog-image_border" value="<?php echo $options['image_border'];?>" /></p>
    <p><label for="SeBlog-image_bordercolor">Image Border Color: </label>
    <input class="widefat"  type="text" id="SeBlog-image_bordercolor" name="SeBlog-image_bordercolor" value="<?php echo $options['image_bordercolor'];?>" /></p>
    <p><label for="SeBlog-go_profile_text">Blog Link Title: </label>
    <input class="widefat"  type="text" id="SeBlog-go_profile_text" name="SeBlog-go_profile_text" value="<?php echo $options['go_profile_text'];?>" /></p>
    <p><label for="SeBlog-go_profile_text1">User Link Title: </label>
    <input class="widefat"  type="text" id="SeBlog-go_profile_text1" name="SeBlog-go_profile_text1" value="<?php echo $options['go_profile_text1'];?>" /></p>
    <p><label for="SeBlog-empty_image_url">SE Empty Image: </label>
    <input class="widefat"  type="text" id="SeBlog-empty_image_url" name="SeBlog-empty_image_url" value="<?php echo $options['empty_image_url'];?>" /></p>
    <p><label for="SeBlog-pic_dim_width">Pic Width (in pixel): </label>
    <input class="widefat"  type="text" id="SeBlog-pic_dim_width" name="SeBlog-pic_dim_width" value="<?php echo $options['pic_dim_width'];?>" /></p>
    <p><label for="SeBlog-pic_dim_height">Pic Width (in pixel): </label>
    <input class="widefat"  type="text" id="SeBlog-pic_dim_height" name="SeBlog-pic_dim_height" value="<?php echo $options['pic_dim_height'];?>" /></p>
    <p><label for="SeBlog-nametype">Preferred Names: </label>
    <select name="SeBlog-nametype" id="SeBlog-nametype">
    <option <?php if($options['nametype'] == "1"){ echo ' selected '; } ?>value="1">Username</option>
    <option <?php if($options['nametype'] == "2"){ echo ' selected '; } ?>value="2">Full Name</option>
      </select>  </p>
    <p><label for="SeBlog-mainbox_width">Mainbox Width (in %): </label>
    <input class="widefat"  type="text" id="SeBlog-mainbox_width" name="SeBlog-mainbox_width" value="<?php echo $options['mainbox_width'];?>" /></p>
    <p><label for="SeBlog-mainbox_border_style">Mainbox Border Style: </label>
    <select name="SeBlog-mainbox_border_style" id="SeBlog-mainbox_border_style">
    <option <?php if($options['mainbox_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>
    <option <?php if($options['mainbox_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>
    <option <?php if($options['mainbox_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option>
      </select>  </p>
    <p><label for="SeBlog-mainbox_border_color">Mainbox Border Color: </label>
    <input class="widefat"  type="text" id="SeBlog-mainbox_border_color" name="SeBlog-mainbox_border_color" value="<?php echo $options['mainbox_border_color'];?>" /></p>
    <p><label for="SeBlog-mainbox_border_dim">Mainbox Border Thickness (in px): </label>
    <input class="widefat"  type="text" id="SeBlog-mainbox_border_dim" name="SeBlog-mainbox_border_dim" value="<?php echo $options['mainbox_border_dim'];?>" /></p>
    <p><label for="SeBlog-mainbox_bg_color">Mainbox Background Color: </label>
    <input class="widefat"  type="text" id="SeBlog-mainbox_bg_color" name="SeBlog-mainbox_bg_color" value="<?php echo $options['mainbox_bg_color'];?>" /></p>
    <p><label for="SeBlog-box_border_style">Inner box Border Style: </label>
    <select name="SeBlog-box_border_style" id="SeBlog-box_border_style">
    <option <?php if($options['box_border_style'] == "0"){ echo ' selected '; } ?>value="0">No Border</option>
    <option <?php if($options['box_border_style'] == "1"){ echo ' selected '; } ?>value="1">Dotted Border</option>
    <option <?php if($options['box_border_style'] == "2"){ echo ' selected '; } ?>value="2">Solid Border</option>
      </select>  </p>
    <p><label for="SeBlog-box_border_color">Inner box Border Color: </label>
    <input class="widefat"  type="text" id="SeBlog-box_border_color" name="SeBlog-box_border_color" value="<?php echo $options['box_border_color'];?>" /></p>
    <p><label for="SeBlog-box_border_dim">Inner box Border Thickness (in px): </label>
    <input class="widefat"  type="text" id="SeBlog-box_border_dim" name="SeBlog-box_border_dim" value="<?php echo $options['box_border_dim'];?>" /></p>
    <p><label for="SeBlog-box_bg_color">Inner box Background Color: </label>
    <input class="widefat"  type="text" id="SeBlog-box_bg_color" name="SeBlog-box_bg_color" value="<?php echo $options['box_bg_color'];?>" /></p>
    <p><label for="SeBlog-outer_cellspacing">Mainbox Cellspacing: </label>
    <input class="widefat"  type="text" id="SeBlog-outer_cellspacing" name="SeBlog-outer_cellspacing" value="<?php echo $options['outer_cellspacing'];?>" /></p>
    <p><label for="SeBlog-outer_cellpadding">Mainbox Cellpadding: </label>
    <input class="widefat"  type="text" id="SeBlog-outer_cellpadding" name="SeBlog-outer_cellpadding" value="<?php echo $options['outer_cellpadding'];?>" /></p>
    <p><label for="SeBlog-inner_cellspacing">Inner box Cellspacing: </label>
    <input class="widefat"  type="text" id="SeBlog-inner_cellspacing" name="SeBlog-inner_cellspacing" value="<?php echo $options['inner_cellspacing'];?>" /></p>
    <p><label for="SeBlog-inner_cellpadding">Inner box Cellpadding: </label>
    <input class="widefat"  type="text" id="SeBlog-inner_cellpadding" name="SeBlog-inner_cellpadding" value="<?php echo $options['inner_cellpadding'];?>" /></p>

    <p><label for="SeBlog-cut_off">Cut the Blog Description after X Chars (leave it blank for no-cut): </label>
    <input class="widefat"  type="text" id="SeBlog-cut_off" name="SeBlog-cut_off" value="<?php echo $options['cut_off'];?>" /></p>
    <p><label for="SeBlog-blogbody">Show the Blog Body? </label>
    <select name="SeBlog-blogbody" id="SeBlog-blogbody">
    <option <?php if($options['blogbody'] == "yes"){ echo ' selected '; } ?>value="yes">Yes</option>
    <option <?php if($options['blogbody'] == "no"){ echo ' selected '; } ?>value="no">No</option>
      </select>  </p>
    <p><label for="SeBlog-split_stat">Split the Stats in 2 lines? </label>
    <select name="SeBlog-split_stat" id="SeBlog-split_stat">
    <option <?php if($options['split_stat'] == "yes"){ echo ' selected '; } ?>value="yes">Yes</option>
    <option <?php if($options['split_stat'] == "no"){ echo ' selected '; } ?>value="no">No</option>
      </select>  </p>
    <p><label for="SeBlog-hide_desc">Hide the Blog Description? </label>
    <select name="SeBlog-hide_desc" id="SeBlog-hide_desc">
    <option <?php if($options['hide_desc'] == "yes"){ echo ' selected '; } ?>value="yes">Yes</option>
    <option <?php if($options['hide_desc'] == "no"){ echo ' selected '; } ?>value="no">No</option>
      </select>  </p>
    
    <input type="hidden" id="SeBlog-Submit" name="SeBlog-Submit" value="1" />
<?php
}


//-----------------------------------------------------------------------------
//			ACTIONS
//-----------------------------------------------------------------------------


//uninstall all options
function SeBlog_uninstall () {
	delete_option('widget_SeBlog');
}

function joomood_blogs_uninstall () {
	delete_option('joomood_blogs_options');
}

function SeBlog_init()
{
  register_sidebar_widget(__('JooMood SE Blogs'), 'widget_SeBlog');
  register_widget_control(   'JooMood SE Blogs', 'SeBlog_control', 300, 200 );    
}

add_action("plugins_loaded", "SeBlog_init");
add_action('admin_menu', 'joomood_blogs_add_pages');

register_activation_hook( __FILE__, 'joomood_blogs_install' );
register_deactivation_hook( __FILE__, 'joomood_blogs_uninstall' );


?>