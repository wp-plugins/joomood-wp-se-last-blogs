<?php 

//  Description: JooMood WP Plugins - Retrieve Last X SE Public Blogs
//	Author: JooMood
//	Version: 1.0
//	Author URI: http://2cq.it/

//	Copyright 2009, JooMOod
//	-----------------------

//	This program is free software: you can redistribute it and/or modify
//	it under the terms of the GNU General Public License as published by
//	the Free Software Foundation, either version 3 of the License, or
//	(at your option) any later version.

//	This program is distributed in the hope that it will be useful,
//	but WITHOUT ANY WARRANTY; without even the implied warranty of
//	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//	GNU General Public License for more details.

//	You should have received a copy of the GNU General Public License
//	along with this program.  If not, see <http://www.gnu.org/licenses/>.


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					JOOMOOD START PLAYING
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

// SHOW LAST SE X PUBLIC BLOGS

    include(ABSPATH.'wp-content/plugins/giggi_functions/giggi_database.php');
    require_once(ABSPATH.'wp-content/plugins/giggi_functions/giggi_functions.php');



// Check some data...

if($nametype=="1" OR $nametype=="2") {
$nametypez=$nametype;
} else {
$nametypez="2";
}

		
		// Check Pic Type
		
		if (preg_match ("/^([0-9.,-]+)$/", $pic_type)) {
        $pics="1";
        } else {
        $pics="0";  // vuol dire che l'utente non ha inserito un numero!
        }

		if($pics=="0" OR $pic_type=="1") {
		$pic="photo";
		} else {
		$pic="icon";
		}
		
		
		// Check personal width & height...

        if (preg_match ("/^([0-9.,-]+)$/", $pic_dim_width)) {
        $my_w="1";
        } else {
        $my_w="0";  // vuol dire che l'utente non ha inserito un numero!
        }
        if (preg_match ("/^([0-9.,-]+)$/", $pic_dim_height)) {
        $my_h="1";
        } else {
        $my_h="0";  // vuol dire che l'utente non ha inserito un numero!
        }

        if($pic_dim_width=="0" OR $pic_dim_height=="0" OR $pic_dim_width=="" OR $pic_dim_height=="" OR $my_w=="0" OR $my_h=="0") {
        $pic_dimensions="0";
        } else {
        $pic_dimensions="1";
        }

        if($pic_dimensions =="1") {
		
		$mywidth=$pic_dim_width;
		$myheight=$pic_dim_height;
		
		} else {
		$mywidth="60";
		$myheight="60";
		
		}

		// Check the blog description cut-off point
		
        if (preg_match ("/^([0-9.,-]+)$/", $cut_off)) {
        $cut="1";
        } else {
        $cut="0";  // vuol dire che l'utente non ha inserito un numero!
        }


		// Check Num of Blogs...

		if($numOfGroup<0) {
		$numOfGroup=1;
		}

		if($how_many_groups>$numOfGroup) {
		$how_many_groups=$numOfGroup;
		}
		
// ---------------------------------------------------------

		// Check Main Box border style
		
		if ($mainbox_border_style=="0" OR $mainbox_border_style=="1" OR $mainbox_border_style=="2") {
		$mainbox_border_res="1";
		} else {
		$mainbox_border_res="0";
		}

		// Check Main Box border color
		
		if ($mainbox_border_color!=='') {
		$mainbox_bordercol_res="1";
		} else {
		$mainbox_bordercol_res="0";
		}

		
		// Substitute empty or wrong fields
		
		if ($mainbox_border_res=="0") {
		$mainboxbord="0px solid";
		} 
		
		if ($mainbox_border_style=="1") {
		$mainboxbord="{$mainbox_border_dim}px dotted";
		} 
		
		if ($mainbox_border_style=="2") {
		$mainboxbord="{$mainbox_border_dim}px solid";
		} 
		

		if ($mainbox_bordercol_res=="0") {
		$mainboxbordcol="#ffffff";
		} else {
		$mainboxbordcol=$mainbox_border_color;
		}
		
		$mainboxbgcol=$mainbox_bg_color;


// ---------------------------------------------------------

		if ($mainbox_width=="") {
		$mainbox_width="100%";
		} else {
		$mainbox_width=$mainbox_width."%";
		}
		
		// Check Inner Box border style
		
		if ($box_border_style=="0" OR $box_border_style=="1" OR $box_border_style=="2") {
		$box_border_res="1";
		} else {
		$box_border_res="0";
		}

		// Check box border color
		
		if ($box_border_color!=='') {
		$box_bordercol_res="1";
		} else {
		$box_bordercol_res="0";
		}

		
		// Substitute empty or wrong fields
		
		if ($box_border_res=="0") {
		$boxbord="0px solid";
		} 
		
		if ($box_border_style=="1") {
		$boxbord="{$box_border_dim}px dotted";
		} 
		
		if ($box_border_style=="2") {
		$boxbord="{$box_border_dim}px solid";
		} 
		

		if ($box_bordercol_res=="0") {
		$boxbordcol="#ffffff";
		} else {
		$boxbordcol=$box_border_color;
		}
		
		$boxbgcol=$box_bg_color;
		
		
		// Build Full Style Variables
		
		$mystyle="style=\"border:".$boxbord." ".$boxbordcol."; background-color: ".$boxbgcol.";\"";
		$mymainstyle="style=\"border:".$mainboxbord." ".$mainboxbordcol."; background-color: ".$mainboxbgcol.";\"";
		$titlestyle="padding: 0px 5px 5px 0px; border-bottom: 1px solid #CCCCCC; margin-bottom: 5px;";
		$bodystyle="margin-bottom: 5px;";
		$statstyle="font-size: 7pt; color: #777777; font-weight: normal;";



// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					LET'S START QUERY TO RETRIEVE OUR DATA
// ----------------------------------------------------------------------------------------------------------------------------------------------------------


$query  = "SELECT p.*, t.*, FROM_UNIXTIME((t.blogentry_date), '%d/%m/%y') as created
FROM se_blogentries t LEFT JOIN se_users p ON (t.blogentry_user_id=p.user_id)
WHERE t.blogentry_privacy='63'
ORDER by t.blogentry_date DESC limit ".$numOfGroup."";


$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))

{


$miovalore= giggitime2($row['blogentry_date'], $num_times=1).' ago';

// Choose a name or a username...


if ($nametypez=="2") {
$mynome=$row['user_displayname'];
} else {
$mynome=$row['user_username'];
}


// Cut a little bit the group description field...

$mydesc = $row['blogentry_body'];

if($cut=="0" OR $cut_off=="0" OR $cut_off=="") {
$shortdesc=$mydesc;
} else {
$shortdesc = substr($mydesc,0,$cut_off)."...";
}

if ($hide_desc=="yes") {
$shortdesc="";
}


$mydir=$wpdir."/wp-content/plugins/wp-se_blogs";


// Create a link to the blog leader
$mylink1="<a href=\"".$socialdir."/profile.php?user_id=".$row['user_id']."\" title=\"{$go_profile_text1} {$mynome}\">";

if ($pic=="photo") {


if ($row['user_photo']!='') {

$mypic1="<img src=\"{$mydir}/image.php/{$row['user_photo']}?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/uploads_user/1000/{$row['user_id']}/{$row['user_photo']}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
} else {
$mypic1="<img src=\"{$mydir}/image.php/nophoto.gif?width={$mywidth}&amp;height={$myheight}&amp;cropratio=1:1&amp;quality=100&amp;image={$socialdir}/{$empty_image_url}\" style=\"border:".$image_border."px ".$image_bordercolor." solid\" alt=\"".$myn."\" />";
}

// Creates a thumbnail based on your personal dims (width/height), without stretching the original pic

$mypic=$mylink1."{$mypic1}";

} else {
$mypic="<a href=\"#\"><img src=\"".$socialdir."/images/icons/blog_blog16.gif\" width=\"16\" height=\"16\" alt=\"\"></a>";
$mywidth="16";
$myheight="16";
}


// Format the blog post body

$row['blogentry_body'] = htmlspecialchars_decode($row['blogentry_body'], ENT_QUOTES);


// Show the blog body? Uhm... it could be very big...

if ($blogbody=="yes") {
$blog=$row['blogentry_body'];
} else {
$blog="";
}


// Comment-Comments? View-Views?

if($row['blogentry_totalcomments']>1 && $row['blogentry_comments']=="63") {
$comment="<a href=\"{$socialdir}/blog.php?user={$row['user_username']}&amp;blogentry_id=".$row['blogentry_id']."\" title=\"".$go_profile_text.": {$row['blogentry_title']}\"><b>{$row['blogentry_totalcomments']}</b> Comments</a>";
} else 
if($row['blogentry_totalcomments']==1 && $row['blogentry_comments']=="63") {
$comment="<a href=\"{$socialdir}/blog.php?user={$row['user_username']}&amp;blogentry_id=".$row['blogentry_id']."\" title=\"".$go_profile_text.": {$row['blogentry_title']}\"><b>1</b> Comment</a>";
} else {
$comment="No Comment";
}
if($row['blogentry_views']>1) {
$view="{$row['blogentry_views']} Views";
} else 
if($row['blogentry_views']==1) {
$view="1 View";
} else {
$view="No View";
}

// Create a link to the blog

$mylink="<a href=\"".$socialdir."/blog.php?user={$row['user_username']}&amp;blogentry_id=".$row['blogentry_id']."\" title=\"".$go_profile_text.": {$row['blogentry_title']}\">";

if($split_stat=="0") {
$block1="<div style=\"{$statstyle}\">Posted {$miovalore} by {$mylink1}{$mynome}</a><span style=\"{$statstyle}\"> | {$comment}, {$view}</span></div>";
$line1="";
} else {
$block1="<div style=\"{$statstyle}\">Posted {$miovalore} by {$mylink1}{$mynome}</a></div>";
$line1="<div style=\"{$statstyle}\">{$comment}, {$view}</div>";
}

if($i<$how_many_groups) {

$rows .= "
<td align=\"left\" valign=\"top\">
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"{$mywidth}\" align=\"left\" valign=\"top\" scope=\"row\">{$mypic}</a></td>
<td align=\"left\" valign=\"top\" scope=\"row\"><div style=\"{$titlestyle}\">{$mylink}{$row['blogentry_title']}</a></div>
{$block1}
{$line1}
{$blog}
</td>
</tr>
</table>
</td>
";

} else {

$rows .= "
</tr><tr><td align=\"left\" valign=\"top\">
<table width=\"100%\" cellspacing=\"{$inner_cellspacing}\" cellpadding=\"{$inner_cellpadding}\" ".$mystyle.">
<tr>
<td width=\"{$mywidth}\" align=\"left\" valign=\"top\" scope=\"row\">{$mypic}</a></td>
<td align=\"left\" valign=\"top\" scope=\"row\"><div style=\"{$titlestyle}\">{$mylink}{$row['blogentry_title']}</a></div>
{$block1}
{$line1}
{$blog}
</td>
</tr>
</table>
</td>
";

$i=0;
}

$i++;

}

$content .="<table width=\"{$mainbox_width}\" cellspacing=\"{$outer_cellspacing}\" cellpadding=\"{$outer_cellpadding}\" {$mymainstyle}><tr>";
$content .="{$rows}";
$content .="</tr></table>";

echo $content;


// ----------------------------------------------------------------------------------------------------------------------------------------------------------
//					END OF JOOMOOD FUNNY TOY
// ----------------------------------------------------------------------------------------------------------------------------------------------------------

?>