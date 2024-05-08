<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebsiteContent Model
 *
 * @method \App\Model\Entity\WebsiteContent newEmptyEntity()
 * @method \App\Model\Entity\WebsiteContent newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\WebsiteContent> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteContent get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\WebsiteContent findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\WebsiteContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\WebsiteContent> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebsiteContent|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\WebsiteContent saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\WebsiteContent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebsiteContent>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebsiteContent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebsiteContent> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebsiteContent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebsiteContent>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebsiteContent>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebsiteContent> deleteManyOrFail(iterable $entities, array $options = [])
 */
class WebsiteContentTable extends Table
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

        $this->setTable('website_content');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');


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
            ->scalar('home_image')
            ->maxLength('home_image', 255)
            ->allowEmptyFile('home_image');
        
        $validator
            ->scalar('background_image')
            ->maxLength('background_image', 255)
            ->allowEmptyFile('background_image');
        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('opening_time_weekdays')
            ->maxLength('opening_time_weekdays', 255)
            ->allowEmptyString('opening_time_weekdays');

        $validator
            ->scalar('opening_time_weekends')
            ->maxLength('opening_time_weekends', 255)
            ->allowEmptyString('opening_time_weekends');
        $validator
            ->scalar('opening_content1')
            ->maxLength('opening_content1', 255)
            ->allowEmptyString('opening_content1');   
        $validator
            ->scalar('opening_content2')
            ->maxLength('opening_content2', 255)
            ->allowEmptyString('opening_content2'); 
        $validator
            ->scalar('logo_image')
            ->maxLength('logo_image', 255)
            ->allowEmptyFile('logo_image');

        $validator
            ->scalar('about_title')
            ->maxLength('about_title', 255)
            ->allowEmptyString('about_title');

        $validator
            ->scalar('about_description')
            ->allowEmptyString('about_description');

        $validator
            ->scalar('image1')
            ->maxLength('image1', 255)
            ->allowEmptyString('image1');

        $validator
            ->scalar('image2')
            ->maxLength('image2', 255)
            ->allowEmptyString('image2');

        $validator
            ->scalar('image3')
            ->maxLength('image3', 255)
            ->allowEmptyString('image3');

        $validator
            ->scalar('image4')
            ->maxLength('image4', 255)
            ->allowEmptyString('image4');

        return $validator;
    }
}
