<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Program Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $sub_category_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\SubCategory $sub_category
 */
class Program extends Entity
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
        'user_id' => true,
        'category_id' => true,
        'sub_category_id' => true,
        'name' => true,
        'slug' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'category' => true,
        'sub_category' => true
    ];
}
