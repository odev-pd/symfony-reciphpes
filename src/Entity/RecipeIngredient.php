<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(
 *     repositoryClass=App\Repository\RecipeIngredientRepository::class
 * )
 * @ORM\Table(
 *     name="recipeingredient"
 * )
 */
class RecipeIngredient extends AbstractEntity
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="App\Entity\Recipe")
     */
    protected $recipe;

    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="App\Entity\Ingredient", cascade={"persist"})
     */
    protected $ingredient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $note;

    /**
     * @return mixed
     */
    public function getRecipe() {
        return $this->recipe;
    }

    /**
     * @param mixed $recipe
     * @return RecipeIngredient
     */
    public function setRecipe($recipe) {
        $this->recipe = $recipe;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIngredient() {
        return $this->ingredient;
    }

    /**
     * @param mixed $ingredient
     * @return RecipeIngredient
     */
    public function setIngredient($ingredient) {
        $this->ingredient = $ingredient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNote() {
        return $this->note;
    }

    /**
     * @param mixed $note
     * @return RecipeIngredient
     */
    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName() {
        return $this->ingredient ? $this->ingredient->getName() : null;
    }
}
