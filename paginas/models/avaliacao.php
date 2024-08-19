<?php

namespace app\models;

use Yii;
use DateTime;


/**
 * This is the model class for table "avaliacao".
 *
 * @property int $idAvaliacao
 * @property string|null $comentario
 * @property int|null $nota
 * @property int $idCidade
 * @property int $idUsuario
 * @property string|null $data
 *
 * @property Cidade $idCidade0
 * @property Usuario $idUsuario0
 */
class Avaliacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avaliacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAvaliacao', 'idCidade', 'idUsuario'], 'required'],
            [['idAvaliacao', 'nota', 'idCidade', 'idUsuario'], 'integer'],
            [['comentario'], 'string', 'max' => 1024],
            [['data'], 'string', 'max' => 45],
            [['idAvaliacao'], 'unique'],
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
            'idAvaliacao' => 'Id Avaliacao',
            'comentario' => 'Comentario',
            'nota' => 'Nota',
            'idCidade' => 'Id Cidade',
            'idUsuario' => 'Id Usuario',
            'data' => 'Data',
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

    public function getCidade()
    {
        return $this->hasOne(Cidade::className(), ['idCidade' => 'idCidade']);
    }

    public function getFormattedData()
    {
        $date = DateTime::createFromFormat('d/m/Y', $this->data);
        if ($date) {
            return $date->format('Y-m-d');
        }
        return null; // ou algum valor padrão
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
}
