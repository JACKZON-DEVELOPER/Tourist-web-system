<?php
namespace common\models;

//desarrollado por Jasson Adrian Caamal Medina
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;
use backend\models\Rol;
use backend\models\Estado;
use backend\models\TipoUsuario;
use backend\models\Perfil;
use backend\models\Restaurant;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

use common\models\ValorHelpers;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE = 1;



    /**  ValorHelpers::getEstadoId('Activo')
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
      return [
          'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
                 ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                 ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                          ],
          'value' => new Expression('NOW()'),
                         ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()/** metodo rules**/
    {
        return [
          ['estado_id', 'default', 'value' => self::STATUS_ACTIVE],
          [['estado_id'],'in',  'range'=>array_keys($this->getEstadoLista())],

          ['rol_id', 'default', 'value' => 1],
          [['rol_id'],'in',  'range'=>array_keys($this->getRolLista())],

          ['tipo_usuario_id', 'default', 'value' => 1],
          [['tipo_usuario_id'],'in',  'range'=>array_keys($this->getTipoUsuarioLista())],

          ['username', 'filter', 'filter' => 'trim'],
          ['username', 'required'],
          ['username', 'unique'],
          ['username', 'string', 'min' => 2, 'max' => 255],
          ['email', 'filter', 'filter' => 'trim'],
          ['email', 'required'],
          ['email', 'email'],
          ['email', 'unique'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'rolNombre' => Yii::t('app', 'Rol'),
            'estadoNombre' => Yii::t('app', 'Estado'),
            'perfilId' => Yii::t('app', 'Perfil'),
            'perfilLink' => Yii::t('app', 'Perfil'),
            'userLink' => Yii::t('app', 'User'),
            'username' => Yii::t('app', 'User'),
            'tipoUsuarioNombre' => Yii::t('app', 'Tipo Usuario'),
            'tipoUsuarioId' => Yii::t('app', 'Tipo Usuario'),
            'UserIdLink' => Yii::t('app', 'ID'),
        ];
    }
    /**
     * {@inheritdoc}
     */
    /* metodos de identidad*/
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'estado_id' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'estado_id' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'estado_id' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'estado_id' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

/*metodos de la interfaz*/
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /*establece relacion usuario y perfil*/
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['user_id' => 'id']);
    }
    public function getRestaurant()
    {
        return $this->hasOne(Restaurant::className(), ['user_id' => 'id']);
    }

/**
* metodos para rol
*/

    /*relacion get rol*/
    public function getRol()
    {
      return $this->hasOne(Rol::className(), ['id_rol' => 'rol_id']);
    }
    /*get nombre rol*/
    public function getRolNombre()
    {
      return $this->rol ? $this->rol->rol_nombre:'- sin rol -';
    }

    public static function getRolLista()
    {
      $dropciones = Rol::find()->asArray()->all();
      return ArrayHelper::map($dropciones, 'id_rol', 'rol_nombre');
    }
/**
* metodos para estado
*/
    public function getEstado()
    {
      return $this->hasOne(Estado::className(), ['id_estado' => 'estado_id']);

    }
    public function getEstadoNombre()
    {
      return $this->estado ? $this->estado->estado_Nombre: '- sin estado -';

    }
    public static function getEstadoLista()
    {
      $dropciones = Estado::find()->asArray()->all();
      return ArrayHelper::map($dropciones, 'id_estado', 'estado_Nombre');
    }



/* seccion tipo_usuario*/
    public function getTipoUsuario()
    {
        return $this->hasOne(TipoUsuario::className(), ['id_tipo_usuario' => 'tipo_usuario_id']);
    }

    public function getTipoUsuarioNombre()
    {
        return $this->tipoUsuario ? $this->tipoUsuario->tipo_usuario_nombre : '- sin tipo usuario -';
    }

    public static function getTipoUsuarioLista()
    {
        $dropciones = TipoUsuario::find()->asArray()->all();
        return ArrayHelper::map($dropciones, 'id_tipo_usuario', 'tipo_usuario_nombre');
    }
    public function getTipoUsuarioId()
    {
        return $this->tipoUsuario ? $this->tipoUsuario->id_tipo_usuario : 'ninguno';
    }


/*llamado del modulo Perfil*/
    public function getPerfilId()
    {
      return $this->perfil ? $this->perfil->id_perfil : 'ninguno';
    }

    public function getPerfilLink()
    {
      $url = Url::to(['perfil/view', 'id_perfil'=>$this->perfilId]);
      $opciones = [];
      return Html::a($this->perfil ? 'perfil' : 'ninguno', $url, $opciones);
    }
/*Modelo userLink*/
    public function getUserIdLink()
    {
      $url = Url::to(['user/update', 'id'=>$this->id]);
      $opciones = [];
      return Html::a($this->id, $url, $opciones);
    }
    public function getUserLink()
    {
      $url = Url::to(['user/view', 'id'=>$this->id]);
      $opciones = [];
      return Html::a($this->username, $url, $opciones);
    }




}
