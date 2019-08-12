<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factura Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $cliente_id
 * @property int $lugar_id
 * @property string|null $titulo
 * @property string|null $descripcion
 * @property string|null $productos
 * @property \Cake\I18n\FrozenTime|null $lanzamiento
 * @property \Cake\I18n\FrozenTime|null $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Lugare $lugare
 * @property \App\Model\Entity\Nota[] $notas
 * @property \App\Model\Entity\Etiqueta[] $etiquetas
 */
class Factura extends Entity
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
        'cliente_id' => true,
        'lugar_id' => true,
        'titulo' => true,
        'descripcion' => true,
        'productos' => true,
        'lanzamiento' => true,
        'creado' => true,
        'modificado' => true,
        'user' => true,
        'cliente' => true,
        'lugare' => true,
        'notas' => true,
        'etiquetas' => true
    ];
}
