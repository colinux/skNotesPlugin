skNotesPlugin
=============

This small [Symfony](http://www.symfony-project.org/) plugin facilitates management of notes and references, by providing class to add them in the templates, partials or whatever, and to retrieve them later to display them.


Plugin Installation
-------------------

If you read this, you probably already know install a plugin as a git submodule.


Usage
-----

The plugin is usable in 2 modes: single instance and multiples instances. The second mode allows to create groups of notes to dissociate their display. However, it's also possible to render all notes in all instances at the same time.

### Single instance mode

Invoke skNotes::getInstance() to retrieve the instance to add a note, and call the add('your text') to add a new note.

To display all notes added, retrieve the instance the same way and use the getNotes() to retrieve all notes added. On each note, you have access to methods getText() and getIndex().

<small>You can also add an offset and a limit to the getNotes() method to retrieve a portion of the notes. This works like array_slice() function.</small>


Alternatively, you can use the component shipped with the plugin like this to display all notes in an ordered list:

    if (skNotes::hasInstances()) {
      include_component('skNotes', 'list');
    }


### Multi instances mode

Invoke skNotes::getInstance('name') to retrieve an instance for 'name' group.

An additional numeric argument can represent the first index to be used (1 by default). With that, you can have unique html ids if your display includes the index in an id attribute (this is the case in the shipped component).

To display notes of a specific instance with the shipped component, include like this:

      include_component('skNotes', 'list', array('name' => 'name of the instance');

If you wish render all notes of all instances, simply omit the name, or use the skNotes::getAllNotes() method.


### Rendering links to notes###

It's up to you, but you can use something like that:
  
    $idx = skNotes::getInstance()->add('this is my note');
    echo '<sup><a href="#note-'.$idx.'">'.$idx.'</a></sup>';


### More ###

Read the skNotes class, there is a few more useful methods.


Tests
-----

There is no test, and it's bad.


License
-------

This plugin is licensed under the terms of the [MIT license](http://en.wikipedia.org/wiki/MIT_License).
