<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idUsuario
 * @property string|null $nome
 * @property string|null $email
 * @property string|null $senha
 * @property string|null $telefone
 * @property string|null $fotoPerfil
 * @property string|null $cargo
 * @property int|null $idItems
 *
 * @property Avaliacao[] $avaliacaos
 * @property Items $idItems0
 * @property Items[] $items
 */
class Usuario extends ActiveRecord implements IdentityInterface
{
    /**
     * @var UploadedFile|null
     */
    public $uploadedFotoPerfil;

    public $confirmarSenha;

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || $this->isAttributeChanged('senha')) {
                $this->senha = Yii::$app->security->generatePasswordHash($this->senha);
            }
            return true;
        }
        return false;
    }

    public static function tableName()
    {
        return 'usuario';
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->senha);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    public function getId()
    {
        return $this->idUsuario;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        // Implementação necessária se desejar utilizar autenticação via cookie
        return null;
    }

    public function rules()
    {
        return [
            [['nome', 'email', 'senha'], 'required'],
            [['email'], 'email'],
            [['senha'], 'string', 'min' => 6],
            [['nome', 'email', 'telefone', 'cargo'], 'string', 'max' => 255],
            [['cargo'], 'default', 'value' => 'USER'],
            [['uploadedFotoPerfil'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'ID do Usuário',
            'nome' => 'Nome',
            'email' => 'E-mail',
            'senha' => 'Senha',
            'confirmarSenha' => 'Confirmar Senha',
            'telefone' => 'Telefone',
            'uploadedFotoPerfil' => 'Foto de Perfil',
            'cargo' => 'Cargo',
            'idItems' => 'ID dos Itens',
        ];
    }

    /**
     * Gets query for [[Avaliacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacaos()
    {
        return $this->hasMany(Avaliacao::class, ['idUsuario' => 'idUsuario']);
    }

    /**
     * Gets the user's reviews.
     * @return \yii\db\ActiveQuery
     */
    public function getAvaliacoes()
    {
        return $this->hasMany(Avaliacao::className(), ['idUsuario' => 'idUsuario']);
    }

    /**
     * Gets query for [[IdItems0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdItems0()
    {
        return $this->hasOne(Items::class, ['idItems' => 'idItems']);
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::class, ['idUsuario' => 'idUsuario']);
    }
}
