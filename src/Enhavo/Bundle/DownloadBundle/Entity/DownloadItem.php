<?php

namespace enhavo\DownloadBundle\Entity;

use enhavo\ContentBundle\Item\ItemTypeInterface;

/**
 * DownloadItem
 */
class DownloadItem implements ItemTypeInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \enhavo\DownloadBundle\Entity\Download
     */
    private $download;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $file;

    /**
     * @var string
     */
    private $title;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set download
     *
     * @param \enhavo\DownloadBundle\Entity\Download $download
     *
     * @return DownloadItem
     */
    public function setDownload(\enhavo\DownloadBundle\Entity\Download $download = null)
    {
        $this->download = $download;

        return $this;
    }

    /**
     * Get download
     *
     * @return \enhavo\DownloadBundle\Entity\Download
     */
    public function getDownload()
    {
        return $this->download;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->file = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add file
     *
     * @param \enhavo\MediaBundle\Entity\File $file
     *
     * @return DownloadItem
     */
    public function addFile(\enhavo\MediaBundle\Entity\File $file)
    {
        $this->file[] = $file;

        return $this;
    }

    /**
     * Remove file
     *
     * @param \enhavo\MediaBundle\Entity\File $file
     */
    public function removeFile(\enhavo\MediaBundle\Entity\File $file)
    {
        $this->file->removeElement($file);
    }

    /**
     * Get file
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return DownloadItem
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
