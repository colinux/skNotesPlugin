<aside class="notes">
  <h1><?php echo __('Notes')?></h1>
  <ol class="notes-list">
    <?php foreach ($notes as $note): ?>
      <li id="note-<?php echo $note->getIndex() ?>" value="<?php echo $note->getIndex() ?>"><?php echo $note->getText() ?></li>
    <?php endforeach ?>
  </ol>
</aside>
