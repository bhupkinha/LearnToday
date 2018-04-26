<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $category_type
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $status
 * @property int $position
 * @property int $visibility
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SubCategory[] $sub_categorys
 */
class Category extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'category_type' => true,
        'name' => true,
        'slug' => true,
        'description' => true,
        'status' => true,
        'position' => true,
        'visibility' => true,
        'created' => true,
        'modified' => true,
        'sub_categorys' => true
    ];
}
