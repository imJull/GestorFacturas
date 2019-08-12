<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etiquetas Model
 *
 * @property \App\Model\Table\FacturasTable&\Cake\ORM\Association\BelongsToMany $Facturas
 *
 * @method \App\Model\Entity\Etiqueta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Etiqueta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Etiqueta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Etiqueta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etiqueta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Etiqueta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Etiqueta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Etiqueta findOrCreate($search, callable $callback = null, $options = [])
 */
class EtiquetasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('etiquetas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Facturas', [
            'foreignKey' => 'etiqueta_id',
            'targetForeignKey' => 'factura_id',
            'joinTable' => 'facturas_etiquetas'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->allowEmptyString('titulo');

        $validator
            ->dateTime('creado')
            ->allowEmptyDateTime('creado');

        $validator
            ->dateTime('modificado')
            ->allowEmptyDateTime('modificado');

        return $validator;
    }

    
}
