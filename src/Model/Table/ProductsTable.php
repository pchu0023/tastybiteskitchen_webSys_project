<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsToMany $Images
 * @property \App\Model\Table\IngredientsTable&\Cake\ORM\Association\BelongsToMany $Ingredients
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\BelongsToMany $Menus
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsToMany $Orders
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Product> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Product> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Product>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Product> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Images', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'image_id',
            'joinTable' => 'images_products',
        ]);
        $this->belongsToMany('Ingredients', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'ingredient_id',
            'joinTable' => 'ingredients_products',
        ]);
        $this->belongsToMany('Menus', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'menu_id',
            'joinTable' => 'menus_products',
        ]);
        $this->belongsToMany('Orders', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'orders_products',
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
            ->scalar('name')
            ->maxLength('name', 40)
            ->requirePresence('name', 'create')
            ->add('name', ['validChars' => ['rule' => function ($value, $context) {
                return preg_match("/^[a-zA-Z0-9' -]+$/", $value) > 0;
            }, 'message' => '! ! ! The name must only contain letters, numbers, and spaces. ']])
            ->notEmptyString('name');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price')
            ->add('price', 'custom', [
                'rule' => function ($value, $context) {
                    return $value <= 999.99;
                },
                'message' => '! ! ! Price must not exceed 999.99.'
            ])
            ->add('price', 'numeric', [
                'rule' => function ($value, $context) {
                    return is_numeric($value);
                },
                'message' => 'Price must only contain numbers.'
            ]);

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity')
            ->add('quantity', 'custom', [
                'rule' => function ($value, $context) {
                    return $value <= 9999;
                },
                'message' => '! ! ! Quantity must not exceed 9999.'
            ])
            ->add('quantity', 'numeric', [
                'rule' => function ($value, $context) {
                    return is_numeric($value);
                },
                'message' => 'Quantity must only contain numbers.'
            ]);

        $validator
            ->scalar('extra_info')
            ->maxLength('extra_info', 200)
            ->allowEmptyString('extra_info');

        $validator
            ->integer('catering_discount')
            ->notEmptyString('catering_discount')
            ->add('catering_discount', 'custom', [
                'rule' => function ($value, $context) {
                    return $value <= 99.99;
                },
                'message' => '! ! ! Catering Discount must not exceed 99.99% off.'
            ])
            ->add('price', 'numeric', [
                'rule' => function ($value, $context) {
                    return is_numeric($value);
                },
                'message' => 'Catering Discount must only contain numbers.'
            ]);

        return $validator;
    }
}
