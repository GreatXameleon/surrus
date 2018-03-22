<?php
$fio = $_POST['fio'];
$sum = $_POST['sum'];
$email = $_POST['email'];
$mes = "ФИО: $fio\nСума инвестиций: $sum\nE-mail: $email";

/*амо старт*/


    #Массив с параметрами, которые нужно передать методом POST к API системы
    $user=array(
      'USER_LOGIN'=>'info@surrus.io', #Ваш логин (электронная почта)
     'USER_HASH'=>'023df09f4af2b7b534668885276ad66e' #Хэш для доступа к API (смотрите в профиле пользователя)
    );
    $subdomain='new5aaa70a1efe98'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
    /* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Вы также
    можете
    использовать и кроссплатформенную программу cURL, если вы не программируете на PHP. */
    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL,$link);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($user));
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER,false);
    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code=curl_getinfo($curl,CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
    curl_close($curl); #Завершаем сеанс cURL
    /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
    $code=(int)$code;
    $errors=array(
      301=>'Moved permanently',
      400=>'Bad request',
      401=>'Unauthorized',
      403=>'Forbidden',
      404=>'Not found',
      500=>'Internal server error',
      502=>'Bad gateway',
      503=>'Service unavailable'
    );
    try
    {
      #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
     if($code!=200 && $code!=204)
        throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
    }
    catch(Exception $E)
    {
      die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
    }
    /*
     Данные получаем в формате JSON, поэтому, для получения читаемых данных,
     нам придётся перевести ответ в формат, понятный PHP
     */
    $Response=json_decode($out,true);
    $Response=$Response['response'];


$creat_time=time();


    $contacts['add']=array(
       array(
          'name' => $fio,
         
          'created_at' => $creat_time,
        //  'tags' => "тег",
          
         
          'custom_fields' => array(
             array(
                'id' => 46233,
                'values' => array(
                   array(
                      'value' => $sum
                   )
                )
             ),
              array(
                'id' => 35481,
                'values' => array(
                   array(
                      'value' => $email,
					  'enum' => 'WORK'
                   )
				)
			)
		  )
       )
	   
    );
	
    /* Теперь подготовим данные, необходимые для запроса к серверу */
    $subdomain='new5aaa70a1efe98'; #Наш аккаунт - поддомен
    #Формируем ссылку для запроса
    $link='https://'.$subdomain.'.amocrm.ru/api/v2/contacts';
    /* Нам необходимо инициировать запрос к серверу. Воспользуемся библиотекой cURL (поставляется в составе PHP). Подробнее о
    работе с этой
    библиотекой Вы можете прочитать в мануале. */
    $curl=curl_init(); #Сохраняем дескриптор сеанса cURL
    #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
    curl_setopt($curl,CURLOPT_URL,$link);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
    curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($contacts));
    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
    curl_setopt($curl,CURLOPT_HEADER,false);
    curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
    $out=curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	
    /* Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
    $code=(int)$code;
    $errors=array(
      301=>'Moved permanently',
      400=>'Bad request',
      401=>'Unauthorized',
      403=>'Forbidden',
      404=>'Not found',
      500=>'Internal server error',
      502=>'Bad gateway',
      503=>'Service unavailable'
    );
	
    try
    {
      #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
     if($code!=200 && $code!=204) {
        throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error',$code);
      }
    }
    catch(Exception $E)
    {
      die('Ошибка: '.$E->getMessage().PHP_EOL.'Код ошибки: '.$E->getCode());
    }
	
    /*
     Данные получаем в формате JSON, поэтому, для получения читаемых данных,
     нам придётся перевести ответ в формат, понятный PHP
     */
    $Response=json_decode($out,true);
    $Response=$Response['_embedded']['items'];
    $output='ID добавленных контактов:'.PHP_EOL;
	
    foreach($Response as $v)
     if(is_array($v))
	 {$output.=$v['id'].PHP_EOL;}
 else {return $output;}

/*
    конец амо
     */
	 /*emai рассылка unisender*/
$api_key = '65d4hcbee4ggrkt6fj4x3ar1n6etkkmimi3dwspy';
$user_lists = '12936337';
$POST = array (
  'api_key' => $api_key,
  'list_ids' => $user_lists,
  'fields[email]' => $email,
  'fields[Name]' => $fio,
);

// Устанавливаем соединение
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_URL, 
            'https://api.unisender.com/en/api/subscribe?format=json');
$result = curl_exec($ch);
/*конец отправки в unisender */


$fio = htmlspecialchars($fio);
$sum = htmlspecialchars($sum);
$email = htmlspecialchars($email);

$fio = urldecode($fio);
$sum = urldecode($sum);
$email = urldecode($email);

$fio = trim($fio);
$sum = trim($sum);
$email = trim($email);
//echo $fio;
//echo "<br>";
//echo $email;
if (mail("Info@surrus.io,  generalforwork@gmail.com, ttt.blackrar.alex@gmail.com", "Заявка с сайта",  $mes ,"From: $email \r\n"))
{    echo("<script type='text/javascript'>");
    echo("history.go(-1);");
    echo("alert('Сообщение отправлено!');</script>");

} else {
    echo "при отправке сообщения возникли ошибки";

}

exit();
?>