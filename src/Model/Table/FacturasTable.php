<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facturas Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ClientesTable&\Cake\ORM\Association\BelongsTo $Clientes
 * @property \App\Model\Table\LugaresTable&\Cake\ORM\Association\BelongsTo $Lugares
 * @property \App\Model\Table\NotasTable&\Cake\ORM\Association\HasMany $Notas
 * @property \App\Model\Table\EtiquetasTable&\Cake\ORM\Association\BelongsToMany $Etiquetas
 *
 * @method \App\Model\Entity\Factura get($primaryKey, $options = [])
 * @method \App\Model\Entity\Factura newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Factura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Factura|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factura saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Factura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Factura[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Factura findOrCreate($search, callable $callback = null, $options = [])
 */
class FacturasTable extends Table
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

        $this->setTable('facturas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Lugares', [
            'foreignKey' => 'lugar_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Notas', [
            'foreignKey' => 'factura_id'
        ]);
        $this->belongsToMany('Etiquetas', [
            'foreignKey' => 'factura_id',
            'targetForeignKey' => 'etiqueta_id',
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
            ->maxLength('titulo', 50)
            ->allowEmptyString('titulo');

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('productos')
            ->allowEmptyString('productos');

        $validator
            ->dateTime('lanzamiento')
            ->allowEmptyDateTime('lanzamiento');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['cliente_id'], 'Clientes'));
        $rules->add($rules->existsIn(['lugar_id'], 'Lugares'));

        return $rules;
    }

    //para encontrar etiquetas -> luegro crear una vista para las etiquetas en el template facturas
    public function findEtiquetado(Query $query, array $options){
        return $this->find()
            ->distinct(['Facturas.id'])
            ->matching('Etiquetas', function($q) use ($options){
                return $q->where(['Etiquetas.titulo IN' => $options['etiquetas']]);
            });
    }
}
