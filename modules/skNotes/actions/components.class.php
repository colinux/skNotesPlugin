<?php

/**
 * main components.
 *
 * @package    skNotes
 * @author     Colin Darie <colindarie@gmail.com>
 */
class skNotesComponents extends sfComponents
{
  /**
   * Executes all notes component by rendering all the notes in all instances.
   *
   * @param sfRequest $request A request object
   */
  public function executeList(sfWebRequest $request)
  {
    if (isset($this->name))
    {
      if (!skNotes::hasInstance($this->name))
      {
        return sfView::NONE;
      }

      $this->notes = skNotes::getInstance($this->name)->getNotes();
    }
    else
    {
      $this->notes = skNotes::getAllNotes();
    }

    if (!$this->notes)
    {
      return sfView::NONE;
    }
  }
}

