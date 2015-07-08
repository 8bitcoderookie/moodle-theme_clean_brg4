# moodle-theme_clean_brg4

This is a customised clean (bootstrapbase) theme for Moodle 2.9 and up (should work with 2.5-2.8 but was not tested). It is the successor of our non-bootstrap-based Theme [moodle-theme_brg4](https://github.com/8bitcoderookie/moodle-theme_brg4)

## Installing the Theme

1. Do a `git clone https://github.com/8bitcoderookie/moodle-theme_clean_brg4.git` in your moodle theme directory (/moodle/theme/)

2. (Re)login as Moodle admin triggers your Moodle site to begin the install 'Plugins Check'.

3. Navigate to _Administration > Site Administration > Appearance > Themes > Theme selector_. For _device type: Default_ click <kbd>Change theme</kbd> and select *Clean_BRG4* from the list of available themes.

## Theme enhancement / feature list

- add accesskey L to all pages Login/Logout toggle
- add accesskey E to all pages Edit on/off toggle
- fill-in helper for top category creation
- fill-in helper for sub category creation
- fill-in helper for course creation
- insert username if provided as fragment in URL
- auto-select Markdown as the default input format for textarea elements if 'When editing text' is set to 'Use standard web forms' in the user profile on all pages
- edit course topic: removes the 'Use default section name' check mark and sets focus to the section name textfield on page load
- frontpage: collapses all top categories exept the first two (Waltergasse and current school year)
- course request page: insert info for mandatory data to be provided.
- assignment: sync cut off date with due date; once activated it is set to due date by default
- assignment: enable Submission comments by default
- assignment: disable default email notification for graders.
- assignment: preset file upload limit to less than maximum.
- Profile Links lead to edit Profile page directly

## Referenzes

- [Clean theme - MoodleDocs](http://docs.moodle.org/dev/Clean_theme)
