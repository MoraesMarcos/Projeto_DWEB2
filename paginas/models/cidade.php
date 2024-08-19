<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cidade".
 *
 * @property int $idCidade
 * @property string|null $nome
 * @property string|null $descricao
 * @property string|null $banner
 *
 * @property Avaliacao[] $avaliacaos
 * @property Items[] $items
 */
class Cidade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cidade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCidade'], 'required'],
            [['idCidade'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['descricao', 'banner'], 'string', 'max' => 1024],
            [['idCidade'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCidade' => 'Id Cidade',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'banner' => 'Banner',
        ];
    }

    /**
     * Gets query for [[Avaliacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaos()
    {
        return $this->hasMany(Avaliacao::class, ['idCidade' => 'idCidade']);
    }

    public function getMediaAvaliacoes()
    {
        return $this->hasMany(Avaliacao::className(), ['idCidade' => 'id'])->average('nota');
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::class, ['idCidade' => 'idCidade']);
    }
}
