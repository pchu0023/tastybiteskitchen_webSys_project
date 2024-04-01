<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImagesProducts Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ImagesProduct newEmptyEntity()
 * @method \App\Model\Entity\ImagesProduct newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagesProduct> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImagesProduct get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ImagesProduct findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ImagesProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ImagesProduct> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImagesProduct|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ImagesProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ImagesProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagesProduct>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagesProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagesProduct> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagesProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagesProduct>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ImagesProduct>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ImagesProduct> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImagesProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('images_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('image_id')
            ->notEmptyString('image_id');

        $validator
            ->uuid('product_id')
            ->notEmptyString('product_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['image_id'], 'Images'), ['errorField' => 'image_id']);
        $rules->add($rules->existsIn(['product_id'], 'Products'), ['errorField' => 'product_id']);

        return $rules;
    }
}
