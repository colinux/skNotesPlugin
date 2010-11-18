<?php
/**
 * skNotesItem class representing a set of notes (references).
 *
 * @package skNotesPlugin
 * @author Colin Darie <colindarie@gmail.com>
 */
class skNotes
{
  /**
   * @var array $instances Store all instances, indexed by instance name
   */
  static protected $instances = array();


  /**
   * @var array $notes Store notes
   */
  protected $notes = array();


  /**
   * @var int $index Index for the next note
   */
  protected $index;


  /**
   * Constructor. Recommanded instanciation is by getInstance().
   * @var int $start_offset Allows a first index different from 1 in a multi-instances mode
   */
  public function __construct($name = 'main', $start_index = 1)
  {
    if (isset(self::$instances[$name]))
    {
      throw new Exception ('An instance with name '.$name.' already exists');
    }

    $this->index = $start_index;
    self::$instances[$name] = $this;
  }


  /**
   * Return an instance for a give name, and create it if it doesn't exist.
   * This allows both several distinct groups of notes in a
   * same page and an usage with a single instance for all the page.
   *
   * @var string $name The name of the instance to return
   * @var int $start_offset Allows a first index different from 1 in a multi-instances mode
   */
  static public function getInstance($name = 'main', $start_index = 1)
  {
    if (!isset(self::$instances[$name]))
    {
      new skNotes($name, $start_index);
    }

    return self::$instances[$name];
  }


  /**
   * Whether or not at least one instance has been declared
   *
   * @return boolean
   */
  static public function hasInstances()
  {
    return (bool) self::$instances;
  }


  /**
   * Whether or not an existing exist with the given name
   *
   * @return boolean
   */
  static public function hasInstance($name = 'main')
  {
    return isset(self::$instances[$name]);
  }


  /**
   * Add a note
   *
   * @param string $text The text of the node
   * @return void
   */
  public function add($text)
  {
    $this->notes[] = new skNotesItem($text, $this->index);
    $index = $this->index++;

    return $this->index - 1;
  }


  /**
   * Delete all existings notes in the instance
   *
   * @return void
   */
  public function clearNotes()
  {
    $this->notes = array();
  }


  /**
   * Whether or not the instance has notes.
   *
   * @return boolean
   */
  public function hasNotes()
  {
    return (bool) $this->notes;
  }


  /**
   * Count notes
   *
   * @return int
   */
  public function countNotes()
  {
    return count($this->notes);
  }


  /**
   * Retrieve an array of notes.
   *
   * @param int $offset
   * @return array
   */
  public function getNotes($offset = 0, $length = null)
  {
    return array_slice($this->notes, $offset, $length);
  }


  /**
   * Retrieve all notes of all instances in an array.
   *
   * @return array
   */
  static public function getAllNotes()
  {
    $notes = array();
    foreach (self::$instances as $i)
    {
      $notes = array_merge($notes, $i->getNotes());
    }

    return $notes;
  }


  /**
   * Return the last index used in this instance
   *
   * @return int
   */
  public function getLastIndex()
  {
    return $this->index - 1;
  }
}
