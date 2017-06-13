<?php
namespace app\Song;

class Song
{
	public $id;
	public $title;
	public $description;
	public $lyric;
	public $status;
	
	function __construct()
	{
		
	}


    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of description.
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the value of description.
     *
     * @param mixed $description the description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets the value of lyric.
     *
     * @return mixed
     */
    public function getLyric()
    {
        return $this->lyric;
    }

    /**
     * Sets the value of lyric.
     *
     * @param mixed $lyric the lyric
     *
     * @return self
     */
    public function setLyric($lyric)
    {
        $this->lyric = $lyric;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}