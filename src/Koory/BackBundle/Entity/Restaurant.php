<?php

namespace Koory\BackBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Restaurant

 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="Koory\BackBundle\Repository\RestaurantRepository")
 */
class Restaurant
{
    const SERVER_PATH_TO_IMAGE_FOLDER = 'bundles/app/images/restaurant';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="speciality", type="string", length=255)
     */
    private $speciality;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=5)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="geocode", type="string", length=255)
     */
    private $geocode;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var bool
     *
     * @ORM\Column(name="open", type="boolean")
     */
    private $open;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_firstname", type="string", length=255)
     */
    private $ownerFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_lastname", type="string", length=255)
     */
    private $ownerLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_phone_number", type="string", length=255)
     */
    private $ownerPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_email", type="string", length=255)
     */
    private $ownerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="price_range", type="smallint")
     */
    private $priceRange;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;


    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * One Product has Many Features.
     * @OneToMany(targetEntity="Koory\BackBundle\Entity\Product", mappedBy="restaurant")
     */
    private $products;


    /**
     * Restaurant constructor.
     */
    public function __construct() {
        $this->products = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Restaurant
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set speciality
     *
     * @param string $speciality
     *
     * @return Restaurant
     */
    public function setSpeciality($speciality)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get speciality
     *
     * @return string
     */
    public function getSpeciality()
    {
        return $this->speciality;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Restaurant
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Restaurant
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return Restaurant
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set geocode
     *
     * @param string $geocode
     *
     * @return Restaurant
     */
    public function setGeocode($geocode)
    {
        $this->geocode = $geocode;

        return $this;
    }

    /**
     * Get geocode
     *
     * @return string
     */
    public function getGeocode()
    {
        return $this->geocode;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Restaurant
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set open
     *
     * @param boolean $open
     *
     * @return Restaurant
     */
    public function setOpen($open)
    {
        $this->open = $open;

        return $this;
    }

    /**
     * Get open
     *
     * @return bool
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * Set ownerFirstname
     *
     * @param string $ownerFirstname
     *
     * @return Restaurant
     */
    public function setOwnerFirstname($ownerFirstname)
    {
        $this->ownerFirstname = $ownerFirstname;

        return $this;
    }

    /**
     * Get ownerFirstname
     *
     * @return string
     */
    public function getOwnerFirstname()
    {
        return $this->ownerFirstname;
    }

    /**
     * Set ownerLastname
     *
     * @param string $ownerLastname
     *
     * @return Restaurant
     */
    public function setOwnerLastname($ownerLastname)
    {
        $this->ownerLastname = $ownerLastname;

        return $this;
    }

    /**
     * Get ownerLastname
     *
     * @return string
     */
    public function getOwnerLastname()
    {
        return $this->ownerLastname;
    }

    /**
     * Set ownerPhoneNumber
     *
     * @param string $ownerPhoneNumber
     *
     * @return Restaurant
     */
    public function setOwnerPhoneNumber($ownerPhoneNumber)
    {
        $this->ownerPhoneNumber = $ownerPhoneNumber;

        return $this;
    }

    /**
     * Get ownerPhoneNumber
     *
     * @return string
     */
    public function getOwnerPhoneNumber()
    {
        return $this->ownerPhoneNumber;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Restaurant
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set ownerEmail
     *
     * @param string $ownerEmail
     *
     * @return Restaurant
     */
    public function setOwnerEmail($ownerEmail)
    {
        $this->ownerEmail = $ownerEmail;

        return $this;
    }

    /**
     * Get ownerEmail
     *
     * @return string
     */
    public function getOwnerEmail()
    {
        return $this->ownerEmail;
    }

    /**
     * Set priceRange
     *
     * @param string $priceRange
     *
     * @return Restaurant
     */
    public function setPriceRange($priceRange)
    {
        $this->priceRange = $priceRange;

        return $this;
    }

    /**
     * Get priceRange
     *
     * @return string
     */
    public function getPriceRange()
    {
        return $this->priceRange;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getFile()->move(
            self::SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->filename = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
     * Lifecycle callback to upload the file to the server
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getImageWebPath()
    {
        return sprintf('%s/%s', self::SERVER_PATH_TO_IMAGE_FOLDER, $this->getFilename());
    }
}

