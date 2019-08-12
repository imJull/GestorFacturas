<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nota Entity
 *
 * @property int $id
 * @property int $factura_id
 * @property int $user_id
 * @property string|null $titulo
 * @property string|null $texto
 * @property \Cake\I18n\FrozenTime|null $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 *
 * @property \App\Model\Entity\Factura $factura
 * @property \App\Model\Entity\User $user
 */
class Nota extends Entity
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
        'factura_id' => true,
        'user_id' => true,
        'titulo' => true,
        'texto' => true,
        'creado' => true,
        'modificado' => true,
        'factura' => true,
        'user' => true
    ];
}
