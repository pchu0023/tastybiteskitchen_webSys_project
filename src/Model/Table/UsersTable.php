<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');

        $this->hasMany('Payments', [
            'foreignKey' => 'user_id',
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
            ->scalar('type')
            ->notEmptyString('type');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 80)
            ->requirePresence('first_name', 'create')
            ->add('first_name', ['validChars' => ['rule' => function ($value, $context) {
                        // Allows only letters (both cases), hyphens, and apostrophes
                return preg_match("/^[a-zA-Z'-]+$/", $value) > 0;
            }, 'message' => 'Name must only contain letters, hyphens and apostrophes']])
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 80)
            ->requirePresence('last_name', 'create')
            ->add('last_name', ['validChars' => ['rule' => function ($value, $context) {
                // Allows only letters (both cases), hyphens, and apostrophes
                return preg_match("/^[a-zA-Z'-]+$/", $value) > 0;
            }, 'message' => 'Name must only contain letters, hyphens and apostrophes']])
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->maxLength('email', 255)
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 128)
            ->minLength('password', 8)
            ->requirePresence('password', 'create')
            ->add('password', ['hasSpecialCharacter' => ['rule' => function ($value, $context) {
                return preg_match('/[^\w\s]/', $value) == 1;
            }, 'message' => 'Password must have special character']])
            ->notEmptyString('password');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
        ->scalar('phone_number')
        ->maxLength('phone_number', 12)
        ->allowEmptyString('phone_number')
        ->add('phone_number', 'validFormat', [
            'rule' => ['custom', '/^(?:\d{2}\s?\d{4}\s?\d{4}|\d{10})$/'],
            'message' => __('Phone number must be in the format "04 0000 0000" or "0400000000"')
        ]);

        $validator
            ->scalar('nonce')
            ->maxLength('nonce', 255)
            ->allowEmptyString('nonce');

        $validator
            ->dateTime('nonce_expiry')
            ->allowEmptyDateTime('nonce_expiry');

        $validator
            ->scalar('session_id')
            ->maxLength('session_id', 255)
            ->allowEmptyString('session_id');

        $validator
            ->boolean('first_login')
            ->notEmptyString('first_login');

        return $validator;
    }

    /** Reset Password Validation
     * @param Validator $validator
     * @return Validator
     */
    public function validationResetPassword(Validator $validator): Validator
    {
        $validator
            ->scalar('password')
            ->maxLength('password', 128)
            ->minLength('password', 8)
            ->requirePresence('password', 'true')
            ->add('password', ['hasSpecialCharacter' => ['rule' => function ($value, $context) {
                return preg_match('/[^\w\s]/', $value) == 1;
            }, 'message' => 'Password must contain a special character']])
            ->notEmptyString('password');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
