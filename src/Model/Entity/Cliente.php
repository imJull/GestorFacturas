<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string|null $compania
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $info
 * @property string $email
 * @property string $telefono
 * @property \Cake\I18n\FrozenTime|null $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 *
 * @property \App\Model\Entity\Factura[] $facturas
 */
class Cliente extends Entity
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
        'compania' => true,
        'nombre' => true,
        'apellido' => true,
        'info' => true,
        'email' => true,
        'telefono' => true,
        'creado' => true,
        'modificado' => true,
        'facturas' => true
    ];
}
