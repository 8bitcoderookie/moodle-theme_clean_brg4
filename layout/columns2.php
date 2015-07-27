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
 * The two column layout.
 *
 * @package   theme_clean_brg4
 * @copyright 2013 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_clean_brg4_get_html_for_settings($OUTPUT, $PAGE);

// Set default (LTR) layout mark-up for a two column page (side-pre-only).
$regionmain = 'span9 pull-right';
$sidepre = 'span3 desktop-first-column';
// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmain = 'span9';
    $sidepre = 'span3 pull-right';
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
	<script type="text/javascript">
		// dont rely on these the following values; this can easily spoofed!!!
		M.mdl_user_firstname = "<?php echo $USER->firstname ?>";
		M.mdl_user_lastname = "<?php echo $USER->lastname ?>";
		M.mdl_user_siteadmin = <?php if (is_siteadmin()) echo 'true'; else echo 'false' ; ?>;
	</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?> moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><img id="logoimg" src="<?php echo $OUTPUT->pix_url('logo', 'theme')?>" width="186" height="55" alt="BRG4 Moodle" title="BRG4 Moodle"></a>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php echo $OUTPUT->user_menu(); ?>
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu(); ?>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">
    <?php echo $OUTPUT->full_header(); ?>
    <div id="page-content" class="row-fluid">
        <section id="region-main" class="<?php echo $regionmain; ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php echo $OUTPUT->blocks('side-pre', $sidepre);
        ?>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
