<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $bio
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\FrozenTime|null $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 *
 * @property \App\Model\Entity\Factura[] $facturas
 * @property \App\Model\Entity\Nota[] $notas
 */
class User extends Entity
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
        'nombre' => true,
        'apellido' => true,
        'bio' => true,
        'email' => true,
        'password' => true,
        'creado' => true,
        'modificado' => true,
        'facturas' => true,
        'notas' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    //Funcion para encriptar contraseñas de usuario
    protected function _setPassword($password){
      return (new DefaultPasswordHasher)->hash($password);
    }
}
