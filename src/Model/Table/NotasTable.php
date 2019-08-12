<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notas Model
 *
 * @property \App\Model\Table\FacturasTable&\Cake\ORM\Association\BelongsTo $Facturas
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Nota get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nota newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nota[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nota|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nota saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nota patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nota[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nota findOrCreate($search, callable $callback = null, $options = [])
 */
class NotasTable extends Table
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

        $this->setTable('notas');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->belongsTo('Facturas', [
            'foreignKey' => 'factura_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('texto')
            ->allowEmptyString('texto');

        $validator
            ->dateTime('creado')
            ->allowEmptyDateTime('creado');

        $validator
            ->dateTime('modificado')
            ->allowEmptyDateTime('modificado');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['factura_id'], 'Facturas'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
