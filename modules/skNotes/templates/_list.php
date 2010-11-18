<div class="notes">
  <h4><?php echo __('Notes')?></h4>
  <ol class="notes-list">
    <?php foreach ($notes as $note): ?>
      <li id="ref-<?php echo $note->getIndex() ?>" value="<?php echo $note->getIndex() ?>"><?php echo $note->getText() ?></li>
    <?php endforeach ?>
  </ol>
</div>

