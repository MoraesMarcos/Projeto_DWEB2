<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $idItems
 * @property string|null $nome
 * @property string|null $descricao
 * @property string|null $imagem
 * @property string|null $link
 * @property int|null $idUsuario
 * @property int|null $idCidade
 *
 * @property Cidade $idCidade0
 * @property Usuario $idUsuario0
 * @property Usuario[] $usuarios
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idItems'], 'required'],
            [['idItems', 'idUsuario', 'idCidade'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['descricao', 'imagem'], 'string', 'max' => 1024],
            [['link'], 'string', 'max' => 200],
            [['idItems'], 'unique'],
            [['idCidade'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::class, 'targetAttribute' => ['idCidade' => 'idCidade']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['idUsuario' => 'idUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idItems' => 'Id Items',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'imagem' => 'Imagem',
            'link' => 'Link',
            'idUsuario' => 'Id Usuario',
            'idCidade' => 'Id Cidade',
        ];
    }

    /**
     * Gets query for [[IdCidade0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCidade0()
    {
        return $this->hasOne(Cidade::class, ['idCidade' => 'idCidade']);
    }

    /**
     * Gets query for [[IdUsuario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario0()
    {
        return $this->hasOne(Usuario::class, ['idUsuario' => 'idUsuario']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['idItems' => 'idItems']);
    }
}
