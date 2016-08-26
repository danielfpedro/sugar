<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CakePortugue Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\Time $criado
 * @property \Cake\I18n\Time $modificado
 * @property int $ativo
 * @property int $deletado
 * @property \Cake\I18n\Time $dt_deletado
 */
class CakePortugue extends Entity
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
        '*' => true,
        'id' => false
    ];
}