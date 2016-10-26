<?php

namespace BookEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Book
 */
class Book
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $facebookLinkUrl;

    /**
     * @var string
     */
    private $imageUrl;

    /**
     * @var string
     */
    private $pressTitle;

    /**
     * @var string
     */
    private $pressImageUrl;

    /**
     * @var \DateTime
     */
    private $releaseDate;


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
     * Set title
     *
     * @param string $title
     * @return Book
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

    /**
     * Set author
     *
     * @param string $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set facebookLinkUrl
     *
     * @param string $facebookLinkUrl
     * @return Book
     */
    public function setFacebookLinkUrl($facebookLinkUrl)
    {
        $this->facebookLinkUrl = $facebookLinkUrl;

        return $this;
    }

    /**
     * Get facebookLinkUrl
     *
     * @return string 
     */
    public function getFacebookLinkUrl()
    {
        return $this->facebookLinkUrl;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     * @return Book
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set pressTitle
     *
     * @param string $pressTitle
     * @return Book
     */
    public function setPressTitle($pressTitle)
    {
        $this->pressTitle = $pressTitle;

        return $this;
    }

    /**
     * Get pressTitle
     *
     * @return string 
     */
    public function getPressTitle()
    {
        return $this->pressTitle;
    }

    /**
     * Set pressImageUrl
     *
     * @param string $pressImageUrl
     * @return Book
     */
    public function setPressImageUrl($pressImageUrl)
    {
        $this->pressImageUrl = $pressImageUrl;

        return $this;
    }

    /**
     * Get pressImageUrl
     *
     * @return string 
     */
    public function getPressImageUrl()
    {
        return $this->pressImageUrl;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Book
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }
    /**
     * @var string
     */
    private $purchaseOrderImageUrl;


    /**
     * Set purchaseOrderImageUrl
     *
     * @param string $purchaseOrderImageUrl
     * @return Book
     */
    public function setPurchaseOrderImageUrl($purchaseOrderImageUrl)
    {
        $this->purchaseOrderImageUrl = $purchaseOrderImageUrl;

        return $this;
    }

    /**
     * Get purchaseOrderImageUrl
     *
     * @return string 
     */
    public function getPurchaseOrderImageUrl()
    {
        return $this->purchaseOrderImageUrl;
    }
    /**
     * @var string
     */
    private $slug;


    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Book
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }


    const SERVER_PATH_TO_COVER_IMAGE_FOLDER = "../uploads/img/covers/";
    const SERVER_PATH_TO_PRESS_IMAGE_FOLDER = "../uploads/img/pressArticle/";
    const SERVER_PATH_TO_PURCHASE_ORDER_IMAGE_FOLDER = "../uploads/img/purchaseOrder/";
    /**
     * Unmapped property to handle coverImg uploads
     */
    private $coverImg;
    /**
     * Unmapped property to handle purchaseOrderImg uploads
     */
    private $purchaseOrderImg;
    /**
     * Unmapped property to handle pressImg uploads
     */
    private $pressImg;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return UploadedFile
     */
    public function getCoverImg()
    {
        return $this->coverImg;
    }

    /**
     * @param UploadedFile $coverImg
     */
    public function setCoverImg(UploadedFile $coverImg)
    {
        $this->coverImg = $coverImg;
    }

    /**
     * @return UploadedFile
     */
    public function getPurchaseOrderImg()
    {
        return $this->purchaseOrderImg;
    }

    /**
     * @param UploadedFile $purchaseOrderImg
     */
    public function setPurchaseOrderImg(UploadedFile $purchaseOrderImg)
    {
        $this->purchaseOrderImg = $purchaseOrderImg;
    }

    /**
     * @return UploadedFile
     */
    public function getPressImg()
    {
        return $this->pressImg;
    }

    /**
     * @param UploadedFile $pressImg
     */
    public function setPressImg(UploadedFile $pressImg)
    {
        $this->pressImg = $pressImg;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload($filename)
    {
        switch ($filename){
            case 'coverImg':
                $getFile = getCoverImg();
                $setFile = setCoverImg(null);
                $path = self::SERVER_PATH_TO_COVER_IMAGE_FOLDER;
                break;
            case 'pressImg':
                $getFile = getPressImg();
                $setFile = setPressImg(null);
                $path = self::SERVER_PATH_TO_PRESS_IMAGE_FOLDER;
                break;
            default:
                $getFile = getPurchaseOrderImg();
                $setFile = setPurchaseOrderImg(null);
                $path = self::SERVER_PATH_TO_PURCHASE_ORDER_IMAGE_FOLDER;
        }
        // the file property can be empty if the field is not required
        if (null === $this->$getFile) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->$getFile->move(
            $path,
            $this->$getFile->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->filename = $this->$getFile->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->$setFile;
    }

    public function lifecycleFileUpload()
    {
        $this->upload('coverImg');
        $this->upload('pressImg');
        $this->upload('purchaseOrderImg');
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated()
    {
        $this->setUpdated(new \DateTime());
    }

}
