<?php
/**
 * skNotesItem class representing a single note.
 *
 * @package skNotesPlugin
 * @author Colin Darie <colindarie@gmail.com>
 */
class skNotesItem
{
  /**
   * @var string $text Text of the note
   */
  protected $text;


  /**
   * @var int $index Index for this note
   */
  protected $index;


  /**
   * Constructor
   *
   */
  public function __construct($text, $index)
  {
    $this->text = $text;
    $this->index = $index;
  }


  /**
   * Return the text of the note
   *
   * @return string The text of the note
   */
  public function getText()
  {
    return $this->text;
  }


  /**
   * Return the index of the note
   *
   * @return int The index of the note
   */
  public function getIndex()
  {
    return $this->index;
  }
}
?>
