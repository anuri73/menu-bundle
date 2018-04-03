<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 03.04.2018
 * Time: 23:21
 */

namespace Klabs\MenuBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class MenuItem
 * @package Klabs\MenuBundle\Entity
 * @ORM\Table("menu_menu_item")
 * @ORM\Entity(repositoryClass="Klabs\MenuBundle\Repository\MenuItemRepository")
 */
class MenuItem {
	/**
	 * @var null|int $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;
	/**
	 * @var null|string $title
	 *
	 * @ORM\Column(name="title", type="string", length=255)
	 */
	protected $title;
	/**
	 * @var null|string $url
	 *
	 * @ORM\Column(name="url", type="string", length=255, nullable=true)
	 */
	protected $url;
	/**
	 * @var null|bool $active
	 *
	 * @ORM\Column(name="active", type="boolean")
	 */
	protected $active = true;
	/**
	 * @var null|string $target
	 *
	 * @ORM\Column(name="target", type="string", length=255, nullable=true)
	 */
	protected $target = '_self';
	/**
	 * @ORM\Column(name="position", type="integer", nullable=false)
	 * @var null|int $position
	 */
	private $position = 0;
	/**
	 * @var null|int $depth
	 * @ORM\Column(name="depth", type="integer", nullable=false)
	 */
	protected $depth = 1;
	/**
	 * @ORM\ManyToOne(targetEntity="Klabs\MenuBundle\Entity\MenuItem", inversedBy="children")
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
	 * @var null|Menu $parent
	 */
	protected $parent;
	/**
	 * @ORM\OneToMany(targetEntity="Klabs\MenuBundle\Entity\MenuItem", mappedBy="parent", cascade={"persist"})
	 * @ORM\OrderBy({"position" = "ASC"})
	 * @var null|Collection|MenuItem[] $children
	 */
	protected $children;
	/**
	 * @ORM\ManyToOne(targetEntity="Klabs\MenuBundle\Entity\Menu", inversedBy="items")
	 * @var null|Menu $menu
	 */
	protected $menu;
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
	 * @return MenuItem
	 */
	public function setId( $id ) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param null|string $title
	 *
	 * @return MenuItem
	 */
	public function setTitle( $title ) {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param null|string $url
	 *
	 * @return MenuItem
	 */
	public function setUrl( $url ) {
		$this->url = $url;
		return $this;
	}

	/**
	 * @return bool|null
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * @param bool|null $active
	 *
	 * @return MenuItem
	 */
	public function setActive( $active ) {
		$this->active = $active;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getTarget() {
		return $this->target;
	}

	/**
	 * @param null|string $target
	 *
	 * @return MenuItem
	 */
	public function setTarget( $target ) {
		$this->target = $target;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * @param int|null $position
	 *
	 * @return MenuItem
	 */
	public function setPosition( $position ) {
		$this->position = $position;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getDepth() {
		return $this->depth;
	}

	/**
	 * @param int|null $depth
	 *
	 * @return MenuItem
	 */
	public function setDepth( $depth ) {
		$this->depth = $depth;
		return $this;
	}

	/**
	 * @return Menu|null
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param Menu|null $parent
	 *
	 * @return MenuItem
	 */
	public function setParent( $parent ) {
		$this->parent = $parent;
		return $this;
	}

	/**
	 * @return Collection|MenuItem[]|null
	 */
	public function getChildren() {
		return $this->children;
	}

	/**
	 * @param Collection|MenuItem[]|null $children
	 *
	 * @return MenuItem
	 */
	public function setChildren( $children ) {
		$this->children = $children;
		return $this;
	}

	/**
	 * @return Menu|null
	 */
	public function getMenu() {
		return $this->menu;
	}

	/**
	 * @param Menu|null $menu
	 *
	 * @return MenuItem
	 */
	public function setMenu( $menu ) {
		$this->menu = $menu;
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
	 * @return MenuItem
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
	 * @return MenuItem
	 */
	public function setUpdatedAt( $updatedAt ) {
		$this->updatedAt = $updatedAt;
		return $this;
	}
}