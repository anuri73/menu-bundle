<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 03.04.2018
 * Time: 23:13
 */

namespace Klabs\MenuBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class Menu
 * @package Klabs\MenuBundle\Entity
 * @ORM\Table("menu_menu")
 * @ORM\Entity(repositoryClass="Klabs\MenuBundle\Repository\MenuRepository")
 */
class Menu {
	/**
	 * @var null|int $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;
	/**
	 * @var null|string $name
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	protected $name;
	/**
	 * @ORM\OneToMany(targetEntity="Klabs\MenuBundle\Entity\MenuItem", mappedBy="menu", cascade={"persist","remove","merge"}, orphanRemoval=true)
	 * @ORM\OrderBy({ "depth" = "ASC", "position" = "ASC" })
	 * @var null|Collection|MenuItem[] $items
	 */
	protected $items;
	/**
	 * @Gedmo\Slug(fields={"name"})
	 * @ORM\Column(name="slug", type="string", length=255)
	 * @var null|string $slug
	 */
	protected $slug;
	/**
	 * @var DateTime $created
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime")
	 */
	protected $createdAt;
	/**
	 * @var DateTime $updated
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(type="datetime")
	 */
	protected $updatedAt;

	/**
	 * @return int|null
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int|null $id
	 *
	 * @return Menu
	 */
	public function setId( $id ) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param null|string $name
	 *
	 * @return Menu
	 */
	public function setName( $name ) {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return Collection|MenuItem[]|null
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * @param Collection|MenuItem[]|null $items
	 *
	 * @return Menu
	 */
	public function setItems( $items ) {
		$this->items = $items;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * @param null|string $slug
	 *
	 * @return Menu
	 */
	public function setSlug( $slug ) {
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * @param DateTime $createdAt
	 *
	 * @return Menu
	 */
	public function setCreatedAt( $createdAt ) {
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getUpdatedAt() {
		return $this->updatedAt;
	}

	/**
	 * @param DateTime $updatedAt
	 *
	 * @return Menu
	 */
	public function setUpdatedAt( $updatedAt ) {
		$this->updatedAt = $updatedAt;
		return $this;
	}
}