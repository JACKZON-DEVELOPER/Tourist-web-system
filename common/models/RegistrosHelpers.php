<?php
namespace common\models;

use yii;
use common\models\ValorHelpers;
use yii\web\Controller;
use yii\helpers\Url;

class RegistrosHelpers
{
    public static function userTiene($modelo_nombre)
    {
        $conexion = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id_perfil FROM $modelo_nombre WHERE user_id=:userid";
        $comando = $conexion->createCommand($sql);
        $comando->bindValue(":userid", $userid);
        $resultado = $comando->queryOne();
        if ($resultado == null) {
            return false;
        } else {
            return $resultado['id_perfil'];
        }
    }


    public static function userTieneRes($modelo_nombre)
    {
        $conexion = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id_restaurant FROM $modelo_nombre WHERE user_id=:userid";
        $comando = $conexion->createCommand($sql);
        $comando->bindValue(":userid", $userid);
        $resultado = $comando->queryOne();
        if ($resultado == null) {
            return false;
        } else {
            return $resultado['id_restaurant'];
        }
    }
    public static function userTieneGa()
    {
        $conexion = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;

        $sql = "SELECT id_galeria FROM yii2ja.restaurant inner join yii2ja.galeria on restaurant.galeria_id = galeria.id_galeria inner join yii2ja.user on user.id = restaurant.user_id where user.id = :userid;";
        $comando = $conexion->createCommand($sql);
        $comando->bindValue(":userid", $userid);
        $resultado = $comando->queryOne();
        if ($resultado == null) {
            return false;
        } else {
            return $resultado['id_galeria'];
        }
    }
    public static function userTieneMen()
    {
        $conexion = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;

        $sql = "SELECT id_menu FROM
yii2ja.restaurant inner join yii2ja.menu
on restaurant.menu_id = menu.id_menu
inner join yii2ja.user on user.id = restaurant.user_id
where user.id = :userid
;";
        $comando = $conexion->createCommand($sql);
        $comando->bindValue(":userid", $userid);
        $resultado = $comando->queryOne();
        if ($resultado == null) {
            return false;
        } else {
            return $resultado['id_menu'];
        }
    }

    public static function requerirUpgradeA($tipo_usuario_nombre)
    {
        if (!ValorHelpers::tipoUsuarioCoincide($tipo_usuario_nombre)) {
            return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
        }
    }

    public static function requerirEstado($estado_nombre)
    {
        return ValorHelpers::estadoCoincide($estado_nombre);
    }

}
