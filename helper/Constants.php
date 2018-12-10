<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 01/09/2017
 * Time: 11:57
 */

class Constants {
	//TYPEcHECK
	public static $TYPE_CHECK_RESERVE = 1;
	public static $TYPE_CHECK_IN      = 2;
	public static $TYPE_CHECK_OUT     = 3;
	//TYPE SERVICE
	public static $TYPE_SERVICE_CONSUME = 1;
	public static $TYPE_SERVICE_LODGING = 2;//HOSPEDAJE
	public static $TYPE_SERVICE_OFFER = 3;
	public static $TYPE_SERVICE_REGISTER = 4;
	//TYPE CONSUME
	public static $TYPE_CONSUME_CHECK_IN        = 1;
	public static $TYPE_CONSUME_CHECK_OUT       = 2;
	public static $TYPE_CONSUME_CONSUME_ROOM    = 3;
	public static $TYPE_CONSUME_REQUEST_SERVICE = 4;//solicitu de servicio
	public static $TYPE_CONSUME_RESERVE         = 5;
	public static $TYPE_CONSUME_DEPOSIT         = 6;
	public static $TYPE_CONSUME_CANCEL          = 7;
	public static $TYPE_CONSUME_SPENDING        = 8;//gasto
	//TypePay
	public static $TYPE_PAY_EFFECTIVE        = 'effective';//pago en efectivo
	public static $TYPE_PAY_CARD        = 'card';//deposito de tarjeta de credito
	public static $TYPE_PAY_DEPOSIT        = 'deposit';//deposito en una cuenta
	//VALUE_TYPE_CONSUME
	public static $VALUE_TYPE_CONSUME_RESERVE=2;
	public static $VALUE_TYPE_CONSUME_CONSUME=1;
	//STATE CHECK
	public static $STATE_CHECK_ACTIVE = 1;
	public static $STATE_CHECK_CANCEL = 2;
	public static $STATE_CHECK_PENDING = 3;
	public static $STATE_CHECK_DENIED = 4;
	public static $STATE_CHECK_PROCESS_WITH_INCUMBENT = 5;
	public static $STATE_CHECK_FINISHED = 6;
	public static $STATE_CHECK_PROCESS_WITHOUT_INCUMBENT = 7;
	public static $STATE_CHECK_DELETE_AUTOMATIC = 8;
	//STATE ACTIVITY
	public static $STATE_ACTIVITY_DELETE = 1;
	public static $STATE_ACTIVITY_ACTIVE = 2;
	public static $STATE_ACTIVITY_INACTIVE = 3;
	//STATE SERVICE
	public static $STATE_SERVICE_ACTIVE = 1;
	public static $STATE_SERVICE_INACTIVE = 2;
	public static $STATE_SERVICE_DELETE = 3;
	public static $STATE_SERVICE_MAINTENANCE = 4;//mantenimiento
	//STATE ARTICLE
	public static $STATE_ARTICLE_ENABLE   = 5;
	public static $STATE_ARTICLE_TAKEN    = 1;//prestado
	public static $STATE_ARTICLE_RETURNED = 2;//devuelto
	public static $STATE_ARTICLE_LOST     = 3;//perdido
	public static $STATE_ARTICLE_CANCEL   = 4;//bloqueado
	//MENUS
	public static $MENU_SELECTED_HOME = 1;
	public static $MENU_SELECTED_SERVICE = 2;
	public static $MENU_SELECTED_OFFER = 3;
	public static $MENU_SELECTED_SITE_TOUR = 4;
	public static $MENU_SELECTED_REPORT = 5;
	public static $MENU_SELECTED_USER = 6;
	public static $MENU_SELECTED_RESERVE = 7;
	public static $MENU_SELECTED_CHECK_IN = 8;
	public static $MENU_SELECTED_ACTIVITY = 9;
	public static $MENU_SELECTED_SETTINGS = 10;
	public static $MENU_SELECTED_HELP = 11;
	public static $MENU_SELECTED_PRICE = 12;
	public static $MENU_SELECTED_CONSUME = 13;
	public static $MENU_SELECTED_FOOD = 14;
	public static $MENU_SELECTED_ROOM = 15;
	public static $MENU_SELECTED_LOGIN = 16;
	//typeUser
	public static $TYPE_USER_FREE = 'free';
	public static $TYPE_USER_ADMIN = 'admin';
	public static $TYPE_USER_RECEPTION = 'recepcion';
	public static $TYPE_USER_CLIENT = 'cliente';
	public static $TYPE_USER_KITCHEN = 'cocina';
	public static $TYPE_USER_SERVICE = 'servicio';
	public static $TYPE_USER_ANDROID = 'android';
	public static $TYPE_DOCUMENT_DNI=1;
	public static $STATE_CONSUME_ACTIVE=1;
	public static $STATE_CONSUME_INACTIVE=0;
	//imagen estados
	public static $STATE_IMAGE_SITE_TOUR_DISABLED =0;
	public static $STATE_IMAGE_SITE_TOUR_ENABLED  =1;
	public static $STATE_CHECK_CONSUME_CANCEL     =-1;

	public static $PERCENTAGE_PAY_RESERVE=0.50;
	public static $TYPE_CARD_DEPOSIT=4;
}