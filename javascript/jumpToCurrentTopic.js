///////////////////////////////////////////////
// Name: jumpToCurrentTopic.js
// Author: Michael Rundel
// Description: When displaying course topics jump to current topic
// Date: 19.08.2013
// - 28.10.2013: Bugfix: no JS error when there is no current topic
// - 11.12.2015: Added support for "Show one section per page" course format
//               page with current topic is loaded when entering course page
///////////////////////////////////////////////

YUI().use('node', function (Y) {

	// scroll to current topic

	if (window.location.hash == '') {
		var firstCurrentTopics = Y.one('.current');
		if (firstCurrentTopics) { // might be null
			window.location.hash = '#'+firstCurrentTopics.get('id');
		}
	}

	// load current topic (in "Show one section per page" course format)

	if (window.location.search.indexOf('&section=') < 0) { // test if on main course page
		var firstCurrentTopics = Y.one('ul.topics li.current');
		if (firstCurrentTopics) { // might be null
			if (firstCurrentTopics.hasClass('section') == true) {
				var section_id = firstCurrentTopics.get('id').substring(8);
				window.location.search += ('&section='+section_id);
			}
		}
	}
	else {
		start_index = window.location.search.indexOf('id=');
		var id_str = window.location.search.substring(start_index+3);
		end_index = id_str.indexOf('&');
		var id_str = id_str.substring(0,end_index);

		console.log('temp '+id_str);
		var option_course_main_page = Y.one('option[value="/course/view.php?id='+id_str+'"]');
		if (option_course_main_page) {
			option_course_main_page.set('value', option_course_main_page.get('value')+'&section=0');
			console.log('option found');
		}
	}

});
