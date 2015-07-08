<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The secure layout.
 *
 * @package   theme_clean_brg4
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_clean_brg4_get_html_for_settings($OUTPUT, $PAGE);

// Set default (LTR) layout mark-up for a three column page.
$regionmainbox = 'span9';
$regionmain = 'span8 pull-right';
$sidepre = 'span4 desktop-first-column';
$sidepost = 'span3 pull-right';
// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmainbox = 'span9 pull-right';
    $regionmain = 'span8';
    $sidepre = 'span4 pull-right';
    $sidepost = 'span3 desktop-first-column';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />

	<?php 
		$PAGE->requires->js('/theme/clean_brg4/javascript/base.js',false);
		
		if ($PAGE->bodyid == 'page-login-index') {  // Login Seite
			$PAGE->requires->js('/theme/clean_brg4/javascript/loginInsertUserName.js',false);
		}
		else {
			$PAGE->requires->js('/theme/clean_brg4/javascript/logonAccessKeys.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/replaceViewProfileLink.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/markDownAsDefaultTextAreaInputFormat.js',false);
		}
		if ($PAGE->bodyid == 'page-course-view-topics') { // Kursseite
			$PAGE->requires->js('/theme/clean_brg4/javascript/editAccessKeys.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/jumpToCurrentTopic.js',false);
		} 
		else if ($PAGE->bodyid == 'page-course-edit') {   // Neuen Kurs anlegen
			$PAGE->requires->js('/theme/clean_brg4/javascript/Array.map.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/String.trim.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/schuljahr.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/dom.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/neuenKursAnlegen.js',false);
		} 
		else if ($PAGE->bodyid == 'page-course-editcategory') { // Neue Kurskategorie anlegen
			$PAGE->requires->js('/theme/clean_brg4/javascript/String.trim.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/schuljahr.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/dom.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/kursbereichAnlegen.js',false);
		} 
		else if ($PAGE->bodyid == 'page-site-index') {  // frontpage
			$PAGE->requires->js('/theme/clean_brg4/javascript/collapseOldCourseCategories.js',false);
		} 
		else if ($PAGE->bodyid == 'page-course-editsection') {  // edit course section properties
			$PAGE->requires->js('/theme/clean_brg4/javascript/customSectionName.js',false);
		} 
		else if ($PAGE->bodyid == 'page-course-request') {  // edit course section properties
			$PAGE->requires->js('/theme/clean_brg4/javascript/courseRequest.js',false);
		} 
		else if ($PAGE->bodyid == 'page-mod-assign-mod') {  // edit assignment properties
			$PAGE->requires->js('/theme/clean_brg4/javascript/syncCutOffDate.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/submissionCommentsDefaultChecked.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/disableDefaultEmailNotification.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/dom.js',false);
			$PAGE->requires->js('/theme/clean_brg4/javascript/setAssignmentUploadSizeLimit.js',false);
		} 
	?>	
	
	<?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <span class="brand"><img id="logoimg" src="<?php echo $OUTPUT->pix_url('logo', 'theme')?>" width="201" height="55" alt="BRG4 Moodle" title="BRG4 Moodle"></span>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                    <li class="navbar-text"><?php echo $OUTPUT->login_info(false) ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
        <?php echo $html->heading; ?>
    </header>

    <div id="page-content" class="row-fluid">
        <div id="region-main-box" class="<?php echo $regionmainbox; ?>">
            <div class="row-fluid">
                <section id="region-main" class="<?php echo $regionmain; ?>">
                    <?php echo $OUTPUT->main_content(); ?>
                </section>
                <?php echo $OUTPUT->blocks('side-pre', $sidepre); ?>
            </div>
        </div>
        <?php echo $OUTPUT->blocks('side-post', $sidepost); ?>
    </div>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>