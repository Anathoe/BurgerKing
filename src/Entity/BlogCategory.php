<?php

namespace App\Entity;

use App\Repository\BlogCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BlogCategoryRepository::class)
 */
class BlogCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rubrique;

    /**
     * @ORM\OneToMany(targetEntity=Blog::class, mappedBy="blog")
     */
    private $BlogCategory_Blog;

    public function __construct()
    {
        $this->BlogCategory_Blog = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRubrique(): ?string
    {
        return $this->rubrique;
    }

    public function setRubrique(string $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * @return Collection|Blog[]
     */
    public function getBlogCategoryBlog(): Collection
    {
        return $this->BlogCategory_Blog;
    }

    public function addBlogCategoryBlog(Blog $blogCategoryBlog): self
    {
        if (!$this->BlogCategory_Blog->contains($blogCategoryBlog)) {
            $this->BlogCategory_Blog[] = $blogCategoryBlog;
            $blogCategoryBlog->setBlog($this);
        }

        return $this;
    }

    public function removeBlogCategoryBlog(Blog $blogCategoryBlog): self
    {
        if ($this->BlogCategory_Blog->removeElement($blogCategoryBlog)) {
            // set the owning side to null (unless already changed)
            if ($blogCategoryBlog->getBlog() === $this) {
                $blogCategoryBlog->setBlog(null);
            }
        }

        return $this;
    }
}
