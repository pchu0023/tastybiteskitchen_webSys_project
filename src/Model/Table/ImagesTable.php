<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use ArrayObject;

/**
 * Images Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\Image newEmptyEntity()
 * @method \App\Model\Entity\Image newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Image> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Image findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Image patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Image> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Image saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Image>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Image> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ImagesTable extends Table
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

        $this->setTable('images');
        $this->setDisplayField('file_location');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Products', [
            'foreignKey' => 'image_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'images_products',
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
            ->scalar('file_location')
            ->maxLength('file_location', 100)
            ->requirePresence('file_location', 'create')
            ->notEmptyString('file_location');

        return $validator;
    }

    /**
     * @param EventInterface $event
     * @param SelectQuery $query the query being modified
     * @param ArrayObject $options
     * @param $primary
     * @return SelectQuery the modified query
     *
     * Modifies all queries to the Images Table to only return entities not currently Archived
     */
    public function beforeFind(EventInterface $event, SelectQuery $query, ArrayObject $options, $primary) {
        $query->where(['Images.isArchived' => false]);
        return $query;
    }

}
