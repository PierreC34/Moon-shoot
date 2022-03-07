<?php
class Image
{
        /*-----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/

    private $id;
    private $title;
    private $image;

    /*-----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/
    public function __construct($id, $title, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
    }

    /*-----------------------------------------------------
                        Getter and Setter :
        -----------------------------------------------------*/

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return htmlspecialchars($this->image);
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return htmlspecialchars($this->title);
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
